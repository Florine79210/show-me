<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShowIt;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;

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

    // *********** RECHERCHER UN SHOW IT ********************************
    public function search(Request $request)
    {
        $request->validate([
            'q' => 'required',
        ]);

        $recherche = $request->input('q');

        $showIts = ShowIt::where('tags', 'like', "%$recherche%")
            ->orWhere('content', 'like', "%$recherche%")
            ->get();

        return view('show-its.search', ['showIts' => $showIts]);
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

    // *********** ZOOM SUR UN SHOW IT ********************************
    public function show(ShowIt $showIt)
    {
        return view('show-its.show', [
            'showIt' => $showIt
        ]);
    }

    // ***************** MODIFIER UN SHOW IT ******************************
    public function update(Request $request, ShowIt $showIt)
    {;

        if ($this->authorize('update', $showIt)) {

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
        } else {
            return redirect()->route('home')->withErrors(['ERREUR d\'autorisation', 'Vous n\'avez pas l\'autorisation de faire ça !']);
        }
    }

    // ***************** SUPPRIMER UN SHOW IT ******************************
    public function destroy(ShowIt $showIt)
    {
        if ($this->authorize('delete', $showIt)) {

            $showIt->delete();

            return redirect()->route('home')->with(['message', 'Le Show It a bien été supprimé !']);
        } else {
            return redirect()->route('home')->withErrors(['ERREUR d\'autorisation', 'Vous n\'avez pas l\'autorisation de faire ça !']);
        }
    }
}
