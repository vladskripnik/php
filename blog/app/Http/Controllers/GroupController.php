<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\User;
use App\Models\Group;
class GroupController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $users = User::all();
       // $root = Root::all();
        return view('group.show',['users' => $users]);
        //$users = DB::table('')->paginate(15);
        //return view('group',['users' => $users]);
    }

    public function create(Request $request)
    {
        $request->validate([
        'group' => 'required'
         ]);
        Group::create([
                    'group' => $request->get('group'),
                ]);
        return redirect('home');
    }
}
