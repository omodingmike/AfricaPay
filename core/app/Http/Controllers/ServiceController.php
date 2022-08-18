<?php

    namespace App\Http\Controllers;

    use App\Service;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Input;

    class ServiceController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $page_title = "Manage Service";
            $team       = Service::all();
            return view('admin.service.index', compact('page_title', 'team'));
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
                'icon'   => 'required',
                'title'  => 'required',
                'detail' => 'required',
            ]);

            $input = $request->except('_token');
            Service::create($input);
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
         * @param \App\Service $service
         *
         * @return \Illuminate\Http\Response
         */
        public function show(Service $service)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Service $service
         *
         * @return \Illuminate\Http\Response
         */
        public function edit(Service $service)
        {
            //
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\Service $service
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Service $service)
        {
            $this->validate($request, [
                'icon'   => 'required',
                'title'  => 'required',
                'detail' => 'required',
            ]);

            $input = $request->except('_token', '_method');
            Service::whereId($service->id)->update($input);
            return back()->with('message', 'Update Successfully');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Service $service
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy(Service $service)
        {
            $service->delete();
            return back()->with('message', 'Delete Successfully');
        }
}
