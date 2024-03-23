@extends('header')
<br>
<br>
<br>
<br>
<br>
<br>
@section('title', $course->Nom)

@section('content')
<center>
<div class="container mt-5">
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $course->Nom }}</h1>
                <p>{{ $course->Description }}</p>
            </div>                     
            </div>
        </div>   
</div>
<br>
<br>
<br>
<br>
</center>
@endsection
