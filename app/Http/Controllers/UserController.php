<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show($id, $name)
    {
        // In a real application, you would fetch user data from the database
        $user = [
            'id' => $id,
            'name' => $name,
            'email' => strtolower(str_replace(' ', '_', $name)) . '@example.com',
            'joined_date' => now()->format('Y-m-d')
        ];

        return view('users.profile', compact('user'));
    }
}
