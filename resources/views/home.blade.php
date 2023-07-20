@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" id="logo-home">
            <div class="col" style="color: white">
                <img src="{{ asset('/images/lo-fo hori.png')}}" style="width: 350px">
            </div>
        </div>

        {{-- MAIN MENU --}}
        <div class="row">
            <div class="col-5" id="c-mainmenu">
                <p>
                   {{-- SPACE KOSONG --}}
                </p>
            </div>
            <div class="col-2 fs-2" id="c-mainmenu">
                <p>
                    MAIN MENU
                </p>
            </div>
            <div class="col-2" id="c-menu">
                <div class="row text-center mb-4" >
                    <div class="col"></div>
                    <div class="col-md-10 d-grid">
                        <a href="{{ route('losts.index') }}" class="btn btn-outline-dark fs-2 text-decoration-none fw-bold" role="button">LOST?</a>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row text-center">
                    <div class="col"></div>
                    <div class="col-md-10 d-grid">
                        <a href="{{ route('founds.index') }}" style="background-color: #FFA559;" class="btn btn-warning fs-2 text-decoration-none fw-bold text-white" role="button">FOUNDS!</a>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
