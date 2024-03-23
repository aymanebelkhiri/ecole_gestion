@extends('admin.header')
@section('adminContent')
<div>
        <center><h1><i>Liste des groupes</i></h1></center><br>
        <a href="{{ route('groupes.create') }}" class='btn btn-primary'> Ajouer un Groupe</a>
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
                <th scope='col'>Effectif</th>
                <th scope='col'>Filiére</th>
                <th scope='col'>Action</th>
            </tr>
            @if(isset($Groupes))
            @foreach($Groupes as $Groupe)
            <tr>
                <td class='table-primary'>{{$Groupe->id_groupe}}</td>
                <td class='table-primary'>{{$Groupe->Nom}}</td>
                <td class='table-primary'>{{$Groupe->Effectif}}</td>
                <td class='table-primary'>{{$Groupe->Filiére}}</td>
                <td class='table-primary'>
                <a href="{{ route('groupes.edit', $Groupe->id_groupe) }}" class='btn btn-success'>Modifier</a>   
                <form id="delete-form-{{$Groupe->id_groupe}}" action="{{ route('groupes.destroy', $Groupe->id_groupe) }}" method="POST" style="display: inline;">
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