<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instituto de Cultura de Tenjo - Sectores Culturales</title>
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
        
        nav ul li a:hover {
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
            padding: 8px 15px;
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
        
        /* Hero Section */
        .hero {
            background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url('https://images.unsplash.com/photo-1584696049838-8e692282a2e3?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80');
            background-size: cover;
            background-position: center;
            color: var(--color-light);
            padding: 80px 0;
            text-align: center;
        }
        
        .hero h1 {
            font-size: 2.5rem;
            margin-bottom: 20px;
        }
        
        .hero p {
            font-size: 1.2rem;
            max-width: 700px;
            margin: 0 auto 30px;
        }
        
        .btn-hero {
            background-color: var(--color-accent);
            color: var(--color-dark);
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 30px;
        }
        
        .btn-hero:hover {
            background-color: #d97d01;
        }
        
        /* Page Header */
        .page-header {
            text-align: center;
            margin: 40px 0;
            padding: 20px 0;
        }
        
        .page-title {
            font-size: 2.5rem;
            color: var(--color-primary);
            margin-bottom: 15px;
        }
        
        .page-subtitle {
            font-size: 1.2rem;
            color: var(--color-dark);
            max-width: 700px;
            margin: 0 auto;
        }
        
        /* Categories */
        .categories {
            padding: 60px 0;
            background-color: var(--color-gray);
        }
        
        .section-title {
            text-align: center;
            margin-bottom: 40px;
            color: var(--color-primary);
            font-size: 2rem;
        }
        
        .category-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 25px;
        }
        
        .category-card {
            background-color: var(--color-light);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .category-card:hover {
            transform: translateY(-5px);
        }
        
        .category-img {
            height: 200px;
            background-size: cover;
            background-position: center;
            position: relative;
        }
        
        .category-content {
            padding: 25px;
        }
        
        .category-content h3 {
            margin-bottom: 15px;
            color: var(--color-primary);
            font-size: 1.4rem;
        }
        
        .category-content p {
            margin-bottom: 20px;
        }
        
        .category-stats {
            display: flex;
            justify-content: space-between;
            border-top: 1px solid #eee;
            padding-top: 15px;
        }
        
        .stat {
            text-align: center;
        }
        
        .stat-value {
            font-size: 1.2rem;
            font-weight: 700;
            color: var(--color-primary);
        }
        
        .stat-label {
            font-size: 0.8rem;
            color: #777;
        }
        
        /* Cultural Info */
        .cultural-info {
            padding: 60px 0;
            background-color: var(--color-light);
        }
        
        .info-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .info-card {
            background-color: var(--color-gray);
            border-radius: 8px;
            padding: 30px;
            text-align: center;
        }
        
        .info-icon {
            font-size: 2.5rem;
            color: var(--color-primary);
            margin-bottom: 15px;
        }
        
        .info-card h3 {
            margin-bottom: 15px;
            color: var(--color-primary);
        }
        
        /* Events */
        .events {
            padding: 60px 0;
            background-color: var(--color-gray);
        }
        
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .event-card {
            background-color: var(--color-light);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }
        
        .event-img {
            height: 180px;
            background-size: cover;
            background-position: center;
        }
        
        .event-content {
            padding: 20px;
        }
        
        .event-date {
            color: var(--color-primary);
            font-weight: 600;
            margin-bottom: 10px;
            display: flex;
            align-items: center;
        }
        
        .event-date i {
            margin-right: 8px;
        }
        
        .event-content h3 {
            margin-bottom: 10px;
            color: var(--color-dark);
        }
        
        .event-location {
            color: #777;
            display: flex;
            align-items: center;
            margin-bottom: 15px;
        }
        
        .event-location i {
            margin-right: 8px;
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
        
        .contact-info {
            margin-bottom: 15px;
        }
        
        .contact-item {
            display: flex;
            margin-bottom: 10px;
            color: #ccc;
        }
        
        .contact-item i {
            margin-right: 10px;
            color: var(--color-accent);
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
                font-size: 2rem;
            }
            
            .hero p {
                font-size: 1rem;
            }
            
            .category-grid,
            .info-grid,
            .event-grid {
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
        </div>
        <div class="container header-main">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-text">SICUT</div>
                </div>
                <nav>
                    <ul>
                        <li><a href="./index.php">Inicio</a></li>
                        <li><a href="#" class="active">Sectores Culturales</a></li>
                        <li><a href="./galeria.php">Galería</a></li>
                        <li><a href="./registro.php">Registro</a></li>
                        <li><a href="./inicio.php">Inicio de Sesión</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <div class="container">
        <div class="page-header">
            <h1 class="page-title">Sectores Culturales de Tenjo</h1>
            <p class="page-subtitle">Descubre la riqueza cultural de nuestro municipio a través de sus diferentes expresiones artísticas y patrimoniales</p>
        </div>
    </div>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <h2 class="section-title">Nuestros Sectores Culturales</h2>
            <div class="category-grid">
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1549451378-6e51e01c93a3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Artes Escénicas</h3>
                        <p>Grupos de teatro, danza y expresiones performáticas que enriquecen la vida cultural de Tenjo con sus presentaciones y festivales.</p>
                        <div class="category-stats">
                            <div class="stat">
                                <div class="stat-value">12</div>
                                <div class="stat-label">Grupos</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">45</div>
                                <div class="stat-label">Eventos anuales</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">3</div>
                                <div class="stat-label">Festivales</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1516280440614-37939bbacd81?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Artes Visuales</h3>
                        <p>Pintores, escultores y artistas visuales que capturan la esencia de Tenjo a través de diversas técnicas y expresiones artísticas.</p>
                        <div class="category-stats">
                            <div class="stat">
                                <div class="stat-value">28</div>
                                <div class="stat-label">Artistas</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">6</div>
                                <div class="stat-label">Exposiciones</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">2</div>
                                <div class="stat-label">Galerías</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1511735111819-9a3f7709049c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Música</h3>
                        <p>Agrupaciones musicales, solistas y escuelas de música que mantienen vivas las tradiciones sonoras de la región.</p>
                        <div class="category-stats">
                            <div class="stat">
                                <div class="stat-value">18</div>
                                <div class="stat-label">Agrupaciones</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">4</div>
                                <div class="stat-label">Escuelas</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">60+</div>
                                <div class="stat-label">Presentaciones</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1544787219-7f47ccb76574?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Patrimonio Cultural</h3>
                        <p>Monumentos, sitios históricos y tradiciones que representan la identidad y memoria colectiva de Tenjo.</p>
                        <div class="category-stats">
                            <div class="stat">
                                <div class="stat-value">15</div>
                                <div class="stat-label">Sitios</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">8</div>
                                <div class="stat-label">Rutas</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">5</div>
                                <div class="stat-label">Museos</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1588200908342-23b585c03e26?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Literatura y Oralidad</h3>
                        <p>Escritores, poetas y narradores que preservan y renuevan las historias y tradiciones literarias de Tenjo.</p>
                        <div class="category-stats">
                            <div class="stat">
                                <div class="stat-value">22</div>
                                <div class="stat-label">Escritores</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">4</div>
                                <div class="stat-label">Grupos</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">12</div>
                                <div class="stat-label">Encuentros</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1506157786151-b8491531f063?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Artesanías y Oficios</h3>
                        <p>Maestros artesanos que conservan técnicas tradicionales y crean piezas únicas que representan nuestra identidad cultural.</p>
                        <div class="category-stats">
                            <div class="stat">
                                <div class="stat-value">35</div>
                                <div class="stat-label">Artesanos</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">7</div>
                                <div class="stat-label">Oficios</div>
                            </div>
                            <div class="stat">
                                <div class="stat-value">3</div>
                                <div class="stat-label">Ferias</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Cultural Info -->
    <section class="cultural-info">
        <div class="container">
            <h2 class="section-title">Nuestra Cultura en Cifras</h2>
            <div class="info-grid">
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <h3>+120 Artistas</h3>
                    <p>Artistas registrados en todos los sectores culturales</p>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-calendar-alt"></i>
                    </div>
                    <h3>+200 Eventos Anuales</h3>
                    <p>Actividades culturales organizadas cada año</p>
                </div>
                <div class="info-card">
                    <div class="info-icon">
                        <i class="fas fa-landmark"></i>
                    </div>
                    <h3>15 Espacios Culturales</h3>
                    <p>Lugares dedicados a la promoción cultural en Tenjo</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section class="events">
        <div class="container">
            <h2 class="section-title">Próximos Eventos Culturales</h2>
            <div class="event-grid">
                <div class="event-card">
                    <div class="event-img" style="background-image: url('https://images.unsplash.com/photo-1549451378-6e51e01c93a3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="event-content">
                        <div class="event-date"><i class="far fa-calendar-alt"></i> 15 Octubre 2023</div>
                        <h3>Festival de Danza Tradicional</h3>
                        <div class="event-location"><i class="fas fa-map-marker-alt"></i> Parque Principal de Tenjo</div>
                        <p>Encuentro de grupos de danza tradicional de Tenjo y municipios aledaños.</p>
                    </div>
                </div>
                <div class="event-card">
                    <div class="event-img" style="background-image: url('https://images.unsplash.com/photo-1506157786151-b8491531f063?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="event-content">
                        <div class="event-date"><i class="far fa-calendar-alt"></i> 22 Octubre 2023</div>
                        <h3>Feria Artesanal "Manos de Tenjo"</h3>
                        <div class="event-location"><i class="fas fa-map-marker-alt"></i> Plaza de Mercado</div>
                        <p>Exposición y venta de productos artesanales creados por maestros tenjanos.</p>
                    </div>
                </div>
                <div class="event-card">
                    <div class="event-img" style="background-image: url('https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="event-content">
                        <div class="event-date"><i class="far fa-calendar-alt"></i> 5 Noviembre 2023</div>
                        <h3>Concierto de Música Andina</h3>
                        <div class="event-location"><i class="fas fa-map-marker-alt"></i> Teatro Municipal</div>
                        <p>Presentación de agrupaciones musicales con repertorio de música andina colombiana.</p>
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
                    <h4>Contacto</h4>
                    <div class="contact-info">
                        <div class="contact-item">
                            <i class="fas fa-map-marker-alt"></i>
                            <span>Carrera 5 # 10 - 20, Tenjo</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-phone"></i>
                            <span>(1) 876 5432</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-envelope"></i>
                            <span>cultura@tenjo.gov.co</span>
                        </div>
                        <div class="contact-item">
                            <i class="fas fa-clock"></i>
                            <span>Lun-Vie: 8:00 AM - 5:00 PM</span>
                        </div>
                    </div>
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
        document.querySelector('.btn-hero').addEventListener('click', function() {
            alert('¡Bienvenido al Instituto de Cultura de Tenjo! Descubre nuestra oferta cultural.');
        });
        
        document.querySelector('.btn-primary').addEventListener('click', function() {
            alert('Sistema de autenticación en desarrollo.');
        });
        
        // Interactividad para las tarjetas de categorías
        const categoryCards = document.querySelectorAll('.category-card');
        categoryCards.forEach(card => {
            card.addEventListener('click', function() {
                const categoryName = this.querySelector('h3').textContent;
                alert(`Explorando el sector: ${categoryName}`);
            });
        });
    </script>
</body>
</html>