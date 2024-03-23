@extends('header')
<br>
<br>
<br>
<br>
<br>
<br>
@section('title', 'All Modules')

@section('content')
<div class="container">
    <div class="row">
        @foreach($courses as $course)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ $course->image_url }}" class="card-img-top" alt="{{ $course->Nom }}">
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
@endsection
