<?php

namespace App\Listeners;

use App\Enums\ActionEnum;
use App\Events\TaskChange;
use App\Models\Log;
use App\Models\Task;

class TaskChangeConfirmation
{
    public function handle(TaskChange $event): void
    {
        $task = $event->newTask;

        $diffValues = $this->fillValues($task, $event->dbTask);

        $this->saveData($task, $event->action, $diffValues);
    }

    private function saveData(Task $task, ActionEnum $action, $diffValues): void
    {
        $log = new Log();
        $log->task_id = $task->id;
        $log->data = json_encode($diffValues);
        $log->action = $action;

        $log->save();
    }

    private function fillValues(Task $newTask, Task $dbTask = null): array
    {
        return array_diff($newTask->toArray(), $dbTask ? $dbTask->toArray() : []);
    }
}
