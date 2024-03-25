@extends('etudiant.header')
@section('contentStudent')
@php
    use App\Models\Etudiant;
    use App\Models\Groupe;
    use App\Models\Filiére;
    use App\Models\Module;
    use App\Models\Note;

    $etudiant = Etudiant::where('id_etudiant', $id)->first();
    $grp = Groupe::findOrFail($etudiant->Groupe);
    $filiere = Filiére::findOrFail($grp->Filiére);
    $Modules = Module::where('Filiére', $filiere->id)->get();
    $notesParModule = [];

    foreach ($Modules as $Module) {

        $notes = Note::where('Etudiant',auth()->user()->id)
                      ->where('Module', $Module->id_module)
                      ->get();

        $notesParModule[$Module->Nom] = $notes;
    }
@endphp

<style>
    .total {
        width: 1000px;
        margin: auto;
        text-align: center;
    }
</style>

<div class="container total">
    <center><h1>Notes</h1></center><br><br>
    @foreach ($Modules as $Module)
    <table class="table table-light table-responsive-xl table-striped mb-5 ">
        <thead>
            <tr class="table-active ">
                <th><br></th>
                @foreach ($notesParModule[$Module->Nom] as $note)
                <th>
                        <strong>{{ $note->Title }}</strong><br><small>{{ $note->date }}</small> 
                    </th>
                    @endforeach
            </tr> 
        </thead>
        <tbody>
            <tr>
                <th>{{ $Module->Nom }}</th>
                @foreach ($notesParModule[$Module->Nom] as $note)
                <td>
                        {{ $note->Valeur }}<br>
                    </td>
                    @endforeach

            </tr>
        </tbody>
    </table>
    @endforeach
</div>

@endsection
