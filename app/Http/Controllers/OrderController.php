<?php

namespace App\Http\Controllers;

use App\Models\Size;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\OrderStatus;
use Illuminate\Http\Request;
use App\Http\Requests\OrderFormRequest;
use App\Notifications\orderNotification;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getOrders()
    {
        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        $products= Product::latest('id')->paginate(5);
        $sizes =Size::all();
        $orders = Order::where('user_id',auth()->user()->id)->orderby('id', 'desc')->paginate(5);



        return view('front.orders.orders',compact('categories','products','orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $sizes =Size::all();

        $product = Product::where('slug', $slug)->firstOrFail();
        $categories= Category::with('categories')->where(['parent_id'=>0])->get();

        return view('front.orders.create',compact('sizes','product','categories'));

    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderFormRequest  $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();



        $price=$product->regular_price;
        $quantity =$request->quantity;
        $total =  $price* $quantity;

        $order= Order::create([
            'user_id' => auth()->user()->id,
            'user_name'=>auth()->user()->name,
            'user_email'=>auth()->user()->email,
            'product_name' =>$product->name,
            'product_description'=>$product->description,
            'product_image'=>$product->image,
            'product_price'=>$product->regular_price,
            'product_id' => $product->id,
            'product_image' => $product->product_image,
            'status_order' => "جديد",
            'size_id'  => $request->size_id,
            'text' => $request->text,
            // 'status_id'  => $request->status_id,
            // 'size_name'=>$product->size_name,
            'quantity' =>$request->quantity,
            'total_order' => $total,
            'address' =>$request->address,
            'phone' => $request->phone,


        ]);

        // dd($order);

        // $order->sizes()->attatch($request->sizes);
        $user= User::where('user_type','admin')->get();

        $order_notify=Order::latest('id')->first();

        if(Notification::send($user, new orderNotification($order_notify))){

            return back();
        }



        $categories= Category::with('categories')->where(['parent_id'=>0])->get();


            return view('front.orders.myorder',compact('order','categories','product'));

        // dd($order);





    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $sizes =Size::all();
        $product = Product::where('slug', $slug)->firstOrFail();
        $order = Order::where('product_id', $product->id)->firstOrFail();

        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        return view('front.orders.edit',compact('sizes','product','categories','order'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(OrderFormRequest $request, $slug)
    {
        $product = Product::where('slug', $slug)->firstOrFail();
        $order = Order::where('product_id', $product->id)->firstOrFail();


        $price=$product->regular_price;
        $quantity =$request->quantity;
        $total =  $price* $quantity;

        $order= $order->update([
            'user_name'=>auth()->user()->name,
            'user_email'=>auth()->user()->email,
            'product_name' =>$product->name,
            'product_description'=>$product->description,
            'product_image'=>$product->image,
            'product_price'=>$product->regular_price,
            'product_id' => $product->id,
            'size_id'=>$request->size_id,
            'text' => $request->text,
            // 'size_name'=>$product->size_name,
            'quantity' =>$request->quantity,
            'total_order' => $total,
            'address' =>$request->address,
            'phone' => $request->phone,

        ]);



        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        $size =Size::with('orders')->firstOrFail();


        return view('front.orders.myorder',compact('order','categories','product','size'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        // // $product = Product::where('id', $order->product_id)->firstOrFail();
        // dd($order);
        // unlink(public_path('uploads/'.$order->product_image));

        $order->delete();
        return redirect()->route('store.myOrders')
                        ->with('success','تم حذف الطلب بنجاح');
    }

    public function editOrder($id)
    {
        $sizes =Size::all();
        $size =Size::with('orders')->firstOrFail();
        $order = Order::where('id', $id)->firstOrFail();
        $product = Product::where('id', $order->product_id)->firstOrFail();
        // dd($order);


        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        return view('front.orders.editOrder',compact('sizes','product','categories','order','size'));

    }

    public function updateOrder(OrderFormRequest $request, $id)
    {
        $order = Order::where('id', $id)->firstOrFail();
        $product = Product::where('id', $order->product_id)->firstOrFail();

        $price=$product->regular_price;
        $quantity =$request->quantity;
        $total =  $price* $quantity;

        $order= $order->update([
            'user_name'=>auth()->user()->name,
            'user_email'=>auth()->user()->email,
            'product_name' =>$product->name,
            'product_description'=>$product->description,
            'product_image'=>$product->image,
            'product_price'=>$product->regular_price,
            'product_id' => $product->id,
            'size_id'=>$request->size_id,
            // 'size_name'=>$product->size_name,
            'quantity' =>$request->quantity,
            'total_order' => $total,
            'address' =>$request->address,
            'phone' => $request->phone,

        ]);

        // dd($order);

        $categories= Category::with('categories')->where(['parent_id'=>0])->get();


        return view('front.orders.myorder',compact('order','categories','product'));
    }

    public function orderDetails($id)
    {

        $sizes =Size::all();
        $order = Order::where('id', $id)->firstOrFail();
        $product = Product::where('id', $order->product_id)->firstOrFail();
        // dd($order);


        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        return view('front.orders.orderDetails',compact('sizes','product','categories','order'));

    }


}
