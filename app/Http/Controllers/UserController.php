<?php

namespace App\Http\Controllers;

use App\Repositories\Interfaces\IUserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
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
        
        return response()->json($this->userRepository->createUser($userDetails), 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $email)
    {   
        $user = $this->userRepository->getUserByEmail($email);

        if($user) {
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

        if(!$user) {
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

        if(!$user) {
            return response()->json(['message' => 'user not found'], 404);
        } 

        $this->userRepository->deleteUserByEmail($email);
        
        return response()->json();
    }
}
