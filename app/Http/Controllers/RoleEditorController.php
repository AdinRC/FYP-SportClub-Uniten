<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleEditorController extends Controller
{
     // bawah ni lak function editor
    //
    public function index()
    {
        $user = User::all()->where('role','editor');
        return view('AdminManage.editor.index', compact('user'));
        //dd($user);
    }

    public function create()
    {
        return view('AdminManage.editor.create');
    }

    public function store(Request $request)
    {
        
        User::create($request->except(['_token','submit']));
        return redirect('/AdminManage/editor');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('AdminManage.editor.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->except(['_token', 'submit']));
        return redirect('/AdminManage/editor');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/AdminManage/editor');
    }
}
