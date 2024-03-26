
@extends('header')
@section('content')


    <br><br><br><br><br>
    <style>
        aside{
            margin-top: -40px;
            padding: 10px;
            padding-top:0px ;
            background-color: #222e47;
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
        .art{
            flex: 1
        }
    </style>


    <section class="d-flex">

        <aside><br>
            <center>
            <svg xmlns="http://www.w3.org/2000/svg" width="65" height="65" viewBox="0 0 24 24"><path fill="white" d="M12 4a4 4 0 0 1 4 4a4 4 0 0 1-4 4a4 4 0 0 1-4-4a4 4 0 0 1 4-4m0 10c4.42 0 8 1.79 8 4v2H4v-2c0-2.21 3.58-4 8-4"/></svg>
            <h4 style="color: #f5a425;">Admin:<br>{{Auth::user()->name}}</h4>
            </center>
            <hr>
            <div><a href="{{route('filiéres.index')}}" style="padding:15px 35px;">Filiéres</a></div>
            <div><a href="{{route('modules.index')}}" style="padding:15px 35px;">Module</a></div>
            <div><a href="{{route('groupes.index')}}" style="padding:15px 35px;">Groupes</a></div>
            <div><a href="{{route('profs.index')}}">Professeurs</a></div>
            <div><a href="{{route('addEtudiant')}}">Etudiant</a></div>
            <div><a href="{{route('events.index')}}">Events</a></div>
            <div><a href="{{ route('Messages')}}"> Messages</a></div>
            <div><a href="{{route('contactAdmin.index')}}"> Contact</a></div>
            <br><br><br><br><br>
            <br><br><br><br><br>
        </aside>


        <article class="art">
            <!-- content -->
            @yield("adminContent")
        </article>
    </section>



    @endsection
