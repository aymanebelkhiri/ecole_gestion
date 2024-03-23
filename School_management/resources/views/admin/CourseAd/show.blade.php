@extends('header')
<br>
<br>
<br>
<br>
<br>
<br>
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">{{$course ->Nom }}</div>

            <div class="card-body">
                <p><strong>Description:</strong> {{ $course ->description }}</p>
                <p><strong>Masse Horaire:</strong> {{ $course ->MasseHoraire }}</p>
                <p><strong>Coefficient:</strong> {{ $course ->Coefficient }}</p>
                @if ($course ->image)
                    <img src="{{ asset('storage/images/' . $course ->image) }}" alt="{{ $course ->Nom }}" class="img-fluid">
                @else
                    <p>No image available</p>
                @endif
            </div>
        </div>
    </div>
@endsection
