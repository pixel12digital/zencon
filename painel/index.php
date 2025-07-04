<?php
require_once '../config.php';

// Verificar se o usuário está logado
session_start();
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header('Location: login.php');
    exit();
}

// Buscar estatísticas básicas
$pdo = getDBConnection();
$stats = [];

if ($pdo) {
    // Total de contatos
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM contatos");
    $stats['contatos'] = $stmt->fetch()['total'];
    
    // Contatos do mês atual
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM contatos WHERE MONTH(data_criacao) = MONTH(CURRENT_DATE()) AND YEAR(data_criacao) = YEAR(CURRENT_DATE())");
    $stats['contatos_mes'] = $stmt->fetch()['total'];
    
    // Contatos não lidos
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM contatos WHERE lido = 0");
    $stats['nao_lidos'] = $stmt->fetch()['total'];
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo - Zencom Telecom</title>
    <link rel="stylesheet" href="assets/css/admin.css">
</head>
<body>
    <div class="admin-container">
        <!-- Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-header">
                <h2>Zencom Telecom</h2>
                <p>Painel Administrativo</p>
            </div>
            <nav class="sidebar-nav">
                <ul>
                    <li class="active"><a href="index.php">Dashboard</a></li>
                    <li><a href="contatos.php">Contatos</a></li>
                    <li><a href="configuracoes.php">Configurações</a></li>
                    <li><a href="logout.php">Sair</a></li>
                </ul>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="main-content">
            <header class="content-header">
                <h1>Dashboard</h1>
                <div class="user-info">
                    <span>Bem-vindo, <?php echo htmlspecialchars($_SESSION['admin_nome'] ?? 'Administrador'); ?></span>
                </div>
            </header>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">📧</div>
                    <div class="stat-content">
                        <h3>Total de Contatos</h3>
                        <p class="stat-number"><?php echo $stats['contatos'] ?? 0; ?></p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">📅</div>
                    <div class="stat-content">
                        <h3>Contatos do Mês</h3>
                        <p class="stat-number"><?php echo $stats['contatos_mes'] ?? 0; ?></p>
                    </div>
                </div>
                
                <div class="stat-card">
                    <div class="stat-icon">🔔</div>
                    <div class="stat-content">
                        <h3>Não Lidos</h3>
                        <p class="stat-number"><?php echo $stats['nao_lidos'] ?? 0; ?></p>
                    </div>
                </div>
            </div>

            <!-- Recent Contacts -->
            <div class="content-section">
                <h2>Contatos Recentes</h2>
                <div class="table-container">
                    <table class="data-table">
                        <thead>
                            <tr>
                                <th>Nome</th>
                                <th>Email</th>
                                <th>Assunto</th>
                                <th>Data</th>
                                <th>Status</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($pdo) {
                                $stmt = $pdo->query("SELECT * FROM contatos ORDER BY data_criacao DESC LIMIT 10");
                                while ($contato = $stmt->fetch()) {
                                    $statusClass = $contato['lido'] ? 'read' : 'unread';
                                    $statusText = $contato['lido'] ? 'Lido' : 'Não lido';
                                    ?>
                                    <tr class="<?php echo $statusClass; ?>">
                                        <td><?php echo htmlspecialchars($contato['nome']); ?></td>
                                        <td><?php echo htmlspecialchars($contato['email']); ?></td>
                                        <td><?php echo htmlspecialchars($contato['assunto']); ?></td>
                                        <td><?php echo date('d/m/Y H:i', strtotime($contato['data_criacao'])); ?></td>
                                        <td><span class="status-badge <?php echo $statusClass; ?>"><?php echo $statusText; ?></span></td>
                                        <td>
                                            <a href="ver-contato.php?id=<?php echo $contato['id']; ?>" class="btn-small">Ver</a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="content-section">
                <h2>Ações Rápidas</h2>
                <div class="quick-actions">
                    <a href="contatos.php" class="action-card">
                        <div class="action-icon">📧</div>
                        <h3>Gerenciar Contatos</h3>
                        <p>Visualizar e responder mensagens</p>
                    </a>
                    
                    <a href="configuracoes.php" class="action-card">
                        <div class="action-icon">⚙️</div>
                        <h3>Configurações</h3>
                        <p>Alterar configurações do site</p>
                    </a>
                    
                    <a href="../index.php" target="_blank" class="action-card">
                        <div class="action-icon">🌐</div>
                        <h3>Ver Site</h3>
                        <p>Abrir o site em nova aba</p>
                    </a>
                </div>
            </div>
        </main>
    </div>

    <script src="assets/js/admin.js"></script>
</body>
</html> 