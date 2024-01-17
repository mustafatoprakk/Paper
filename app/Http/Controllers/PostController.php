<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::orderBy("id", "DESC")->get();
        return Inertia::render("Admin/Posts/Index", compact("posts"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if ($request->hasFile("image")) {
            $manager = new ImageManager(new Driver());

            $imageName = date('YmdHis') . "." . $request->file("image")->getClientOriginalExtension();
            $image = $manager->read($request->file("image"));
            $image->cover(828, 640);
            $image->save(base_path('public/images/posts/' . $imageName));

            Post::create([
                "image" => $imageName,
            ]);
        }

        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        File::delete(public_path("images/posts/" . $post["image"]));

        $post->delete();

        return redirect()->route("post.index");
    }
}
