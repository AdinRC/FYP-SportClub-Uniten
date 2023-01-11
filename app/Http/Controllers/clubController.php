<?php

namespace App\Http\Controllers;

use App\Models\club;
use App\Models\event;
use App\Models\Joinevent;
use App\Models\Membership;
use Illuminate\Http\Request;

class clubController extends Controller
{
    public function index()
    {
        $club = club::all();
        return view('studentManage.club.index', compact('club'));
    }

    public function index_Event($id)
    {
        $membership = Membership::where('user_id', auth()->id())->get();
        $joinevent = Joinevent::where('user_id', auth()->id())->get();
        $event = event::all()->where('club_id',$id);
        return view('studentManage.club.index_Event',compact('event','joinevent','membership'));
    }

}
