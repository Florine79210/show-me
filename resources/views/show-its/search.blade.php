@extends('layouts.app')

@section('content')

<!-- *********** AFFICHER LE RESULTA DE LA RECHERCHE *********************************************************************************************************** -->
@foreach ($showIts as $showIt)

<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card showShowIts mb-3">

                <div class="card-header text-center showShowItsHeader">Posté par {{ $showIt->user->pseudo }} le {{ $showIt->updated_at }}</div>

                <div class="card-body text-center">
                    <div class="row justify-content-center">
                        <img img class="w-50" src="{{ asset("images/$showIt->image") }}"></img>
                    </div>

                    <div class="row justify-content-center">
                        <p>{{ $showIt->content }}</p>
                    </div>

                    <div class="row justify-content-center">
                        <p>#{{ $showIt->tags }}</p>
                    </div>

                    <div class="row mt-2 mb-3 justify-content-center">
                        <a class="btn btnsShowIt btnsZoomShowIt" href="{{ route('show-its.show', $showIt) }}">
                            Zoom sur ce Show It
                        </a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endforeach

@include('footer')

@endsection