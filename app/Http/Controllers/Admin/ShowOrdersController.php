<?php

namespace App\Http\Controllers\Admin;

use App\Models\Size;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\OrderStatus;

class ShowOrdersController extends Controller
{
    public function index()
    {
        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        $products= Product::latest('id')->paginate(5);
        $sizes =Size::all();
        $orders = Order::latest('id')->paginate(5);

        return view('admins.orders.show',compact('categories','products','orders'));
    }

    public function orderDetails($id)
    {


        $order = Order::where('id', $id)->firstOrFail();
        $size =Size::with('orders')->firstOrFail();
        $product = Product::where('id', $order->product_id)->firstOrFail();
        $orderStatuses= OrderStatus::where('status',1)->get();
        // dd($order);
        // dd($size);


        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        return view('admins.orders.orderDetails',compact('size','product','categories','order','orderStatuses'));

    }

    public function updateOrderStatus(Request $request,$id)
    {
        $order = Order::where('id', $id)->update([

            'status_order' => $request->status_order,
        ]);
        // dd($request->status_order);
        return redirect()->back()->with('success','تم تعديل حالة الطلب بنجاح');
    }
}
