<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(\Auth::id() == $id) {
            $user = User::findOrfail($id);
            return view('auth.edit', compact('user'));
        }else{
            return view('home')->with('error', 'You are not allowed!');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if(\Auth::id() == $id){
            $user= User::findOrfail($id);
            $input = Request::all();
            $user->update($input);
            \Session::flash('flash_message', 'Your profile has been updated !');
            return redirect('home');
        }else{

            return redirect('home');
        }
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrfail($id);
        if(\Auth::id() !== $user->id) {
            abort(403);
        } else {
            $user->delete();
            \Session:: flash('flash_message', 'Your account has been deleted !');
            return redirect('home');
        }
    }
}
