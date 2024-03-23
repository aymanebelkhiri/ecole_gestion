@extends('prof.header')
@section('contentStudent')
@php
    use App\Models\Prof;
    use App\Models\Note;
    use App\Models\MessageProf;
    use App\Models\Etudiant;
    use App\Models\Groupe;
    use App\Models\FiliéresProf;
    use App\Models\Filiére;
    $prof = Prof::findOrFail(Auth::user()->id);
    $Etudiants=Etudiant::where('Groupe',$data["grp"])->get();


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

<style>
    .total{
        width: 1000px;
        margin: auto;
        text-align: center;

    }
</style>


<center><h1>Notes</h1></center><br>
<div class="container total ">
    
    @if(isset($success))
        <div class="alert alert-success">
            {{ $success }}
        </div>
    @endif
        <table id="example" class="table table-hover" style="width:100%">
            <thead>
                <tr class="bg-light">
                    <th>Picture</th>
                    <th>Full Name</th>
                    <th>Add Note</th>
                    <th>Notes</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Etudiants as $Etudiant)
                <tr>
                    <td>photo</td>
                    <td>{{$Etudiant->Nom}}</td>
                    <td colspan="1">
                        <form action="{{ route('note.store2') }}" method="post" class="row">
                            @csrf
                            <div class="col-3">
                                <input type="text" name="note" class="form-control" style="width:70px;">
                            </div>
                            <input type="hidden" name="etudiant" value="{{ $Etudiant->id_etudiant }}" class="form-control">
                            <input type="hidden" name="title" value="{{ $data['title'] }}" class="form-control">
                            <input type="hidden" name="module" value="{{ $data['module'] }}" class="form-control">
                            <input type="hidden" name="grp" value="{{ $data['grp'] }}" class="form-control">
                            <div class="col-1">
                                <button class="btn btn-primary">add</button>

                            </div>
                        </form>
                        
                    </td>
                    <td class="row" >
                        @php
                            $notes = Note::where(['Etudiant' => $Etudiant->id_etudiant, 'Module' => $prof->Module])->get();
                        @endphp
                    
                        @foreach($notes as $note)
                                <a href="{{route('note.edit',$note->id_note)}}" class="btn col-2">{{$note->Valeur}}</a>
                        @endforeach
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
