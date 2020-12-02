<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShowIt;
use App\Models\Comment;
use App\Models\User;

class ShowItController extends Controller
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


// *********** ZOOM SUR UN SHOW IT ********************************
    public function show(ShowIt $showIt)
    {
        $user = User::where('id', $showIt->user_id)->get();
        $comments = Comment::where('user_id', $showIt->user_id)->get();

        return view('show-its.show', [
            'show_it' => $showIt, 
            'comments' => $comments,
            'user' => $user
        ]);

        // $showIt = ShowIt::findOrFail($showIt);

        // return redirect()->route('zoomShowIt');
    }


    // *********** POSTER UN SHOW IT ********************************
    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|min:2',
            'image' => 'max:11',
            'tags' => 'max:150'
        ]);

        $showIt = new showIt;
        $showIt->user_id = auth()->user()->id;
        $showIt->content = $request->input('content');
        $showIt->image = $request->input('image');
        $showIt->tags = $request->input('tags');
        $showIt->save();

        return redirect()->route('home');
    }

    // ***************** MODIFIER UN SHOW IT ******************************
    public function update(Request $request, ShowIt $showIt)
    {
        if ($showIt->user_id === auth()->user()->id) {
            $request->validate([
                'content' => 'required|max:150',
                'image' => 'max:11',
                'tags' => 'max:150'
            ]);

            $showIt->content = $request->input('content');
            $showIt->image = $request->input('image');
            $showIt->tags = $request->input('tags');
            $showIt->save();

            return redirect()->route('home')->with(['message', 'Le Show It a bien été modifié !']);

        }else{
            return redirect()->route('home')->withErrors(['ERREUR d\'autorisation', 'Vous n\'avez pas l\'autorisation de faire ça !']);
        }
    }

    // ***************** SUPPRIMER UN SHOW IT ******************************
    public function destroy(ShowIt $showIt)
    {
        if ($showIt->user_id === auth()->user()->id) {

            $showIt->delete();

            return redirect()->route('home')->with(['message', 'Le Show It a bien été supprimé !']);

        } else {
            return redirect()->route('home')->withErrors(['ERREUR d\'autorisation', 'Vous n\'avez pas l\'autorisation de faire ça !']);
        }
    }
}
