<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mobile;
use Session;
use Illuminate\Http\Request;

class MobileController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('admin.mobile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $mobiles = Mobile::all();
        return view('admin.create',compact('mobiles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)

    {
            $mobile =  new Mobile();
            $mobile->mobile_name = $request->mobilename;
            $mobile->memory = $request->memory;
            $mobile->battery = $request->battery;
            $mobile->price = $request->price;
            $mobile->save();
            Session:: flash('success', 'New Item has been successfully added');
            return redirect()->back();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mobile = Mobile::find($id);
        return view('admin.editmobile',compact('mobile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id ){
        $mobile=Mobile::find($request->id);
        $mobile->mobile_name=$request->mobilename;
        $mobile->memory=$request->memory;
        $mobile->battery=$request->battery;
        $mobile->price=$request->price;
        $mobile->save();
        Session:: flash('success', 'New Item has been successfully Updated');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Mobile  $mobile
     * @return \Illuminate\Http\Response
     */
    public function delete($id){
        $data=Mobile::find($id);
        $data->delete();
        return redirect()->back();
    }
}
