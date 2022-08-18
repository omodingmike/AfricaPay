<?php

    namespace App\Http\Controllers;

    use App\Blog;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Input;
    use Intervention\Image\Facades\Image;

    class BlogController extends Controller
    {
        /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $page_title = "Manage Knowledge-Base";
            $blog       = Blog::latest()->paginate(12);
            return view('admin.blog.index', compact('page_title', 'blog'));
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
                'title' => 'required|max:191',
                'text'  => 'required',
                'image' => 'required|image|mimes:png,jpg,jpeg,svg',
            ]);

            $input = $request->except('_token');


            if ($request->hasFile('image')) {
                $image    = $request->file('image');
                $filename = time() . '.jpg';
                $location = 'assets/images/blog/' . $filename;
                Image::make($image)->save($location);
                $input['image'] = $filename;
            }

            Blog::create($input);
            return back()->with('message', 'Create Successfully');
        }

        /**
         * Show the form for creating a new resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
            $page_title = "Create Knowledge-Base";
            return view('admin.blog.add', compact('page_title'));
        }

        /**
         * Display the specified resource.
         *
         * @param \App\Blog $blog
         *
         * @return \Illuminate\Http\Response
         */
        public function show(Blog $blog)
        {
            //
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param \App\Blog $blog
         *
         * @return \Illuminate\Http\Response
         */
        public function edit(Blog $blog, $id)
        {
            $page_title = "Edit/View Know Knowledge-Base";
            $know       = Blog::findOrFail($id);
            return view('admin.blog.edit', compact('page_title', 'know'));
        }

        /**
         * Update the specified resource in storage.
         *
         * @param \Illuminate\Http\Request $request
         * @param \App\Blog $blog
         *
         * @return \Illuminate\Http\Response
         */
        public function update(Request $request, Blog $blog, $id)
        {
            $this->validate($request, [
                'title' => 'required|max:191',
                'text'  => 'required',
                'image' => 'image|mimes:png,jpg,jpeg,svg',
            ]);

            $input = $request->except('_token', '_method');

            $bl = Blog::findOrFail($id);

            if ($request->hasFile('image')) {
                @unlink('assets/images/blog/' . $bl->image);
                $image    = $request->file('image');
                $filename = time() . '.jpg';
                $location = 'assets/images/blog/' . $filename;
                Image::make($image)->save($location);
                $input['image'] = $filename;
            }

            Blog::whereId($id)->update($input);
            return back()->with('message', 'Update Successfully');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param \App\Blog $blog
         *
         * @return \Illuminate\Http\Response
         */
        public function destroy(Blog $blog, $id)
        {
            $blogpp = Blog::find($id);
            @unlink('assets/images/blog/' . $blogpp->image);
            $blogpp->delete();
            return back()->with('message', 'Delete Successfully');
        }
    }
