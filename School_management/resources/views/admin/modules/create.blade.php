@extends('admin.header')
@section('adminContent')
<br><br><br><br><br><br>
<center><h1><i>Ajouter un Module</i></h1></center><br><br>

    
     <form action="{{ route('modules.store') }}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="nom" class="form-label">Nom </label>
    <input type="text" class="form-control" id="nom" name='nom'>
  </div>
  <div class="mb-3">
    <label for="MH" class="form-label">Masse horaire </label>
    <input type="number" class="form-control" id="MH" name='MasseH'>
  </div>
  <div class="mb-3">
    <label for="C" class="form-label">Coefficient </label>
    <input type="number" class="form-control" id="C" name='Coefficient'>
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
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
@endsection