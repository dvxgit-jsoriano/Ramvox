<?php

namespace App\Http\Controllers;

use App\Models\Download;
use App\Models\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('UserManagement', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('UserManagementCreate');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate requests
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:25',
            'email' => 'email',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();

            $request->session()->flash('status', $error);
            return back();
        }

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('status', 'User was created successfully!');

        return redirect()->route('user-management');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);

        return view('', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);

        return view('UserManagementEdit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        // Validate requests
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:50',
            'username' => 'required|min:3|max:25',
            'email' => 'email',
        ]);

        if ($validator->fails()) {
            $error = $validator->errors()->first();

            $request->session()->flash('status', $error);
            return back();
        }

        $user = User::find($id);

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $request->session()->flash('status', 'User was updated successfully!');

        return redirect()->route('user-management');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return redirect('usermanagement')->with('status', 'User was deleted successfully!');
    }

    public function download($id)
    {
        $download = Download::find($id);

        return Storage::download($download->link);
    }
}
