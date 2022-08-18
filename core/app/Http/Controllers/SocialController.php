<?php

    namespace App\Http\Controllers;

    use App\Social;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Input;

    class SocialController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $page_title = "Manage Social";
            $team       = Social::all();
            return view('admin.social.index', compact('page_title', 'team'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         *
         * @return \Illuminate\Http\Response
         */
        public function store(Request $request)
        {
            $this->validate($request, [
                'icon' => 'required',
                'link' => 'required',
            ]);

            $input = $request->except('_token');
            Social::create($input);
            return back()->with('message', 'Create Successfully');
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
         * Display the specified resource.
         *
         * @param \App\Social $social
         *
         * @return \Illuminate\Http\Response
         */
        public function show(Social $social)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Social $social
         *
         * @return \Illuminate\Http\Response
         */
        public function edit(Social $social)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\Social $social
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Social $social)
        {
            $this->validate($request, [
                'icon' => 'required',
                'link' => 'required',
            ]);
            $input = $request->except('_token', '_method');
            Social::whereId($social->id)->update($input);
            return back()->with('message', 'Update Successfully');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Social $social
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy(Social $social)
        {
            $social->delete();
            return back()->with('message', 'Delete Successfully');
        }
    }
