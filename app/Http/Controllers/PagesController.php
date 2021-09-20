<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Size;
use App\Models\User;
use App\Models\Status;
use App\Models\Contact;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Category;
use App\Mail\ContactMail;
use App\Models\ContactUs;
use App\Models\HomeSlider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Gloudemans\Shoppingcart\Facades\Cart;

class PagesController extends Controller
{
    public function index()
    {
        $posts= Post::latest('id')->paginate(3);
        $products= Product::latest('id')->paginate(4);
        $categories= Category::latest('id')->paginate(6);
        $sliders= HomeSlider::all();
        $featured_products= Product::where(['featured_id'=>1])->latest()->limit(3)->get();
        $popular_products= Product::where(['popular_id'=>1])->latest()->limit(3)->get();
        $status_products =Product::with('status')->orderBy('created_at', 'desc')->get();

        $categories= Category::with('categories')->where(['parent_id'=>0])->get();

        return view('front.index',compact(
            'posts',
            'products',
            'categories',
            'sliders',
            'featured_products'
            ,'status_products'
            ,'categories',
            'popular_products'));
    }

    public function basicCategory($category_id)
    {
        $categories= Category::with('categories')->where(['parent_id'=>0])->get();

        $category = Category::find($category_id);
        //subcategories in this main category
        $sub_categories= Category::where('parent_id',$category_id)->get();

        foreach($sub_categories as $sub){

            $products = Product::where(['category_id'=>$sub->id])->paginate();
            // dd($products);
            $sub_name = $sub->name;

        }


        return view('front.basicCategory',compact('category','products','categories','sub_categories','sub_name'));
    }
    public function about()
    {
        $partners= Partner::latest('id')->get();
        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        return view('front.about', compact('partners','categories'));
    }
    public function contact()
    {
        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        return view('front.contact',compact('categories'));
    }

    public function sendMessage(Request $request)
    {
        // dd($request->all);

        $details = [
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ];

        Mail::to('tone64507@gmail.com')->send(new ContactMail($details));

        return back()->with('success','تم إرسال رسالتك بنجاح سيتم الرد عليها قريباً');
    }



    public function checkout()
    {
        return view('front.checkout');
    }
    public function services()
    {
        return view('front.services');
    }
    // public function shop()
    // {
    //     // $product = Product::where('slug', $slug)->firstOrFail();
    //     return view('front.shop');
    // }
    // public function show($slug)
    // // public function show(Product $products)
    // {

    //     $products = Product::where('slug',$slug)->get();
    // return view('front.shop-details')->with('products', $products);
    // }

            public function show($slug)
        {
        $sizes =Size::all();
        $product = Product::where('slug', $slug)->firstOrFail();


        $related_products= Product::where('category_id',$product->category_id)->where('id','<>',$product->id)->latest()->limit(5)->get();
            // $product= Product::find($id);

            // $related_products = Product::with(['Category.products'=>function($query){
            //     $query->limit(5)->latest();
            // }])->where('slug',$slug)->get();

            $categories= Category::with('categories')->where(['parent_id'=>0])->get();


        return view('front.shop-details',[
            'product'=> $product,
            'related_products' => $related_products,
            'sizes' => $sizes,
            'categories'=> $categories,
        ]);
        }

        // public function store($product_id, $product_name,$product_price)
        // {
        //     Cart::add($product_id,$product_name,1,$product_price)->associate('App\Models\Product');
        //     session()->flash('success_message','Item added in Cart');
        //     return redirect()->route('store.cart');
        // }

        public function showProducts($id)
        {
            $category = Category::find($id);
            // dd('start');
            // $category = Category::where('slug', $slug)->firstOrFail();
            $related_products= Product::where('category_id',$category->category_id)->latest()->get();
            // dd($category);
            // dd($id);

        // // dd($category);
            $related_products = $category->products;


        $category =Category::with('products')->find($id);

        $categories = Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Product::get();



        // dd($result);


            return view('front.shop',[

                'category'=> $category,
                'categories'=> $categories,
                'products' => $products,
                'related_products' => $related_products,

            ]);
        }
    public function wishlist()
    {
        return view('front.wishlist');
    }
    public function myaccount()
    {
        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        return view('front.my-account',compact('categories'));
    }

    public function categories($category_id)
    {
        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        $products = Product::where(['category_id'=>$category_id])->get();
        $product_name = Product::where(['category_id'=>$category_id])->first();
        $category = Category::find($category_id);

        // dd($category);

        $popular_products= Product::where(['popular_id'=>1,'category_id'=>$category_id])->latest()->limit(5)->get();
        $newest_products =Product::where(['category_id'=>$category_id])->orderBy('created_at', 'desc')->get();



        return view('front.category',compact('categories','products','product_name','category','popular_products','newest_products'));
    }

    public function editUser($id)
    {

        $user = User::find($id);


        $categories= Category::with('categories')->where(['parent_id'=>0])->get();
        return view('front.users.edit',compact('categories','user'));

    }

    public function updateUser(Request $request, $id)
    {

            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
            ]);

            $user = User::find($id);

            $user=$user->update([
                'name' => $request->name,
                'email' =>$request->email,
            ]);
            if($user){
                return redirect()->route('store.myaccount');
            }else{
                return redirect()->back()->with('error', 'عذراً، هناك مشكلة في البيانات التي قمت بإدخالها');
            }
        }
    }

