<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::paginate();
        return view('setting.index',compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('setting.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'about_app' => 'required',
            'fb_link' => 'required',
            'tw_link' => 'required',
            'inst_link' => 'required'
        ]);

        //store
        $setting = new Setting;
        $setting->phone = $request->phone;
        $setting->email = $request->email;
        $setting->about_app = $request->about_app;
        $setting->fb_link = $request->fb_link;
        $setting->tw_link = $request->tw_link;
        $setting->inst_link = $request->inst_link;
        $setting->save();

        return redirect(route('setting.index'));
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
        $setting = Setting::find($id);
        return view('setting.edit',compact('setting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //validation
        $request->validate([
            'phone' => 'required',
            'email' => 'required',
            'about_app' => 'required',
            'fb_link' => 'required',
            'tw_link' => 'required',
            'inst_link' => 'required'
        ]);

        //store
        $setting= Setting::find($id);
        $setting->update($request->all());
        return redirect(route('setting.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $setting = Setting::find($id);
        $setting->delete();
        return redirect(route('setting.index'));
    }
}
