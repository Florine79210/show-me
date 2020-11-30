@extends('layouts.app')

@section('content')
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

@foreach ($showIts as $showIt)
<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card showShowIts">
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
                </div>

                @if ($showIt->user_id === auth()->user()->id)
                <div class="card-footer text-center">

                    <!-- *********** MODAL MODIFIER MON SHOW IT *********************************************************************************************************** -->
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
                                    @method('PUT')

                                    <div class="modal-body text-center">

                                        <div class="form-group row">
                                            <div class="col-md-6">
                                                <input name="image" type="text" class="form-control @error('image') is-invalid @enderror text-center" value="{{ $showIt->image }}" required autocomplete="image" autofocus>
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
                @endif

            </div>
        </div>
    </div>
    @endforeach

    @endsection