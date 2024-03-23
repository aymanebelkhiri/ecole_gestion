@extends('etudiant.header')
@section('contentStudent')
<div class="container">
   <center><h1><i>Absence</i></h1></center>
   <table border='0' class='table table-striped text-center'>
        <tr>
           <th scope='col'>Date</th>
           <th scope='col'>Etudiant</th>
           <th scope='col'>Masse Horaire</th>
        </tr>
        @foreach($Absences as $absence)
          <tr>
             <th class='table-primary'>{{$absence->created_at}}</th>
             <th class='table-primary'>{{$absence->module}}</th>
             <th class='table-primary'>{{$absence->MasseHoraire}}</th>
          </tr>  
        @endforeach
   
   </table>        
</div>
 
@endsection

