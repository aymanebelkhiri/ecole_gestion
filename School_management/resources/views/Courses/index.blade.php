@extends('header')
@section('title', 'All Modules')

@section('content')
<style>
    .total {
        min-height: calc(100vh - 80px); /* 80px est la hauteur du footer */
    }

    footer {
        position: fixed;
        bottom: 0;
        left: 0;
        width: 100%;
        height: 80px; /* Hauteur du footer */
    }
</style>
<br><br><br><br>

<div class="container total">
    <center>
        <h1>Courses</h1>
    </center>
    <br>
    <div class="row">
        @foreach($courses as $course)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/'. $course->photo) }}" class="card-img-top" alt="{{ $course->Nom }}" style="height: 250px; object-fit: cover;">
                <div class="card-body">
                    <h3 class="card-title">{{ $course->Nom }}</h3>
                    <p class="card-text">{{ $course->description }}</p>
                    <a href="{{ route('Courses.show', $course->id) }}" class="btn btn-primary">See More</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>


</div>


<br><br><br>
@endsection
