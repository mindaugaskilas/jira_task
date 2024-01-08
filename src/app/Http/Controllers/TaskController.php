<?php

namespace App\Http\Controllers;

use App\Enums\RoleEnum;
use App\Enums\StatusEnum;
use App\Enums\TaskTypeEnum;
use App\Helpers\CustomHelper;
use App\Http\Requests\CreateTaskRequest;
use App\Models\Comment;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class TaskController extends Controller
{
    public function index(): View
    {
        return view('index', [
            'tasks' => Task::all(),
        ]);
    }

    public function create(): View
    {
        $users = User::all(['id', 'name', 'role'])->toArray();
        $filteredExecutors = CustomHelper::filterByValue($users, RoleEnum::EXECUTOR->value, 'role');
        $filteredTester = CustomHelper::filterByValue($users, RoleEnum::TESTER->value, 'role');

        return view('task_form', [
            'taskTypes' => TaskTypeEnum::values(),
            'statuses' => StatusEnum::values(),
            'creators' => CustomHelper::arrayToOptions($users, 'id', 'name'),
            'executors' => CustomHelper::arrayToOptions($filteredExecutors, 'id', 'name'),
            'testers' => CustomHelper::arrayToOptions($filteredTester, 'id', 'name'),
        ]);
    }

    public function show(int $id): View
    {
        return view('task', [
            'task' => Task::find($id),
            'comments' => Comment::where('task_id', $id)->get(),
        ]);
    }

    public function store(CreateTaskRequest $request): RedirectResponse
    {
        $task = new Task();
        $this->fillValues($request, $task)->save();

        return redirect()->route('task.list');
    }

    public function edit(int $taskId): View
    {
        $users = User::all(['id', 'name', 'role'])->toArray();
        $filteredExecutors = CustomHelper::filterByValue($users, RoleEnum::EXECUTOR->value, 'role');
        $filteredTester = CustomHelper::filterByValue($users, RoleEnum::TESTER->value, 'role');

        return view('task_edit_form', [
            'task' => Task::find($taskId),
            'taskTypes' => TaskTypeEnum::values(),
            'statuses' => StatusEnum::values(),
            'creators' => CustomHelper::arrayToOptions($users, 'id', 'name'),
            'executors' => CustomHelper::arrayToOptions($filteredExecutors, 'id', 'name'),
            'testers' => CustomHelper::arrayToOptions($filteredTester, 'id', 'name'),
        ]);
    }

    public function update(CreateTaskRequest $request, int $taskId): RedirectResponse
    {
        $task = Task::find($taskId);
        $this->fillValues($request, $task)->save();

        return redirect()->route('task.show', $taskId);
    }

    private function fillValues(CreateTaskRequest $request, Task $task): Task
    {
        $task->title = $request->title;
        $task->description = $request->description;
        $task->creator_id = $request->creator;
        $task->tester_id = $request->tester;
        $task->executor_id = $request->executor;
        $task->type = TaskTypeEnum::from($request->type);
        $task->status = StatusEnum::from($request->status);

        return $task;
    }
}
