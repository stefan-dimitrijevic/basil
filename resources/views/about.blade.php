@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row min-content-height align-content-center">
            <div class="col-md-5" >
                <img src="{{ asset('assets/img/about_me.jpg') }}" width="400" height="400" alt="Author photo">
            </div>
            <div class="col-md-7 d-flex">
                <p class="lead" style="color: #fd5523">Hi! My name is Stefan Dimitrijević. I'm 29 years old student of ICT College of Vocational Studies.
                    I'm guitar player in alternative band "Strah od Džeki Čena" and professional pool player. This is my Laravel school project about recipes.</p>
            </div>
        </div>
    </div>

@endsection

