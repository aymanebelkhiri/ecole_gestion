@extends('admin.header')
@section('adminContent')
<center><h1><i>modifier un Filiére</i></h1></center>
<form action="{{ route('filiéres.update',$Filiére->id) }}" method='POST'>
    @csrf
    @method('PUT')
    <div class="mb-3">
       <label for="nom" class="form-label">Nom </label>
       <input type="text" class="form-control" id="nom" name='Nom' value='{{$Filiére->Nom}}'>
    </div>
    <div class="mb-3">
       <label for="description" class="form-label">description </label>
       <input type="text" class="form-control" id="description" name='description' value='{{$Filiére->Description}}'>
    </div>
    <div class="mb-3">
       <label for="domaine" class="form-label">domaine </label>
       <input type="text" class="form-control" id="domaine" name='domaine' value='{{$Filiére->Domaine}}'>
    </div>
    
   <button type='submit' class='btn btn-primary'>Ajouter</button>
@endsection