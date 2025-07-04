# Zencom Telecom - Site Institucional

Site institucional da empresa Zencom Telecom, desenvolvido em PHP com design moderno e responsivo.

## 📋 Estrutura do Projeto

```
zencom/
├── index.php              # Página principal do site
├── config.php             # Configurações do sistema
├── painel/                # Painel administrativo
│   ├── index.php         # Dashboard do painel
│   └── process-contact.php # Processamento de contatos
├── assets/               # Recursos estáticos
│   ├── css/
│   │   └── style.css     # Estilos principais
│   ├── js/
│   │   └── main.js       # JavaScript principal
│   └── images/           # Imagens do site
├── .gitignore            # Arquivos ignorados pelo Git
└── README.md             # Este arquivo
```

## 🚀 Instalação e Configuração

### Pré-requisitos
- PHP 7.4 ou superior
- MySQL 5.7 ou superior
- Servidor web (Apache/Nginx)

### 1. Configuração do Banco de Dados

Crie um banco de dados MySQL e execute o seguinte SQL:

```sql
CREATE DATABASE zencom_telecom CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE zencom_telecom;

CREATE TABLE contatos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    assunto VARCHAR(255) NOT NULL,
    mensagem TEXT NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    lido BOOLEAN DEFAULT FALSE,
    ip_address VARCHAR(45),
    INDEX idx_data_criacao (data_criacao),
    INDEX idx_lido (lido)
);

CREATE TABLE usuarios_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    ultimo_login TIMESTAMP NULL,
    ativo BOOLEAN DEFAULT TRUE
);

-- Inserir usuário admin padrão (senha: admin123)
INSERT INTO usuarios_admin (nome, email, senha) VALUES 
('Administrador', 'admin@zencomtelecom.com.br', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');
```

### 2. Configuração do Arquivo config.php

Edite o arquivo `config.php` e atualize as seguintes configurações:

```php
// Configurações do Banco de Dados
define('DB_HOST', 'localhost');
define('DB_NAME', 'zencom_telecom');
define('DB_USER', 'seu_usuario');
define('DB_PASS', 'sua_senha');

// Configurações do Site
define('SITE_URL', 'https://zencomtelecom.com.br');
define('SITE_EMAIL', 'contato@zencomtelecom.com.br');

// Configurações de Email (SMTP)
define('SMTP_HOST', 'smtp.zencomtelecom.com.br');
define('SMTP_PORT', 587);
define('SMTP_USER', 'noreply@zencomtelecom.com.br');
define('SMTP_PASS', 'sua_senha_smtp');
```

### 3. Configuração do Servidor

#### Apache (.htaccess)
Crie um arquivo `.htaccess` na raiz do projeto:

```apache
RewriteEngine On
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php [QSA,L]

# Segurança
<Files "config.php">
    Order allow,deny
    Deny from all
</Files>

# Compressão GZIP
<IfModule mod_deflate.c>
    AddOutputFilterByType DEFLATE text/plain
    AddOutputFilterByType DEFLATE text/html
    AddOutputFilterByType DEFLATE text/xml
    AddOutputFilterByType DEFLATE text/css
    AddOutputFilterByType DEFLATE application/xml
    AddOutputFilterByType DEFLATE application/xhtml+xml
    AddOutputFilterByType DEFLATE application/rss+xml
    AddOutputFilterByType DEFLATE application/javascript
    AddOutputFilterByType DEFLATE application/x-javascript
</IfModule>

# Cache de navegador
<IfModule mod_expires.c>
    ExpiresActive on
    ExpiresByType text/css "access plus 1 year"
    ExpiresByType application/javascript "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType image/jpg "access plus 1 year"
    ExpiresByType image/jpeg "access plus 1 year"
    ExpiresByType image/gif "access plus 1 year"
    ExpiresByType image/ico "access plus 1 year"
    ExpiresByType image/icon "access plus 1 year"
    ExpiresByType text/plain "access plus 1 month"
    ExpiresByType application/pdf "access plus 1 month"
    ExpiresByType application/x-shockwave-flash "access plus 1 month"
</IfModule>
```

#### Nginx
Configure o servidor Nginx:

