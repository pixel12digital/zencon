<?php
// Projeto estático - sem configurações necessárias

/**
 * Configurações do Site Zencom Telecom
 * 
 * Este arquivo contém todas as configurações principais do site,
 * incluindo conexão com banco de dados e constantes do sistema.
 */

// Configurações do Site
define('SITE_NAME', 'Zencom Telecom');
define('SITE_URL', 'https://zencomtelecom.com.br');
define('SITE_EMAIL', 'contato@zencomtelecom.com.br');

// Configurações do Banco de Dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'zencom_telecom');
define('DB_USER', 'zencom_user');
define('DB_PASS', 'sua_senha_aqui');

// Configurações de Timezone
date_default_timezone_set('America/Sao_Paulo');

// Configurações de Sessão
ini_set('session.cookie_httponly', 1);
ini_set('session.use_only_cookies', 1);
session_start();

// Configurações de Erro (desabilitar em produção)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Função de Conexão com Banco de Dados
function getDBConnection() {
    try {
        $pdo = new PDO(
            "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
            DB_USER,
            DB_PASS,
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES => false
            ]
        );
        return $pdo;
    } catch (PDOException $e) {
        error_log("Erro de conexão com banco de dados: " . $e->getMessage());
        return false;
    }
}

// Função para Sanitizar Inputs
function sanitizeInput($input) {
    return htmlspecialchars(strip_tags(trim($input)), ENT_QUOTES, 'UTF-8');
}

// Função para Validar Email
function validateEmail($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
}

// Função para Gerar Token CSRF
function generateCSRFToken() {
    if (!isset($_SESSION['csrf_token'])) {
        $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
    }
    return $_SESSION['csrf_token'];
}

// Função para Verificar Token CSRF
function verifyCSRFToken($token) {
    return isset($_SESSION['csrf_token']) && hash_equals($_SESSION['csrf_token'], $token);
}

// Configurações de Upload
define('UPLOAD_MAX_SIZE', 5 * 1024 * 1024); // 5MB
define('UPLOAD_ALLOWED_TYPES', ['jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx']);

// Configurações de Email
define('SMTP_HOST', 'smtp.zencomtelecom.com.br');
define('SMTP_PORT', 587);
define('SMTP_USER', 'noreply@zencomtelecom.com.br');
define('SMTP_PASS', 'sua_senha_smtp_aqui');

// Configurações de Segurança
define('PASSWORD_MIN_LENGTH', 8);
define('LOGIN_MAX_ATTEMPTS', 5);
define('LOGIN_LOCKOUT_TIME', 900); // 15 minutos

// Configurações de Cache
define('CACHE_ENABLED', true);
define('CACHE_DURATION', 3600); // 1 hora

// Configurações de Log
define('LOG_ENABLED', true);
define('LOG_FILE', 'logs/app.log');

// Função para Log
function writeLog($message, $level = 'INFO') {
    if (!LOG_ENABLED) return;
    
    $logDir = dirname(LOG_FILE);
    if (!is_dir($logDir)) {
        mkdir($logDir, 0755, true);
    }
    
    $timestamp = date('Y-m-d H:i:s');
    $logMessage = "[$timestamp] [$level] $message" . PHP_EOL;
    
    file_put_contents(LOG_FILE, $logMessage, FILE_APPEND | LOCK_EX);
}

// Função para Redirecionamento
function redirect($url) {
    header("Location: $url");
    exit();
}

// Função para Verificar se é HTTPS
function isHTTPS() {
    return isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on';
}

// Configurações de Ambiente
define('ENVIRONMENT', 'development'); // Mude para 'production' em produção

// Configurações específicas por ambiente
if (ENVIRONMENT === 'production') {
    error_reporting(0);
    ini_set('display_errors', 0);
    define('DEBUG_MODE', false);
} else {
    define('DEBUG_MODE', true);
}

// Função para Debug
function debug($data) {
    if (DEBUG_MODE) {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}
?> 