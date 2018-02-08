<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;
use Session;

class AdminMediaController extends Controller
{
    public function index(){
        $photos = Photo::all();
        return view('admin.media.index', compact('photos'));
    }
    public function create(){
        $photos = Photo::all();
        return view('admin.media.create', compact('photos'));
    }
    public function store(Request $request){
        $file = $request->file('file');
        $name = time() . $file->getClientOriginalName();
        $file->move('images', $name);
        Photo::create(['path'=>$name]);
    }
    public function destroy($id){
        $photo = Photo::findOrFail($id);
        $name = $photo->path;
        unlink(public_path() . $photo->path); 
        $photo->delete();
        Session::flash('alert-success', 'Image "' . $name . '" has been deleted.');
        return redirect('/admin/media');
    }
}
