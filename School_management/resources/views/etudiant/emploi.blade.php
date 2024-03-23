@extends('etudiant.header')
@section('contentStudent')

<div class="container">
    <h2 class="text-center mb-4">Liste des Emplois</h2>
    <div class="table-responsive">
        <table class="table table-bordered table-striped table-sm text-center">
            <thead class="thead-light">
                <tr>
                    <th>Module</th>
                    <th>Professeur</th>
                    <th>Filière</th>
                    <th>Numéro de salle</th>
                    <th>Jour</th>
                    <th>Heure de début</th>
                    <th>Heure de fin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($Emploi as $emp)
                <tr>
                    <td>{{ $emp->module }}</td>
                    <td>{{ $emp->prof }}</td>
                    <td>{{ $emp->filiere }}</td>
                    <td>{{ $emp->salleNum }}</td>
                    <td>{{ $emp->day }}</td>
                    <td>{{ $emp->startTime }}</td>
                    <td>{{ $emp->endTime }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection 