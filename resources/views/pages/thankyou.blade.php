@extends('layouts.app')

@section('title', '')

@section('content')

    <div class="thank-you-section">
        <h1>Ačiū! <br> Lauksim sugrįžtant!</h1>
        <p style="color: lightgrey">Patvirtinimas laukia jūsų pašte</p>
        <div class="spacer"></div>
        <div>
            <a href="{{ url('/') }}" class="buttonX">Pagrindinis</a>
        </div>
    </div>



    <section class="section">
    </section>
@endsection
