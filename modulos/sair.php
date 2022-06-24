<?php

session_destroy();
unset($_SESSION['email']);
unset($_SESSION['usuario']);
unset($_SESSION['senha']);

print "
<script>
    location=('login.php?erro=3');
</script>
"; //desconectado

?>
