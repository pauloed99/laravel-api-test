<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->middleware('jwt.verify', ['except' => ['store']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json($this->userRepository->getAllUsers());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $userDetails = $request->all();

        $userDetails['password'] = Hash::make($request->password);

        return response()->json($this->userRepository->createUser($userDetails), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $email)
    {
        $user = $this->userRepository->getUserByEmail($email);

        if ($user) {
            return response()->json($user);
        } else {
            return response()->json(['message' => 'user not found'], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $email)
    {
        $user = $this->userRepository->getUserByEmail($email);

        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);
        }

        $userDetails = $request->all();

        $this->userRepository->updateUserByEmail($email, $userDetails);

        return response()->json();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $email)
    {
        $user = $this->userRepository->getUserByEmail($email);

        if (!$user) {
            return response()->json(['message' => 'user not found'], 404);
        }

        $this->userRepository->deleteUserByEmail($email);

        return response()->json();
    }

    public function updatePassword(Request $request, string $email)
    {
        $user = $this->userRepository->getUserByEmail($email);

        if (!$user) {
            return response()->json(['msg' => 'user not found'], 404);
        }

        if (Hash::check($request->password, $user->password)) {
            $request['newPassword'] = Hash::make($request->newPassword);

            $user->update(['password' => $request->newPassword]);

            return response()->json(['message' => 'password changed'], 200);
        }

        return response()->json(['message' => 'old password incorrect'], 400);
    }
}
