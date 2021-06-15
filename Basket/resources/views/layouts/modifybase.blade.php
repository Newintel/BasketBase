@auth
    @extends('layouts.main')
@else
    <script>
        window.location = "\login";
    </script>
@endauth