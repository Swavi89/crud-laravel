<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::all();
        return response()->json($todos);
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $todo = Todo::create($request->all());
        return response()->json([
            'message' => 'Todo created successfully',
            'title' => $todo->title,
            'completed' => $todo->completed
        ]);
    }

    public function show($id)
    {
        $todo = Todo::find($id);
        return response()->json($todo);
    }

    public function update(Request $request, $id)
    {
        $todo = Todo::find($id);
        $todo->update($request->all());
        return response()->json([
            'message' => 'Todo updated successfully',
            'title' => $todo->title,
            'completed' => $todo->completed
        ]);
    }

    public function destroy($id)
    {
        $todo = Todo::find($id);
        $todo->delete();
        return response()->json([
            'message' => 'Todo deleted successfully',
            'title' => $todo->title,
            'completed' => $todo->completed
        ]);
    }

    public function search($todo)
    {
        $todo = Todo::where('title', 'like', '%' . $todo . '%')->get();
        return response()->json([
            'message' => 'Todo searched successfully',
            'todos' => $todo
        ]);
    }
}