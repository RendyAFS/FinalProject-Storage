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
                        <a href="{{ route('losts.index') }}"
                        style="background-color: transparent;border: 2px solid #ffffff; color: #ffffff; font-size: 2rem; text-decoration: none; font-weight: bold;" onmouseover="this.style.backgroundColor='#FFFFFF'; this.style.color='#000000';" onmouseout="this.style.backgroundColor='transparent'; this.style.color='#ffffff';"class="btn ">LOST?</a>
                    </div>
                    <div class="col"></div>
                </div>
                <div class="row text-center">
                    <div class="col"></div>
                    <div class="col-md-10 d-grid">
                        <a href="{{ route('founds.index') }}" style="background-color: #FFA559; color: #FFFFFF; font-size: 2rem; text-decoration: none; font-weight: bold;" onmouseover="this.style.backgroundColor='#545454'; this.style.color='#FFFFFF';" onmouseout="this.style.backgroundColor='#FFA559'; this.style.color='#FFFFFF';" class="btn">FOUND!</a>
                    </div>
                    <div class="col"></div>
                </div>
            </div>
        </div>
    </div>
@endsection
