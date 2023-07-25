@extends('layouts.apphome')

@section('content')
    <div class="container">
        <div class="row pt-4" id="logo-home">
            <div class="col" style="color: white">
            </div>
        </div>

        {{-- MAIN MENU --}}
        <div class="row">

            <div class="col-12 mt-5 pt-5" id="c-mainmenu">
                <p>
                    {{-- SPACE KOSONG --}}
                 </p>
            </div>
            <div class="col-xl-1 col-md-0" id="c-mainmenu">
                <p>
                    {{-- SPACE KOSONG --}}
                 </p>
            </div>
            <div class="col-xl-5 align-middle mt-5 pt-5" id="c-mainmenu">
                {{-- <img src="{{ ('images/lo-fo hori.png')}}" style="width: 350px"> --}}
            </div>
            <div class="col-2" id="c-mainmenu">
                <p>
                    {{-- SPACE KOSONG --}}
                 </p>
            </div>
            <div class="col-xl-2" id="c-menu">
                <div class="row">
                    <div class="col-5"></div>
                    <div class="col-2 mb-4">
                        <i class="bi bi-house-fill fs-1" style="color:white"></i>
                    </div>
                    <div class="col-5"></div>
                </div>
                <div class="row text-center mb-4" >
                    <div class="col"></div>
                    <div class="col-md-10 d-grid">
                        <a href="{{ route('losts.index') }}" class="btn btn-outline-dark btn-outline-white fs-2 text-decoration-none fw-bold" role="button">LOST?</a>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row text-center">
                    <div class="col"></div>
                    <div class="col-md-10 d-grid">
                        <a href="{{ route('founds.index') }}" style="background-color: #FFA559;" class="btn btn-warning fs-2 text-decoration-none fw-bold text-white" role="button">FOUND!</a>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
