<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogFullController extends Controller
{
    public function index(Request $request)
    {
        $blogs = Blog::all();

        if ($request -> expectsJson()) {
            return $blogs;
        }

        return view ('blogs', ['blogs' => $blogs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blogs-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =$request -> validate([
          'title' => ['required' , 'max:255'],
           'content' => ['required', 'min:10']
        ]);

        $blog = Blog::create($validated);

        if ($request -> expectsJson()) {
            return $blog;
        }

        return redirect(route('blogs.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
