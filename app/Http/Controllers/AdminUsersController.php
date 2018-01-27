<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdminUsersController extends Controller
{
    public function index()
    {
        return view('admin.users.index');
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        //
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
