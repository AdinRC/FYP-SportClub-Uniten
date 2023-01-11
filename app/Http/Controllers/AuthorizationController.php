<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AuthorizationController extends Controller
{

    // bawah ni lak function admin
    //
    public function index()
    {
        $user = User::all()->where('role','admin');
        return view('AdminManage.admin.index', compact('user'));
        //dd($user);
    }

    public function create()
    {
        return view('AdminManage.admin.create');
    }

    public function store(Request $request)
    {
        User::create($request->except(['_token','submit']));
        return redirect('/AdminManage/admin');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('AdminManage.admin.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->except(['_token', 'submit']));
        return redirect('/AdminManage/admin');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/AdminManage/admin');
    }
}
