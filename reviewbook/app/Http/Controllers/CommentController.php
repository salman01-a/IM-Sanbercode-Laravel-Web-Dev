<?php

namespace App\Http\Controllers;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function comment(Request $request, $id){
        $request->validate([
            'content' => 'required'  
        ]);

        $comment = new Comment();
        $comment-> content = $request->content; 
        $comment-> book_id = $id; 
        $comment-> users_id = Auth::id();

        $comment ->save();

        return redirect('/books/'.$id);
    }
}
