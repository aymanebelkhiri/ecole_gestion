
@extends('header')
    @section('content')

    @php
    use App\Models\Etudiant;
    use Illuminate\Support\Facades\Auth;
    $etudiant = Etudiant::where('id_etudiant', Auth::user()->id)->first();
    @endphp
    <br><br><br><br><br>
    <style>
        aside{
            margin-top: -40px;
            padding: 10px;
            padding-top:0px ;
            background-color: #222e47;
            height: 1252px;
            font-family:Arial, Helvetica, sans-serif;
            width: 250px;
            box-sizing: border-box;
            text-align: center;
        }
        aside div {
            margin-bottom: 40px;
            color: white;
            text-align: center;
            box-sizing: border-box;
        }
        aside div a {
            color: white;
            padding: 15px 57px;
            text-decoration: none
            
        }
        aside div a:hover{
            border: 2px solid #f5a425;
            color: white;
        }
        .menu2{
            display: none;
        }
    </style>


    <section class="d-flex">

        <aside style="box-sizing:border-box;">
            <center>
                @if ($etudiant->photo)
                    <img src="{{ asset('storage/'. $etudiant->photo) }}" width="88" height="100" alt="Description de l'image">
                    
                    @else
                    <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 24 24"><path fill="white" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
                @endif
                <h4 style="color: #f5a425;">{{$etudiant->Nom}}</h4>
            </center>
            
            <hr>
            <div><a href="{{ route('etudiant') }}" style="padding:15px 35px;">Personal Info </a></div>

            <div><a href="{{route('Emploi')}}">Emploi</a></div>
            <div><a href="{{ route('Notes', Auth::user()->id) }}">Notes</a></div>
            <div><a href="{{ route('Events') }}">Events</a></div>
            <div><a href="{{ route('Exams') }}">Exams</a></div>
            <div><a href="{{ route('Absences',$etudiant['id_etudiant']) }}">absence</a></div>
            <div><a href="{{ route('messageTeacher') }}" style="padding:15px 10px;"> Message  To Teacher</a></div>
            <div><a href="{{ route('messageSecretary') }}"style="padding:15px 10px;"> Message  To Secretary</a></div>
            <br><br><br><br><br>
            <br><br><br><br><br>
        </aside>


        <article style="box-sizing: border-box" >
            @yield("contentStudent")
        </article>
    </section>



    @endsection
