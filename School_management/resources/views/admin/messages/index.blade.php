@extends('admin.header')
@section('adminContent')
<div>
    <center><h1><i>Liste des messages</i></h1></center><br>
    @if(isset($messages))
    @foreach($messages as $message)
    <div style="display: flex; justify-content: space-between;">
        <div>
            <h5>{{ $message->Etudiant }}</h5> {{ $message->created_at }}
            {{ $message->Message }}
        </div>
        
    </div>
    <hr width="100%">
    @endforeach
   @endif
</div> 
@endsection
