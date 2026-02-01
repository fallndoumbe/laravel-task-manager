<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
<<<<<<< HEAD
=======
    /**
     * Display a listing of the resource.
     */
>>>>>>> feature/auth
    public function index()
    {
        $tasks = Task::where('user_id', Auth::id())->latest()->get();
        return view('tasks.index', compact('tasks'));
    }

<<<<<<< HEAD
=======
    /**
     * Show the form for creating a new resource.
     */
>>>>>>> feature/auth
    public function create()
    {
        return view('tasks.create');
    }

<<<<<<< HEAD
=======
    /**
     * Store a newly created resource in storage.
     */
>>>>>>> feature/auth
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

<<<<<<< HEAD
    public function show(Task $task)
    {
        // Protection simple sans Policy
=======
    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
>>>>>>> feature/auth
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }
        return view('tasks.show', compact('task'));
    }

<<<<<<< HEAD
    public function edit(Task $task)
    {
        // Protection simple sans Policy
=======
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
>>>>>>> feature/auth
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }
        return view('tasks.edit', compact('task'));
    }

<<<<<<< HEAD
    public function update(Request $request, Task $task)
    {
        // Protection simple sans Policy
=======
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
>>>>>>> feature/auth
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

<<<<<<< HEAD
    public function destroy(Task $task)
    {
        // Protection simple sans Policy
=======
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
>>>>>>> feature/auth
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }
        $task->delete();
        return redirect()->route('tasks.index')->with('success', 'Tâche supprimée!');
    }

<<<<<<< HEAD
    public function toggleComplete(Task $task)
    {
        // Protection simple sans Policy
=======
    /**
     * Toggle task completion status
     */
    public function toggleComplete(Task $task)
    {
>>>>>>> feature/auth
        if ($task->user_id !== Auth::id()) {
            abort(403, 'Accès non autorisé');
        }
        $task->completed = !$task->completed;
        $task->save();
        return back()->with('success', 'Statut de la tâche modifié!');
    }
}
