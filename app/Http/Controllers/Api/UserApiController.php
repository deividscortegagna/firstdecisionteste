<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\UserService;
use Illuminate\Http\Request;

class UserApiController extends Controller
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

    public function show($id)
    {
        $user = $this->userService->findUserById($id);

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json(['user' => $user]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'sometimes|min:3|max:50',
            'email' => 'sometimes|email|unique:users,email,' . $id,
            'password' => 'nullable|min:6|max:20|confirmed',
        ]);

        $user = $this->userService->updateUser($id, $request->all());

        if (!$user) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json(['message' => 'User updated successfully!', 'user' => $user]);
    }

    public function destroy($id)
    {
        $deleted = $this->userService->deleteUser($id);

        if (!$deleted) {
            return response()->json(['error' => 'User not found'], 404);
        }

        return response()->json(['message' => 'User deleted successfully!']);
    }
}
