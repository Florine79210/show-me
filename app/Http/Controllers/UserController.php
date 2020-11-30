<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Contracts\Service\Attribute\Required;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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

    //  **************** VOIR LA PAGE INFOS DE L'UTILLISATEUR ****************
    public function showUpdateInfos()
    {
        $userId = auth()->user()->id;
        $user = User::findOrFail($userId);
        return view('user.infos', ['user' => $user]);
    }

    //  *********** MODIFIER LES INFOS DE L'UTILLISATEUR ************
    public function update(Request $request)
    {
        $request->validate([
            'first_name' => 'required|min:5',
            'last_name' => 'required|min:5',
            'pseudo' => 'required|min:6',
            'email' => 'required|min:8',
            'password' => 'present',
            'password_confirmation' => 'present'
        ]);
        if ($request->input('password') !== null && $request->input('password_confirmation') !== null) {

            if ($request->input('password') === $request->input('password_confirmation')) {

                $userId = auth()->user()->id;
                $user = User::findOrFail($userId);
                $password = $user->password;

                if (Hash::check($request->input('password'), $password)) {

                    $user->first_name = $request->input('first_name');
                    $user->last_name = $request->input('last_name');
                    $user->pseudo = $request->input('pseudo');
                    $user->email = $request->input('email');
                    $user->save();

                    return redirect()->route('user.update');

                } else {
                    return redirect()->route('user.update')->withErrors(['password_error', 'Mot de passe INCORRECT !']);
                }
            } else {
                return redirect()->route('user.update')->withErrors(['password_error', 'Les champs de mot de passe et de comfirmation du mot de passe sont DIFFERENTS !']);
            }
        } else {
            return redirect()->route('user.update')->withErrors(['password_error', 'ATTENTION le champ de mot de passe ou de confirmation du mot de passe est VIDE !']);
        }
    }


    // **************** VOIR LA PAGE PROFIL DE L'UTILLISATEUR ****************
    public function profile()
    {
        $user = auth()->user();
        return view('user.profile', ['user' => $user]);
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



    // ************** MODIFIER LE MOT DE PASSE DE L'UTILISATEUR **************
    public function updatePassword(Request $request)
    {
        $request->validate([
            'password' => 'present',
            'password_confirmation' => 'present',
            'password2' => 'required|min:8',
            'password_confirmation2' => 'required|min:8'
        ]);
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
