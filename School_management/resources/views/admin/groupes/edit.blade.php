@extends('admin.header')
@section('adminContent')
<center><h1><i>modifier un groupe</i></h1></center>
<form action="{{ route('groupes.update',$Groupe->id_groupe) }}" method='POST'>
    @csrf
    @method('PUT')
    <div class="mb-3">
       <label for="nom" class="form-label">Nom </label>
       <input type="text" class="form-control" id="nom" name='Nom' value='{{$Groupe->Nom}}'>
    </div>
    <div class="mb-3">
       <label for="Effectif" class="form-label">Effectif </label>
       <input type="text" class="form-control" id="Effectif" name='Effectif' value='{{$Groupe->Effectif}}'>
    </div>
    <div class="mb-3">
    <label for="S" class="form-label">Filiéres</label>
    <select  class="form-control" id="S" name='filiére' value='{{$Groupe->Filiére}}'>
        @isset($Filiéres)
        @foreach ($Filiéres as $Filiére )
          <option value='{{$Filiére->Nom}}'>{{$Filiére->Nom}}</option>
        @endforeach
        @endisset
    </select>      
   </div>
   <button type='submit' class='btn btn-primary'>Ajouter</button>
@endsection