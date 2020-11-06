<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class PostsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $allPosts = Post::paginate(4);
        $data = array('title' => "Our Blog", "subTitle" => "All Published Posts: ", 'posts' => $allPosts);

        return View('posts.index')->with(($data));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return View('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, ['title' => 'required', 'body' => 'required', 'cover_image' => 'image|nullable|max:1999']);


        //checking for file upload
        if ($request->hasFile('cover_image')) {

            //get filename with extension
            $fileNameWithExtension = $request->file('cover_image')->getClientOriginalName();

            //get just the filename
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

            //get the extension

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //path to store the image

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //upload iamge

            $path = $request->file('cover_image')->storeAs('public/images/', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpeg';
        }


        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->cover_image = $fileNameToStore;

        $post->save();
        return redirect('/posts')->with('success', 'Post added successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        //getting the name of the post writer
        $post = Post::find($id);
        $name = $post->user->name;

        // getting the post data
        $post = Post::find($id);

        //grouping data into an object

        $data = array('name' => $name, 'post' => $post);
        return View('posts.show')->with($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        //
        //
        $post = Post::find($id);
        if ($post->user_id != auth()->user()->id) {
            return redirect('/posts')->with('error', 'Unauthorized Access!');
        }

        return View('posts.edit')->with('post', $post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);

        if ($post->user_id != auth()->user()->id) {
            return redirect('/posts')->with('error', 'Unauthorized Access!');
        }


        //
        $this->validate($request, ['title' => 'required', 'body' => 'required', 'cover_image' => 'image|nullable|max:1999']);


        //checking for file upload
        if ($request->hasFile('cover_image')) {

            //get filename with extension
            $fileNameWithExtension = $request->file('cover_image')->getClientOriginalName();

            //get just the filename
            $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);

            //get the extension

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            //path to store the image

            $fileNameToStore = $fileName . '_' . time() . '.' . $extension;

            //upload iamge

            $path = $request->file('cover_image')->storeAs('public/images/', $fileNameToStore);
        }


        $post->title = $request->input('title');
        $post->body = $request->input('body');

        if ($request->hasFile('cover_image')) {

            $post->cover_image = $fileNameToStore;
        }

        $post->save();
        return redirect("/posts/$id")->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $post = Post::find($id);

        if ($post->user_id != auth()->user()->id) {
            return redirect('/posts')->with('error', 'Unauthorized Access!');
        }

        if ($post->cover_image != 'noimage.jpg') {

            Storage::delete('/public/images/' . $post->cover_image);
        }
        $post->delete();
        return redirect('/posts')->with('success', 'Post deleted successfully!');
    }
}
