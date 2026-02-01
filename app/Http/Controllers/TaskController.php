<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        Task::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'completed' => false,
        ]);

        return redirect()->route('tasks.index')->with('success', 'Tâche créée avec succès!');
    }

    public function show(Task $task)
    {
        // Protection simple sans Policy
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }
        return view('tasks.show', compact('task'));
    }

    public function edit(Task $task)
    {
        // Protection simple sans Policy
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }
        return view('tasks.edit', compact('task'));
    }

    public function update(Request $request, Task $task)
    {
        // Protection simple sans Policy
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'completed' => 'boolean',
        ]);

        $task->update($request->all());

        return redirect()->route('tasks.index')->with('success', 'Tâche mise à jour!');
    }

    public function destroy(Task $task)
    {
        // Protection simple sans Policy
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée!');
    }

    public function toggleComplete(Task $task)
    {
        // Protection simple sans Policy
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }
        $task->completed = !$task->completed;
        $task->save();
        return back()->with('success', 'Statut de la tâche modifié!');
    }
}
