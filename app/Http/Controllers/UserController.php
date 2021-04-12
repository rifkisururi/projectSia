<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

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
        $user = \App\User::All();
        return view('admin.user', ['user' => $user]);
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
        $save_user = new \App\User;
        $save_user->name = $request->get('username');
        $save_user->email = $request->get('email');
        $save_user->password = $request->get('password');
        if ($request->get('roles') == 'ADMIN') {
            $save_user->assignRole('admin');
        } else {
            $save_user->assignRole('user');
        }
        $save_user->save();
        Alert::success('Tersimpan', 'Data berhasil masuk');

        $user = \App\User::All();
        return view('admin.user', ['user' => $user]);
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
        $hapus = \App\User::findOrFail($id);
        $hapus->delete();
        $hapus->removeRole('admin', 'user');
        Alert::success('Tersimpan', 'Data berhasil masuk');
        return redirect()->route('user.index');
    }
}
