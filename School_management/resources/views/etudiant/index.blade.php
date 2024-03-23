@extends('etudiant.header')
@section('contentStudent')
@php
    use App\Models\Etudiant;
    // Récupérer l'étudiant associé à l'utilisateur actuellement authentifié
    $etudiant = Etudiant::where('id_etudiant', Auth::user()->id)->first();
@endphp




<style>
  .total{
    width: 1000px;
    margin: auto;
    text-align: center;
  }
</style>


<div class="container total">
  <center><h1>Personal Information</h1></center><br><br>
  <div class="row">
    <div class="col-md-6">
      <p><strong>Matricule:</strong> {{$etudiant->Matricule}}</p>
      <p><strong>Nom:</strong> {{$etudiant->Nom}}</p>
      <p><strong>Sexe:</strong> {{$etudiant->Sexe}}</p>
    </div>
    <div class="col-md-6">
      <p><strong>Prénom:</strong> {{$etudiant->Prenom}}</p>
      <p><strong>Age:</strong> {{$etudiant->Age}}</p>
      <p><strong>Date de naissance:</strong> {{$etudiant->DateNaissance}}</p>
    </div>
  </div>
</div>



@endsection
