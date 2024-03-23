@extends('admin.header')
@section('adminContent')
<div class="container">

  <center><h1><i>Modifier le prof</i></h1></center>
  <form action="{{ route('profs.update',$Prof->id_prof) }}" method='POST' class="row">
      @csrf
      @method('PUT')
      <div class="mb-3 col-6">
      <label for="nom" class="form-label">Nom </label>
      <input type="text" class="form-control" id="nom" name='nom' value='{{$Prof->Nom}}'>
    </div>

    <div class="mb-3 col-6">
      <label for="sexe" class="form-label">Sexe </label>
      <input type="text" class="form-control" id="sexe" name='sexe' value='{{$Prof->Sexe}}'>
    </div>
    <div class="mb-3 col-6">
      <label for="email" class="form-label">Email </label>
      <input type="email" class="form-control" id="email" name='email' value='{{$Prof->Email}}'>
  </div>
    <div class="mb-3 col-6">
      <label for="S" class="form-label">Modules</label>
      <select  class="form-control" id="S" name='Module' value='{{$Prof->Module}}'>
          @isset($Modules)
          @foreach ($Modules as $Module )
            <option value='{{$Module->Nom}}'>{{$Module->Nom}}</option>
          @endforeach
          @endisset
      </select>      
    </div>
    <button type="submit" class="btn btn-primary">Modifier</button>
</div>
@endsection