<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usergroup;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //
    //constructor to make sure only logged in users can access this controller
    public function __construct()
    {
        $this->middleware('auth');
        //if user is not admin, redirect to home page
    }
    public function index()
    {
        //return all users
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        //check if user is admin
        if ($this->isAdmin()) {
            return view('admin.users.create');
        }
        return redirect('/home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($this->isAdmin()) {
            //
            $this->validate($request, [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'password' => 'required|string|min:6',

                'sex' => 'required|in:m,f',

            ]);
            $user = new User();
            $user->name = $request->name;
            $user->m_name = $request->m_name;
            $user->last_name = $request->last_name;
            $user->phone = $request->phone;
            $user->address = $request->address;

            $user->email = $request->email;

            $user->password = bcrypt($request->password);
            $user->group = 2;
            $user->save();
            return redirect('/users');
        }
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usergroup  $usergroup
     * @return \Illuminate\Http\Response
     */
    public function show(Usergroup $usergroup, $id)
    {
        //int 
        //check if user is admin
        return 'ss';
        if ($this->isAdmin()) {
            $user = User::find($id);
            //if !user, redirect to home page
            if (!$user) {
                return redirect('/home');
            }
            return view('admin.users.show', compact('user'));
        }
        $user = User::where('id', $id)->where('user_id', auth()->user()->id)->first();
        if ($user) {
            return view('admin.users.show', compact('user'));
        }
        return redirect('/home');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usergroup  $usergroup
     * @return \Illuminate\Http\Response
     */
    public function edit(Usergroup $usergroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usergroup  $usergroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usergroup $usergroup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usergroup  $usergroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usergroup $usergroup)
    {
        //
    }

    //check if user is admin
    public function isAdmin()
    {

        $user = auth()->user();
        if ($user && $user->group == 1) {
            return true;
        }
        return false;
    }
}
