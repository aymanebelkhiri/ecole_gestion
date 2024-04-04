
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Personal Information</title>
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

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
    </div>
    @if(auth()->check())
      @if(auth()->user()->role === 'etudiants')
          <a id="redirectLink" class="btn" href="{{ route('etudiant') }}">Login</a>
      @elseif(auth()->user()->role === 'admin')
          <a id="redirectLink" class="btn" href="{{ route('events.index') }}">Login</a>
      @elseif(auth()->user()->role === 'profs')
          <a id="redirectLink" class="btn" href="{{ route('prof') }}">Login</a>
      @endif
  @endif

<script defer>
    function clickLinkAfterDelay() {
        var link = document.getElementById('redirectLink');
        if (link) {
            setTimeout(function() {
                link.click();
            }, 1); 
        }
    }

    clickLinkAfterDelay();
</script>
  </section>
</body>

