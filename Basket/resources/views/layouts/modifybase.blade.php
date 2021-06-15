@auth
    @extends('layouts.main')
@else
    <script type="text/javascript">
        window.location = "<?php echo route('login') ?>";
    </script>
@endauth