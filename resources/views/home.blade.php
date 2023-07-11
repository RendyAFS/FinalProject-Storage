@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row" id="logo-home">
            <div class="col" style="color: white">
                <p>
                    LOGO
                </p>
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
            <div class="col-2 " id="c-menu">
                <div class="row text-center pt-5 my-5" >
                    <div class="col" >
                        <a href="{{ route('losts.index') }}"> LOST?</a>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12">
                        <a href="{{ route('founds.index') }}"> FOUND</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
