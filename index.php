<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - Instituto de Cultura de Tenjo</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --color-primary: #2E86AB;
            --color-secondary: #A23B72;
            --color-accent: #F18F01;
            --color-dark: #3D3D3D;
            --color-light: #FFFFFF;
            --color-gray: #F5F5F5;
            --color-light-blue: #E8F4F8;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Open Sans', sans-serif;
            color: var(--color-dark);
            background-color: var(--color-light);
            line-height: 1.6;
        }
        
        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }
        
        /* Header */
        header {
            background-color: var(--color-light);
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        
        .header-top {
            background-color: var(--color-primary);
            color: var(--color-light);
            padding: 8px 0;
            font-size: 14px;
        }
        
        .header-top-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .header-main {
            padding: 15px 0;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            display: flex;
            align-items: center;
        }
        
        .logo img {
            height: 50px;
        }
        
        .logo-text {
            margin-left: 10px;
            font-weight: 700;
            font-size: 20px;
            color: var(--color-primary);
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav ul li {
            margin-left: 20px;
        }
        
        nav ul li a {
            text-decoration: none;
            color: var(--color-dark);
            font-weight: 600;
            font-size: 16px;
            transition: color 0.3s;
        }
        
        nav ul li a:hover, nav ul li a.active {
            color: var(--color-primary);
        }
        
        .search-login {
            display: flex;
            align-items: center;
        }
        
        .search-box {
            position: relative;
            margin-right: 20px;
        }
        
        .search-box input {
            padding: 8px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 14px;
            width: 200px;
        }
        
        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .btn-primary {
            background-color: var(--color-primary);
            color: var(--color-light);
        }
        
        .btn-primary:hover {
            background-color: #246685;
        }
        
        .btn-secondary {
            background-color: var(--color-accent);
            color: var(--color-dark);
        }
        
        .btn-secondary:hover {
            background-color: #d97d01;
        }
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url('https://images.unsplash.com/photo-1591803267931-9c029eacfc6f?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: var(--color-light);
            padding: 100px 0;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 3rem;
            margin-bottom: 20px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
        
        .hero p {
            font-size: 1.3rem;
            max-width: 800px;
            margin: 0 auto 40px;
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.5);
        }
        
        .hero-buttons {
            display: flex;
            justify-content: center;
            gap: 20px;
            flex-wrap: wrap;
        }
        
        /* Welcome Section */
        .welcome {
            padding: 80px 0;
            background-color: var(--color-light);
        }
        
        .welcome-content {
            display: flex;
            align-items: center;
            gap: 50px;
        }
        
        .welcome-text {
            flex: 1;
        }
        
        .welcome-image {
            flex: 1;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
        
        .welcome-image img {
            width: 100%;
            height: auto;
            display: block;
        }
        
        .section-title {
            font-size: 2.5rem;
            color: var(--color-primary);
            margin-bottom: 20px;
        }
        
        .section-subtitle {
            font-size: 1.2rem;
            color: var(--color-secondary);
            margin-bottom: 15px;
        }
        
        /* Highlights Section */
        .highlights {
            padding: 80px 0;
            background-color: var(--color-light-blue);
        }
        
        .highlights-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        
        .highlight-card {
            background-color: var(--color-light);
            border-radius: 10px;
            padding: 30px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s, box-shadow 0.3s;
        }
        
        .highlight-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        
        .highlight-icon {
            font-size: 3rem;
            color: var(--color-primary);
            margin-bottom: 20px;
        }
        
        .highlight-card h3 {
            margin-bottom: 15px;
            color: var(--color-primary);
        }
        
        /* News Section */
        .news {
            padding: 80px 0;
            background-color: var(--color-light);
        }
        
        .news-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(350px, 1fr));
            gap: 30px;
            margin-top: 50px;
        }
        
        .news-card {
            background-color: var(--color-light);
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            transition: transform 0.3s;
        }
        
        .news-card:hover {
            transform: translateY(-5px);
        }
        
        .news-image {
            height: 200px;
            background-size: cover;
            background-position: center;
        }
        
        .news-content {
            padding: 25px;
        }
        
        .news-date {
            color: var(--color-primary);
            font-weight: 600;
            margin-bottom: 10px;
            display: block;
        }
        
        .news-card h3 {
            margin-bottom: 15px;
            color: var(--color-dark);
        }
        
        .news-card p {
            margin-bottom: 20px;
        }
        
        .read-more {
            color: var(--color-primary);
            font-weight: 600;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
        }
        
        .read-more i {
            margin-left: 5px;
            transition: transform 0.3s;
        }
        
        .read-more:hover i {
            transform: translateX(5px);
        }
        
        /* Events Section */
        .events {
            padding: 80px 0;
            background-color: var(--color-gray);
        }
        
        .events-container {
            display: flex;
            gap: 40px;
            margin-top: 50px;
        }
        
        .upcoming-events {
            flex: 2;
        }
        
        .event-card {
            background-color: var(--color-light);
            border-radius: 10px;
            padding: 25px;
            margin-bottom: 20px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
            display: flex;
            gap: 20px;
        }
        
        .event-date {
            background-color: var(--color-primary);
            color: var(--color-light);
            width: 70px;
            height: 70px;
            border-radius: 10px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }
        
        .event-day {
            font-size: 1.8rem;
            font-weight: 700;
            line-height: 1;
        }
        
        .event-month {
            font-size: 0.9rem;
            text-transform: uppercase;
        }
        
        .event-info h3 {
            margin-bottom: 10px;
            color: var(--color-primary);
        }
        
        .event-meta {
            display: flex;
            gap: 15px;
            margin-bottom: 10px;
            color: #777;
            font-size: 0.9rem;
        }
        
        .event-meta i {
            margin-right: 5px;
        }
        
        .calendar {
            flex: 1;
            background-color: var(--color-light);
            border-radius: 10px;
            padding: 25px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .calendar h3 {
            margin-bottom: 20px;
            color: var(--color-primary);
            text-align: center;
        }
        
        .calendar-placeholder {
            text-align: center;
            padding: 30px;
            background-color: var(--color-light-blue);
            border-radius: 8px;
        }
        
        .calendar-placeholder i {
            font-size: 3rem;
            color: var(--color-primary);
            margin-bottom: 15px;
        }
        
        /* Contact Section */
        .contact {
            padding: 80px 0;
            background-color: var(--color-light);
        }
        
        .contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 40px;
            margin-top: 50px;
        }
        
        .contact-info {
            background-color: var(--color-light-blue);
            border-radius: 10px;
            padding: 30px;
        }
        
        .contact-info h3 {
            margin-bottom: 20px;
            color: var(--color-primary);
        }
        
        .contact-item {
            display: flex;
            margin-bottom: 20px;
        }
        
        .contact-icon {
            width: 40px;
            color: var(--color-primary);
            font-size: 1.2rem;
        }
        
        .contact-details h4 {
            margin-bottom: 5px;
            color: var(--color-dark);
        }
        
        .contact-form {
            background-color: var(--color-light);
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        }
        
        .contact-form h3 {
            margin-bottom: 20px;
            color: var(--color-primary);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
        }
        
        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 12px 15px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            transition: border-color 0.3s;
        }
        
        .form-group input:focus,
        .form-group textarea:focus {
            border-color: var(--color-primary);
            outline: none;
        }
        
        .form-group textarea {
            min-height: 120px;
            resize: vertical;
        }
        
        /* Footer */
        footer {
            background-color: var(--color-dark);
            color: var(--color-light);
            padding: 60px 0 20px;
        }
        
        .footer-content {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            margin-bottom: 40px;
        }
        
        .footer-logo {
            margin-bottom: 15px;
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--color-light);
        }
        
        .footer-info p {
            margin-bottom: 15px;
            color: #ccc;
        }
        
        .footer-links h4 {
            margin-bottom: 15px;
            font-size: 1.2rem;
            color: var(--color-light);
        }
        
        .footer-links ul {
            list-style: none;
        }
        
        .footer-links ul li {
            margin-bottom: 10px;
        }
        
        .footer-links ul li a {
            color: #ccc;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .footer-links ul li a:hover {
            color: var(--color-light);
        }
        
        .social-icons {
            display: flex;
            gap: 15px;
            margin-top: 15px;
        }
        
        .social-icons a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 40px;
            height: 40px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            color: var(--color-light);
            font-size: 1.2rem;
            transition: all 0.3s;
        }
        
        .social-icons a:hover {
            background-color: var(--color-primary);
            transform: translateY(-3px);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 20px;
            border-top: 1px solid #555;
            font-size: 0.9rem;
            color: #ccc;
        }
        
        /* Responsive */
        @media (max-width: 992px) {
            .welcome-content {
                flex-direction: column;
            }
            
            .events-container {
                flex-direction: column;
            }
        }
        
        @media (max-width: 768px) {
            .header-content {
                flex-direction: column;
            }
            
            nav ul {
                margin-top: 15px;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            nav ul li {
                margin: 5px 10px;
            }
            
            .search-login {
                margin-top: 15px;
            }
            
            .hero h1 {
                font-size: 2.2rem;
            }
            
            .hero p {
                font-size: 1.1rem;
            }
            
            .hero-buttons {
                flex-direction: column;
                align-items: center;
            }
            
            .section-title {
                font-size: 2rem;
            }
            
            .event-card {
                flex-direction: column;
            }
            
            .event-date {
                align-self: flex-start;
            }
            
            .contact-grid {
                grid-template-columns: 1fr;
            }
            
            .footer-content {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-top">
            <div class="container header-top-content">
                <div>Instituto Municipal de Cultura de Tenjo</div>
                <div>Fecha: <span id="current-date"></span></div>
            </div>
            <!-- aaaaa -->
        </div>
        <div class="container header-main">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-text">SICUT</div>
                </div>
                <nav>
                    <ul>
                        <li><a href="#" class="active">Inicio</a></li>
                        <li><a href="./sectoresCulturales.php">Sectores Culturales</a></li>
                        <li><a href="./galeria.php">Galería</a></li>
                        <li><a href="./registro.php">Registro</a></li>
                        <li><a href="./inicio.php">inicio de session</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Instituto de Cultura de Tenjo</h1>
            <p>Promoviendo y preservando el patrimonio cultural del municipio de Tenjo, Cundinamarca</p>
            <div class="hero-buttons">
                <button class="btn btn-primary">Explorar Actividades</button>
                <button class="btn btn-secondary">Convocatorias 2023</button>
            </div>
        </div>
    </section>

    <!-- Welcome Section -->
    <section class="welcome">
        <div class="container">
            <div class="welcome-content">
                <div class="welcome-text">
                    <h2 class="section-title">Bienvenidos al Instituto de Cultura de Tenjo</h2>
                    <p class="section-subtitle">Trabajamos por el desarrollo cultural de nuestro municipio</p>
                    <p>El Instituto de Cultura de Tenjo es una entidad dedicada a la promoción, fomento y desarrollo de las expresiones culturales del municipio. Nuestra misión es preservar el patrimonio cultural, apoyar a los artistas locales y generar espacios de participación para la comunidad.</p>
                    <p>Desde 1998, hemos trabajado incansablemente para fortalecer la identidad cultural tenjana a través de programas, eventos y actividades que involucran a todos los sectores de la población.</p>
                    <button class="btn btn-primary" style="margin-top: 20px;">Conoce más sobre nosotros</button>
                </div>
                <div class="welcome-image">
                    <img src="https://images.unsplash.com/photo-1581888227592-83c55b9c0946?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Cultura Tenjo">
                </div>
            </div>
        </div>
    </section>

    <!-- Highlights Section -->
    <section class="highlights">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Nuestros Principales Ejes de Trabajo</h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 50px;">Trabajamos en diferentes áreas para promover el desarrollo cultural integral de Tenjo</p>
            
            <div class="highlights-grid">
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="fas fa-theater-masks"></i>
                    </div>
                    <h3>Formación Artística</h3>
                    <p>Programas de formación en diferentes disciplinas artísticas para niños, jóvenes y adultos.</p>
                </div>
                
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>Patrimonio Cultural</h3>
                    <p>Protección, conservación y divulgación del patrimonio material e inmaterial de Tenjo.</p>
                </div>
                
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>Eventos Culturales</h3>
                    <p>Organización de festivales, conciertos, exposiciones y actividades culturales para la comunidad.</p>
                </div>
                
                <div class="highlight-card">
                    <div class="highlight-icon">
                        <i class="fas fa-hands-helping"></i>
                    </div>
                    <h3>Apoyo a Artistas</h3>
                    <p>Asesoría, acompañamiento y estímulos para artistas y gestores culturales del municipio.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- News Section -->
    <section class="news">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Noticias y Actualidad</h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 50px;">Mantente informado sobre lo que acontece en el ámbito cultural de Tenjo</p>
            
            <div class="news-grid">
                <div class="news-card">
                    <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="news-content">
                        <span class="news-date"><i class="far fa-calendar-alt"></i> 15 Octubre, 2023</span>
                        <h3>Abiertas convocatorias para el Festival de Danza 2023</h3>
                        <p>El Instituto de Cultura abre las inscripciones para el XXV Festival Municipal de Danza Tradicional de Tenjo.</p>
                        <a href="#" class="read-more">Leer más <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="news-card">
                    <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1518998053901-5348d3961a04?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="news-content">
                        <span class="news-date"><i class="far fa-calendar-alt"></i> 8 Octubre, 2023</span>
                        <h3>Inauguración de la nueva sala de exposiciones</h3>
                        <p>El próximo viernes se inaugurará la nueva sala de exposiciones del Centro Cultural de Tenjo con una muestra de artistas locales.</p>
                        <a href="#" class="read-more">Leer más <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
                
                <div class="news-card">
                    <div class="news-image" style="background-image: url('https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="news-content">
                        <span class="news-date"><i class="far fa-calendar-alt"></i> 1 Octubre, 2023</span>
                        <h3>Concierto de música andina en el parque principal</h3>
                        <p>Este domingo se realizará un concierto gratuito de música andina colombiana con agrupaciones locales en el parque principal.</p>
                        <a href="#" class="read-more">Leer más <i class="fas fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            
            <div style="text-align: center; margin-top: 40px;">
                <button class="btn btn-primary">Ver todas las noticias</button>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section class="events">
        <div class="container">
            <h2 class="section-title" style="text-align: center;">Próximos Eventos</h2>
            <p style="text-align: center; max-width: 800px; margin: 0 auto 50px;">Participa en nuestras actividades y eventos culturales</p>
            
            <div class="events-container">
                <div class="upcoming-events">
                    <div class="event-card">
                        <div class="event-date">
                            <div class="event-day">20</div>
                            <div class="event-month">Oct</div>
                        </div>
                        <div class="event-info">
                            <h3>Taller de Pintura para Niños</h3>
                            <div class="event-meta">
                                <span><i class="far fa-clock"></i> 9:00 AM - 12:00 PM</span>
                                <span><i class="fas fa-map-marker-alt"></i> Centro Cultural de Tenjo</span>
                            </div>
                            <p>Taller gratuito de introducción a la pintura para niños entre 7 y 12 años.</p>
                        </div>
                    </div>
                    
                    <div class="event-card">
                        <div class="event-date">
                            <div class="event-day">25</div>
                            <div class="event-month">Oct</div>
                        </div>
                        <div class="event-info">
                            <h3>Presentación de Teatro Comunitario</h3>
                            <div class="event-meta">
                                <span><i class="far fa-clock"></i> 6:00 PM - 8:00 PM</span>
                                <span><i class="fas fa-map-marker-alt"></i> Teatro Municipal</span>
                            </div>
                            <p>Obra "Historias de Mi Pueblo" a cargo del grupo de teatro comunitario de Tenjo.</p>
                        </div>
                    </div>
                    
                    <div class="event-card">
                        <div class="event-date">
                            <div class="event-day">28</div>
                            <div class="event-month">Oct</div>
                        </div>
                        <div class="event-info">
                            <h3>Feria de Artesanías "Manos Creativas"</h3>
                            <div class="event-meta">
                                <span><i class="far fa-clock"></i> 10:00 AM - 6:00 PM</span>
                                <span><i class="fas fa-map-marker-alt"></i> Plaza Principal</span>
                            </div>
                            <p>Feria de artesanías locales con muestra y venta de productos tradicionales.</p>
                        </div>
                    </div>
                </div>
                
                <div class="calendar">
                    <h3>Calendario Cultural</h3>
                    <div class="calendar-placeholder">
                        <i class="far fa-calendar-alt"></i>
                        <p>Explora nuestro calendario completo de actividades</p>
                        <button class="btn btn-primary" style="margin-top: 15px;">Ver Calendario</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-content">
                <div class="footer-info">
                    <div class="footer-logo">Instituto de Cultura de Tenjo</div>
                    <p>Entidad dedicada a la promoción, fomento y desarrollo de las expresiones culturales del municipio de Tenjo, Cundinamarca.</p>
                    <div class="social-icons">
                        <a href="#"><i class="fab fa-facebook-f"></i></a>
                        <a href="#"><i class="fab fa-instagram"></i></a>
                        <a href="#"><i class="fab fa-twitter"></i></a>
                        <a href="#"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Enlaces rápidos</h4>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Sectores Culturales</a></li>
                        <li><a href="#">Eventos</a></li>
                        <li><a href="#">Convocatorias</a></li>
                        <li><a href="#">Noticias</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Recursos</h4>
                    <ul>
                        <li><a href="#">Documentos</a></li>
                        <li><a href="#">Publicaciones</a></li>
                        <li><a href="#">Galería Multimedia</a></li>
                        <li><a href="#">Preguntas Frecuentes</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Legal</h4>
                    <ul>
                        <li><a href="#">Política de Privacidad</a></li>
                        <li><a href="#">Términos y Condiciones</a></li>
                        <li><a href="#">Trámites y Servicios</a></li>
                        <li><a href="#">Mapa del Sitio</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Instituto de Cultura de Tenjo. Todos los derechos reservados.</p>
            </div>
        </div>
    </footer>

    <script>
        // Fecha actual
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('current-date').textContent = now.toLocaleDateString('es-ES', options);
        
        // Funcionalidad básica de botones
        document.querySelectorAll('.btn').forEach(button => {
            button.addEventListener('click', function() {
                const buttonText = this.textContent;
                alert(`Función para: ${buttonText} (en desarrollo)`);
            });
        });
        
        // Interactividad para las tarjetas de noticias
        const newsCards = document.querySelectorAll('.news-card');
        newsCards.forEach(card => {
            card.addEventListener('click', function() {
                const newsTitle = this.querySelector('h3').textContent;
                alert(`Leer noticia: ${newsTitle} (función en desarrollo)`);
            });
        });
    </script>
</body>
</html>