@extends('admin.header')
@section('adminContent')
<div>
        <center><h1><i>Liste des Filiéres</i></h1></center><br>
        <a href="{{ route('filiéres.create') }}" class='btn btn-primary'> Ajouer un Filiére</a>
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
                <th scope='col'>Description</th>
                <th scope='col'>Domaine</th>
                <th scope='col'>Action</th>
            </tr>
            @if(isset($Filiéres))
            @foreach($Filiéres as $Filiére)
            <tr>
                <td class='table-primary'>{{$Filiére->id}}</td>
                <td class='table-primary'>{{$Filiére->Nom}}</td>
                <td class='table-primary'>{{$Filiére->Description}}</td>
                <td class='table-primary'>{{$Filiére->Domaine}}</td>
                <td class='table-primary'>
                <a href="{{ route('filiéres.edit', $Filiére->id) }}" class='btn btn-success'>Modifier</a>   
                <form id="delete-form-{{$Filiére->id}}" action="{{ route('filiéres.destroy', $Filiére->id) }}" method="POST" style="display: inline;">
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