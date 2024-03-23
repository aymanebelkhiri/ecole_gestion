@extends('admin.header')
@section('adminContent')
<br><br><br><br><br><br>
<center><h1><i>Ajouter un groupe</i></h1></center><br><br>

    
     <form action="{{ route('groupes.store') }}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="nom" class="form-label">Nom </label>
    <input type="text" class="form-control" id="nom" name='nom'>
  </div>
  <div class="mb-3">
    <label for="Effectif" class="form-label">Effectif </label>
    <input type="text" class="form-control" id="Effectif" name='effectif'>
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