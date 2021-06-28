<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required|max:255|unique:users,name,' . $user->id,
            'email' => 'required|max:255|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $data['name'],
            'email' => $data['email'],
        ]);

        return back()->with('success', 'data saved successfully');
    }
}
