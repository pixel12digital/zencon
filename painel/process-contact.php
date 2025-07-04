<?php
require_once '../config.php';

// Verificar se é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    redirect('../index.php#contato');
}

// Sanitizar e validar dados
$nome = sanitizeInput($_POST['nome'] ?? '');
$email = sanitizeInput($_POST['email'] ?? '');
$assunto = sanitizeInput($_POST['assunto'] ?? '');
$mensagem = sanitizeInput($_POST['mensagem'] ?? '');

// Validações
$errors = [];

if (empty($nome)) {
    $errors[] = 'Nome é obrigatório';
}

if (empty($email) || !validateEmail($email)) {
    $errors[] = 'Email válido é obrigatório';
}

if (empty($assunto)) {
    $errors[] = 'Assunto é obrigatório';
}

if (empty($mensagem)) {
    $errors[] = 'Mensagem é obrigatória';
}

// Se há erros, redirecionar com mensagem
if (!empty($errors)) {
    $_SESSION['contact_errors'] = $errors;
    $_SESSION['contact_data'] = $_POST;
    redirect('../index.php#contato');
}

// Salvar no banco de dados
$pdo = getDBConnection();
if ($pdo) {
    try {
        $stmt = $pdo->prepare("
            INSERT INTO contatos (nome, email, assunto, mensagem, data_criacao, ip_address) 
            VALUES (?, ?, ?, ?, NOW(), ?)
        ");
        
        $ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
        $stmt->execute([$nome, $email, $assunto, $mensagem, $ip]);
        
        // Log do contato
        writeLog("Novo contato recebido: $nome ($email) - $assunto", 'INFO');
        
        // Enviar email de notificação (opcional)
        if (defined('SMTP_HOST') && SMTP_HOST !== 'smtp.zencomtelecom.com.br') {
            sendNotificationEmail($nome, $email, $assunto, $mensagem);
        }
        
        $_SESSION['contact_success'] = 'Mensagem enviada com sucesso! Entraremos em contato em breve.';
        
    } catch (PDOException $e) {
        writeLog("Erro ao salvar contato: " . $e->getMessage(), 'ERROR');
        $_SESSION['contact_errors'] = ['Erro interno. Tente novamente mais tarde.'];
    }
} else {
    $_SESSION['contact_errors'] = ['Erro de conexão. Tente novamente mais tarde.'];
}

redirect('../index.php#contato');

// Função para enviar email de notificação
function sendNotificationEmail($nome, $email, $assunto, $mensagem) {
    $to = SITE_EMAIL;
    $subject = "Novo contato via site: $assunto";
    
    $message = "
    <html>
    <head>
        <title>Novo Contato - Zencom Telecom</title>
    </head>
    <body>
        <h2>Novo contato recebido via site</h2>
        <p><strong>Nome:</strong> $nome</p>
        <p><strong>Email:</strong> $email</p>
        <p><strong>Assunto:</strong> $assunto</p>
        <p><strong>Mensagem:</strong></p>
        <p>" . nl2br($mensagem) . "</p>
        <hr>
        <p><small>Enviado em: " . date('d/m/Y H:i:s') . "</small></p>
    </body>
    </html>
    ";
    
    $headers = [
        'MIME-Version: 1.0',
        'Content-type: text/html; charset=UTF-8',
        'From: ' . SITE_EMAIL,
        'Reply-To: ' . $email,
        'X-Mailer: PHP/' . phpversion()
    ];
    
    mail($to, $subject, $message, implode("\r\n", $headers));
}
?> 