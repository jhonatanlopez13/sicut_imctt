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
            display: flex;
            justify-content: space-between;
            align-items: center;
            cursor: pointer;
        }
        
        .category-content h3 i {
            transition: transform 0.3s;
        }
        
        .category-content h3.active i {
            transform: rotate(180deg);
        }
        
        .category-content p {
            margin-bottom: 20px;
        }
        
        .category-details {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease;
        }
        
        .category-details.active {
            max-height: 1000px;
        }
        
        .detail-item {
            margin-bottom: 15px;
            padding-bottom: 15px;
            border-bottom: 1px solid #eee;
        }
        
        .detail-item:last-child {
            border-bottom: none;
        }
        
        .detail-title {
            font-weight: 600;
            color: var(--color-secondary);
            margin-bottom: 5px;
        }
        
        .representatives {
            margin-top: 15px;
        }
        
        .representative {
            display: flex;
            align-items: center;
            margin-bottom: 10px;
        }
        
        .rep-img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background-size: cover;
            background-position: center;
            margin-right: 10px;
        }
        
        .rep-info h4 {
            font-size: 0.9rem;
            margin-bottom: 2px;
        }
        
        .rep-info p {
            font-size: 0.8rem;
            color: #777;
            margin: 0;
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
            .info-grid {
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
                <!-- Artes Escénicas -->
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1549451378-6e51e01c93a3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Artes Escénicas</h3>
                        <p>Grupos de teatro, danza y expresiones performáticas que enriquecen la vida cultural de Tenjo con sus presentaciones y festivales.</p>
                        <div class="category-details">
                            <div class="detail-item">
                                <div class="detail-title">Grupos Destacados</div>
                                <p>Compañía de Teatro Tenjano, Grupo de Danzas Folclóricas Raíces, Colectivo Performático Andino.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Eventos Principales</div>
                                <p>Festival Anual de Teatro Callejero, Encuentro de Danzas Tradicionales, Muestra de Performance Contemporáneo.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Representantes</div>
                                <div class="representatives">
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Carlos Méndez</h4>
                                            <p>Director de Teatro</p>
                                        </div>
                                    </div>
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>María González</h4>
                                            <p>Coreógrafa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Artes Visuales -->
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1516280440614-37939bbacd81?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Artes Visuales</h3>
                        <p>Pintores, escultores y artists visuales que capturan la esencia de Tenjo a través de diversas técnicas y expresiones artísticas.</p>
                        <div class="category-details">
                            <div class="detail-item">
                                <div class="detail-title">Disciplinas</div>
                                <p>Pintura al óleo, acuarela, escultura en madera y piedra, fotografía artística, instalaciones.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Espacios de Exhibición</div>
                                <p>Galería Municipal, Casa de la Cultura, Salón de Exposiciones del Centro Histórico.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Representantes</div>
                                <div class="representatives">
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1567532939604-b6b5b0db1604?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Jorge Ramírez</h4>
                                            <p>Pintor y Escultor</p>
                                        </div>
                                    </div>
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Ana Torres</h4>
                                            <p>Fotógrafa</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Música -->
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1511735111819-9a3f7709049c?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Música</h3>
                        <p>Agrupaciones musicales, solistas y escuelas de música que mantienen vivas las tradiciones sonoras de la región.</p>
                        <div class="category-details">
                            <div class="detail-item">
                                <div class="detail-title">Géneros Musicales</div>
                                <p>Música andina colombiana, bambuco, pasillo, guabina, música carranguera, rock fusión.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Agrupaciones Destacadas</div>
                                <p>Estudiantina Tenjana, Trío Voces del Alba, Grupo de Chirimía, Banda Sinfónica Municipal.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Representantes</div>
                                <div class="representatives">
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1500648767791-00dcc994a43e?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Luis Fernández</h4>
                                            <p>Director Musical</p>
                                        </div>
                                    </div>
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1489424731084-a5d8b219a5bb?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Sofía Mendoza</h4>
                                            <p>Cantautora</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Patrimonio Cultural -->
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1544787219-7f47ccb76574?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Patrimonio Cultural</h3>
                        <p>Monumentos, sitios históricos y tradiciones que representan la identidad y memoria colectiva de Tenjo.</p>
                        <div class="category-details">
                            <div class="detail-item">
                                <div class="detail-title">Sitios de Interés</div>
                                <p>Iglesia de Nuestra Señora de la Asunción, Casa Museo Juan Nepomuceno, Puente de Piedra Colonial.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Tradiciones</div>
                                <p>Festival del Maíz, Fiestas Patronales, Ruta de la Chicha y la Guarapo, Mercado Campesino.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Representantes</div>
                                <div class="representatives">
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1552058544-f2b08422138a?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Roberto Díaz</h4>
                                            <p>Historiador Local</p>
                                        </div>
                                    </div>
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1544725176-7c40e5a71c5e?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Carmen Rojas</h4>
                                            <p>Gestora Patrimonial</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Literatura y Oralidad -->
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1588200908342-23b585c03e26?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Literatura y Oralidad</h3>
                        <p>Escritores, poetas y narradores que preservan y renuevan las historias y tradiciones literarias de Tenjo.</p>
                        <div class="category-details">
                            <div class="detail-item">
                                <div class="detail-title">Géneros Literarios</div>
                                <p>Poesía campesina, narrativa histórica, cuento costumbrista, crónica local.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Iniciativas</div>
                                <p>Talleres de escritura creativa, recitales poéticos, encuentros de narración oral, feria del libro local.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Representantes</div>
                                <div class="representatives">
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1560250097-0b93528c311a?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Alberto Morales</h4>
                                            <p>Poeta y Escritor</p>
                                        </div>
                                    </div>
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1573497019940-1c28c88b4f3e?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Elena Castro</h4>
                                            <p>Narradora Oral</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Artesanías y Oficios -->
                <div class="category-card">
                    <div class="category-img" style="background-image: url('https://images.unsplash.com/photo-1506157786151-b8491531f063?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60');"></div>
                    <div class="category-content">
                        <h3>Artesanías y Oficios</h3>
                        <p>Maestros artesanos que conservan técnicas tradicionales y crean piezas únicas que representan nuestra identidad cultural.</p>
                        <div class="category-details">
                            <div class="detail-item">
                                <div class="detail-title">Artesanías Típicas</div>
                                <p>Cerámica, cestería en junco, talla en madera, tejidos en lana, productos en cuero.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Talleres y Mercados</div>
                                <p>Mercado Artesanal Mensual, Ruta de Talleres Artesanales, Feria de Maestros Artesanos.</p>
                            </div>
                            <div class="detail-item">
                                <div class="detail-title">Representantes</div>
                                <div class="representatives">
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Jorge Silva</h4>
                                            <p>Alfarero</p>
                                        </div>
                                    </div>
                                    <div class="representative">
                                        <div class="rep-img" style="background-image: url('https://images.unsplash.com/photo-1485893086445-ed75865251e0?ixlib=rb-1.2.1&auto=format&fit=crop&w=100&q=60');"></div>
                                        <div class="rep-info">
                                            <h4>Rosa Herrera</h4>
                                            <p>Tejedora</p>
                                        </div>
                                    </div>
                                </div>
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
        
        // Funcionalidad corregida para los acordeones de sectores culturales
        const categoryHeaders = document.querySelectorAll('.category-content h3');
        
        categoryHeaders.forEach(header => {
            header.addEventListener('click', function() {
                // Toggle clase active en el header
                this.classList.toggle('active');
                
                // Obtener el elemento de detalles (el siguiente elemento después del párrafo)
                const details = this.nextElementSibling.nextElementSibling;
                
                // Alternar la clase active en los detalles
                details.classList.toggle('active');
                
                // Cerrar otros acordeones al abrir uno nuevo (opcional)
                categoryHeaders.forEach(otherHeader => {
                    if (otherHeader !== this) {
                        otherHeader.classList.remove('active');
                        const otherDetails = otherHeader.nextElementSibling.nextElementSibling;
                        otherDetails.classList.remove('active');
                    }
                });
            });
        });
    </script>
</body>
</html>