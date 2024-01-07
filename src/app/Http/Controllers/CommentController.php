<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCommentRequest;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CommentController extends Controller
{
    public function create(int $taskId): View
    {
        $users = array_column(User::all(['id'])->toArray(), 'id');
        $key = array_rand($users);
        $userId = $users[$key];

        return view('comment/comment_form', [
            'user_id' => $userId,
            'task_id' => $taskId,
        ]);
    }

    public function store(CreateCommentRequest $request, int $taskId): RedirectResponse
    {
        $comment = new Comment();
        $comment->comment = $request->comment;
        $comment->user_id = (int) $request->user_id;
        $comment->task_id = (int) $request->task_id;
        $comment->save();

        return redirect()->route('task.show', ['id' => $taskId]);
    }

    public function edit(int $taskId, int $commentId): View
    {
        $comment = Comment::find($commentId);

        return view('comment/comment_form_edit', [
            'comment' => $comment,
            'taskId' => $taskId,
        ]);
    }

    public function update(CreateCommentRequest $request, int $taskId, int $commentId): RedirectResponse
    {
        $commentData = $request->all();
        Comment::where('id', $commentId)->update(['comment' =>$commentData['comment']]);

        return redirect()->route('task.show', ['id' => $taskId]);
    }
}
