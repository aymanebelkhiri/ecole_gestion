@extends('etudiant.header')
@section('contentStudent')
<article>
    <br><br>
    <div class="text-center"> 
        <h1><i>Message Secretary</i></h1>

        @if(isset($MessageSucces))
        <div  class='alert alert-success'>{{$MessageSucces}}</div>
        @endif

        @if(isset($MessageFail))
        <div  class='alert alert-danger'>{{$MeesageFail}}</div>
        @endif
        <form action="{{ route('Send_message_secretary') }}" method='POST'>
            @csrf
        <h1><i>Message</i></h1>
        <textarea rows="5" name="message" style="width: 100%;"></textarea>
        <button class='btn btn-primary' type='submit' >Send Message</button>
    </div>
</article>
@endsection
