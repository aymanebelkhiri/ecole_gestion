@extends('admin.header')
@section('adminContent')
<div>
        <center><h1><i>Liste des Profs
        </i></h1></center><br>
        <a href="{{ route('profs.create') }}" class='btn btn-primary'> Ajouer Prof</a>
        <br><br>
        @if(isset($success))
        <div style='background-color:green'>{{$success}}</div>
        @endif

        @if(session('Echec'))
        <div style='background-color:green'>{{session('Echec')}}</div>
        @endif
        <table class='table table-striped'>
            <tr>
                <th scope='col'>Full Name </th>
                <th scope='col'>Sexe</th>
                <th scope='col'>Email</th>
                <th scope='col'>Module</th>
                <th scope='col'>Action</th>
            </tr>
            @if(isset($Profs))
            @foreach($Profs as $Prof)
            <tr>
                <td class='table-primary'>{{$Prof->Nom}}</td>
                <td class='table-primary'>{{$Prof->Sexe}}</td>
                <td class='table-primary'>{{$Prof->Email}}</td>
                <td class='table-primary'>{{$Prof->Module}}</td>
                <td class='table-primary'>
                <a href="{{ route('profs.edit', $Prof->id_prof) }}" class='btn btn-success'>Modifier</a>   
                <form id="delete-form-{{$Prof->id_prof}}" action="{{ route('profs.destroy', $Prof->id_prof) }}" method="POST" style="display: inline;">
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