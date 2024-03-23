@extends('prof.header')
@section('contentStudent')
@php
    use App\Models\Prof;
    use App\Models\MessageProf;
    use App\Models\Etudiant;
    use App\Models\Groupe;
    $prof = Prof::findOrFail(Auth::user()->id);

$messages = MessageProf::where('Prof', Auth::user()->id)
                        ->orderBy('created_at', 'desc')
                        ->get();

@endphp




<style>
    .total{
        width: 1000px;
        margin: auto;
        text-align: center;
        height: 53vh;
        overflow: scroll;
    }
</style>

<center><h1>Suduents' Messages</h1></center><br>
<div class="container total">
    @foreach($messages as $message)
        <table class="table table-hover">
            @php
                $Etudiant = Etudiant::where('id_etudiant',$message["Etudiant"])->first();

                $Group=Groupe::findOrFail($Etudiant->Groupe);
            @endphp
            <tr>
                <th>Etudiant</th>
                <th>Group Etudiant</th>
                <th>Message</th>
                <th>date</th>
            </tr>
            <tr>
                <td>{{$Etudiant['Nom']}}</td>
                <td>{{$Group['Nom']}}</td>
                <td>{{$message['Message']}}</td>
                <td>{{$message['created_at']}}</td>
            </tr>

        </table>
    @endforeach

</div>
@endsection
