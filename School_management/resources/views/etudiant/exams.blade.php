@extends('etudiant.header')
@section('contentStudent')
<br><br><br><br><br><br><br>

<div class='container'>
    <center><h1><i>Planning exams</i></h1>
    <table class='table table-striped '>
        <thead>
            <tr>
                <th scope='col'>Date et Heure</th>
                <th scope='col'>Titre</th>
                <th scope='col'>Description</th>
                <th scope='col'>Module</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
            <tr>
                <td>{{$exam->Date}} {{$exam->heur}}</td>
                <td>{{$exam->titre}}</td>
                <td>{{$exam->disc}}</td>
                <td>{{$exam->module}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </center>
</div>
@endsection