```nginx
server {
    listen 80;
    server_name zencomtelecom.com.br www.zencomtelecom.com.br;
    root /var/www/html;
    index index.php index.html;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/var/run/php/php7.4-fpm.sock;
        fastcgi_index index.php;
        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
        include fastcgi_params;
    }

    # Proteger arquivos sensíveis
    location ~ /config\.php {
        deny all;
    }

    # Cache estático
    location ~* \.(css|js|png|jpg|jpeg|gif|ico|svg)$ {
        expires 1y;
        add_header Cache-Control "public, immutable";
    }
}
```

## 🔧 Funcionalidades

### Site Público
- **Página inicial** com seções: Hero, Serviços, Sobre, Contato
- **Formulário de contato** com validação e envio de email
- **Design responsivo** para todos os dispositivos
- **Animações suaves** e interativas
- **SEO otimizado** com meta tags e estrutura semântica

### Painel Administrativo
- **Dashboard** com estatísticas de contatos
- **Gerenciamento de contatos** recebidos via formulário
- **Sistema de login** seguro
- **Interface responsiva** para administração

## 📱 Responsividade

O site é totalmente responsivo e funciona perfeitamente em:
- Desktop (1200px+)
- Tablet (768px - 1199px)
- Mobile (320px - 767px)

## 🎨 Personalização

### Cores
As cores principais do site podem ser alteradas no arquivo `assets/css/style.css`:

```css
/* Cores principais */
:root {
    --primary-color: #667eea;
    --secondary-color: #764ba2;
    --accent-color: #ffd700;
    --text-color: #333;
    --light-bg: #f8f9fa;
}
```

### Conteúdo
Para alterar o conteúdo do site, edite o arquivo `index.php` nas seções correspondentes.

## 🔒 Segurança

O projeto inclui várias medidas de segurança:

- **Sanitização de inputs** para prevenir XSS
- **Validação de email** no frontend e backend
- **Proteção CSRF** em formulários
- **Configuração segura de sessões**
- **Proteção de arquivos sensíveis** via .htaccess
- **Logs de atividades** para auditoria

## 📊 Deploy na Hostinger

### 1. Configuração Inicial
1. Acesse o painel da Hostinger
2. Vá em "Gerenciador de Arquivos"
3. Navegue até a pasta `/public_html`
4. Faça upload de todos os arquivos do projeto

### 2. Configuração do Banco
1. Acesse "MySQL Remoto" no painel
2. Crie um novo banco de dados
3. Execute o SQL de criação das tabelas
4. Atualize o `config.php` com as credenciais corretas

### 3. Configuração do Git
```bash
# Na pasta public_html da Hostinger
git init
git remote add origin https://github.com/seu-usuario/zencom-telecom.git
git pull origin main
```

### 4. Atualizações Futuras
Para atualizar o site, basta executar na Hostinger:
```bash
git pull origin main
```

## 🐛 Troubleshooting

### Problemas Comuns

1. **Erro de conexão com banco**
   - Verifique as credenciais no `config.php`
   - Confirme se o banco foi criado corretamente

2. **Formulário não envia**
   - Verifique se o PHP tem permissão de escrita
   - Confirme as configurações de email

3. **CSS/JS não carrega**
   - Verifique se os arquivos estão na pasta `assets/`
   - Confirme as permissões dos arquivos

4. **Erro 500**
   - Verifique os logs de erro do PHP
   - Confirme se todas as extensões PHP necessárias estão ativas

## 📝 Logs

Os logs do sistema são salvos em `logs/app.log` e incluem:
- Contatos recebidos
- Erros de sistema
- Tentativas de login
- Atividades administrativas

## 🤝 Contribuição

Para contribuir com o projeto:

1. Faça um fork do repositório
2. Crie uma branch para sua feature
3. Commit suas mudanças
4. Push para a branch
5. Abra um Pull Request

## 📄 Licença

Este projeto é propriedade da Zencom Telecom. Todos os direitos reservados.

## 📞 Suporte

Para suporte técnico:
- Email: suporte@zencomtelecom.com.br
- Telefone: (11) 9999-9999

---

**Desenvolvido com ❤️ para Zencom Telecom** 