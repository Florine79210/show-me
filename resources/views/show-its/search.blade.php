@extends('layouts.app')

@section('content')

<!-- *********** AFFICHER LE RESULTA DE LA RECHERCHE *********************************************************************************************************** -->
@foreach ($showIts as $showIt)

<div class="container mb-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card showShowIts mb-3">

                <div class="card-header text-center">Posté le {{ $showIt->updated_at }}</div>

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

                    <div class="row mt-2 mb-3 justify-content-center">
                        <a href="{{ route('show-its.show', $showIt) }}">Zoom sur ce Show It</a>
                    </div>

                </div>

            </div>
        </div>
    </div>
</div>
@endforeach


@endsection