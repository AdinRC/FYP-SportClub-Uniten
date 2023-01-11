<?php

namespace App\Http\Controllers;

use App\Models\club;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipController extends Controller
{

    public function index()
    {
        $user = User::all()->where('role','user');
        $club = club::all();
        $membership = Membership::where('user_id', auth()->id())->get();
        return view('StudentManage.joinclub.index', compact('user','club', 'membership'));
    }
    


    public function create()
    {
        $user = User::all()->where('role','user');
        $club = club::all();
        return view('StudentManage.joinclub.create' , compact('user','club'));
    } // function ni dah x pakai sebab kita direct store



    public function store(Request $request)
    {
        $membership = Membership::create($request->except(['_token','submit']));
        return redirect('/StudentManage/joinclub');
        // Send a notification to the club editor
    }

    /// ni kawasan editor

    public function indexEditor( club $club, Membership $pending)
    {
        
        //$club = club::all()->where('user_id',auth()->user()->id);
        //$pending = Membership::all();
        //$user = Auth::id() ;
         
        // guna pluck utk dapat kan club punya editor
        $user = auth()->user();
        $clubIds = $user->club->pluck('id');  
        $pending = Membership::whereIn('club_id', $clubIds)->get();  
        return view('EditorManage.joinclub.index', compact('pending'));
        
    }

    public function accept($id)
    {
        $membership = Membership::findOrFail($id);
        $membership->update(['status' => 1]);
        return redirect('/EditorManage/joinclub');
    }

    public function reject($id)
    {
        // tak guna bawah ni sebab dia akan looping request
        // $membership = Membership::findOrFail($id);
        // $membership->update(['status' => 2]);
        // return redirect('/EditorManage/joinclub');

        $membership = Membership::findOrFail($id);
        $membership->delete();
        return redirect('/EditorManage/joinclub');
    }

    // public function pending($id)
    // {
    //     $membership = Membership::findOrFail($id);
    //     $membership->update(['status' => 3]);
    //     return redirect('/StudentManage/joinclub');
    // }
}
