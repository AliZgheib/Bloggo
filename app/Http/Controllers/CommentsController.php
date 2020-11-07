<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentsController extends Controller
{
    public function getComments($postId)
    {

        //getting the  the list of comments for this specific post 
        $comments = Comment::all()->where('post_id', $postId);

        // pushing data to an array;

        $results = array();

        foreach ($comments as $comment) {

            $newComment = array(
                'name' => $comment->user->name,
                'comment' => $comment->comment_data,
                'date' => $comment->created_at,
            );
            array_push($results, $newComment);
        }
        return response()->json([
            'data' => $results,
        ]);
    }

    public function postComment(Request $request, $postId)
    {
        $this->validate($request, ['comment_data' => 'required']);

        $comment = new Comment();
        $comment->post_id = $postId;
        $comment->user_id = Auth::user()->id;
        $comment->comment_data = $request->input('comment_data');

        $comment->save();

        return response()->json([
            'data' => $comment,
        ]);
    }
}
