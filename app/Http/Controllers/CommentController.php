<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateCommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCommentRequest $request): RedirectResponse
    {
        $comment = new Comment;
        $comment->content = $request->input('newcontent');
        $comment->meow_id = $request->input('meow_id');
        $comment->user_id = Auth::id();
        $comment->save();

        return redirect()->route('dashboard')->with('status', 'Comment posted');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id): RedirectResponse
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return back()->with('error', 'Comment not found');
        }

        if (Auth::id() !== $comment->user_id) {
            return back()->with('error', 'You are not authorized to delete this comment');
        }

        $comment->delete();

        return redirect()->route('dashboard')->with('status', 'Comment deleted');
    }
}
