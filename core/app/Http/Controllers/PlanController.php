<?php

namespace App\Http\Controllers;

use App\Plan;
use App\TimeSetting;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $page_title = "Manage Plan";
        $plan = Plan::all();
        return view('admin.plan.index', compact('page_title', 'plan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $page_title = "Create New Plan";
        $time = TimeSetting::all();
//        return view('admin.plan.create', compact('page_title', 'plan','time'));
        return view('admin.plan.create', compact('page_title', 'time'));
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
            'times' => 'numeric|min:0',
            'interest' => 'numeric|min:0',
        ]);

//        $request->amount_type == 'on; (Fixed Amount)
////        $request->interest_status == '%; (1)

        if ($request->amount_type == 'on')
        {
            $fixed_amount = $request->amount;
            $minimum = $request->amount;
            $maximum= $request->amount;
        }else{

            $fixed_amount = 0;
            $minimum = $request->minimum;
            $maximum= $request->maximum;
        }

        if ($request->interest_status == '%')
        {
            $interrest_status = 1;
        }else{
            $interrest_status = 0;
        }

        if ($request->lifetime_status == 'on')
        {
            $lifetime_status = 0;
            $repeat_time = $request->repeat_time;

        }else{
            $lifetime_status = 1;
            $repeat_time = 0;
        }

        if ($request->capital_back_status == 'on')
        {
            if ($lifetime_status == 1)
            {
                $capital_back_status = 0;

            }else{
                $capital_back_status = 1;
            }

        }else{
            $capital_back_status = 0;
        }

        if ($minimum < 0 or $maximum < 0 or $fixed_amount < 0){
            return back()->withErrors('Invest Amount cannot lower than 0');
        }

        if ($request->interest < 0)
        {
            return back()->withErrors('Interest cannot lower than 0');
        }

        if ($repeat_time < 0)
        {
            return back()->withErrors('Return Time cannot lower than 0');
        }

        Plan::create([
            'name' => $request->name,
            'minimum' => $minimum,
            'maximum' => $maximum,
            'fixed_amount' => $fixed_amount,
            'interest' => $request->interest,
            'interest_status' => $interrest_status,
            'times' => $request->times,
            'status' => 1,
            'capital_back_status' => $capital_back_status,
            'lifetime_status' => $lifetime_status,
            'repeat_time' => $repeat_time,
        ]);
        return back()->with('message', 'Create Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $page_title = "Update Plan";
        $time = TimeSetting::all();
        $plan = Plan::whereId($id)->first();
        return view('admin.plan.edit', compact('page_title', 'plan','time'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',
            'times' => 'numeric|min:0',
            'interest' => 'numeric|min:0',
        ]);



        if ($request->amount_type == 'on')
        {
            $fixed_amount = $request->amount;
            $minimum = $request->amount;
            $maximum= $request->amount;
        }else{

            $fixed_amount = 0;
            $minimum = $request->minimum;
            $maximum= $request->maximum;
        }

        if ($request->interest_status == '%')
        {
            $interrest_status = 1;
        }else{
            $interrest_status = 0;
        }

        if ($request->lifetime_status == 'on')
        {
            $lifetime_status = 0;
            $repeat_time = $request->repeat_time;

        }else{
            $lifetime_status = 1;
            $repeat_time = 0;
        }

        if ($request->capital_back_status == 'on')
        {
            if ($lifetime_status == 1)
            {
                $capital_back_status = 0;

            }else{
                $capital_back_status = 1;
            }

        }else{
            $capital_back_status = 0;
        }

        if ($request->status == 'on'){
            $status = 1;
        }else{
            $status = 0;
        }


        if ($minimum < 0 or $maximum < 0 or $fixed_amount < 0){
            return back()->withErrors('Invest Amount cannot lower than 0');
        }

        if ($request->interest < 0)
        {
            return back()->withErrors('Interest cannot lower than 0');
        }

        if ($repeat_time < 0)
        {
            return back()->withErrors('Return Time cannot lower than 0');
        }


        Plan::whereId($id)->update([
            'name' => $request->name,
            'minimum' => $minimum,
            'maximum' => $maximum,
            'fixed_amount' => $fixed_amount,
            'interest' => $request->interest,
            'interest_status' => $interrest_status,
            'times' => $request->times,
            'status' => 1,
            'capital_back_status' => $capital_back_status,
            'lifetime_status' => $lifetime_status,
            'repeat_time' => $repeat_time,
            'status' => $status,
        ]);
        return back()->with('message', 'Update Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
