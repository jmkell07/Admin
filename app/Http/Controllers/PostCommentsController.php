<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Comment;
use App\Post;
use Auth;
use Session;

class PostCommentsController extends Controller
{
    public function index()
    {
        $comments = Comment::all();
        return view('admin.comments.index', compact('comments'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $user = Auth::user();
        $data = [
            'post_id'   => $request->post_id,
            'author'    => $user->name,
            'email'     => $user->email,
            'photo'     => $user->photo->path,
            'body'      => $request->body
        ];
        Comment::create($data);
        Session::flash('alert-success', 'Comment added');
        return redirect()->back();
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        $comments = $post->comments;
        return view('admin.comments.show', compact('comments'));
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        Comment::findOrFail($id)->update($request->all());
        Session::flash('alert-success', 'Comment status updated');
        return redirect()->back();
    }

    public function destroy($id)
    {
        Comment::findOrFail($id)->delete();
        Session::flash('alert-success', 'Comment deleted');
        return redirect()->back();
    }
}
