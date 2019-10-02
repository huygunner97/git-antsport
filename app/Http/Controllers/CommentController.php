<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Comment;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // public function addComments(Request $request)
    // {
    // 	$request->validate([
    //         'body'=>'required',
    //     ]);
   
    //     $input = $request->all();
    //     $input['user_id'] = Auth::id();
    
    //     Comment::create($input);
   
    //     return back();
    // }

    // public function editComments(Request $request, $id)
    // {
    //     Comment::where('id', $id)->update([
    //         'body' => $request->body
    //     ]);

    //     return back();
    // }

    // public function deleteComments($id)
    // {
    //     Comment::where('id', $id)->delete();
    //     return back();
    // }

    public function addComments(Request $request)
    {
   
        $input = $request->all();
        $input['user_id'] = Auth::id();
    
        $new_comment = Comment::create($input);

        if ($request->parent_id) {
            $comment = Comment::where('id', $new_comment->id)->with('user.information')->first();
        } else {
            $comment = Comment::where('id', $new_comment->id)->with(['user.information', 'replies'])->first();
        }

        return $comment;
    }

    public function getComments($post_id)
    {
        $comments = Comment::where('post_id', $post_id)->where('parent_id', null)->with(['user.information', 'replies.user.information'])->get();

        return $comments;
    }

    public function editComments(Request $request, $id)
    {
        Comment::where('id', $id)->update([
            'body' => $request->body
        ]);

        return "Updated success";
    }

    public function deleteComments($id)
    {
        Comment::where('id', $id)->orWhere('parent_id', $id)->delete();
        return "Deleted success";
    }
}
