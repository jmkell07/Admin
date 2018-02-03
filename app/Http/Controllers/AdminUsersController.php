<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Requests\UserRequest;
use App\Http\Requests\UserEditRequest;
use App\User;
use App\Role;
use App\Photo;
use Session;

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
        else{
             $input['photo_id'] = 1;
        }
       // $input['password'] = bcrypt($req->password);
        User::create($input);
        return redirect('/admin/users');
    }
    public function show($id)
    {
        return view('admin.users.show');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::lists('name', 'id')->all();
        return view('admin.users.edit', compact('user', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        if( trim($request->password) == ''){
            $input = $request->except('password');
        }
        else{ 
            $input = $request->all();
          //  $input['password'] = bcrypt($request->password); 
        }

        $this->validate($request, [
            'name'=>'required|min:3|',
            'email'=>'required|email|unique:users,email,' . $user->id,
            'role_id'=>'required',
            'is_active'=>'required',
            'password'=>'min:5',
            'profile_pic'=>'mimes:jpeg,jpg,png,JPEG,JPG,PNG,gif,GIF | max:2000'
        ]);

        if($file = $request->file('profile_pic')){
            $name = time() . $file->getClientOriginalName();
            $file->move('images', $name);
            $photo = Photo::create(['path'=>$name]);
            $input['photo_id'] = $photo->id;
        }

        $user->update($input);
        return redirect('admin/users');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $name = $user->name;
        unlink(public_path() . $user->photo->path);
        $user->delete();
        Session::flash('alert-success', $name . ' has been deleted.');
        return redirect('/admin/users');
    }
}
