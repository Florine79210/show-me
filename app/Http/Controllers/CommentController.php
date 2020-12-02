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
    public function store(Request $request)
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


    // ***************** MODIFIER UN COMMENTAIRE ******************************
    public function update(Request $request, Comment $comment)
    {
        if ($comment->user_id === auth()->user()->id) {

            $request->validate([
                'content' => 'required|max:150',
                'image' => 'max:11',
                'tags' => 'max:150'
            ]);

            $comment->content = $request->input('content');
            $comment->image = $request->input('image');
            $comment->tags = $request->input('tags');
            $comment->save();

            return redirect()->route('home')->with(['message', 'Le Commentaire a bien été modifié !']);

        } else {
            return redirect()->route('home')->withErrors(['ERREUR d\'autorisation', 'Vous n\'avez pas l\'autorisation de faire ça !']);
        }
    }


    // *********** SUPPRIMER UN COMMENTAIRE ********************************
    public function destroy(Comment $comment)
    {
        $showIt = ShowIt::findOrFail($comment->show_it_id);

        if ($showIt->user_id === auth()->user()->id || $comment->user_id === auth()->user()->id) {

            $comment->delete();

            return redirect()->route('home')->with(['message', 'Le Commentaire a bien été supprimé !']);
        } else {
            return redirect()->route('home')->withErrors(['ERREUR d\'autorisation', 'Vous n\'avez pas l\'autorisation de faire ça !']);
        }
    }
}
