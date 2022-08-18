<?php

    namespace App\Http\Controllers;

    use App\Team;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Input;
    use Intervention\Image\Facades\Image;

    class TeamController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $page_title = "Manage Team";
            $team       = Team::all();
            return view('admin.team.index', compact('page_title', 'team'));
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
                'name'        => 'required',
                'designation' => 'required',
                'fb_link'     => 'required',
                'ln_link'     => 'required',
                'tw_link'     => 'required',
                'image'       => 'required|image|mimes:png,jpg,jpeg,svg',
            ]);

            $input = $request->except('_token');


            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $filename = time() . '.jpg';
                $location = 'assets/images/team/' . $filename;
                Image::make($image)->save($location);
                $input['image'] = $filename;
            }

            Team::create($input);
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
         * @param \App\Team $team
         *
         * @return \Illuminate\Http\Response
         */
        public function show(Team $team)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Team $team
         *
         * @return \Illuminate\Http\Response
         */
        public function edit(Team $team)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\Team $team
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Team $team)
        {
            $this->validate($request, [
                'name'        => 'required',
                'designation' => 'required',
                'fb_link'     => 'required',
                'ln_link'     => 'required',
                'tw_link'     => 'required',
                'image'       => 'image|mimes:png,jpg,jpeg,svg',
            ]);

            $input = $request->except('_token', '_method');


            if ($request->hasFile('image')) {
                @unlink('assets/images/team/' . $team->image);
                $image    = $request->file('image');
                $filename = time() . '.jpg';
                $location = 'assets/images/team/' . $filename;
                Image::make($image)->save($location);
                $input['image'] = $filename;
            }

            Team::whereId($team->id)->update($input);
            return back()->with('message', 'Update Successfully');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Team $team
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy(Team $team)
        {
            @unlink('assets/images/team/' . $team->image);
            $team->delete();
            return back()->with('message', 'Delete Successfully');
        }
    }
