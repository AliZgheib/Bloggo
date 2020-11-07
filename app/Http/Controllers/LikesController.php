<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Like;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikesController extends Controller
{

    public function checkStatus($postId)
    {

        //getting the  like row
        $like = Like::where('user_id', Auth::user()->id)->where('post_id', $postId)->first();

        return $like;
        return response()->json([
            'data' => $like,
        ]);
    }


    public function switchStatus($postId)
    {
        //getting the like row of this authenticated user on this specific post

        $like = Like::where('user_id', Auth::user()->id)->where('post_id', $postId)->first();

        if (isset($like->id)) {

            //post is liked
            $like->delete();

            return response()->json([
                'is_liked' => false,
            ]);
        } else {

            //post is not liked
            $newLike =  new Like();

            $newLike->post_id = $postId;
            $newLike->user_id = Auth::user()->id;

            //saving the data to the db
            return $newLike->save();

            return response()->json([
                'is_liked' => true,
            ]);
        }
    }

    public function getAllLikes($postId)
    {

        //getting the  the list of likes for this specific post 
        $likes = Like::all()->where('post_id', $postId);

        // pushing data to an array;

        $results = array();

        foreach ($likes as $like) {

            array_push($results, $like->user->name);
        }

        return response()->json([
            'data' => $results,
        ]);
    }
}
