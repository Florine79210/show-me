@extends('layouts.app')

@section('content')

<div class="container w-50 mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card voirInfos">

                <div class="card-header text-center">{{ __('Mes infos :') }}</div>

                <div class="card-body">

                    <div class="row justify-content-center">
                        <p class='nomInfo'>Nom : &emsp;</p>
                        <p>{{$user->last_name}}</p>
                    </div>

                    <div class="row justify-content-center">
                        <p class='nomInfo'>Prénom :&emsp;</p>
                        <p>{{$user->first_name}}</p>
                    </div>

                    <div class="row justify-content-center">
                        <p class='nomInfo'>Pseudo :&emsp;</p>
                        <p>{{$user->pseudo}}</p>
                    </div>

                    <div class="row justify-content-center">
                        <p class='nomInfo'>E-mail :&emsp;</p>
                        <p>{{$user->email}}</p>
                    </div>

                </div>


                <div class="card-footer text-center">
                    <div class="row justify-content-center">

                        <!-- ------------------ MODAL MODIFIER LES INFOS ----------------------------------------  -->
                        <div class="col-md-6">
                            <div class="container">
                                <div class="row justify-content-center">

                                    <button type="button" class="btn btnsModif" data-toggle="modal" data-target="#modalModifInfos">
                                        Modifier<br>mes infos
                                    </button>

                                    <div class="modal" id="modalModifInfos" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="mt-3 modal-header-center">
                                                    <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>

                                                    <h2 class="modal-title text-center">Modifier mes infos</h2>
                                                </div>

                                                <form method="POST" action="{{ route('user.update') }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-body text-center">
                                                        <div class="form-group row">
                                                            <label for="last_name" class="col-md-4 col-form-label text-md-right">{{ __('Nom :') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="last_name" type="text" class="form-control @error('last_name') is-invalid @enderror text-center" name="last_name" value="{{ $user->last_name }}" required autocomplete="last_name" autofocus>

                                                                @error('last_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="first_name" class="col-md-4 col-form-label text-md-right">{{ __('Prénom :') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="first_name" type="text" class="form-control @error('first_name') is-invalid @enderror text-center" name="first_name" value="{{ $user->first_name }}" required autocomplete="first_name" autofocus>

                                                                @error('first_name')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="pseudo" class="col-md-4 col-form-label text-md-right">{{ __('Pseudo :') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="pseudo" type="text" class="form-control @error('pseudo') is-invalid @enderror text-center" name="pseudo" value="{{  $user->pseudo }}" required autocomplete="pseudo" autofocus>

                                                                @error('pseudo')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Adresse E-mail :') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror text-center" name="email" value="{{  $user->email }}" required autocomplete="email">

                                                                @error('email')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5 justify-content-center precisions">
                                                            <p>Renseignez votre mot de passe<br>pour modifier vos infos.</p>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror text-center" name="password" required>

                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer M.D.P') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="password-confirm" type="password" class="form-control text-center" name="password_confirmation" required>
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="submit" class="btn btnsModif">
                                                            {{ __('Modifier') }}
                                                        </button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                        <!-- ------------------ MODAL MODIFIER LE MOT DE PASSE ----------------------------------------             -->
                        <div class="col-md-6">

                            <div class="container">
                                <div class="row justify-content-center">

                                    <button type="button" class="btn btnsModif" data-toggle="modal" data-target="#modalModifMotDePasse">
                                        Modifier mon<br>mot de passe
                                    </button>

                                    <div class="modal" id="modalModifMotDePasse" tabindex="-1">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                                <div class="mt-3 modal-header-center">
                                                    <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>

                                                    <h2 class="modal-title text-center">Modifier mon mot de passe</h2>
                                                </div>

                                                <form method="POST" action="{{ route('user.updatePassword') }}">
                                                    @csrf
                                                    @method('PUT')

                                                    <div class="modal-body text-center">

                                                        <div class="row justify-content-center precisions">
                                                            <p>Renseignez votre ANCIEN mot de passe :</p>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror text-center" name="password" required autocomplete="new-password">

                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer M.D.P') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="password-confirm" type="password" class="form-control text-center" name="password_confirmation" required autocomplete="new-password">
                                                            </div>
                                                        </div>

                                                        <div class="row mt-5 justify-content-center precisions">
                                                            <p>Renseignez votre NOUVEAU mot de passe :</p>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror text-center" name="password2" required autocomplete="new-password">

                                                                @error('password')
                                                                <span class="invalid-feedback" role="alert">
                                                                    <strong>{{ $message }}</strong>
                                                                </span>
                                                                @enderror
                                                            </div>
                                                        </div>

                                                        <div class="form-group row">
                                                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer M.D.P') }}</label>

                                                            <div class="col-md-6">
                                                                <input id="password-confirm" type="password" class="form-control text-center" name="password2_confirmation" required autocomplete="new-password">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <div class="modal-footer d-flex justify-content-center">
                                                        <button type="submit" class="btn btnsModif">
                                                            {{ __('Modifier') }}
                                                        </button>
                                                    </div>

                                                </form>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>    
    </div>
</div>
@endsection