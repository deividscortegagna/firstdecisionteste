<?php

namespace App\Http\Controllers;

use App\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:50',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|max:20|confirmed',
        ]);

        $user = $this->userService->createUser($request->all());
        return response()->json(['message' => 'User created successfully!', 'user' => $user], 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|min:3|max:50',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|max:20|confirmed',
        ]);

        $user = $this->userService->updateUser($id, $request->all());
        return response()->json(['message' => 'User updated successfully!', 'user' => $user]);
    }
}