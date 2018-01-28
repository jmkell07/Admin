<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\User;
use App\Role;
use App\Photo;

class AdminUsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.create', compact('roles'));
    }
    public function store(UserRequest $req)
    {
        $input = $req->all();
        if($file = $req->file('profile_pic')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }
        $input['password'] = bcrypt($req->password);
        User::create($input);
        return redirect('/admin/users');
    }
    public function show($id)
    {
        return view('admin.users.show');
    }
    public function edit($id)
    {
        //
    }
    public function update(Request $request, $id)
    {
        return view('admin.users.edit');
    }
    public function destroy($id)
    {
        //
    }
}
