<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zencom Telecom - Internet Fibra Óptica em São Paulo</title>
    <meta name="description" content="Zencom Telecom - Provedor de internet fibra óptica em São Paulo. Planos de 100MB, 400MB e 600MB com qualidade e suporte especializado. Atendemos Americanópolis.">
    
    <!-- CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="assets/images/favicon.ico">
    
    <!-- Open Graph -->
    <meta property="og:title" content="Zencom Telecom - Internet Fibra Óptica">
    <meta property="og:description" content="Conexão 100% fibra óptica com a qualidade que você merece. Planos de 100MB, 400MB e 600MB em São Paulo.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?php echo SITE_URL; ?>">
</head>
<body>
    <!-- HEADER / MENU -->
    <header class="header">
        <div class="container header-content">
            <div class="logo">
                <a href="#home"><img src="assets/images/logo.png" alt="Zencom Telecom" class="logo-img"></a>
            </div>
            <!-- MENU DESKTOP -->
            <nav class="nav nav-desktop">
                <ul class="nav-list">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li><a href="#planos" class="nav-link">Planos/Combos</a></li>
                    <li><a href="#entretenimentos" class="nav-link">Entretenimentos</a></li>
                    <li><a href="#central-cliente" class="nav-link">Central do Cliente</a></li>
                    <li><a href="#sobre" class="nav-link">Sobre Nós</a></li>
                    <li><a href="#contato" class="nav-link">Fale Conosco</a></li>
                </ul>
            </nav>
            <!-- BOTÃO E MENU MOBILE -->
            <div class="mobile-menu-toggle">
                <span></span><span></span><span></span>
            </div>
            <nav class="nav nav-mobile">
                <ul class="nav-list">
                    <li><a href="#home" class="nav-link">Home</a></li>
                    <li><a href="#planos" class="nav-link">Planos/Combos</a></li>
                    <li><a href="#entretenimentos" class="nav-link">Entretenimentos</a></li>
                    <li><a href="#central-cliente" class="nav-link">Central do Cliente</a></li>
                    <li><a href="#sobre" class="nav-link">Sobre Nós</a></li>
                    <li><a href="#contato" class="nav-link">Fale Conosco</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- BANNER (já existente, não alterar) -->
    <section id="home" class="banner">
        <a href="https://wa.me/5511986386492?text=Olá! Tenho interesse no plano Conexão 100MB R$ 79,90 da Zencom Telecom." target="_blank" rel="noopener" class="banner-link">
            <img src="assets/images/bannerdesktop.png" alt="Promoção Conexão 100MB R$ 79,90" class="banner-img" style="width:100%;display:block;">
        </a>
    </section>

    <!-- FRASE DE IMPACTO -->
    <section class="frase-impacto">
        <div class="container">
            <h1>Tudo ao seu alcance.<br>Sua internet + Rápida</h1>
            <p>Conecte-se com a ZENCON internet.</p>
            <a href="https://wa.me/5511986386492?text=Olá! Tenho interesse em contratar a internet da Zencom Telecom." target="_blank" rel="noopener" class="btn btn-cta">Quero Contratar Agora</a>
        </div>
    </section>

    <!-- PLANOS E COMBOS (estrutura inicial) -->
    <section id="planos" class="planos-combos">
        <div class="container">
            <h2>Nossos Planos</h2>
            <h3 class="combos-title">Combos</h3>
            <div class="card-grid">
                <div class="card">
                    <h3>100MB + DEEZER <span class="money">💰</span> <span class="price">R$ 89,90/mês</span></h3>
                    <ul>
                        <li>100MB (100 Download / 50 Upload)</li>
                        <li>✅ Internet ideal para uso diário + música sem limites</li>
                        <li>✅ Streaming de som com Deezer Premium incluso</li>
                        <li>✅ Instalação rápida e suporte dedicado</li>
                    </ul>
                </div>
                <div class="card">
                    <h3>400MB + SKY+ e DEEZER <span class="money">💰</span> <span class="price">R$ 129,90/mês</span></h3>
                    <ul>
                        <li>400MB (400 Download / 200 Upload)</li>
                        <li>✅ Internet potente + TV e música na palma da mão</li>
                        <li>✅ Acesse canais SKY+ e curta músicas com Deezer</li>
                        <li>✅ Ideal para famílias conectadas e streaming em Full HD</li>
                        <li>✅ Wi-Fi 5G de alto desempenho incluso</li>
                    </ul>
                </div>
                <div class="card destaque">
                    <h3>600MB + SKY/GLOBO, DEEZER E MAX <span class="money">💰</span> <span class="price">R$ 184,90/mês</span></h3>
                    <ul>
                        <li>600MB (600 Download / 300 Upload)</li>
                        <li>O combo completo para quem quer tudo!</li>
                        <li>✅ Ultra velocidade + SKY+, Globo, Max e Deezer</li>
                        <li>✅ Perfeito para streamers, gamers e grandes famílias</li>
                        <li>✅ Wi-Fi 5G turbo com cobertura poderosa</li>
                    </ul>
                </div>
            </div>

            <!-- NOVA SEÇÃO: Planos de Internet -->
            <section class="planos-internet-section">
                <h3 class="planos-title">Planos de Internet</h3>
                <div class="card-grid">
                    <div class="card">
                        <h3>100MB <span class="money">💰</span> <span class="price">R$ 79,90/mês</span></h3>
                        <ul>
                            <li>100MB (100 Download / 50 Upload)</li>
                            <li>✅ Instalação rápida e sem complicações</li>
                            <li>✅ Perfeito para redes sociais, vídeos e chamadas</li>
                            <li>✅ Wi-Fi com cobertura estável em toda a casa</li>
                        </ul>
                    </div>
                    <div class="card">
                        <h3>400MB <span class="money">💰</span> <span class="price">R$ 109,90/mês</span></h3>
                        <ul>
                            <li>400MB (400 Download / 200 Upload)</li>
                            <li>Velocidade para toda a família</li>
                            <li>✅ Ideal para streaming em HD e jogos online</li>
                            <li>✅ Wi-Fi 5G de alta performance incluso</li>
                            <li>✅ Conexão estável mesmo com vários usuários</li>
                        </ul>
                    </div>
                    <div class="card destaque">
                        <h3>600MB <span class="money">💰</span> <span class="price">R$ 139,90/mês</span></h3>
                        <ul>
                            <li>600MB (600 Download / 300 Upload)</li>
                            <li>Desempenho máximo para quem exige mais</li>
                            <li>✅ Perfeito para home office, gamers e streamers</li>
                            <li>✅ Ultra Wi-Fi 5G + cobertura poderosa</li>
                            <li>✅ Sem travamentos, sem limites!</li>
                        </ul>
                    </div>
                </div>
            </section>

            <!-- CHAMADA ANIMADA DE DISPONIBILIDADE MELHORADA -->
            <div class="cta-disponibilidade animate-fade-in">
                <p class="cta-titulo">Consulte a disponibilidade no seu endereço!</p>
                <p class="cta-subtitulo">Entre em contato com nosso time para verificar cobertura e agendar sua instalação.</p>
                <a href="https://wa.me/5511986386492?text=Quero consultar disponibilidade" class="btn btn-cta" target="_blank" rel="noopener">Consultar Disponibilidade</a>
            </div>

            <div class="planos-grid"><!-- Cards de planos aqui --></div>
        </div>
    </section>

    <!-- ENTRETENIMENTOS -->
    <section id="entretenimentos" class="entretenimentos">
        <div class="container">
            <h2>Entretenimentos</h2>
            <div class="entretenimento-blocos">
                <div class="bloco-icones">
                    <img src="assets/images/entret01.png" alt="Entretenimento 1" class="entretenimento-img" />
                </div>
                <div class="bloco-icones">
                    <img src="assets/images/entret02.png" alt="Entretenimento 2" class="entretenimento-img" />
                </div>
                <div class="bloco-icones">
                    <img src="assets/images/entret03.png" alt="Entretenimento 3" class="entretenimento-img" />
                </div>
            </div>
        </div>
    </section>

    <!-- APPS/STREAMINGS ACCORDION -->
    <section class="apps-streamings">
        <div class="container">
            <h2>Aplicativos/streamings</h2>
            <p class="accordion-info">Clique nas categorias abaixo para ver os aplicativos e detalhes de cada serviço.</p>
            <div class="accordion" id="appsAccordion">
                <div class="accordion-item open">
                    <button class="accordion-header active" type="button">
                        <span class="arrow"></span> 🎥 Streaming de Vídeo e TV
                    </button>
                    <div class="accordion-body">
                        <ul>
                            <li><b>SKY+ Light</b> – Plataforma de TV por assinatura com canais e conteúdos on-demand.</li>
                            <li><b>SKY+ Light & Globo</b> – Combinação de conteúdos SKY+ com acesso a conteúdos Globo.</li>
                            <li><b>Looke</b> – Serviço de streaming com filmes e séries.</li>
                            <li><b>Disney+</b> – Filmes e séries da Disney, Pixar, Marvel, Star Wars e National Geographic.</li>
                            <li><b>HBO Max</b> – Séries e filmes da HBO e outros estúdios.</li>
                            <li><b>HotGo</b> – Conteúdo adulto (streaming).</li>
                            <li><b>CurtaOn – Clube de Documentários</b> – Documentários e curtas-metragens.</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-header" type="button">
                        <span class="arrow"></span> 🧒 Infantil e Educacional
                    </button>
                    <div class="accordion-body">
                        <ul>
                            <li><b>PlayKids+</b> – Conteúdo educativo e lúdico para crianças.</li>
                            <li><b>Kiddle Pass</b> – Acesso a conteúdos educativos infantis.</li>
                            <li><b>ESTUDA+</b> – Plataforma de estudos e reforço escolar.</li>
                            <li><b>Smart Content</b> – Conteúdos inteligentes e educativos.</li>
                            <li><b>Standard III</b> – Nível avançado da plataforma educacional Standard.</li>
                            <li><b>Plus</b> (ícone verde com hexágono) – Provável expansão do Standard III (educacional).</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-header" type="button">
                        <span class="arrow"></span> 🎧 Áudio e Leitura
                    </button>
                    <div class="accordion-body">
                        <ul>
                            <li><b>Deezer</b> – Streaming de música.</li>
                            <li><b>Ubook Plus</b> – Audiolivros, e-books e podcasts.</li>
                            <li><b>Playlist</b> – Playlists personalizadas (música).</li>
                            <li><b>Social Comics</b> – Plataforma de quadrinhos digitais.</li>
                            <li><b>Hube Revistas</b> – Acesso a diversas revistas digitais.</li>
                            <li><b>O Jornalista</b> – Acesso a notícias e conteúdos jornalísticos.</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-header" type="button">
                        <span class="arrow"></span> 🎮 Jogos e Conectividade
                    </button>
                    <div class="accordion-body">
                        <ul>
                            <li><b>ExitLag</b> – Otimizador de conexão para jogos online.</li>
                            <li><b>NBA League Pass</b> – Transmissão de jogos da NBA ao vivo e sob demanda.</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-header" type="button">
                        <span class="arrow"></span> 🧘 Saúde, Bem-estar e Organização
                    </button>
                    <div class="accordion-body">
                        <ul>
                            <li><b>Queima Diária</b> – Programas de treino físico e bem-estar.</li>
                            <li><b>Zen</b> – Meditação, relaxamento e mindfulness.</li>
                            <li><b>Fluid</b> – Ferramenta de organização pessoal e foco (presumido).</li>
                            <li><b>Pediatria em Foco</b> – Conteúdos voltados à saúde infantil.</li>
                            <li><b>Nutri</b> – Conteúdos sobre nutrição.</li>
                            <li><b>Docway</b> – Plataforma de telemedicina.</li>
                        </ul>
                    </div>
                </div>
                <div class="accordion-item">
                    <button class="accordion-header" type="button">
                        <span class="arrow"></span> 🌐 Outros/Multiplataformas
                    </button>
                    <div class="accordion-body">
                        <ul>
                            <li><b>HUB</b> – Plataforma digital de conteúdos diversos.</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CENTRAL DO CLIENTE -->
    <section id="central-cliente" class="central-cliente">
        <div class="container">
            <a href="https://www.ispfy.com.br/app-provedor/baixar" class="btn-cliente">Área do Cliente / 2ª via do boleto</a>
        </div>
    </section>

    <!-- NOVA SEÇÃO: APP E CONTATO -->
    <section id="contato" class="app-contato-section">
        <div class="container app-contato-box">
            <h2 class="app-contato-title">Baixe o App e Fale com a Zencom</h2>
            <p class="app-contato-subtitle">Com nosso app, você acessa sua conta, tira dúvidas e fala direto com nosso time pelo WhatsApp!</p>
            <div class="app-contato-grid">
                <div class="app-contato-img-col">
                    <img src="assets/images/app.jpg" alt="App Zencom" class="app-contato-img" />
                    <a href="https://www.provedor.app/baixar" target="_blank" class="btn btn-app-download">Baixar App</a>
                </div>
                <div class="app-contato-form-col">
                    <h3>Fale com a Zencom</h3>
                    <form id="formContatoApp" class="app-contato-form">
                        <input type="text" name="nome" placeholder="Seu nome completo" required>
                        <input type="tel" name="telefone" placeholder="Seu telefone" required>
                        <select name="assunto" required>
                            <option value="" disabled selected>Selecione o assunto</option>
                            <option value="Suporte Técnico">Suporte Técnico</option>
                            <option value="2ª via de boleto">2ª via de boleto</option>
                            <option value="Contratar Plano">Contratar Plano</option>
                            <option value="Dúvidas sobre App">Dúvidas sobre App</option>
                            <option value="Outros">Outros</option>
                        </select>
                        <textarea name="mensagem" placeholder="Mensagem (opcional)"></textarea>
                        <button type="submit" class="btn btn-primary">Enviar para WhatsApp</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- SOBRE NÓS -->
    <section id="sobre" class="sobre-nos">
        <div class="container sobre-nos-box">
            <div class="sobre-nos-header">
                <h2>Sobre Nós</h2>
                <p class="sobre-nos-quote">"Conectando pessoas com qualidade, tecnologia e atendimento humano."</p>
            </div>
            <div class="sobre-nos-content">
                <div class="sobre-nos-icons">
                    <div class="icon-block">
                        <svg width="40" height="40" fill="none" viewBox="0 0 40 40"><circle cx="20" cy="20" r="18" stroke="#3b82f6" stroke-width="3"/><path d="M13 22l4 4 8-8" stroke="#1e3a8a" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/></svg>
                        <span>Qualidade</span>
                    </div>
                    <div class="icon-block">
                        <svg width="40" height="40" fill="none" viewBox="0 0 40 40"><circle cx="20" cy="20" r="18" stroke="#3b82f6" stroke-width="3"/><path d="M20 25c3 0 5-2 5-5s-2-5-5-5-5 2-5 5 2 5 5 5z" stroke="#1e3a8a" stroke-width="3"/><path d="M13 29c0-3.3 2.7-6 6-6s6 2.7 6 6" stroke="#1e3a8a" stroke-width="3"/></svg>
                        <span>Atendimento Humano</span>
                    </div>
                    <div class="icon-block">
                        <svg width="40" height="40" fill="none" viewBox="0 0 40 40"><circle cx="20" cy="20" r="18" stroke="#3b82f6" stroke-width="3"/><rect x="13" y="13" width="14" height="14" rx="3" stroke="#1e3a8a" stroke-width="3"/></svg>
                        <span>Tecnologia</span>
                    </div>
                </div>
                <div class="sobre-nos-text">
                    <p>Desde 2019, a Zencom Telecom conecta pessoas, famílias e negócios com internet 100% fibra óptica, estabilidade e suporte de verdade. Nossa missão é entregar conexão de qualidade, atendimento humano e tecnologia de ponta para transformar seu dia a dia.</p>
                    <p class="sobre-nos-missao">Zencom Telecom. A internet que você merece, com o suporte que você precisa!</p>
                    <a href="#contato" class="btn btn-primary sobre-nos-btn">Fale com a gente</a>
                </div>
            </div>
        </div>
    </section>

    <!-- RODAPÉ -->
    <footer class="footer">
        <div class="container footer-grid">
            <div class="footer-col footer-logo-col">
                <img src="assets/images/logo.png" alt="Zencom Telecom" class="footer-logo-img">
                <span class="footer-logo-slogan">TUDO AO SEU ALCANCE. SUA INTERNET +RÁPIDA!<br>Sua Conexão 100% fibra óptica com a qualidade que você merece!</span>
            </div>
            <div class="footer-col footer-links-col">
                <h4>Institucional</h4>
                <ul class="footer-links">
                    <li><a href="#home">Home</a></li>
                    <li><a href="#planos">Planos/Combos</a></li>
                    <li><a href="#entretenimentos">Entretenimentos</a></li>
                    <li><a href="#central-cliente">Central do Cliente</a></li>
                    <li><a href="#sobre">Sobre Nós</a></li>
                    <li><a href="#contato">Fale Conosco</a></li>
                </ul>
                <div class="footer-social">
                    <span class="footer-social-title">Visite no Instagram:</span>
                    <a href="https://instagram.com/zencomtelecom" target="_blank" aria-label="Instagram" class="footer-instagram">
                        <svg width="28" height="28" viewBox="0 0 40 40" fill="none"><rect x="7" y="7" width="26" height="26" rx="8" stroke="#fff" stroke-width="2"/><circle cx="20" cy="20" r="6" stroke="#fff" stroke-width="2"/><circle cx="28.5" cy="11.5" r="1.5" fill="#fff"/></svg>
                    </a>
                </div>
            </div>
            <div class="footer-col footer-info-col">
                <h4>Contato</h4>
                <p>CNPJ: 55.232.576/0001-76</p>
                <p>Josenilson Alves Figueiredo LTDA (ZENCOM TELECOMUNICAÇÕES)</p>
                <p>Rua Carlos Facchina, 365 - Americanópolis</p>
                <p>Contato: <a href="tel:+5511986386542">(11) 98638-6542</a><br><a href="mailto:atendimento@zencom.com.br">atendimento@zencom.com.br</a></p>
                <div class="footer-mapa">
                    <iframe src="https://www.google.com/maps?q=Rua+Carlos+Facchina,+365,+São+Paulo&output=embed" width="100%" height="120" style="border:0;border-radius:10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Zencom Telecom. Todos os direitos reservados.</p>
            <p class="footer-dev">Desenvolvido por <a href="https://pixel12digital.com.br" target="_blank" rel="noopener">pixel12digital</a></p>
        </div>
    </footer>

    <!-- WhatsApp Flutuante Oficial -->
    <a href="https://wa.me/5511986386492?text=Olá! Tenho interesse em contratar a internet da Zencom Telecom." target="_blank" class="whatsapp-float" rel="noopener" aria-label="Fale conosco no WhatsApp">
        <svg width="60" height="60" viewBox="0 0 60 60" fill="none">
            <circle cx="30" cy="30" r="30" fill="#25D366"/>
            <path d="M44.5 31.5c0-7.18-5.82-13-13-13s-13 5.82-13 13c0 2.3.62 4.45 1.7 6.3L17 45l7.36-1.93c1.77.49 3.65.76 5.64.76 7.18 0 13-5.82 13-13zm-13 10.5c-1.77 0-3.48-.29-5.08-.82l-.36-.12-4.37 1.15 1.17-4.25-.24-.37C18.29 36.1 17.5 33.86 17.5 31.5c0-6.07 4.93-11 11-11s11 4.93 11 11-4.93 11-11 11zm6.13-8.13c-.34-.17-2.01-.99-2.32-1.1-.31-.12-.54-.17-.77.17-.23.34-.89 1.1-1.09 1.33-.2.23-.4.25-.74.09-.34-.17-1.44-.53-2.74-1.68-1.01-.9-1.7-2.01-1.9-2.35-.2-.34-.02-.53.15-.7.16-.16.36-.41.54-.62.18-.21.24-.36.36-.6.12-.24.06-.45-.03-.62-.09-.17-.8-1.93-1.1-2.65-.29-.7-.59-.6-.8-.61-.21-.01-.45-.01-.7-.01-.24 0-.63.09-.96.45-.33.36-1.26 1.23-1.26 2.99 0 1.76 1.28 3.46 1.46 3.71.18.25 2.53 3.98 6.13 5.58.86.37 1.53.59 2.06.75.87.27 1.66.23 2.28.14.7-.1 2.16-.86 2.47-1.7.31-.84.31-1.56.22-1.7-.09-.14-.34-.24-.7-.41z" fill="#fff"/>
        </svg>
    </a>

    <!-- JavaScript -->
    <script src="assets/js/main.js"></script>
</body>
</html> 