<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $bookId)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
        ]);

        Comment::create([
            'user_id' => Auth::id(),
            'book_id' => $bookId,
            'comment' => $request->comment,
        ]);

        return redirect()->route('books.show', $bookId)->with('success', 'Comentário adicionado com sucesso!');
    }
}
