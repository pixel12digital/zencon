<?php
require_once '../config.php';

// Log do logout
if (isset($_SESSION['admin_email'])) {
    writeLog("Logout administrativo: {$_SESSION['admin_email']}", 'INFO');
}

// Destruir sessão
session_start();
session_destroy();

// Redirecionar para página de login
header('Location: login.php');
exit();
?> 