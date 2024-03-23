@extends('prof.header')
@section('contentStudent')
@php
    use App\Models\Prof;
    use App\Models\Module;
    use App\Models\MessageProf;
    use App\Models\Etudiant;
    use App\Models\Groupe;
    use App\Models\FiliéresProf;
    use App\Models\Filiére;
    $prof = Prof::findOrFail(Auth::user()->id);
    $module = Module::findOrFail($prof->Module);

    $filieres = FiliéresProf::where('id_prof',Auth::user()->id)->get();


    
$Liste_grp = array();
$dico_filiere= array();
$Liste_etudiant = array();
$dico_grp= array();

foreach($filieres as $filiere){
    $filiere1 = Filiére::findOrFail($filiere->id);
    $groupes = Groupe::where('Filiére',$filiere1->id)->get();
    foreach ($groupes as $group) {
        $Etudiants=Etudiant::where('Groupe',$group->id_groupe)->get();
        array_push($Liste_grp, $group->id_groupe."/".$group->Nom);
        foreach ($Etudiants as $Etudiant) {
            array_push($Liste_etudiant , $Etudiant->id_etudiant."/".$Etudiant->Nom);
        }
        $dico_grp[$group->Nom] = $Liste_etudiant;
        $Liste_etudiant=array();
    }
    $dico_filiere[$filiere1->Nom]=$Liste_grp;
    $Liste_grp = array();
}
@endphp




<style>
    .total{
        width: 1000px;
        margin: auto;
        text-align: center;
    }
</style>


<center><h1>Edit Date Examen</h1></center><br>
<div class="container total">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('exams.update',$exam['id_exam'])}}" method="POST" class="row">
        @csrf
        @method("PUT")
        <div class="col-6 mb-3">
        
            <label  class=" form-label">  filiere :</label><br>
            <select id="filiere" class="form-select" name="filiere" placeholder="filiere" onchange="change(this.value)">
                <option></option>
                    <script>
                        var dico = {!! json_encode($dico_filiere) !!};
                        var dico2 = {!! json_encode($dico_grp) !!};
        
        
                        var selectElement = document.getElementById("filiere");
                        
        
                        for (var key in dico) {
                        if (dico.hasOwnProperty(key)) {
                            var option = document.createElement("option");
                            option.value = key;
                            option.text = key;
                            selectElement.append(option);
                        }
                        }
        
                    </script>
                </select><br>
        </div>
        <div class="col-6">
        
            <label  class=" form-label">  Groupe :</label><br>
            <select id="additionalSelect" name="grp" value="{{$exam->groupe}}" class="form-select" onchange="change2(this.value)">
    
                <option></option>
                    <script>
                        function change(value) {
                                var selectElement = document.getElementById("additionalSelect");
                                var liste = dico[value];
                                selectElement.innerHTML = "";

                                var emptyOption = document.createElement("option");
                                selectElement.appendChild(emptyOption);

                                for (var i = 0; i < liste.length; i++) {
                                    var splitValue = liste[i].split("/"); // Sépare l'ID du groupe et le nom du groupe
                                    var option = document.createElement("option");
                                    option.value = splitValue[0]; // Assigne l'ID du groupe à la valeur de l'option
                                    option.text = splitValue[1]; // Assigne le nom du groupe au texte de l'option
                                    selectElement.appendChild(option);
                                }
                            }
    
    
                    </script>
            </select>
        </div>
        <div class="col-md-6 mb-5">
            <input type="text" name="titre" placeholder="Title" value="{{$exam->titre}}" class="form-control" required>
        </div>
        <input type="hidden"  name="module" value="{{ $module->Nom }}">
        <div class="col-md-6">
            <input type="date" name="date" value="{{$exam->Date}}" class="form-control" required>
        </div>
        <div class="col-md-6 mb-5">
            <input type="text" name="disc" value="{{$exam->disc}}" placeholder="Description" class="form-control">
        </div>
        <div class="col-md-6">
            <input type="text" name="heur" value="{{$exam->heur}}" placeholder="Hour" class="form-control" required>
        </div>
        <div class="col-md-12">
            <center>
                <button type="submit" class="btn text-white col-3" style="background-color: #f5a425">Edit</button>
            </center>
        </div>
    </form>

</div>
@endsection     