<?php

namespace App\Http\Controllers\Admin;
use App\Models\Cart;
use App\Models\Size;
use App\Models\Status;
use App\Models\Popular;
use App\Models\Product;
use App\Models\Category;
use App\Models\Featured;
use App\Models\NewArrivals;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductCategory;
use App\Models\Featured_Product;
use App\Http\Requests\CartRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProductFormRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::latest('id')->paginate(4);
        $featured_products= Product::where('featured_id','1')->get();
        return view('admins.products.index' ,compact('products','featured_products'));
    }

    public function getAddToCart(Request $request ,$id)
    {
        $product = Product::find($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $sizes = Size::all();
        $status_product = Status::all();
        $featured_products= Featured::all();
        $popular_products= Popular::all();
        $newArrival_products= NewArrivals::all();
        $categories_menues= Category::where(['parent_id'=>0])->get();
        $categories_dropdowns = "<option value=''selected disabled>اختر التصنيف</option>";
        foreach($categories_menues as $cat){
            $categories_dropdowns .= "<option value='".$cat->id."'>".$cat->name."</option>";
            $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
            foreach($sub_categories as $sub_cat){
                $categories_dropdowns .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp".$sub_cat->name."</option>";
            }

        }
    return view('admins.products.create',compact(
        'categories',
        'sizes',
        'status_product',
        'categories_dropdowns',
        'featured_products',
        'popular_products',
        'newArrival_products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductFormRequest $request)
    {
        // dd($request->all());
        //validate data


        //upload file
        $ex =$request->file('product_image')->getClientOriginalExtension();
        $new_name = rand().'_'.time().'.'.$ex;
        $request->file('product_image')->move(public_path('uploads'),$new_name);

        //save Product
        $product =Product::create([
            'name' => $request->name,
            'slug'  => Str::slug($request->name),
            'short_description'  => $request->short_description,
            'description'  => $request->description,
            'regular_price'  => $request->regular_price,
            'sale_price'  => $request->sale_price,
            'status_id'  => $request->status_id,
            'size_id'  => $request->size_id,
            'featured_id'  => $request->featured_id,
            'popular_id'  => $request->popular_id,
            'newArrival_id'  => $request->newArrival_id,
            'quantity'  => $request->quantity,
            'product_image' => $new_name,
            'category_id' => $request->category_id,
        ]);

        if($product){
            return redirect()->route('admin.products.index');
        }else{
            return redirect()->back()->with('error', 'There is an error in your data');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::all();
        $sizes = Size::all();
        $status_product = Status::all();
        $featured_products= Featured::all();
        $popular_products= Popular::all();
        $newArrival_products= NewArrivals::all();
        $product= Product::find($id);
        $levels = Category::where(['parent_id'=> 0])->get();


        return view('admins.products.show',compact(
            'product',
            'categories',
            'sizes',
            'status_product',
            'levels',
            'featured_products',
            'popular_products',
            'newArrival_products'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::all();
        $sizes = Size::all();
        $status_product = Status::all();
        $featured_products= Featured::all();
        $popular_products= Popular::all();
        $newArrival_products= NewArrivals::all();
        $product= Product::find($id);
        $categories_menues= Category::where(['parent_id'=>0])->get();
        $categories_dropdowns = "<option value=''selected disabled>Select</option>";

        //category dropdown code
        $categories_menues= Category::where(['parent_id'=>0])->get();
        $categories_dropdowns = "<option value=''selected disabled>Select</option>";
        foreach($categories_menues as $cat){
            if($cat->id == $product->category_id){
                $selected = "selected";
            }else{
                $selected = "";
            }
            $categories_dropdowns .= "<option value='".$cat->id."' ".$selected.">".$cat->name."</option>";

        //code for sub categories
        $sub_categories = Category::where(['parent_id'=>$cat->id])->get();
        foreach($sub_categories as $sub_cat){
            if($sub_cat->id == $product->category_id){
                $selected = 'selected';
            }else{
                $selected = "";
            }
            $categories_dropdowns .= "<option value=".$sub_cat->id." ".$selected.">&nbsp;--&nbsp".$sub_cat->name."</option>";
        //     // $categories_dropdowns .= "<option value='".$sub_cat->id."'>&nbsp;--&nbsp".$sub_cat->name."</option>";

        }
        }



        return view('admins.products.edit', compact(
            'product',
            'categories',
            'sizes',
            'status_product',
            'categories_dropdowns',
            'featured_products',
            'popular_products',
            'newArrival_products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, $id)
    {


        $product= Product::find($id);

        $new_name= $product->product_image;
        if($request->has('product_image')){
            $ex = $request->file('product_image')->getClientOriginalExtension();
            $new_name = rand().'_'.time().'.'.$ex;
            $request->file('product_image')->move(public_path('uploads'),$new_name);
        }

        $product=$product->update([
            'name' => $request->name,
            'slug'  => Str::slug($request->name),
            'short_description'  => $request->short_description,
            'description'  => $request->description,
            'regular_price'  => $request->regular_price,
            'sale_price'  => $request->sale_price,
            'status_id'  => $request->status_id,
            'featured_id'  => $request->featured_id,
            'popular_id'  => $request->popular_id,
            'newArrival_id'  => $request->newArrival_id,
            'quantity'  => $request->quantity,
            'product_image' => $new_name,
            'size_id' =>$request->size_id,
            'category_id' => $request->category_id,
        ]);
        if($product){
            return redirect()->route('admin.products.index');
        }else{
            return redirect()->back()->with('error', 'There is an error in your data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        unlink(public_path('uploads/'.$product->product_image));
        $product->delete();
        return redirect()->route('admin.products.index')
                        ->with('success','product deleted successfully');
    }


    public function search(Request $req)
    {
        $categories= Category::with('categories')->where(['parent_id'=>0])->get();

        $data= Product::
        where('name','like','%'.$req->input('query').'%')
        ->get();

        if($data){
            return view('front.search',
            ['related_products' => $data,
            'categories'=>$categories]
        );
        }else{
            return redirect()->back()->with('error', 'There is an error in your data');
        }

        // dd($data);


    }


    public function autocomplete(Request $request){
        // $res = Product::select("name")
        //     ->where("name","LIKE","%{$request->term}%")
        //     ->get();
        // return response()->json($res);

        $categories= Category::with('categories')->where(['parent_id'=>0])->get();


        $query = $request->get('query');
          $filterResult = Product::where('name', 'LIKE', '%'. $query. '%')->get();
          return response()->json($filterResult);
    }

//     public function addToCart(CartRequest $request)
//     {


//         // $request->validate([
//         //     'product_id' => 'required|unique:cart',
//         // ]);

//         $cart =Cart::create([

//             'user_id' => Auth::user()->id,
//             'product_id' => $request->product_id,
//         ]);


//         if($cart){

//             return redirect()->back()->with('success', 'تمت إضافة المنتج إلى السلة بنجاح');
//         }else{
//             return redirect()->back()->with('error', 'There is an error in your data');
//         }
//     }

//     // public function cartItem()
//     // {
//     //     // $user_id = Auth::user()->id;
//     //     // $total= Cart::where('user_id',$user_id)->count();
//     //     $total = Cart::all()->count();


//     //     return view('front.includes.header',compact('total'));
//     // }

//     public function cartList(Request $request)
//     {

//         $product = Product::findOrFail($request->product_id);

//     $cartItem = Cart::add([

//         'user_id' => Auth::user()->id,
//         'product_id' => $request->product_id,
//         //  'id' => $product->id,
//         //  'name' => $product->name,
//         //  'qty' => $request->qty,
//         //  'price' => $product->price,
//      ]);

//      $products=Cart::associate($cartItem->rowId, Product::class);

//     //  return redirect()->route('cart');
//         // $items =Cart::with('products')->find($id);
//         // $products = Cart::all();
//         return view('front.cartList',compact('products'));

// }


// public function cart()
// {
//     return view('cart');
// }



// public function addToCart($id) // by this function we add product of choose in card
// {
//     $product = Product::find($id);

//     if(!$product) {

//         abort(404);

//     }
// // what is Session:
// //Sessions are used to store information about the user across the requests.
// // Laravel provides various drivers like file, cookie, apc, array, Memcached, Redis, and database to handle session data.
// // so cause write the below code in controller and tis code is fix
//     $cart = session()->get('cart');

//     // if cart is empty then this the first product
//     if(!$cart) {

//         $cart = [
//                 $id => [
//                     "name" => $product->name,
//                     "quantity" => 1,
//                     "price" => $product->price,
//                     "photo" => $product->photo
//                 ]
//         ];

//         session()->put('cart', $cart);

//         return redirect()->back()->with('success', 'added to cart successfully!');
//     }

//     // if cart not empty then check if this product exist then increment quantity
//     if(isset($cart[$id])) {

//         $cart[$id]['quantity']++;

//         session()->put('cart', $cart); // this code put product of choose in cart

//         return redirect()->back()->with('success', 'Product added to cart successfully!');

//     }

//     // if item not exist in cart then add to cart with quantity = 1
//     $cart[$id] = [
//         "name" => $product->name,
//         "quantity" => 1,
//         "price" => $product->price,
//         "photo" => $product->photo
//     ];

//     session()->put('cart', $cart); // this code put product of choose in cart

//     return redirect()->back()->with('success', 'Product added to cart successfully!');
// }

// // update product of choose in cart
// public function updateCart(Request $request)
// {
//     if($request->id and $request->quantity)
//     {
//         $cart = session()->get('cart');

//         $cart[$request->id]["quantity"] = $request->quantity;

//         session()->put('cart', $cart);

//         session()->flash('success', 'Cart updated successfully');
//     }
// }

// // delete or remove product of choose in cart
// public function remove(Request $request)
// {
//     if($request->id) {

//         $cart = session()->get('cart');

//         if(isset($cart[$request->id])) {

//             unset($cart[$request->id]);

//             session()->put('cart', $cart);
//         }

//         session()->flash('success', 'Product removed successfully');
//     }
// }

    // public function addToCart(CartRequest $request){

    //     if($request->isMethod('post')){
    //         $data = $request->all();
    //         // echo "<pre>"; print_r($data); die;

    //         //check if Stock status is avaliable or not
    //         // $getProductStock= Product::where(['id'=>$data['product_id'],'size'=>$data['size']])->first()->toArray();
    //         // echo $getProductStock['stock_status']; die;
    //         dd($data);
    //         return "passed";
    //     }
    // }

}
