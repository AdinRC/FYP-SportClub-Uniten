<?php

namespace App\Http\Controllers;

use App\Models\event;
use App\Models\club;
use App\Models\Joinevent;
use App\Models\Membership;
use App\Models\User;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    //
    public function index()
    {
        // Bawah ni cara untuk view editor punya club sahaja 
        // Kiranya user selain Editor xakan dapat view 
        // So user ajim hanya dpt view club ajim sahaja
        // Cara nk connect dia ada kat model User yg function club tu
        $event = event::all();
        $club = auth()->user()->club;
        return view('editorManage.event.index', compact('club'));
    }

    public function index_Event($id)
    {
        //$event = event::find($id);
        $event = event::all()->where('club_id',$id);
        //$club = club::all();
        //$user = User::all();
        //$event = event::all();
        return view('editorManage.event.index_Event',compact('event'));
    }

    public function create(club $club, event $event)
    {
        //$user = User::find(auth()->user()->id);
        $club = club::all()->where('user_id',auth()->user()->id);
        $event = event::all();
        return view('editorManage.event.create',compact('club','event'));
        
        
        
        
        //compact ni ambik dari $var_name atas so nanti kat view punya 
        //kita boleh guna $var_name  spt di atas
        //compact('club','event','user')

    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|image'
        ]);
    
        $file = $request->file('file');
        //$path = $file->store('public/images'); // store the file and get the file's path
        $path = $file->store('public/images', 'public');

    
        event::create([
            'title' => $request->title,
            'description' => $request->description,
            'file_path' => $path,
            'club_id' => $request->club_id
        ]);
    
        return redirect('/EditorManage/event');

        //$event = event::all();

        // $request->validate([
        //     'file' => 'required|image'
        // ]);

        // $file = $request->file('file');

        // event::create($request->except(['_token','submit']));
        // return redirect('/EditorManage/event');
        //return redirect('/EditorManage/event/index_Event',[$event]);
        //return redirect('/EditorManage/event/index_Event',['id' => $event->id]);
        //return redirect()->back();

    }

    public function edit($id)
    {
        $event = event::find($id);
        return view('editorManage.event.edit', compact('event'));
    }

    public function update($id, Request $request)
    {
        $event = event::find($id);
        $event->update($request->except(['_token', 'submit']));
        return redirect('/EditorManage/event');
    }

    public function destroy($id)
    {
        $event = event::find($id);
        $event->delete();
        return redirect('/EditorManage/event');
    }


    // Ni untuk view all event kat admin dan delete event jika melanggar peraturan

    public function indexAdminEvent()
    {
        $event = event::all();
        return view('adminManage.event.index', compact('event'));
    }

    public function destroyadmin($id)
    {
        $event = event::find($id);
        $event->delete();
        return redirect('/AdminManage/event');
    }

    // Ni untuk view all event kat admin dan delete event jika melanggar peraturan

    public function indexEditorEvent()
    {
        $event = event::all();
        return view('editorManage.event2.index', compact('event'));
    }

    // Ni untuk view all event kat student

    public function indexStudentEvent()
    {
        //$user = User::all()->where('role','user');
        //$club = club::all();
        $membership = Membership::where('user_id', auth()->id())->get();
        $joinevent = Joinevent::where('user_id', auth()->id())->get();
        $event = event::all();
        return view('studentManage.event.index', compact('event', 'membership','joinevent'));
    }

    public function indexStudentEventStore(Request $request)
    {
        $joinevent = Joinevent::create($request->except(['_token','submit']));
        return redirect('/StudentManage/event');
    }





    /// Bahagian untuk Editor check attendance student

    public function indexEditorJoinEvent( )
    {
        $user = User::all();
        $joinevent = Joinevent::all();
        $event = event::all();
        return view('editorManage.attendance.index', compact('joinevent'));
    }


    public function accept($id)
    {
        $joinevent = joinevent::findOrFail($id);
        $joinevent->update(['status' => 1]);
        return redirect('/EditorManage/attendance');
    }

    public function reject($id)
    {
        // tak guna bawah ni sebab dia akan looping request
        $joinevent = joinevent::findOrFail($id);
        $joinevent->update(['status' => 2]);
        return redirect('/EditorManage/attendance');

        // $joinevent = joinevent::findOrFail($id);
        // $joinevent->delete();
        // return redirect('/EditorManage/attendance');
    }
}
