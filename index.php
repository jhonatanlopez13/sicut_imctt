<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SoyCultura - Ministerio de Cultura de Colombia</title>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        :root {
            --color-primary: #9D2449;
            --color-secondary: #F8B32C;
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
            transition: background-color 0.3s;
        }
        
        .btn-primary {
            background-color: var(--color-primary);
            color: var(--color-light);
        }
        
        .btn-primary:hover {
            background-color: #7a1d3a;
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
            background-color: var(--color-secondary);
            color: var(--color-dark);
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 30px;
        }
        
        .btn-hero:hover {
            background-color: #e09e1c;
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
            grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            gap: 25px;
        }
        
        .category-card {
            background-color: var(--color-light);
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s;
        }
        
        .category-card:hover {
            transform: translateY(-5px);
        }
        
        .category-img {
            height: 160px;
            background-color: #ddd;
            background-size: cover;
            background-position: center;
        }
        
        .category-content {
            padding: 20px;
        }
        
        .category-content h3 {
            margin-bottom: 10px;
            color: var(--color-primary);
        }
        
        /* Events */
        .events {
            padding: 60px 0;
        }
        
        .event-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 30px;
        }
        
        .event-card {
            border: 1px solid #eee;
            border-radius: 8px;
            overflow: hidden;
        }
        
        .event-img {
            height: 200px;
            background-color: #ddd;
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
        }
        
        .event-content h3 {
            margin-bottom: 10px;
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
        }
        
        .footer-links h4 {
            margin-bottom: 15px;
            font-size: 1.2rem;
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
            color: var(--color-light);
            font-size: 1.2rem;
            transition: color 0.3s;
        }
        
        .social-icons a:hover {
            color: var(--color-secondary);
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
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        
        <div class="container header-main">
            <div class="header-content">
                <div class="logo">
                    <div class="logo-text">Sicut</div>
                </div>
                <nav>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                         <li><a href="./sectoresCulturales.php">sectores culturales</a></li>
                        <li><a href="./registro.php">registro</a></li>
                        <li><a href="./inicio.php">inicio de seccion</a></li>
                        <li><a href="./directorio.php">Eventos</a></li>
                       
                    </ul>
                </nav>

            </div>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="hero">
        <div class="container">
            <h1>Descubre la riqueza cultural de Colombia</h1>
            <p>Explora, conoce y participa en la diversidad de expresiones culturales de nuestro país</p>
            <button class="btn btn-hero">Comenzar a explorar</button>
        </div>
    </section>

    <!-- Categories Section -->
    <section class="categories">
        <div class="container">
            <h2 class="section-title">Categorías Culturales</h2>
            <div class="category-grid">
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1549490349-8643362247b5?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Artes Escénicas</h3>
                        <p>Teatro, danza, circo y otras expresiones performáticas</p>
                    </div>
                </div>
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1516280440614-37939bbacd81?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Artes Visuales</h3>
                        <p>Pintura, escultura, fotografía y artes digitales</p>
                    </div>
                </div>
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1511735111819-9a3f7709049c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Música</h3>
                        <p>Diferentes géneros y expresiones musicales de Colombia</p>
                    </div>
                </div>
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1544787219-7f47ccb76574?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Patrimonio</h3>
                        <p>Bienes materiales e inmateriales de valor cultural</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Events Section -->
    <section class="events">
        <div class="container">
            <h2 class="section-title">Próximos Eventos</h2>
            <div class="event-grid">
                <div class="event-card">
                    <div class="event-img" style="background-image: url('https://images.unsplash.com/photo-1549451378-6e51e01c93a3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="event-content">
                        <div class="event-date">15 Octubre 2023 - Bogotá</div>
                        <h3>Festival de Danza Contemporánea</h3>
                        <p>Un encuentro con las mejores expresiones de danza contemporánea del país.</p>
                    </div>
                </div>
                <div class="event-card">
                    <div class="event-img" style="background-image: url('https://images.unsplash.com/photo-1506157786151-b8491531f063?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="event-content">
                        <div class="event-date">22 Octubre 2023 - Medellín</div>
                        <h3>Feria Artesanal Colombiana</h3>
                        <p>Exposición y venta de productos artesanales de todas las regiones de Colombia.</p>
                    </div>
                </div>
                <div class="event-card">
                    <div class="event-img" style="background-image: url('https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="event-content">
                        <div class="event-date">5 Noviembre 2023 - Cali</div>
                        <h3>Concierto Nacional de Música Andina</h3>
                        <p>Los mejores intérpretes de música andina colombiana en un solo escenario.</p>
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
                    <div class="footer-logo">SoyCultura</div>
                    <p>Portal de promoción y divulgación de la cultura colombiana.</p>
                    <div class="social-icons">
                        <a href="#">FB</a>
                        <a href="#">TW</a>
                        <a href="#">IG</a>
                        <a href="#">YT</a>
                    </div>
                </div>
                <div class="footer-links">
                    <h4>Enlaces rápidos</h4>
                    <ul>
                        <li><a href="#">Inicio</a></li>
                        <li><a href="#">Categorías</a></li>
                        <li><a href="#">Eventos</a></li>
                        <li><a href="#">Mapa Cultural</a></li>
                        <li><a href="#">Convocatorias</a></li>
                    </ul>
                </div>
                <div class="footer-links">
                    <h4>Ministerio de Cultura</h4>
                    <ul>
                        <li><a href="#">Sobre nosotros</a></li>
                        <li><a href="#">Políticas</a></li>
                        <li><a href="#">Contacto</a></li>
                        <li><a href="#">Trámites y servicios</a></li>
                        <li><a href="#">Preguntas frecuentes</a></li>
                    </ul>
                </div>
            </div>
            <div class="footer-bottom">
                <p>&copy; 2023 Ministerio de Cultura de Colombia. Todos los derechos reservados.</p>
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
            alert('¡Bienvenido a SoyCultura! Explora nuestra diversidad cultural.');
        });
        
        document.querySelector('.btn-primary').addEventListener('click', function() {
            alert('Funcionalidad de inicio de sesión en desarrollo.');
        });
    </script>
</body>
</html>