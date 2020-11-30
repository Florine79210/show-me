<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShowIt;

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

    // *********** POSTER UN SHOW IT ********************************
    public function postShowIt(Request $request)
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
    public function updateShowIt(Request $request, ShowIt $showIt)
    {
        $request->validate([
            'content' => 'required|min:2',
            'image' => 'max:11',
            'tags' => 'max:150'
        ]);
        
        $showIt->content = $request->input('content');
        $showIt->image = $request->input('image');
        $showIt->tags = $request->input('tags');
        $showIt->save();

        return redirect()->route('home');
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
