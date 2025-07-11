<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request): Response
    {
        $search = $request->search;
        $perPage = isset($request->perPage) ? $request->perPage : 10;
        $sort = isset($request->sort) ? $request->sort : 'id';
        $roles = Role::orderBy('name')->get();
        $users = User::with('roles')->where(function ($query) use ($search) {
            return $query->where('name', 'like', '%' . $search . '%')
                ->orWhere('email', 'like', '%' . $search . '%');
        })->orderBy($sort)->paginate($perPage);

        return Inertia::render('user/user', [
            'users' => $users,
            'roles' => $roles,
            'search' => $search,
            'perPage' => $perPage,
            'sort' => $sort,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'same:repassword'],
        ]);
        DB::beginTransaction();
        try {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'active' => 1
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'errors' => $e->getMessage(),
            ], 500);
        }
        DB::commit();
        return response()->json([
            'message' => 'User created successfully',
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:' . User::class,
            'password' => ['required', 'same:repassword'],
        ]);
        $user = User::find($request->id);
        $user->name = $request->name;
        $user->email = $request->email;
        if ($user->active != $request->active) {
            $user->active = $request->status;
        }
        $user->save();
        return response()->json([
            'message' => 'User updated successfully',
            'user' => $user
        ]);
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'password' => ['required', 'same:repassword']
        ]);
        $user = User::find($request->id);
        $user->password = Hash::make($request->password);
        $user->save();
        return response()->json([
            'message' => 'Password changed successfully',
            'user' => $user
        ]);
    }
}
