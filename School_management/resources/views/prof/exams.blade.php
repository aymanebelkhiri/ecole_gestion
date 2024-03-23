@extends('prof.header')
@section('contentStudent')
@php
    use App\Models\Prof;
    use App\Models\Module;
    use App\Models\Exam;
    use App\Models\Groupe;
    $prof = Prof::findOrFail(Auth::user()->id);
    $module = Module::findOrFail($prof->Module);
    $exams = Exam::where('module',$module->Nom)->get();
    
@endphp




<style>
    .total{
        width: 1000px;
        margin: auto;
        text-align: center;

    }
</style>
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

<center><h1>Exams</h1></center><br>
<div class="container total">
    @if($success)
    <div class="alert alert-success">
        {{ $success}}
    </div>
    @endif

    <a href="{{route('exams.create')}}" class="btn btn-primary col-3 " >Add exam</a>
    <table id="example" class="table table-hover" style="width:100%">
        <thead>
            <tr class="bg-light">
                <th>Titre</th>
                <th>Module</th>
                <th>Date</th>
                <th>Heur</th>
                <th>Description</th>
                <th>Groupes</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($exams as $exam)
            @php
                $Groupe = Groupe::findOrFail($exam->groupe);
            @endphp
                <tr>
                    <td>{{$exam->titre}}</td>
                    <td>{{$exam->module}}</td>
                    <td>{{$exam->Date}}</td>
                    <td>{{$exam->heur}}</td>
                    <td>{{$exam->disc}}</td>
                    <td>{{$Groupe->Nom}}</td>
                    <td class="row">
                        <a href="{{route('exams.edit',$exam['id_exam'])}}" class="btn btn-success col-4">Edit</a>
                        <form action="{{ route('exams.destroy', $exam['id_exam']) }}" class="col-1" method="post">
                            @csrf
                            @method("DELETE")
                            <button type="submit" class="btn btn-danger  ">Delete</button>
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
