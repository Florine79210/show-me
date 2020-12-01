@extends('layouts.app')

@section('content')

<!-- *********** POSTER UN SHOW IT *********************************************************************************************************** -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card mb-5 postShowIt">
                <div class="card-header text-center">
                    <h1>Exprime toi</h1>
                </div>

                <div class="card-body text-center">
                    <form method="POST" action="{{ route('showit.postShowIt') }}">
                        @csrf
                        <div class="row justify-content-center">
                            <input name="content" type="text" class="form-control @error('content') is-invalid @enderror text-center" placeholder="Tape ton Show It" required>
                        </div>

                        <div class="row justify-content-between">
                            <div class="col-md-4">
                                <input name="image" type="text" class="form-control @error('image') is-invalid @enderror text-center" placeholder="Ajoute une image">
                            </div>

                            <div class="col-md-8">
                                <input name="tags" type="text" class="form-control @error('tags') is-invalid @enderror text-center" placeholder="Ajoute un ou des  tag(s)">
                            </div>
                        </div>

                        <div class="row justify-content-center">
                            <button type="submit" class="btn btnShowIt">Show it</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- *********** AFFICHER LES SHOW IT *********************************************************************************************************** -->
@foreach ($showIts as $showIt)
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card showShowIts mb-3">

                <div class="card-header text-center">Posté par {{ $showIt->user->pseudo }} le {{ $showIt->updated_at }}</div>

                <div class="card-body text-center">
                    <div class="row justify-content-center">
                        <p>{{ $showIt->image }}</p>
                    </div>

                    <div class="row justify-content-center">
                        <p>{{ $showIt->content }}</p>
                    </div>

                    <div class="row justify-content-center">
                        <p>{{ $showIt->tags }}</p>
                    </div>


                    <div class="row justify-content-center">

                        <!-- *********** MODAL COMMENTER LE SHOW IT *********************************************************************************************************** -->
                        <div class="col-md-4">
                            <button type="button" class="btn btnsModif mb-3" data-toggle="modal" data-target="#modalCommenter">
                                Commenter
                            </button>

                            <div class="modal" id="modalCommenter" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="mt-3 modal-header-center">
                                            <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                            <h2 class="modal-title text-center">Commenter le Show It</h2>
                                        </div>

                                        <form method="POST" action="{{ route('comment.postComment') }}">
                                            @csrf

                                            <div class="modal-body text-center">

                                                <div class="form-group row justify-content-center">
                                                    <div class="col-md-6">
                                                        <input name="image" type="text" class="form-control @error('image') is-invalid @enderror text-center" placeholder="Ajoute une image" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row justify-content-center">
                                                    <div class="col-md-6">
                                                        <input name="content" type="text" class="form-control @error('content') is-invalid @enderror text-center" placeholder="Ecrit ton commentaire ici" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row justify-content-center">
                                                    <div class="col-md-6">
                                                        <input name="tags" type="text" class="form-control @error('content') is-invalid @enderror text-center" placeholder="Ajoute un ou des tag(s)" autofocus>
                                                    </div>
                                                </div>

                                                <input class="form-control" type="hidden" id="show_it_id" name="show_it_id" value="{{$showIt->id}}">
                                            </div>

                                            <div class="modal-footer d-flex justify-content-center">
                                                <button type="submit" class="btn btnsModif">
                                                    {{ __('Commenter') }}
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- *********** MODAL MODIFIER MON SHOW IT *********************************************************************************************************** -->
                        @if ($showIt->user_id === auth()->user()->id)
                        <div class="col-md-4">
                            <button type="button" class="btn btnsModif mb-3" data-toggle="modal" data-target="#modalModifShowIt">
                                Modifier mon Show It
                            </button>

                            <div class="modal" id="modalModifShowIt" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="mt-3 modal-header-center">
                                            <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                            <h2 class="modal-title text-center">Modifier mon Show It</h2>
                                        </div>

                                        <form method="POST" action="{{ route('showit.updateShowIt', $showIt) }}">
                                            @csrf
                                            @method('put')

                                            <div class="modal-body text-center">

                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <input name="image" type="text" class="form-control @error('image') is-invalid @enderror text-center" value="{{ $showIt->image }}" autocomplete="image" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <input name="content" type="text" class="form-control @error('content') is-invalid @enderror text-center" value="{{ $showIt->content }}" autocomplete="content" autofocus>
                                                    </div>
                                                </div>

                                                <div class="form-group row">
                                                    <div class="col-md-6">
                                                        <input name="tags" type="text" class="form-control @error('content') is-invalid @enderror text-center" value="{{ $showIt->tags }}" autocomplete="tags" autofocus>
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

                        <!-- *********** SUPPRIMER LE SHOW IT *********************************************************************************************************** -->
                        <div class="col-md-4">
                            <form method="POST" action="{{ route('showit.deleteShowIt', $showIt) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btnsModif">
                                    {{ __('Supprimer') }}
                                </button>
                            </form>
                        </div>
                        @endif

                    </div>

                </div>

                <div class="card-footer text-center">

                    <!-- *********** AFFICHER LES COMMENTAIRES DU SHOW IT *********************************************************************************************************** -->
                    @foreach ($showIt->comments as $comment)
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <div class="card showComments mb-3">
                                <div class="card-header text-center">Posté par {{ $comment->user->pseudo }} le {{ $comment->updated_at }}</div>

                                <div class="card-body text-center">
                                    <div class="row justify-content-center">
                                        <p>{{ $comment->image }}</p>
                                    </div>

                                    <div class="row justify-content-center">
                                        <p>{{ $comment->content }}</p>
                                    </div>

                                    <div class="row justify-content-center">
                                        <p>{{ $comment->tags }}</p>
                                    </div>
                                </div>

                                <div class="card-footer text-center">
                                    <div class="row justify-content-center">

                                        <!-- *********** SUPPRIMER COMMENTAIRE *********************************************************************************************************** -->
                                        @if ($showIt->user_id === auth()->user()->id || $comment->user_id === auth()->user()->id)
                                        <div class="col-md-6">
                                            <form method="POST" action="{{ route('comment.deleteComment', $showIt, $comment) }}">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btnsModif">
                                                    {{ __('Supprimer') }}
                                                </button>
                                            </form>
                                        </div>
                                        @endif

                                        <!-- *********** MODAL MODIFIER MON SHOW IT *********************************************************************************************************** -->

                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    @endforeach

                </div>

            </div>
        </div>
    </div>
</div>
@endforeach

@endsection