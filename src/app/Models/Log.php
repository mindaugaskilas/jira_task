<?php

namespace App\Models;

use App\Enums\ActionEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Notifications\Notifiable;

class Log extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'task_id',
    ];

    protected $casts = [
        'data' => 'array',
        'action' => ActionEnum::class,
    ];

    public function tester(): BelongsTo
    {
        return $this->belongsTo(Task::class);
    }
}
