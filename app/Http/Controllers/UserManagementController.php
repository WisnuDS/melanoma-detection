<?php

namespace App\Http\Controllers;

use App\Mail\Subscribe;
use App\Models\User as User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class UserManagementController extends Controller
{
    public function index()
    {
        return view('users');
    }

    public function create()
    {
        return view('add_user');
    }

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users',
                'birth_date' => 'required|date',
                'gender' => 'required|string|in:L,P',
                'role' => 'required|string|in:admin,doctor'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors()->first());
            }

            $password = str()->random(8);
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($password);
            $user->birth_date = $request->birth_date;
            $user->gender = $request->gender;
            $user->save();
            $user->assign($request->role);

            Mail::to($user->email)->send(new Subscribe($user, $password));

            return redirect(route('admin.users.view'))->with('success', 'User berhasil ditambahkan');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function edit($id)
    {
        return view('show_user', ['user' => User::findOrFail($id)]);
    }

    public function update(Request $request, $id)
    {
        try {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string|max:255',
                'email' => 'required|string|email|max:255|unique:users,email,' . $id,
                'birth_date' => 'required|date',
                'gender' => 'required|string|in:L,P',
            ]);
        

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors()->first());
            }

            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->birth_date = $request->birth_date;
            $user->gender = $request->gender;
            $user->save();
            return redirect()->back()->with('success', 'Profile User Berhasi Diperbarui');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
    }

    public function updatePassword(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('admin.users.index')->with('success', 'Password updated successfully');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['success' => 'User deleted successfully.']);
    }

    public function table()
    {
        $user = User::query();
        return DataTables::of($user)
            ->addColumn('role', function ($user) {
                return $user->roles[0];
            })
            ->addColumn('action', function ($user) {
                return [
                    'edit' => route('admin.users.edit', ["id" => $user->id]),
                    'delete' => route('admin.users.delete', ["id" => $user->id]),
                ];
            })
            ->make(true);
    }
}
