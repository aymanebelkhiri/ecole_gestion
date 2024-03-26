@php
    use App\Models\Filiére;
@endphp
@extends('admin.header')
@section('adminContent')
<div>
        <center><h1><i>Liste des Modules</i></h1></center><br>
        <a href="{{ route('modules.create') }}" class='btn btn-primary'> Ajouer un module</a>
        <br><br>
        @if(isset($success))
        <div style='background-color:green'>{{$success}}</div>
        @endif

        @if(session('Echec'))
        <div style='background-color:green'>{{session('Echec')}}</div>
        @endif
        <table class='table table-striped'>
            <tr>
                <th scope='col'>Id</th>
                <th scope='col'>Nom </th>
                <th scope='col'>Masse horaire</th>
                <th scope='col'>Coefficient</th>
                <th scope='col'>Filiére</th>
                <th scope='col'>Action</th>
            </tr>
            @if(isset($Modules))
            @foreach($Modules as $Module)
            <tr>
                <td class='table-primary'>{{$Module->id_module}}</td>
                <td class='table-primary'>{{$Module->Nom}}</td>
                <td class='table-primary'>{{$Module->MasseHoraire}}</td>
                <td class='table-primary'>{{$Module->Coefficient}}</td>
                @php

                    $filiere=Filiére::findOrFail($Module->Filiére);
                @endphp
                <td class='table-primary'>{{$filiere->Nom}}</td>
                <td class='table-primary'>
                <a href="{{ route('modules.edit', $Module->id_module) }}" class='btn btn-success'>Modifier</a>   
                <form id="delete-form-{{$Module->id_module}}" action="{{ route('modules.destroy', $Module->id_module) }}" method="POST" style="display: inline;">
                     @csrf
                     @method('DELETE')
                     <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
                </td>
            </tr>   
            @endforeach
            @endif
        </table> 
    </div> 
@endsection