<?php

namespace App\Http\Controllers\Admin;

use App\Models\Partner;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\PartnerRequest;
use App\Http\Requests\PartnerUpdateRequest;

class PartnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $partners= Partner::latest('id')->get();
        return view('admins.partners.index', compact('partners'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.partners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PartnerRequest $request)
    {
        //upload image

        $ex = $request->file('image')->getClientOriginalExtension();
        $new_name = rand().'_'.time().'.'.$ex;
        $request->file('image')->move(public_path('uploads'),$new_name);

        //save partner
        $partner =Partner::create([
            'name' => $request->name,
            'info'  => $request->info,
            'image' => $new_name,
            'facebook_link' => $request->facebook_link,
            'instgram_link' => $request->instgram_link,
        ]);

        if($partner){
            return redirect()->route('admin.partners.index');
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
        $partner = Partner::find($id);
        return view('admins.partners.edit',compact('partner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PartnerUpdateRequest $request, $id)
    {


        $partner= Partner::find($id);

        $new_name= $partner->image;
        if($request->has('image')){
            $ex = $request->file('image')->getClientOriginalExtension();
            $new_name = rand().'_'.time().'.'.$ex;
            $request->file('image')->move(public_path('uploads'),$new_name);
        }

        //update partner
        $partner =$partner->update([
            'name' => $request->name,
            'info'  => $request->info,
            'image' => $new_name,
            'facebook_link' => $request->facebook_link,
            'instgram_link' => $request->instgram_link
        ]);

        if($partner){
            return redirect()->route('admin.partners.index');
        }else{
            return redirect()->back()->with('error', 'There is an error in your data');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Partner  $partner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partner $partner)
    {
        unlink(public_path('uploads/'.$partner->image));
        $partner->delete();
        return redirect()->route('admin.partners.index')
                        ->with('success','partner deleted successfully');
    }
}
