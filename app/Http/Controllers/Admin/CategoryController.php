<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\CategoryUpdateRequest;


class CategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin')->except('index');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admins.categories.index')
        ->with('categories', Category::latest()->get());

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels=Category::where(['parent_id'=>0])->get();


        return view('admins.categories.create')->with('levels',$levels);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {

         //upload file

         $ex = $request->file('image')->getClientOriginalExtension();
         $new_name = rand().'_'.time().'.'.$ex;
         $request->file('image')->move(public_path('uploads'),$new_name);

        $category =Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $new_name,
            'parent_id' => $request->parent_id,
            // 'status' =>$request->status,
            'url' => $request->url,
        ]);

        if($category){
            return redirect()->route('admin.categories.index');
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories=Category::find($id);
        $levels = Category::where(['parent_id'=> 0])->get();

        $categoryDetails = Category::where(['id'=>$id])->first();

        return view('admins.categories.edit',[

                'categories' => $categories,
                'levels' => $levels,
                'categoryDetails' => $categoryDetails,
        ]);

    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'image',
        ]);

        $category= Category::find($id);

        $new_name= $category->image;
        if($request->has('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_name = rand().'_'.time().'.'.$ex;
            $request->file('image')->move(public_path('uploads'),$new_name);
        }

        $category =$category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $new_name,
            'parent_id' => $request->parent_id,
            // 'status' =>$request->status,
            'url' => $request->url,
        ]);

        if($category){
            return redirect()->route('admin.categories.index');
        }else{
            return redirect()->back()->with('error', 'There is an error in your data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cat = Category::find($id);

        Product::where('Category_id', $id)->update([
            'Category_id' => null
        ]);

        $cat->delete();

        return redirect()->back()->with('success','تم حذف التصنيف بنجاح');

    }
}
