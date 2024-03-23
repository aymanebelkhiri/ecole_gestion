@extends('prof.header')
@section('contentStudent')
@php
    use App\Models\Prof;
    use App\Models\Module;
    use Illuminate\Support\Facades\Auth;
    if(Auth::check()){
        $prof = Prof::findOrFail(Auth::user()->id);
        $module = Module::findOrFail($prof->Module);

    }else {
        view("auth.login");
    }
@endphp



<style>
    .total{
        width: 1000px;
        margin: auto;
        text-align: center;

    }
</style>


<center><h1>Personal Information</h1></center><br>
<div class="container total">
    <div class="row">
        <div class="col-md-6">
            <p><strong>Email:</strong> {{$prof->Email}}</p>
            <p><strong>Nom:</strong> {{$prof->Nom}}</p>
            <p><strong>Sexe:</strong> {{$prof->Sexe}}</p>
            </div>
            <div class="col-md-6">
            <p><strong>Prénom:</strong> {{$prof->Prenom}}</p>
            <p><strong>Module:</strong> {{$module->Nom}}</p>
        </div>
    </div>
</div>
@endsection
