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


<h1>Edit or Delet Note</h1></><br>
<div class="container total ">
    <div style="width: 800px " >

        <form action="{{route('notes.update',$note->id_note)}}" method="post">
            
            @php
                $Etudiant=Etudiant::where("id_etudiant",$note->Etudiant)->first();
                $groupes = Groupe::findOrFail($Etudiant->Groupe);
                $notee = Note::findOrFail($note->id_note);
            @endphp
            @csrf
            @method("PUT")
            <input type="text" name="valeur" placeholder="Note" value="{{$note->Valeur}}" class="form-control col-8">
            <input type="hidden" name="grp" value="{{$groupes->id_groupe}}" class="form-control col-8">
            <input type="hidden" name="title" value="{{$notee->Title}}" class="form-control col-8">
            <input type="hidden" name="module" value="{{$notee->Module}}" class="form-control col-8">
            <br>
            <button type="submit" class="btn btn-primary col-2" style="float: left">Edit</button>
        </form>
        <a class="col-2"></a>
        <form action="{{route('notes.destroy',$note->id_note."*".$notee->Module."*".$groupes->id_groupe."*".$notee->Title)}}" method="post">
            @csrf
            @method("DELETE")
            <button type="submit" class="btn btn-danger col-2">Delete</button>
            <input type="hidden" name="module" value="{{$notee->Module}}" class="form-control col-8">
            <input type="hidden" name="grp" value="{{$groupes->id_groupe}}" class="form-control col-8">
            <input type="hidden" name="title" value="{{$notee->Title}}" class="form-control col-8">
        </form>
    </div>

</div>


@endsection
