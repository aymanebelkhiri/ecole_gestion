@extends('admin.header')
@section('adminContent')
<center><h1><i>modifier un module</i></h1></center>
<form action="{{ route('modules.update',$Module->id_module) }}" method='POST'>
    @csrf
    @method('PUT')
    <div class="mb-3">
       <label for="nom" class="form-label">Nom </label>
       <input type="text" class="form-control" id="nom" name='Nom' value='{{$Module->Nom}}'>
    </div>
    <div class="mb-3">
       <label for="MH" class="form-label">Masse horaire </label>
       <input type="number" class="form-control" id="MH" name='MasseH' value='{{$Module->MasseHoraire}}'>
    </div>
    <div class="mb-3">
       <label for="C" class="form-label">Coefficient </label>
       <input type="number" class="form-control" id="C" name='Coefficient' value='{{$Module->Coefficient}}'>
    </div>
    <div class="mb-3">
    <label for="S" class="form-label">Filiéres</label>
    <select  class="form-control" id="S" name='filiére'>
        @isset($Filiéres)
        @foreach ($Filiéres as $Filiére )
          <option value='{{$Filiére->Nom}}'>{{$Filiére->Nom}}</option>
        @endforeach
        @endisset
    </select>      
  </div>
    
   <button type='submit' class='btn btn-primary'>Modifier</button>
@endsection