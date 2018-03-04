<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostsCreateRequest;
use App\Http\Requests;
use App\Post;
use App\Photo;
use App\Category;
use Auth;
use Session;
use App\Comment;

class AdminPostsController extends Controller
{
    public function index()
    {
        $posts = Post::paginate(2);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {       
        $categories = Category::lists('name', 'id')->all();
        return view('admin.posts.create', compact('categories') );
    }

    public function store(PostsCreateRequest $request)
    {

        $user = Auth::user();
        $input = $request->all();
        if($file = $request->file('photo_id')){         
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $user->posts()->create($input);
        return redirect('/admin/posts');
    }

    public function show($id)
    {   
        $post = Post::findOrFail($id);        
        $comments = $post->comments()->whereIsActive(1)->get();
        return view('post', compact('post','comments'));
    }

    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::lists('name', 'id')->all();
        return view('admin.posts.edit', compact('post', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        if($file = $request->file('photo_id')){         
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        Auth::user()->posts()->whereId($id)->first()->update($input);
        return redirect('/admin/posts');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id)->delete();
        $name = $post->title;
        unlink(public_path() . $post->photo->path);
        Session::flash('alert-success', 'Post "' . $name . '" has been deleted.');
        return redirect('/admin/posts');
    }
}
