<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use Spatie\Permission\Models\Role;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(User::class, 'user');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::paginate();

        return view('app.users.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();

        return view('app.users.create', [
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $params = $request->safe()->collect()->filter()->except('role_ids')->all();

        $user = User::create($params);

        $user->roles()->sync($request->validated('role_ids'));

        return to_route('app.users.index')->with('success', 'User was sucessfully created');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('app.users.show', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $roles = Role::all();

        return view('app.users.edit', [
            'user' => $user,
            'roles' => $roles,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->safe()->collect()->filter()->except('role_ids')->all());

        $user->roles()->sync($request->validated('role_ids'));

        return to_route('app.users.index')->with('success', 'User was sucessfully updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return to_route('app.users.index')->with('success', 'User was sucessfully removed');
    }
}
