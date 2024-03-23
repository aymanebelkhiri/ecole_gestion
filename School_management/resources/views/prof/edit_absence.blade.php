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
@endphp


<style>
    .total{
        width: 1000px;
        margin: auto;
        text-align: center;

    }
</style>


<h1>Edit or Delet Absence</h1></><br>
<div class="container total ">
    <div style="width: 800px " >

        <form action="{{route('absence.update',$Absence->id)}}" method="post">
            
            @php
                // $Etudiant=Etudiant::findOrFail($note->Etudiant);
                // $groupes = Groupe::findOrFail($Etudiant->Groupe);
                // $notee = Note::findOrFail($note->id_note);
            @endphp
            @csrf
            @method("PUT")
            <input type="text" name="MasseHoraire" placeholder="Hours" value="{{$Absence->MasseHoraire}}" class="form-control col-8">
            <input type="hidden" name="grp" value="{{$grp}}" class="form-control col-8">
            <br>
            <button type="submit" class="btn btn-primary col-2" style="float: left">Edit</button>
        </form>
        <a class="col-2"></a>
        <form action="{{route('absence.destroy',$Absence->id."*".$grp)}}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger col-2">Delete</button>
        </form>
    </div>

</div>


@endsection
