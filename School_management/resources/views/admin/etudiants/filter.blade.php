@extends('admin.header')
@section('adminContent')
@php
    use App\Models\Prof;
    use App\Models\MessageProf;
    use App\Models\Etudiant;
    use App\Models\Groupe;
    use App\Models\FiliéresProf;
    use App\Models\Filiére;
    $etudiants=Etudiant::where("Groupe",$grp)->get();
@endphp
    <div class="container">
        <center><h1><i>ADD Students</i></h1></center><br>
        <form method="POST" action="{{ route('adminEtudiant.store') }}" class="row" enctype="multipart/form-data">
            @csrf

            <div class="col-md-6">
                <label for="name" class="col-md-12 col-form-label ">{{ __('Name') }}</label>

                <div>
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            

            <div class="col-md-6">
                <label for="email" class="col-md-12 col-form-label ">{{ __('Email Address') }}</label>

                <div>
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <label for="password" class="col-md-12 col-form-label ">{{ __('Password') }}</label>

                <div class="">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="col-md-6">
                <label for="password-confirm" class="col-md-12 col-form-label ">{{ __('Confirm Password') }}</label>

                <div class="">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                </div>
            </div>
            <div class="col-md-6">
                <label for="" class="col-md-12 col-form-label ">{{ __('Birthday') }}</label>

                <div class="">
                    <input id="" type="date" class="form-control" name="date" required >
                </div>
            </div>
            <div class="col-md-6">
                <label for="" class="col-md-12 col-form-label ">{{ __('Age') }}</label>

                <div class="">
                    <input id="" type="number" class="form-control" name="age" required >
                </div>
            </div>
            <div class="col-md-6">
                <label for="" class="col-md-12 col-form-label ">{{ __('Matricule') }}</label>

                <div class="">
                    <input id="" type="number" class="form-control" name="matricule" required >
                </div>
            </div>
            <div class="col-md-6 mt-2">
                <label for="" class="col-md-12 col-form-label ">{{ __('Sexe') }}</label>

                <div class="form-check">
                    <input class="form-check-input" type="radio" name="sexe" id="gender_man" value="man">
                    <label class="form-check-label" for="gender_man" style="margin-right: 50px;">Man</label>

                    <input class="form-check-input" type="radio" name="sexe" id="gender_woman" value="woman">
                    <label class="form-check-label" for="gender_woman">Woman</label>
                </div>
            </div>
            <div class="col-md-12">
                <label for="email" class="col-md-12 col-form-label ">{{ __('Profile') }}</label>

                <div>
                    <input id="img"  type="file"  class="form-control" name="img" value="{{old('img')}}">
                </div>
            </div>
            <input type="hidden" value="etudiants" name="role" >
            <input type="hidden" value="{{$grp}}" name="grp" >


            <center>
                <br>
                <button type="submit" class="btn btn-primary col-4">
                    {{ __('Add') }}
                </button>

            </center>

        </form>
        
    </div> 
@endsection