<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class UserAvatarController extends Controller
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
        //
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
        //
    }
        public function __construct() {
        $this->middleware('auth')->only('profile', 'update_profile');
      }
     
      public function profile() {
        $user = Auth::user();
        return view('profile', ['user' => $user]);
      }
     
      public function update_profile(Request $request) {
        $this->validate($request, [
          'avatar' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
     
        $filename = Auth::id().'_'.time().'.'.$request->avatar->getClientOriginalExtension();
        $request->avatar->move(public_path('uploads/avatars'), $filename);
     
        $user = Auth::user();
        $user->avatar = $filename;
        $user->save();
     
        return redirect()->route('user.profile');
      }
}
