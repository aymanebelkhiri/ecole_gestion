@extends('header')

@section('title', $course->Nom)

@section('content')
<style>
    .total {
        min-height: calc(100vh - 80px); /* 80px est la hauteur du footer */
        width: 70%;
    }

    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 80px; /* Hauteur du footer */
    }
</style>
<br><br>
<center>
    <div class="container mt-5 total card "  >
        <div class="container mt-5 card-body">
            <center>
                <h1>{{ $course->Nom }}</h1>
            <img src="{{ asset("storage/". $course->photo) }}" width="100%" height="500px" alt=""><br><br>
                <p>{{ $course->Description }}</p>
            </center>

        </div>
    </div>
</center>
<br><br><br><br><br><br>


@endsection
