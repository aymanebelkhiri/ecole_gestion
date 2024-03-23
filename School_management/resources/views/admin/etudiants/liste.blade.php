@extends('admin.header')
@section('adminContent')
@php
    use App\Models\Prof;
    use App\Models\MessageProf;
    use App\Models\Etudiant;
    use App\Models\Groupe;
    use App\Models\FiliéresProf;
    use App\Models\Filiére;
    $Etudiants=Etudiant::where("Groupe",$data["grp"])->get();
@endphp
    <head>
        <!-- Include jQuery -->
        <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
        <!-- Include Bootstrap Bundle (includes Popper.js) -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
        <!-- Include DataTables -->
        <script src="https://cdn.datatables.net/2.0.1/js/dataTables.js"></script>
        <!-- Include DataTables Bootstrap 5 integration -->
        <script src="https://cdn.datatables.net/2.0.1/js/dataTables.bootstrap5.js"></script>
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
        <!-- DataTables Bootstrap 5 CSS -->
        <link rel="stylesheet" href="https://cdn.datatables.net/2.0.1/css/dataTables.bootstrap5.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        
    </head>
    <div class="container">
        <center><h1>List Students</h1></center><br><br>
        @if(isset($success))
            <div class="alert alert-success">
                {{$success }}
            </div>
        @endif
        <center><a href="{{route("etude",$data["grp"])}}" class="btn btn-primary col-4">New Student</a></center>
        <table id="example" class="table table-hover" style="width:100%">
            <thead>
                <tr class="bg-light">
                    <th>Picture</th>
                    <th>Full Name</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Etudiants as $Etudiant)
                <tr>
                    <td>photo</td>
                    <td>{{$Etudiant->Nom}}</td>
                    <td class="row" style="box-sizing: border-box " class="wrap"  >
                        <a href="{{route('adminEtudiant.edit',$Etudiant->id_etudiant."*".$data['grp'])}}" class="btn btn-secondary col-2">Edit</a>
                        <form  action="{{route('adminEtudiant.destroy',$Etudiant->id_etudiant."*".$data['grp'])}}" method="post" class="col-6">
                            @csrf
                            @method("DELETE")
                            <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                        
                    </td>
                </tr>
                @endforeach
                
                
            </tbody>
            
        </table>
    </div> 
    <script>
        new DataTable('#example');
    </script>
@endsection