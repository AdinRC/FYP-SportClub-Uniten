<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\club;
use Illuminate\Http\Request;

class RoleClubController extends Controller
{
    // function club bawah ni
    //
    public function index()
    {
        // ni inner join dimana table user dan club akan ditunjuk kat view
        //$clubs = club::select("*")
        //->with('User')
        // ->take(3)
        //->get();

        // foreach ($clubs as $key => $value) {
        // echo $value->id;
        // echo $value->name;
        // echo $value->description;
        // echo $value->User->name;
        // }
        // dd($clubs);


        $club = club::all();
        $user = User::all();
         return view('AdminManage.club.index',compact('club'));
    }

    public function create()
    {
        $id = User::all()->where('role','editor');
        //user_id yang akan bawa ke create $user_id nanti as c
        return view('AdminManage.club.create')->with('user_id',$id);
    }

    public function store(Request $request)
    {
        //User::create($request->except(['_token','submit']));
        Club::create($request->except(['_token','submit']));
        return redirect('/AdminManage/club');
    }

    public function edit($id)
    {
        $club = Club::find($id);
        $user = user::all()->where('role','editor');
        return view('AdminManage.club.edit', compact('club','user'));
    }

    public function update($id, Request $request)
    {
        $club = Club::find($id);
        $club->update($request->except(['_token', 'submit']));
        return redirect('/AdminManage/club');
    }

    public function destroy($id)
    {
        $club = Club::find($id);
        $club->delete();
        return redirect('/AdminManage/club');
    }
}
