<?php
session_start();
session_unset();
session_destroy();

// No cache headers
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

// Redirect
header("Location: ../index.php");
exit;
?>
<script>
    history.replaceState(null, "", "../index.php");
</script>
