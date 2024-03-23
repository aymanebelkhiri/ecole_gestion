@extends('admin.header')
@section('adminContent')
<br><br><br><br><br><br>
<center><h1><i>Ajouter un groupe</i></h1></center><br><br>

    
     <form action="{{ route('filiéres.store') }}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="nom" class="form-label">Nom </label>
    <input type="text" class="form-control" id="nom" name='nom'>
  </div>
  <div class="mb-3">
    <label for="desc" class="form-label">Description </label>
    <input type="text" class="form-control" id="desc" name='description'>
  </div>
  <div class="mb-3">
    <label for="domaine" class="form-label">Domaine </label>
    <input type="text" class="form-control" id="domaine" name='domaine'>
  </div>
  
  <button type="submit" class="btn btn-primary">Ajouter</button>
</form>
@endsection