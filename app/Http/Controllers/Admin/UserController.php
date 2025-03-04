<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       //
    }

    public function new()
    {
        return view('admin.users.store');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $userData = $request->all();

        $request->validated();
        $userData['password'] = bcrypt($userData['password']);
        $user = new User();
        $user->create($userData);

        return redirect()->route('user.index')->with('success', 'Usuário criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, User $user)
    {
        $userData = $request->all();
        if ($userData['password']) {
            $userData['password'] = bcrypt($request->password);
        }
        $user->update($userData);

        return redirect()->route('user.index')->with('success', 'Usuário Editado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('user.index')->with('success', 'Usuário deletado com sucesso!');
    }

}
