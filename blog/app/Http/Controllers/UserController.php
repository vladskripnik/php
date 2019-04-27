<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Auth;
use Mail;
use Image;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   //$user_id = Auth::id();
        //$users = User::getUsers(['excertp' =>auth()->id()]);
        $users = User::where('id', '!=', auth()->id())->get();
        return view('user.home',['users' => $users]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }
    public function showProfile()
    {
        return view('user.profile', ['user' => Auth::user()] );
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showUsers(Request $request, $userId)
    {
        $users = User::find($userId);
        return view('user.update', ['users' => $users] );
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateUsers(Request $request, $userId)
    {
         // Logic for user update data
        $request->validate([
        'name'=>'required',
        'email'=> 'required',
        'group' => 'required'
      ]);
            $user = User::find($userId);
            
            $user->name = $request->get('name');
            $user->email = $request->get('email');
            $user->group_id = $request->get('group');
            $user->save();
        return redirect('home');
    }
    public function updateProfile(Request $request){
        // Logic for user upload of avatar
        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(300, 300)->save( public_path('/uploads/avatars/' . $filename ) );
            $user = Auth::user();
            $user->avatar = $filename;
            $user->save();
        }
        return view('user.profile', ['user' => Auth::user()] );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $userId)
    {
        $user = User::find($userId);
        unlink(public_path('/uploads/avatars/'. $user->avatar));
        $user->delete();
        return redirect('home');
    }
    public function send()
    {
        Mail::send(['text'=>'mail'],
            ['name','Web assistance'],
            function($message){
                $message->to('web.send.test.mail@gmail.com','To Web assistance')->subject('Email FeedBack');
                $message->from('web.send.test.mail@gmail.com','Web assistance');


            });
    }
}
