
<?php

session_start();
if (!isset($_SESSION['sessao'])) {
    session_unset();
    session_destroy();
    
    
    exit;
}
else{
    echo $_SESSION['sessao'];
}
?>
