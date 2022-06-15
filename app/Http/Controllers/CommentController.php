<?php

namespace App\Http\Controllers;


use App\Http\Requests\CommentRequests\StoreCommentRequest;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{
    public function index()
    {
        $resSearch = request('search') ?? '';
        $comments = Comment::getIndexComment($resSearch);
        return view('comments.index', ['comments' => $comments, 'totalCountComments' => $comments->total()]);
    }

    public function create()
    {
        if (Auth::check()) {

            return view('comments.create');
        }

        return redirect()->route('comments.index');
    }

    public function store(StoreCommentRequest $request)
    {
        Comment::getStoreComment($request);
        return redirect()->route('comments.index')
            ->with('success', 'Ваш отзыв отправлен на обработку...');
    }

    public function show(Comment $comment)
    {
        return view('comments.show', compact('comment'));
    }

    public function destroy(Comment $comment)
    {
        if (Gate::allows('delete-comment', $comment)) {
            $comment->delete();

            return redirect()->route('comments.index')
                ->with('success', 'Отзыв успешно удален...');
        }
        return redirect()->route('comment.show', ['comment' => $comment]);
    }

    public function destroyComment(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('admin.comments.index-admin')->with('success', 'Отзыв был отклонен..');
    }

    public function indexAdmin()
    {
        $comments = Comment::all()->where('status', '=', 0);
        return view('comments.index-admin', compact('comments'));
    }

    public function update(Comment $comment)
    {
        $comment->update([
            'status' => 1
        ]);

        return redirect()->route('admin.comments.index-admin', $comment)->with('success', 'Отзыв был одобрен...');
    }
}
