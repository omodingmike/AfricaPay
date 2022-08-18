<?php

    namespace App\Http\Controllers;

    use App\Menu;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Input;

    class MenuController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $page_title = "Manage Terms";
            $blog       = Menu::latest()->paginate(12);
            return view('admin.menu.index', compact('page_title', 'blog'));
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
                'name'  => 'required|max:191',
                'title' => 'required|max:191',
                'text'  => 'required',
            ]);

            $input = $request->except('_token');

            Menu::create($input);
            return back()->with('message', 'Create Successfully');
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $page_title = "Create Terms";
            return view('admin.menu.add', compact('page_title'));
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Menu $menu
         *
         * @return \Illuminate\Http\Response
         */
        public function show(Menu $menu)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Menu $menu
         *
         * @return \Illuminate\Http\Response
         */
        public function edit(Menu $menu, $id)
        {
            $page_title = "Edit/View Terms";
            $know       = Menu::findOrFail($id);
            return view('admin.menu.edit', compact('page_title', 'know'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\Menu $menu
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Menu $menu, $id)
        {
            $this->validate($request, [
                'name'  => 'required|max:191',
                'title' => 'required|max:191',
                'text'  => 'required',
            ]);

            $input = $request->except('_token', '_method');

            $bl = Menu::findOrFail($id);

            Menu::whereId($id)->update($input);
            return back()->with('message', 'Update Successfully');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Menu $menu
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy(Menu $menu, $id)
        {
            $blogpp = Menu::find($id);
            $blogpp->delete();
            return back()->with('message', 'Delete Successfully');
        }
    }
