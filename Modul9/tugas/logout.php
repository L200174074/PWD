<?php
    session_start();
    session_destroy();
?>
<script>
    alert('Anda Telah Logout');
    document.location=('MultiLogin.php');
</script>