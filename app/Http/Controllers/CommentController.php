<?php

namespace App\Http\Controllers;

use App\Models\ShowIt;
use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

        // *********** POSTER UN COMMENTAIRE ********************************
        public function postComment(Request $request)
        {
            $request->validate([
                'content' => 'required|min:2',
                'image' => 'max:11',
                'tags' => 'max:150'
            ]);
                
            $comment = new Comment;
            $comment->user_id = auth()->user()->id;
            $comment->show_it_id = $request->input('show_it_id');
            $comment->content = $request->input('content');
            $comment->image = $request->input('image');
            $comment->tags = $request->input('tags');
            $comment->save();
    
            return redirect()->route('home');
        }


        public function deleteComment(ShowIt $showIt, Comment $comment)
    {
        if ($showIt->user_id === auth()->user()->id || $comment->user_id === auth()->user()->id)
        {
            $comment->delete();

            return redirect()->route('home')->with(['message', 'Le Commentaire a bien été supprimé !']);

        }else {
            return redirect()->route('home')->withErrors(['ERREUR d\'autorisation', 'Vous n\'avez pas l\'autorisation de faire ça !']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
