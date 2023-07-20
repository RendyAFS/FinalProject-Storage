@extends('layouts.apps')

@section('content')
<div class="container justify-content-center">
    <div class="text-center pt-5 mt-5 mb-4">
        <img src="{{ asset('/images/lo-fo hori.png')}}" style="width: 350px">
    </div>

    <div class="row justify-content-center">
        <div class="col-md-4 justify-content-center">
            <div class="card justify-content-center">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="row mb-3 mt-3 pt-3 justify-content-center">
                        <div class="col-10">
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror text-center"  name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Email">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="row mb-3 pb-3 justify-content-center">
                        <div class="col-10 ">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror text-center" name="password" required autocomplete="current-password" placeholder="Password">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>


                    <div class="row text-center">
                        <div class="col">

                        </div>
                        <div class="col-md-10 d-grid">
                            <button type="submit" style="background-color: #FFA559;" class="btn btn-warning fw-bold text-white">
                                LOGIN
                            </button>
                        </div>
                        <div class="col">

                        </div>
                    </div>


                    {{-- <div class="row mb-2">
                        <div class="col-10  ">
                            <button type="submit" class="btn btn-primary" style="width: 200px">
                                LOGIN
                            </button>
                        </div>
                    </div> --}}

                    <div class="text-end me-4">
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" id="f-pass" href="{{ route('password.request') }}">
                                Forgot Password
                            </a>
                        @endif
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
