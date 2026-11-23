<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserController
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    // 1) GET — fetch all
    public function index()
    {
        return response()->json([
            'status' => true,
            'data' => $this->userService->getAll()
        ]);
    }

    // 2) POST — create
    public function store(Request $request)
    {
        Log::info($request);
        try {
            $validated = $request->validate([
                'usr_role'   => 'required|string',
                
                'usr_name'     => 'required|string|max:255',
                'usr_phoneNo'  => 'required|string|max:255',
                'usr_email'    => 'required|email|max:255|unique:user,usr_email',
                'usr_company'  => 'required|string|max:255',
                'usr_username' => 'required|string|max:255|unique:user,usr_username',
                'usr_password' => 'required|string|min:6|max:255',
                'usr_status'   => 'required|string|max:255',
            ]);

            // Hash password
            $validated['usr_password'] = bcrypt($validated['usr_password']);

            // Send to service
            $user = $this->userService->create($validated);

            return response()->json([
                'status' => true,
                'data' => $user
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'status' => false,
                'data' => $e->errors()
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'data' => $e->getMessage()
            ], 500);
        }
    }

    // 3) PUT — update
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'usr_role'   => 'required|string',
            
            'usr_name'     => 'required|string|max:255',
            'usr_phoneNo'  => 'required|string|max:255',
            'usr_email'    => 'required|email|max:255',
            'usr_company'  => 'required|string|max:255',
            'usr_username' => 'required|string|max:255',
            'usr_password' => 'required|string|min:6|max:255',
            'usr_status'   => 'required|string|max:255',
        ]);
        $user = $this->userService->update($id, $validated);

        return response()->json($user);
    }

    // 4) DELETE — delete
    public function destroy(string $id)
    {
        $this->userService->delete($id);

        return response()->json([
            'message' => 'User deleted successfully'
        ]);
    }
}