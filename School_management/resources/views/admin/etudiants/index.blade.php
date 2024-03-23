@extends('admin.header')
@section('adminContent')
@php
    use App\Models\Prof;
    use App\Models\MessageProf;
    use App\Models\Etudiant;
    use App\Models\Groupe;
    use App\Models\FiliéresProf;
    use App\Models\Filiére;
    $filieres = Filiére::all();


    
    $Liste_grp = array();
    $dico_filiere= array();
    $Liste_etudiant = array();
    $dico_grp= array();
    
    foreach($filieres as $filiere1){
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
    <div class="container">
        <center><h1><i>Filter Students</i></h1></center><br>
        <form action="{{route('filtreretudiant')}}" method="post" class="row">
            @csrf
            <div class="col-6">
        
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
                <select id="additionalSelect" name="grp" class="form-select" onchange="change2(this.value)">
        
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
            <center>

                <button type="submit" class="btn btn-primary col-4">Filter</button>
            </center>
        </form>
        
    </div> 
@endsection