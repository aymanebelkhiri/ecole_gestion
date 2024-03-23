  @extends('admin.header')
  @section('adminContent')
  @php
    use App\Models\Prof;
    use App\Models\MessageProf;
    use App\Models\Etudiant;
    use App\Models\Groupe;
    use App\Models\FiliéresProf;
    use App\Models\Filiére;
    use App\Models\Module;
    $filieres = Filiére::all();


    
    $Liste_grp = array();
    $dico_filiere= array();
    $Liste_module = array();
    $dico_filiere2= array();
    $Liste_etudiant = array();
    $dico_grp= array();
    $dico_module= array();
    
    foreach($filieres as $filiere1){
        $groupes = Groupe::where('Filiére',$filiere1->id)->get();
        $Modules = Module::where('Filiére',$filiere1->id)->get();
        foreach ($groupes as $group) {
            $Etudiants=Etudiant::where('Groupe',$group->id_groupe)->get();
            array_push($Liste_grp, $group->id_groupe."/".$group->Nom);
            foreach ($Etudiants as $Etudiant) {
                array_push($Liste_etudiant , $Etudiant->id_etudiant."/".$Etudiant->Nom);
            }
            $dico_grp[$group->Nom] = $Liste_etudiant;
            $Liste_etudiant=array();
        }
        foreach ($Modules as $Module) {
            array_push($Liste_module, $Module->id_module."/".$Module->Nom);  
        }
        $dico_filiere[$filiere1->Nom]=$Liste_grp;
        $dico_filiere2[$filiere1->Nom]=$Liste_module;
        $Liste_grp = array();
    }

@endphp
<div class="container">
  
  <center><h1><i>Ajouter un prof</i></h1></center><br><br>
  
      
       <form action="{{ route('profs.store') }}" method="POST" class="row">
          @csrf
    <div class="mb-3 col-6">
      <label for="nom" class="form-label">Nom </label>
      <input type="text" class="form-control" id="nom" name='nom'>
    </div>

    <div class="mb-3 col-6">
      <label for="sexe" class="form-label">Sexe </label>
      <input type="text" class="form-control" id="sexe" name='sexe'>
    </div>
    <div class="mb-3 col-6">
      <label for="email" class="form-label">Email </label>
      <input type="email" class="form-control" id="email" name='email'>
  </div>
  <div class="mb-3 col-6">
      <label for="Password" class="form-label">Password </label>
      <input type="password" class="form-control" id="Password" name='password'>
  </div>
  {{-- -------------------------------------- --}}
  <div class="col-6">
        
    <label  class=" form-label">  filiere :</label><br>
    <select id="filiere" class="form-select" name="filiere" placeholder="filiere" onchange="change(this.value)">
        <option></option>
            <script>
                var dico = {!! json_encode($dico_filiere) !!};
                var dico2 = {!! json_encode($dico_grp) !!};
                var dico3 = {!! json_encode($dico_filiere2) !!};


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
                        var selectElement = document.getElementById("additionalSelect2");
                        var liste = dico3[value];
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
  {{-- -------------------------------------- --}}

    <div class="mb-3 col-12">
      <label for="S" class="form-label">Modules</label>
      <select id="additionalSelect2" class="form-select" id="S" name='module'>
          <option value=""></option>
      </select>      
    </div>

    <br><br>
    <button type="submit" class="btn btn-primary">Add</button>
  </form>
</div>
@endsection