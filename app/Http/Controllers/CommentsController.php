<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    
    public function index(){

        $requestQuery = request()->query();
        $condition = array_key_exists('type', $requestQuery) && $requestQuery['type'] === 'favourite';
        $allComments = $condition ? Comment::where('is_favourite', true)->latest()->get() : Comment::latest()->get();

        return response()->json($allComments);
    }


    public function store(Request $request){

        $validateCommentData=$request->validate([
            'title'=>'required',
            'is_favourite'=>'required',
        ]);

        $comment=Comment::create($validateCommentData);

        return response()->json($comment);
    }


    public function destroy($id){

        $comment=Comment::findOrFail($id);

        return response()->json($comment->delete());
    }


    public function toggleFavourite($id){

        $comment=Comment::find($id);
        $comment=$comment->update(['is_favourite'=>'!$comment->is_favourite']);

        return response()->json($comment);
    }
}
