@extends('layouts.app')

@section('content')

<!-- *********** AFFICHER LE SHOW IT *********************************************************************************************************** -->

<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card showShowIts mb-3">

                <div class="card-header text-center showShowItsHeader">Posté par {{ $showIt->user->pseudo }} le {{ $showIt->updated_at }}</div>

                <div class="card-body text-center">

                    @if (isset($showIt->image))
                    <div class="row justify-content-center">
                        <img src="{{ asset("images/$showIt->image") }}"></img>
                    </div>
                    @endif

                    <div class="row justify-content-center">
                        <p>{{ $showIt->content }}</p>
                    </div>

                    @if (isset($showIt->tags))
                    <div class="row justify-content-center">
                        <p>#{{ $showIt->tags }}</p>
                    </div>
                    @endif

                    <div class="row mt-2 mb-3 justify-content-center">
                        <a class="btn btnsShowIt btnsZoomShowIt" href="{{ route('show-its.show', $showIt) }}">
                            Zoom sur ce Show It
                        </a>
                    </div>

                    <div class="row justify-content-center">

                        <!-- *********** MODAL COMMENTER LE SHOW IT *********************************************************************************************************** -->
                        <div class="col-md-4">
                            <button type="button" class="btn btnsShowIt btnsCommentShowIt mb-3" data-toggle="modal" data-target="#modalCommenter{{$showIt->id}}">
                                Commenter
                            </button>

                            <div class="modal" id="modalCommenter{{$showIt->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="mt-3 modal-header-center">
                                            <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                            <h2 class="modal-title text-center">Commenter le Show It</h2>
                                        </div>

                                        <form method="POST" action="{{ route('comments.store') }}">
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
                                                <button type="submit" class="btn btnsShowIt btnsCommentShowIt">
                                                    {{ __('Commenter') }}
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- *********** MODAL MODIFIER MON SHOW IT *********************************************************************************************************** -->
                        @can('update', $showIt)
                        <div class="col-md-4">
                            <button type="button" class="btn btnsShowIt btnsModifShowIt mb-3" data-toggle="modal" data-target="#modalModifShowIt{{$showIt->id}}">
                                Modifier le Show It
                            </button>

                            <div class="modal" id="modalModifShowIt{{$showIt->id}}" tabindex="-1">
                                <div class="modal-dialog">
                                    <div class="modal-content">

                                        <div class="mt-3 modal-header-center">
                                            <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>

                                            <h2 class="modal-title text-center">Modifier le Show It</h2>
                                        </div>

                                        <form method="POST" action="{{ route('show-its.update', $showIt) }}">
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
                                                <button type="submit" class="btn btnsShowIt btnsModifShowIt">
                                                    {{ __('Modifier') }}
                                                </button>
                                            </div>

                                        </form>

                                    </div>
                                </div>
                            </div>

                        </div>
                        @endcan

                        <!-- *********** SUPPRIMER LE SHOW IT *********************************************************************************************************** -->
                        @can('delete', $showIt)
                        <div class="col-md-4">
                            <form method="POST" action="{{ route('show-its.destroy', $showIt) }}">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btnsShowIt btnsSupprShowIt">
                                    {{ __('Supprimer') }}
                                </button>
                            </form>
                        </div>
                        @endcan

                    </div>

                </div>

                <div class="card-footer footerShowIts text-center">

                    <button class="btn btnsShowIt btnsShowComments" type="button" data-toggle="collapse" data-target="#collapseShowComments" aria-expanded="false" aria-controls="collapseShowComments">
                        Afficher les Commentaires
                    </button>

                    <!-- *********** AFFICHER LES COMMENTAIRES DU SHOW IT *********************************************************************************************************** -->
                    <div class="collapse" id="collapseShowComments">

                        @foreach ($showIt->comments as $comment)
                        <div class="row justify-content-center">
                            <div class="col-md-10">

                                <div class="card showComments mb-3">
                                    <div class="card-header text-center showCommentsHeader">Posté par {{ $comment->user->pseudo }} le {{ $comment->updated_at }}</div>

                                    <div class="card-body text-center">

                                        @if (isset($comment->image))
                                        <div class="row justify-content-center">
                                            <img img class="w-50" src="{{ asset("images/$comment->image") }}"></img>
                                        </div>
                                        @endif

                                        <div class="row justify-content-center">
                                            <p>{{ $comment->content }}</p>
                                        </div>

                                        @if (isset($comment->tags))
                                        <div class="row justify-content-center">
                                            <p>#{{ $comment->tags }}</p>
                                        </div>
                                        @endif

                                    </div>

                                    <div class="card-footer text-center showCommentsFooter">
                                        <div class="row justify-content-center">

                                            <!-- ************ MODAL MODIFIER MON COMMENTAIRE *********************************************************************************************************** -->
                                            @can('update', $comment)
                                            <div class="col-md-6">
                                                <button type="button" class="btn btnsShowIt btnsModifShowIt mb-3" data-toggle="modal" data-target="#modalModifCommentaire{{$comment->id}}">
                                                    Modifier le Commentaire
                                                </button>

                                                <div class="modal" id="modalModifCommentaire{{$comment->id}}" tabindex="-1">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">

                                                            <div class="mt-3 modal-header-center">
                                                                <button type="button" class="close mr-3" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>

                                                                <h2 class="modal-title text-center">Modifier le commentaire</h2>
                                                            </div>

                                                            <form method="POST" action="{{ route('comments.update', $comment) }}">
                                                                @csrf
                                                                @method('put')

                                                                <div class="modal-body text-center">

                                                                    <div class="form-group row">
                                                                        <div class="col-md-6">
                                                                            <input name="image" type="text" class="form-control @error('image') is-invalid @enderror text-center" value="{{ $comment->image }}" autocomplete="image" autofocus>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-md-6">
                                                                            <input name="content" type="text" class="form-control @error('content') is-invalid @enderror text-center" value="{{ $comment->content }}" autocomplete="content" autofocus>
                                                                        </div>
                                                                    </div>

                                                                    <div class="form-group row">
                                                                        <div class="col-md-6">
                                                                            <input name="tags" type="text" class="form-control @error('content') is-invalid @enderror text-center" value="{{ $comment->tags }}" autocomplete="tags" autofocus>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <button type="submit" class="btn btnsShowIt btnsModifShowIt">
                                                                        {{ __('Modifier') }}
                                                                    </button>
                                                                </div>

                                                            </form>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                            @endcan

                                            <!-- *********** SUPPRIMER COMMENTAIRE *********************************************************************************************************** -->
                                            @can('delete', $comment)
                                            <div class="col-md-6">
                                                <form method="POST" action="{{ route('comments.destroy', $comment) }}">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="btn btnsShowIt btnsSupprShowIt">
                                                        {{ __('Supprimer') }}
                                                    </button>
                                                </form>
                                            </div>
                                            @endcan

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
</div>

@include('footer')

@endsection