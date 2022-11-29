<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{ 
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . auth()->id(),
                'birth_date' => 'required|date',
                'gender' => 'required|string|in:L,P',
            ]);

            if ($validator->fails()) {
                // dd($validator->errors()->messages());
                return redirect()->back()->withErrors(['error' => $validator->errors()->first()]);
            }

            $user = auth()->user();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->birth_date = $request->birth_date;
            $user->gender = $request->gender;
            $user->save();
            return redirect()->back()->with('success', 'Profile updated successfully');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    public function updatePassword(Request $request) {
        try {
            $validator = Validator::make($request->all(), [
                'current_password' => 'required|string',
                'password' => 'required|string|min:8|confirmed',
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors(['error' => $validator->errors()->first()]);
            }

            $user = auth()->user();
            if (!\Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['error' => 'Current password is incorrect']);
            }

            $user->password = \Hash::make($request->password);
            $user->save();
            return redirect()->back()->with('success', 'Password updated successfully');
        } catch(\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
