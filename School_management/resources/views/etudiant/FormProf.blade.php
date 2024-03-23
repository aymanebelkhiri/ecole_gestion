@extends('etudiant.header')
@section('contentStudent')
<article>
    <br><br>
    <div class="text-center"> 
        <h1><i>Message Your Teacher</i></h1>

        @if(isset($MessageSucces))
        <div  class='alert alert-success'>{{$MessageSucces}}</div>
        @endif

        @if(isset($MessageFail))
        <div  class='alert alert-danger'>{{$MeesageFail}}</div>
        @endif

        <h5>Choose your teacher</h5>
        <form action="{{ route('Send_message_Teacher') }}" method='POST'>
            @csrf
        @if(isset($Prof))
        <select class="form-select" name='Prof' aria-label="Default select example">
            <option selected>Teacher</option>
            @foreach($Prof as $Nom)
            <option value="{{$Nom}}">{{$Nom}}</option>
            @endforeach
        </select>
        @endif
        <h1><i>Message</i></h1>
        <textarea rows="5" name="message" style="width: 100%;"></textarea>
        <button class='btn btn-primary' type='submit' >Send Message</button>
    </div>
</article>
@endsection
