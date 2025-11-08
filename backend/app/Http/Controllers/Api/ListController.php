<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ListController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => [
                ['id' => 1, 'name' => 'Shopping List', 'description' => 'Weekly groceries'],
                ['id' => 2, 'name' => 'Todo List', 'description' => 'Tasks for today'],
            ]
        ]);
    }

    public function show($id)
    {
        return response()->json([
            'success' => true,
            'data' => [
                'id' => $id, 
                'name' => "List $id", 
                'description' => 'Sample list'
            ]
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'List created successfully',
            'data' => array_merge(['id' => rand(1, 1000)], $validated)
        ], 201);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        return response()->json([
            'success' => true,
            'message' => 'List updated successfully',
            'data' => array_merge(['id' => (int)$id], $validated)
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            'success' => true,
            'message' => "List with ID $id deleted successfully"
        ]);
    }
}