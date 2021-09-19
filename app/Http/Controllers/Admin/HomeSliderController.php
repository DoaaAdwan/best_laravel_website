<?php

namespace App\Http\Controllers\Admin;

use App\Models\HomeSlider;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Http\Requests\SliderUpdateRequest;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = HomeSlider::all();
        return view('admins.homeslider.index',compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.homeslider.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {


        //upload file

        $ex = $request->file('image')->getClientOriginalExtension();
        $new_name = rand().'_'.time().'.'.$ex;
        $request->file('image')->move(public_path('uploads'),$new_name);

        //save Product
        $product =HomeSlider::create([
            'title' => $request->title,
            'subtitle'  => $request->subtitle,
            'image' => $new_name,

        ]);

        if($product){
            return redirect()->route('admin.home_sliders.index');
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
        $slider = HomeSlider::find($id);
        return view('admins.homeslider.edit',compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SliderUpdateRequest $request, $id)
    {


        $slider= HomeSlider::find($id);

        $new_name= $slider->image;
        if($request->has('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_name = rand().'_'.time().'.'.$ex;
            $request->file('image')->move(public_path('uploads'),$new_name);
        }

        //update slider
        $slider =$slider->update([
            'title' => $request->title,
            'subtitle'  => $request->subtitle,
            'image' => $new_name,
            'status' => $request->status,
        ]);

        if($slider){
            return redirect()->route('admin.home_sliders.index');
        }else{
            return redirect()->back()->with('error', 'There is an error in your data');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  HomeSlider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy(HomeSlider $slider)
    {
        unlink(public_path('uploads/'.$slider->image));
        $slider->delete();
        return redirect()->route('admin.home_sliders.index')
                        ->with('success','slider deleted successfully');
    }
}
