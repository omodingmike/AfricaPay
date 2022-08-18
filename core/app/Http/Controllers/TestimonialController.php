<?php

    namespace App\Http\Controllers;

    use App\Testimonial;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Input;


    class TestimonialController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $page_title = "Manage Testimonial";
            $team       = Testimonial::all();
            return view('admin.testimonial.index', compact('page_title', 'team'));
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
                'name'    => 'required',
                'company' => 'required',
                'comment' => 'required',
            ]);

            $input = $request->except('_token');
            Testimonial::create($input);
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
         * @param \App\Testimonial $testimonial
         *
         * @return \Illuminate\Http\Response
         */
        public function show(Testimonial $testimonial)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Testimonial $testimonial
         *
         * @return \Illuminate\Http\Response
         */
        public function edit(Testimonial $testimonial)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\Testimonial $testimonial
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Testimonial $testimonial)
        {
            $this->validate($request, [
                'name'    => 'required',
                'company' => 'required',
                'comment' => 'required',
            ]);

            $input = $request->except('_token', '_method');
            Testimonial::whereId($testimonial->id)->update($input);
            return back()->with('message', 'Update Successfully');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Testimonial $testimonial
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy(Testimonial $testimonial)
        {
            $testimonial->delete();
            return back()->with('message', 'Delete Successfully');
        }
    }
