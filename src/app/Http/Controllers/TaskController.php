<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('index', [
            'tasks' => Task::all(),
        ]);
    }

    public function show(int $id): View
    {
        return view('task', [
            'task' => Task::find($id),
            'comments' => Comment::where('task_id', $id)->get(),
        ]);
    }
}
