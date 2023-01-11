<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RoleStudentController extends Controller
{
    // bawah ni lak function student
    //
    public function index()
    {
        $user = User::all()->where('role','user');
        return view('AdminManage.student.index', compact('user'));
    }

    public function create()
    {
        return view('AdminManage.student.create');
    }

    public function store(Request $request)
    {
        User::create($request->except(['_token','submit']));
        return redirect('/AdminManage/student');
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('AdminManage.student.edit', compact('user'));
    }

    public function update($id, Request $request)
    {
        $user = User::find($id);
        $user->update($request->except(['_token', 'submit']));
        return redirect('/AdminManage/student');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/AdminManage/student');
    }
}
