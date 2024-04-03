
@php
    use App\Models\Prof;
    use App\Models\MessageProf;
    use App\Models\Etudiant;
    use App\Models\Groupe;
    use App\Models\FiliéresProf;
    use App\Models\Filiére;
    try {
        $prof = Prof::findOrFail(Auth::user()->id);
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
    } catch (\Throwable $th) {
        //throw $th;
    }
    

@endphp



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Marks</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    

    <!-- Favicon -->
    <link href="{{ url('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet"> 
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ url('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ url('lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css') }}" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ url('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ url('css/style.css') }}" rel="stylesheet">
    
</head>
@if (Route::has('login') && isset($prof) )
<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-secondary navbar-dark">
                <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>ISGI</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="#b8b8b8" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.96 11.947A4.99 4.99 0 0 1 9 14h6a4.99 4.99 0 0 1 3.96 1.947A8 8 0 0 0 12 4m7.943 14.076A9.959 9.959 0 0 0 22 12c0-5.523-4.477-10-10-10S2 6.477 2 12a9.958 9.958 0 0 0 2.057 6.076l-.005.018l.355.413A9.98 9.98 0 0 0 12 22a9.947 9.947 0 0 0 5.675-1.765a10.055 10.055 0 0 0 1.918-1.728l.355-.413zM12 6a3 3 0 1 0 0 6a3 3 0 0 0 0-6" clip-rule="evenodd"/></svg>
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{$prof->Nom}}</h6>
                        <span>Teacher</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{ route('examen') }}" class="nav-item nav-link "><i class="fa fa-table me-2"></i>Exams</a>
                    <a href="{{ route('addNote', Auth::user()->id) }}" class="nav-item nav-link active"><i class="fa fa-th me-2"></i>Marks</a>
                    <a href="{{ route('absence_prof_etudiant') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Absence</a>
                    {{-- <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Message</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{ route('messageTeacher') }}" class="dropdown-item">To Teacher</a>
                            <a href="{{ route('messageSecretary') }}" class="dropdown-item">To Secretary</a>
                        </div>
                    </div> --}}
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand bg-secondary navbar-dark sticky-top px-4 py-0">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0">
                    <i class="fa fa-bars"></i>
                </a>
                <form class="d-none d-md-flex ms-4">
                    <input class="form-control bg-dark border-0" type="search" placeholder="Search">
                </form>
                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <i class="fa fa-envelope me-lg-2"></i>
                            <span class="d-none d-lg-inline-flex">Message</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item">
                                <div class="d-flex align-items-center">
                                    <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                                    <div class="ms-2">
                                        <h6 class="fw-normal mb-0">Jhon send you a message</h6>
                                        <small>15 minutes ago</small>
                                    </div>
                                </div>
                            </a>
                            <hr class="dropdown-divider">
                            <a href="#" class="dropdown-item text-center">See all message</a>
                        </div>
                    </div>
                    
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 24 24"><path fill="#b8b8b8" fill-rule="evenodd" d="M12 4a8 8 0 0 0-6.96 11.947A4.99 4.99 0 0 1 9 14h6a4.99 4.99 0 0 1 3.96 1.947A8 8 0 0 0 12 4m7.943 14.076A9.959 9.959 0 0 0 22 12c0-5.523-4.477-10-10-10S2 6.477 2 12a9.958 9.958 0 0 0 2.057 6.076l-.005.018l.355.413A9.98 9.98 0 0 0 12 22a9.947 9.947 0 0 0 5.675-1.765a10.055 10.055 0 0 0 1.918-1.728l.355-.413zM12 6a3 3 0 1 0 0 6a3 3 0 0 0 0-6" clip-rule="evenodd"/></svg>
                            <span class="d-none d-lg-inline-flex">{{$prof->Nom}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end bg-secondary border-0 rounded-0 rounded-bottom m-0">
                            <a href="{{ route('prof') }}" class="dropdown-item">My Profile</a>
                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" class="dropdown-item">Log Out</a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-secondary text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Marks</h6>
                        
                        <a href="">Show All</a>
                    </div>
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive row ">
                        <form action="{{route('note.store')}}" method="post" class="row">
                            @csrf
                            <input type="hidden"  name="module" value="{{ $prof->Module }}">
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
                            
                
                            <br><br>
                            <div class="col-12 pt-3">
                                <label  class=" form-label">  Title :</label><br>
                                <input type="text" class="form-control" name="title" >
                            </div>
                            <br><br><br><br><br><br>
                            <center>
                                <button type="submit" class="btn col-4 btn-primary">Add Note</button>
                            </center>
                        </form>
                        
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->
            <script>
                new DataTable('#example');
            </script>
</div>
<!-- Content End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="{{ url('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('lib/chart/chart.min.js') }}"></script>
<script src="{{ url('lib/easing/easing.min.js') }}"></script>
<script src="{{ url('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ url('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ url('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ url('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ url('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ url('js/main.js') }}"></script>
</body>

</html>

@else
<body>
   <div class="container-fluid position-relative  p-0">

      <div class="row vh-100 bg-secondary rounded align-items-center justify-content-center mx-0">
            <div class="col-md-6 text-center p-4">
               <i class="bi bi-exclamation-triangle display-1 text-primary"></i>
               <h1 class="display-1 fw-bold">404</h1>
               <h1 class="mb-4">Page Not Found</h1>
               <p class="mb-4">We’re sorry, the page you have looked for does not exist in our website!
                  Maybe go to our home page or try to use a search?</p>
               <a class="btn btn-primary rounded-pill py-3 px-5" href="{{route('home')}}">Go Back To Home</a>
            </div>
      </div>

   <!-- 404 End -->



<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
</div>

<!-- JavaScript Libraries -->
<script src="{{ url('https://code.jquery.com/jquery-3.4.1.min.js') }}"></script>
<script src="{{ url('https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ url('lib/chart/chart.min.js') }}"></script>
<script src="{{ url('lib/easing/easing.min.js') }}"></script>
<script src="{{ url('lib/waypoints/waypoints.min.js') }}"></script>
<script src="{{ url('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ url('lib/tempusdominus/js/moment.min.js') }}"></script>
<script src="{{ url('lib/tempusdominus/js/moment-timezone.min.js') }}"></script>
<script src="{{ url('lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js') }}"></script>

<!-- Template Javascript -->
<script src="{{ url('js/main.js') }}"></script>

</body>

</html>
@endif



