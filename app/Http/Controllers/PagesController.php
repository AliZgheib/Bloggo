<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'about', 'contact']]);
    }




    public function index()
    {
        $data = array(
            'title' => 'Welcome to Bloggo!',
            'subTitle' => 'A place to share your ideas with the world',
        );


        return view('pages.index')->with($data);
    }


    public function home()
    {
        $user_id = auth()->user()->id;
        $posts = Post::where('user_id', $user_id)->paginate(3);

        return view('pages.home')->with('posts', $posts);
    }

    public function about()
    {

        $title = 'About Bloggo';


        return view('pages.about')->with('title', $title);
    }




    public function contact()
    {
        $title = 'Contact Bloggo';

        return view('pages.contact')->with('title', $title);
    }
}
