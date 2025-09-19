<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Galería de Fotos - Instituto de Cultura de Tenjo</title>
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
        
        /* Page Header */
        .page-header {
            background-color: var(--color-light-blue);
            padding: 60px 0 40px;
            text-align: center;
        }
        
        .page-header h1 {
            font-size: 2.5rem;
            color: var(--color-primary);
            margin-bottom: 15px;
        }
        
        .breadcrumb {
            display: flex;
            justify-content: center;
            list-style: none;
            font-size: 0.9rem;
        }
        
        .breadcrumb li {
            margin: 0 5px;
        }
        
        .breadcrumb li:not(:last-child):after {
            content: ">";
            margin-left: 10px;
            color: #777;
        }
        
        .breadcrumb a {
            color: var(--color-primary);
            text-decoration: none;
        }
        
        .breadcrumb a:hover {
            text-decoration: underline;
        }
        
        /* Gallery Section */
        .gallery {
            padding: 80px 0;
        }
        
        .gallery-filters {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 40px;
        }
        
        .filter-btn {
            padding: 8px 20px;
            background-color: var(--color-light);
            border: 1px solid #ddd;
            border-radius: 30px;
            cursor: pointer;
            font-weight: 600;
            transition: all 0.3s;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background-color: var(--color-primary);
            color: var(--color-light);
            border-color: var(--color-primary);
        }
        
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 25px;
        }
        
        .gallery-item {
            position: relative;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            height: 250px;
        }
        
        .gallery-item img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s;
        }
        
        .gallery-item:hover img {
            transform: scale(1.1);
        }
        
        .gallery-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.7), transparent);
            display: flex;
            flex-direction: column;
            justify-content: flex-end;
            padding: 20px;
            color: var(--color-light);
            opacity: 0;
            transition: opacity 0.3s;
        }
        
        .gallery-item:hover .gallery-overlay {
            opacity: 1;
        }
        
        .gallery-title {
            font-weight: 700;
            margin-bottom: 5px;
            font-size: 1.1rem;
        }
        
        .gallery-category {
            font-size: 0.9rem;
            color: var(--color-accent);
        }
        
        /* Pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 50px;
            gap: 10px;
        }
        
        .pagination-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: var(--color-light);
            border: 1px solid #ddd;
            cursor: pointer;
            transition: all 0.3s;
        }
        
        .pagination-btn:hover, .pagination-btn.active {
            background-color: var(--color-primary);
            color: var(--color-light);
            border-color: var(--color-primary);
        }
        
        /* Lightbox */
        .lightbox {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.9);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s;
        }
        
        .lightbox.open {
            opacity: 1;
            pointer-events: auto;
        }
        
        .lightbox-content {
            position: relative;
            max-width: 90%;
            max-height: 90%;
        }
        
        .lightbox-img {
            max-width: 100%;
            max-height: 80vh;
            border-radius: 5px;
        }
        
        .lightbox-caption {
            color: var(--color-light);
            text-align: center;
            margin-top: 15px;
            font-size: 1.1rem;
        }
        
        .lightbox-close {
            position: absolute;
            top: -40px;
            right: 0;
            color: var(--color-light);
            font-size: 2rem;
            cursor: pointer;
            background: none;
            border: none;
        }
        
        .lightbox-nav {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            padding: 0 20px;
        }
        
        .lightbox-btn {
            background-color: rgba(255, 255, 255, 0.2);
            color: var(--color-light);
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            cursor: pointer;
            border: none;
            transition: background-color 0.3s;
        }
        
        .lightbox-btn:hover {
            background-color: var(--color-primary);
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
            
            .gallery-grid {
                grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            }
            
            .lightbox-btn {
                width: 40px;
                height: 40px;
                font-size: 1.2rem;
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
                        <li><a href="./sectoresCulturales.php">Sectores Culturales</a></li>
                        <li><a href="#" class="active">Galería</a></li>
                        <li><a href="./registro.php">Registro</a></li>
                        <li><a href="./inicio.php">Inicio de sesión</a></li>
                        <li><a href="#">Contacto</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>

    <!-- Page Header -->
    <section class="page-header">
        <div class="container">
            <h1>Galería de Fotos</h1>
            <ul class="breadcrumb">
                <li><a href="./index.html">Inicio</a></li>
                <li>Galería</li>
            </ul>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery">
        <div class="container">
            <div class="gallery-filters">
                <button class="filter-btn active" data-filter="all">Todos</button>
                <button class="filter-btn" data-filter="eventos">Eventos</button>
                <button class="filter-btn" data-filter="talleres">Talleres</button>
                <button class="filter-btn" data-filter="patrimonio">Patrimonio</button>
                <button class="filter-btn" data-filter="artistas">Artistas</button>
            </div>
            
            <div class="gallery-grid">
                <!-- Eventos -->
                <div class="gallery-item" data-category="eventos">
                    <img src="https://images.unsplash.com/photo-1540575467063-178a50c2df87?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Festival de Danza">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Festival de Danza 2023</div>
                        <div class="gallery-category">Eventos</div>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="eventos">
                    <img src="https://images.unsplash.com/photo-1470229722913-7c0e2dbbafd3?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Concierto en el Parque">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Concierto en el Parque</div>
                        <div class="gallery-category">Eventos</div>
                    </div>
                </div>
                
                <!-- Talleres -->
                <div class="gallery-item" data-category="talleres">
                    <img src="https://images.unsplash.com/photo-1544787219-7f47ccb76574?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Taller de Pintura">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Taller de Pintura Infantil</div>
                        <div class="gallery-category">Talleres</div>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="talleres">
                    <img src="https://images.unsplash.com/photo-1513475382585-d06e58bcb0e0?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Taller de Música">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Taller de Música Andina</div>
                        <div class="gallery-category">Talleres</div>
                    </div>
                </div>
                
                <!-- Patrimonio -->
                <div class="gallery-item" data-category="patrimonio">
                    <img src="https://images.unsplash.com/photo-1581888227592-83c55b9c0946?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Iglesia de Tenjo">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Iglesia de Tenjo</div>
                        <div class="gallery-category">Patrimonio</div>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="patrimonio">
                    <img src="https://images.unsplash.com/photo-1515586838455-8f8f940d6853?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Arquitectura Colonial">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Arquitectura Colonial</div>
                        <div class="gallery-category">Patrimonio</div>
                    </div>
                </div>
                
                <!-- Artistas -->
                <div class="gallery-item" data-category="artistas">
                    <img src="https://images.unsplash.com/photo-1518998053901-5348d3961a04?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Exposición de Arte">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Exposición Local</div>
                        <div class="gallery-category">Artistas</div>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="artistas">
                    <img src="https://images.unsplash.com/photo-1541961017774-22349e4a1262?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Artista Local">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Artista Local</div>
                        <div class="gallery-category">Artistas</div>
                    </div>
                </div>
                
                <!-- Más imágenes -->
                <div class="gallery-item" data-category="eventos">
                    <img src="https://images.unsplash.com/photo-1514525253161-7a46d19cd819?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Festival de Teatro">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Festival de Teatro</div>
                        <div class="gallery-category">Eventos</div>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="talleres">
                    <img src="https://images.unsplash.com/photo-1511632765486-a01980e01a18?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Taller de Danza">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Taller de Danza</div>
                        <div class="gallery-category">Talleres</div>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="patrimonio">
                    <img src="https://images.unsplash.com/photo-1515586838455-8f8f940d6853?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Casa Cultural">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Casa Cultural</div>
                        <div class="gallery-category">Patrimonio</div>
                    </div>
                </div>
                
                <div class="gallery-item" data-category="artistas">
                    <img src="https://images.unsplash.com/photo-1544787219-7f47ccb76574?ixlib=rb-1.2.1&auto=format&fit=crop&w=600&q=60" alt="Obra de Arte">
                    <div class="gallery-overlay">
                        <div class="gallery-title">Obra Local</div>
                        <div class="gallery-category">Artistas</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Lightbox -->
    <div class="lightbox">
        <button class="lightbox-close">&times;</button>
        <div class="lightbox-nav">
            <button class="lightbox-btn" id="prev-btn"><i class="fas fa-chevron-left"></i></button>
            <button class="lightbox-btn" id="next-btn"><i class="fas fa-chevron-right"></i></button>
        </div>
        <div class="lightbox-content">
            <img src="" alt="" class="lightbox-img">
            <div class="lightbox-caption"></div>
        </div>
    </div>

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
                        <li><a href="./index.php">Inicio</a></li>
                        <li><a href="./sectoresCulturales.php">Sectores Culturales</a></li>
                        <li><a href="./eventos.php">Eventos</a></li>
                        <li><a href="./galeria.php">Galería</a></li>
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
        </div>
    </footer>

    <script>
        // Fecha actual
        const now = new Date();
        const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
        document.getElementById('current-date').textContent = now.toLocaleDateString('es-ES', options);
        
        // Filtros de galería
        const filterButtons = document.querySelectorAll('.filter-btn');
        const galleryItems = document.querySelectorAll('.gallery-item');
        
        filterButtons.forEach(button => {
            button.addEventListener('click', () => {
                // Remover clase active de todos los botones
                filterButtons.forEach(btn => btn.classList.remove('active'));
                
                // Añadir clase active al botón clickeado
                button.classList.add('active');
                
                // Obtener el valor del filtro
                const filterValue = button.getAttribute('data-filter');
                
                // Filtrar elementos
                galleryItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        item.style.display = 'block';
                    } else {
                        item.style.display = 'none';
                    }
                });
            });
        });
        
        // Lightbox
        const lightbox = document.querySelector('.lightbox');
        const lightboxImg = document.querySelector('.lightbox-img');
        const lightboxCaption = document.querySelector('.lightbox-caption');
        const closeLightbox = document.querySelector('.lightbox-close');
        const nextBtn = document.getElementById('next-btn');
        const prevBtn = document.getElementById('prev-btn');
        
        let currentImageIndex = 0;
        const images = [];
        
        // Llenar array con información de las imágenes
        galleryItems.forEach((item, index) => {
            const imgSrc = item.querySelector('img').src;
            const title = item.querySelector('.gallery-title').textContent;
            const category = item.querySelector('.gallery-category').textContent;
            
            images.push({
                src: imgSrc,
                title: title,
                category: category,
                element: item
            });
            
            // Agregar evento de clic a cada elemento de la galería
            item.addEventListener('click', () => {
                openLightbox(index);
            });
        });
        
        function openLightbox(index) {
            currentImageIndex = index;
            updateLightbox();
            lightbox.classList.add('open');
            document.body.style.overflow = 'hidden'; // Prevenir scroll
        }
        
        function closeLightboxFunc() {
            lightbox.classList.remove('open');
            document.body.style.overflow = 'auto'; // Permitir scroll nuevamente
        }
        
        function updateLightbox() {
            const image = images[currentImageIndex];
            lightboxImg.src = image.src;
            lightboxCaption.textContent = `${image.title} - ${image.category}`;
        }
        
        function showNextImage() {
            currentImageIndex = (currentImageIndex + 1) % images.length;
            updateLightbox();
        }
        
        function showPrevImage() {
            currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
            updateLightbox();
        }
        
        // Event listeners para lightbox
        closeLightbox.addEventListener('click', closeLightboxFunc);
        nextBtn.addEventListener('click', showNextImage);
        prevBtn.addEventListener('click', showPrevImage);
        
        // Cerrar lightbox al hacer clic fuera de la imagen
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) {
                closeLightboxFunc();
            }
        });
        
        // Navegación con teclado
        document.addEventListener('keydown', (e) => {
            if (lightbox.classList.contains('open')) {
                if (e.key === 'Escape') closeLightboxFunc();
                if (e.key === 'ArrowRight') showNextImage();
                if (e.key === 'ArrowLeft') showPrevImage();
            }
        });
        
        // Paginación
        const paginationButtons = document.querySelectorAll('.pagination-btn');
        paginationButtons.forEach(button => {
            button.addEventListener('click', () => {
                paginationButtons.forEach(btn => btn.classList.remove('active'));
                button.classList.add('active');
                alert('Funcionalidad de paginación en desarrollo');
            });
        });
    </script>
</body>
</html>