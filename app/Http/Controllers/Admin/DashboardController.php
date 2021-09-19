<?php

namespace App\Http\Controllers\Admin;

use App\Models\Post;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user= User::find(Auth::user()->id);
        // dd($user);

        $posts_count = Post::all()->count();
        // $categories_count = Category::all()->count();
        $users_count = User::all()->count();



        //products
        $products_count = Product::all()->count();
        $categories_count = Category::all()->count();
        return view('admins.index', compact('posts_count','users_count','products_count','categories_count','user'));
    }
}
