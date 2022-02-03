<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json([
            'success' => true,
            'data' => $users
        ], 200);
    }

    public function show($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found '
            ], 400);
        }

        return response()->json([
            'success' => true,
            'data' => $user->toArray()
        ], 200);
    }

    public function store(Request $request)
    {
        return response()->json([
            'success' => false,
            'message' => 'Page not found '
        ], 404);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'email' => 'email:rfc,dns'
        ]);

        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'success' => false,
                'message' => 'User not found'
            ], 400);
        }

        $updated = $user->fill($request->all())->save();

        if ($updated) {
            return response()->json([
                'success' => true
            ], 200);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'User can not be updated'
            ], 500);
        }
    }
}
