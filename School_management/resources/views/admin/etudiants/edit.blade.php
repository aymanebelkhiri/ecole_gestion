@extends('admin.header')
@section('adminContent')
@php
    use App\Models\Prof;
    use App\Models\MessageProf;
    use App\Models\Etudiant;
    use App\Models\Groupe;
    use App\Models\FiliéresProf;
    use App\Models\Filiére;
    $etudiant = Etudiant::where("id_etudiant",$id)->first();
@endphp
<div>
  <center><h1>Edit Student</h1></center><br><br>
  <form action="{{ route('adminEtudiant.update', $etudiant->id_etudiant) }}" class="row" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="col-md-6 mb-3">
        <label for="name" class="col-md-12 col-form-label">{{ __('Name') }}</label>
        <div>
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $etudiant->Nom }}" required autocomplete="name" autofocus>
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <label for="email" class="col-md-12 col-form-label">{{ __('Email Address') }}</label>
        <div>
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $etudiant->Email }}" required autocomplete="email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="col-md-6">
        <label for="" class="col-md-12 col-form-label">{{ __('Birthday') }}</label>
        <div class="">
            <input id="" type="date" class="form-control" value="{{ $etudiant->DateNaissance }}" name="date" required>
        </div>
    </div>

    <div class="col-md-6">
        <label for="" class="col-md-12 col-form-label">{{ __('Matricule') }}</label>
        <div class="">
            <input id="" type="number" class="form-control" value="{{ $etudiant->Matricule }}" name="matricule" required>
        </div>
    </div>

    <div class="col-md-12">
        <label for="img" class="col-md-12 col-form-label">{{ __('Profile') }}</label>
        <div>
            <input id="img"  type="file" class="form-control" name="img">
        </div>
    </div>

    <input type="hidden" value="{{ $grp }}" name="grp">

    <center>
        <br>
        <button type="submit" class="btn btn-primary col-4">
            {{ __('Edit') }}
        </button>
    </center>
</form>


</div>
@endsection