<?php
session_start();
?>
<script>
<?php if (empty($_SESSION['user'])):?>
location.href = "login.php";
<?php endif;?>
</script>
