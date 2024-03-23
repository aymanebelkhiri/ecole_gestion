@if(auth()->check())
    @if(auth()->user()->role === 'etudiants')
        <a id="redirectLink" class="btn" href="{{ route('etudiant') }}">Login</a>
    @elseif(auth()->user()->role === 'admin')
        <a id="redirectLink" class="btn" href="{{ route('admin') }}">Login</a>
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
