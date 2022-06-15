<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class UserController extends Controller
{
    public function index()
    {
        return view('user.index', [
            'roles' => Role::all(),
            'user' => User::all(),
        ]);
    }

    public function show(User $user)
    {
        return view('show', ['comments' => $user->comments, 'user' => $user]);
    }

    public function destroy(User $user)
    {
        if (Gate::allows('admin')) {
            $user->delete();

            return redirect()->route('users.index')
                ->with('success', "Пользователь успешно удален...");
        }
        return view('user.index');
    }

    public function userFilter(Role $role)
    {
        return view('user.index', [
            'users' => $role->users,
            'roles' => Role::all(),
        ]);
    }

    public function usersAll()
    {
        if (Gate::allows('admin')) {

            return UserResource::collection(User::all());

        }
        return abort(403, 'Только для администраторов');
    }

    public function usersFilter(Role $role)
    {
        $users = UserResource::collection($role->users);
        return compact('users');
    }

    public function edit(User $user)
    {

        return view('user.edit', [
            'user' => $user,
            'roles' => Role::all(),
            'comments' => $user->comments,
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->role_id = $request->data;
        $user->save();
        return new UserResource($user);
    }

}
