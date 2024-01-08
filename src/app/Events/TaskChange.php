<?php

namespace App\Events;

use App\Enums\ActionEnum;
use App\Models\Task;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class TaskChange
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     */
    public function __construct(ActionEnum $action, Task $newTask, Task $dbTask = null)
    {
        $this->action = $action;
        $this->newTask = $newTask;
        $this->dbTask = $dbTask;
    }
}
