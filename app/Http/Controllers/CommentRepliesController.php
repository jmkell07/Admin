<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\CommentReply;
use Auth;
use Session;

class CommentRepliesController extends Controller
{

    public function index()
    {

    }

    public function create()
    {
        //
    }

    public function createReply(Request $request)
    {
        $user = Auth::user();
        $data = [
            'comment_id'   => $request->comment_id,
            'author'    => $user->name,
            'email'     => $user->email,
            'photo'     => $user->photo->path,
            'body'      => $request->body
        ];
        CommentReply::create($data);
        Session::flash('alert-success', 'Reply added');
        return redirect()->back();
    }

    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {
        $comment  = Comment::findOrFail($id);
        $replies = $comment->replies;
        return view('admin.comments.replies.show', compact('replies'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        CommentReply::findOrFail($id)->update($request->all());
        Session::flash('alert-success', 'Status Updated');
        return redirect()->back();
    }

    public function destroy($id)
    {
        CommentReply::findOrFail($id)->delete();
        Session::flash('alert-success', 'Reply Deleted');
        return redirect()->back();
    }
}
