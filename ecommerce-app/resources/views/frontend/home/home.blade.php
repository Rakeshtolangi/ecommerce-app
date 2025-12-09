<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="Premium online shopping experience with quality products" />
        <meta name="author" content="Your Store" />
        <title>Premium Shop - Quality Products at Best Prices</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="{{ asset('frontend/assets/favicon.ico') }}">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Bootstrap CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
        <!-- Custom CSS -->
        <style>
            :root {
                --primary-color: #2c3e50;
                --secondary-color: #e74c3c;
                --light-bg: #f8f9fa;
                --border-light: #e9ecef;
            }

            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }

            body {
                font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
                color: #333;
                background-color: #fff;
            }

            /* Navbar Styling */
            .navbar {
                background: #fff;
                box-shadow: 0 2px 8px rgba(0,0,0,0.1);
                padding: 1rem 0;
                position: sticky;
                top: 0;
                z-index: 1000;
            }

            .navbar-brand {
                font-size: 1.8rem;
                font-weight: 700;
                color: var(--primary-color) !important;
                letter-spacing: -0.5px;
            }

            .navbar-nav .nav-link {
                font-weight: 500;
                color: #555 !important;
                margin: 0 0.5rem;
                transition: color 0.3s ease;
            }

            .navbar-nav .nav-link:hover,
            .navbar-nav .nav-link.active {
                color: var(--secondary-color) !important;
            }

            .cart-btn {
                background: var(--secondary-color);
                border: none;
                color: white !important;
                font-weight: 600;
                padding: 0.6rem 1.2rem;
                border-radius: 0.5rem;
                transition: all 0.3s ease;
            }

            .cart-btn:hover {
                background: #c0392b;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
            }

            /* Hero Section */
            .hero-section {
                background: linear-gradient(135deg, var(--primary-color) 0%, #34495e 100%);
                color: white;
                padding: 5rem 0;
                position: relative;
                overflow: hidden;
            }

            .hero-section::before {
                content: '';
                position: absolute;
                top: -50%;
                right: -10%;
                width: 500px;
                height: 500px;
                background: rgba(255,255,255,0.05);
                border-radius: 50%;
            }

            .hero-content {
                position: relative;
                z-index: 2;
                text-align: center;
            }

            .hero-content h1 {
                font-size: 3.5rem;
                font-weight: 800;
                margin-bottom: 1rem;
                letter-spacing: -1px;
            }

            .hero-content p {
                font-size: 1.3rem;
                color: rgba(255,255,255,0.8);
                margin-bottom: 2rem;
            }

            .btn-primary-custom {
                background: var(--secondary-color);
                border: none;
                color: white;
                padding: 0.8rem 2rem;
                font-weight: 600;
                border-radius: 0.5rem;
                transition: all 0.3s ease;
                display: inline-block;
            }

            .btn-primary-custom:hover {
                background: #c0392b;
                transform: translateY(-3px);
                box-shadow: 0 8px 20px rgba(231, 76, 60, 0.4);
                color: white;
                text-decoration: none;
            }

            /* Section Styling */
            section {
                padding: 4rem 0;
            }

            .section-title {
                font-size: 2.5rem;
                font-weight: 800;
                color: var(--primary-color);
                margin-bottom: 1rem;
                position: relative;
                display: inline-block;
            }

            .section-title::after {
                content: '';
                position: absolute;
                bottom: -10px;
                left: 0;
                width: 60px;
                height: 4px;
                background: var(--secondary-color);
                border-radius: 2px;
            }

            .section-subtitle {
                color: #7f8c8d;
                font-size: 1rem;
                margin-bottom: 3rem;
            }

            /* Category Cards */
            .category-card {
                position: relative;
                border: none;
                border-radius: 0.8rem;
                overflow: hidden;
                transition: all 0.3s ease;
                box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .category-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 24px rgba(0,0,0,0.15);
            }

            .category-card img {
                width: 100%;
                height: 250px;
                object-fit: cover;
                transition: transform 0.4s ease;
            }

            .category-card:hover img {
                transform: scale(1.08);
            }

            .category-card .card-body {
                padding: 1.5rem;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                background: #fff;
            }

            .category-card .card-body h5 {
                font-size: 1.3rem;
                font-weight: 700;
                color: var(--primary-color);
                margin-bottom: 0.5rem;
            }

            .category-card .card-footer {
                background: transparent;
                border: none;
                padding: 1rem 1.5rem 1.5rem 1.5rem;
            }

            .category-card .btn {
                background: var(--secondary-color);
                border: none;
                color: white;
                font-weight: 600;
                padding: 0.7rem 1.5rem;
                border-radius: 0.5rem;
                transition: all 0.3s ease;
                width: 100%;
            }

            .category-card .btn:hover {
                background: #c0392b;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
                color: white;
            }

            /* Product Cards */
            .product-card {
                position: relative;
                border: none;
                border-radius: 0.8rem;
                overflow: hidden;
                transition: all 0.3s ease;
                box-shadow: 0 2px 8px rgba(0,0,0,0.08);
                height: 100%;
                display: flex;
                flex-direction: column;
            }

            .product-card:hover {
                transform: translateY(-8px);
                box-shadow: 0 12px 24px rgba(0,0,0,0.15);
            }

            .product-image-wrapper {
                position: relative;
                overflow: hidden;
                height: 280px;
            }

            .product-card img {
                width: 100%;
                height: 100%;
                object-fit: cover;
                transition: transform 0.4s ease;
            }

            .product-card:hover img {
                transform: scale(1.1);
            }

            .product-badge {
                position: absolute;
                top: 12px;
                right: 12px;
                background: var(--secondary-color);
                color: white;
                padding: 0.5rem 1rem;
                border-radius: 0.4rem;
                font-weight: 600;
                font-size: 0.85rem;
                z-index: 10;
            }

            .product-badge.new {
                background: #27ae60;
            }

            .product-card .card-body {
                padding: 1.5rem;
                flex-grow: 1;
                display: flex;
                flex-direction: column;
                background: #fff;
            }

            .product-category-badge {
                display: inline-block;
                background: #ecf0f1;
                color: var(--primary-color);
                padding: 0.4rem 0.8rem;
                border-radius: 0.3rem;
                font-size: 0.8rem;
                font-weight: 600;
                margin-bottom: 0.8rem;
            }

            .product-card h5 {
                font-size: 1.1rem;
                font-weight: 700;
                color: var(--primary-color);
                margin-bottom: 0.8rem;
                line-height: 1.4;
            }

            .product-price {
                font-size: 1.3rem;
                font-weight: 800;
                color: var(--secondary-color);
                margin-bottom: 1rem;
            }

            .product-price .original-price {
                text-decoration: line-through;
                color: #95a5a6;
                font-weight: 500;
                margin-right: 0.5rem;
            }

            .product-description {
                color: #7f8c8d;
                font-size: 0.9rem;
                margin-bottom: 1rem;
                flex-grow: 1;
            }

            .product-card .card-footer {
                background: #f8f9fa;
                border: none;
                padding: 1.5rem;
            }

            .product-card .btn {
                background: var(--secondary-color);
                border: none;
                color: white;
                font-weight: 600;
                padding: 0.8rem 1.5rem;
                border-radius: 0.5rem;
                transition: all 0.3s ease;
                width: 100%;
            }

            .product-card .btn:hover {
                background: #c0392b;
                transform: translateY(-2px);
                box-shadow: 0 4px 12px rgba(231, 76, 60, 0.3);
                color: white;
            }

            /* Empty State */
            .empty-state {
                text-align: center;
                padding: 3rem 0;
            }

            .empty-state i {
                font-size: 3rem;
                color: #bdc3c7;
                margin-bottom: 1rem;
            }

            .empty-state p {
                color: #7f8c8d;
                font-size: 1.1rem;
            }

            /* Footer */
            footer {
                background: var(--primary-color);
                color: white;
                padding: 3rem 0 1rem;
                margin-top: 4rem;
            }

            .footer-section h6 {
                font-weight: 700;
                margin-bottom: 1rem;
                font-size: 1.1rem;
            }

            .footer-section ul {
                list-style: none;
            }

            .footer-section ul li {
                margin-bottom: 0.7rem;
            }

            .footer-section a {
                color: rgba(255,255,255,0.7);
                text-decoration: none;
                transition: color 0.3s ease;
            }

            .footer-section a:hover {
                color: var(--secondary-color);
            }

            .footer-bottom {
                border-top: 1px solid rgba(255,255,255,0.1);
                margin-top: 2rem;
                padding-top: 2rem;
                text-align: center;
                color: rgba(255,255,255,0.6);
            }

            /* Responsive */
            @media (max-width: 768px) {
                .hero-content h1 {
                    font-size: 2.2rem;
                }

                .hero-content p {
                    font-size: 1rem;
                }

                .section-title {
                    font-size: 2rem;
                }

                .category-card img,
                .product-image-wrapper {
                    height: 200px;
                }
            }
        </style>
    </head>
    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="/">
                    <i class="bi bi-shop me-2"></i>Premium Shop
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" href="/">Home</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('about') }}">About</a></li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Categories</a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">All Products</a></li>
                                <li><hr class="dropdown-divider"></li>
                                @forelse($categories as $cat)
                                <li><a class="dropdown-item" href="#">{{ $cat->title }}</a></li>
                                @empty
                                <li><a class="dropdown-item disabled" href="#">No categories</a></li>
                                @endforelse
                            </ul>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="#">Contact</a></li>
                    </ul>
                    <form class="ms-3">
                        <button class="btn cart-btn" type="button">
                            <i class="bi bi-cart-fill me-1"></i>
                            Cart
                            <span class="badge bg-light text-danger ms-2 rounded-pill">0</span>
                        </button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- Hero Section-->
        <header class="hero-section">
            <div class="container px-4 px-lg-5">
                <div class="hero-content py-5">
                    <h1>Premium Shopping Experience</h1>
                    <p>Discover our exclusive collection of quality products</p>
                    <a href="#categories" class="btn-primary-custom">Shop Now</a>
                </div>
            </div>
        </header>

        <!-- Categories Section -->
        <section id="categories" class="bg-light">
            <div class="container px-4 px-lg-5">
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="section-title">Shop by Category</h2>
                        <p class="section-subtitle">Browse our carefully curated collections</p>
                    </div>
                </div>

                @forelse($categories as $category)
                    @if($loop->first)
                    <div class="row gx-4 gx-lg-5">
                    @endif

                    <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                        <div class="card category-card">
                            <div style="height: 250px; overflow: hidden;">
                                @if($category->image)
                                <img src="{{ asset('uploads/categories/' . $category->image) }}" alt="{{ $category->title }}" />
                                @else
                                <img src="https://via.placeholder.com/300x250/2c3e50/ffffff?text={{ urlencode($category->title) }}" alt="No image" />
                                @endif
                            </div>
                            <div class="card-body">
                                <h5>{{ $category->title }}</h5>
                            </div>
                            <div class="card-footer">
                                <a href="#" class="btn">View Products</a>
                            </div>
                        </div>
                    </div>

                    @if($loop->iteration % 4 === 0 || $loop->last)
                    </div>
                    @if(!$loop->last)
                    <div class="row gx-4 gx-lg-5">
                    @endif
                    @endif

                @empty
                <div class="row">
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="bi bi-inbox"></i>
                            <p>No categories available at the moment</p>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </section>

        <!-- Products Section -->
        <section>
            <div class="container px-4 px-lg-5">
                <div class="row mb-5">
                    <div class="col-12">
                        <h2 class="section-title">Featured Products</h2>
                        <p class="section-subtitle">Trending items that our customers love</p>
                    </div>
                </div>

                @forelse($products as $product)
                @if($loop->first)
                <div class="row gx-4 gx-lg-5">
                @endif

                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card product-card">
                        <div class="product-image-wrapper">
                            @if($product->featured_image)
                            <img src="{{ asset('uploads/products/' . $product->featured_image) }}" alt="{{ $product->name }}" />
                            @else
                            <img src="https://via.placeholder.com/400x300/2c3e50/ffffff?text={{ urlencode($product->name) }}" alt="No image" />
                            @endif
                            @if($product->sale_price)
                            <span class="product-badge">Sale</span>
                            @else
                            <span class="product-badge new">New</span>
                            @endif
                        </div>
                        <div class="card-body">
                            @if($product->category)
                            <span class="product-category-badge">{{ $product->category->title }}</span>
                            @endif
                            <h5>{{ $product->name }}</h5>
                            @if($product->description)
                            <p class="product-description">{{ Str::limit($product->description, 80) }}</p>
                            @endif
                            <div class="product-price">
                                @if($product->sale_price)
                                <span class="original-price">${{ number_format($product->price, 2) }}</span>
                                @endif
                                ${{ number_format($product->sale_price ?? $product->price, 2) }}
                            </div>
                        </div>
                        <div class="card-footer">
                            <button class="btn">
                                <i class="bi bi-cart-plus me-2"></i>Add to Cart
                            </button>
                        </div>
                    </div>
                </div>

                @if($loop->iteration % 4 === 0 || $loop->last)
                </div>
                @if(!$loop->last)
                <div class="row gx-4 gx-lg-5">
                @endif
                @endif

                @empty
                <div class="row">
                    <div class="col-12">
                        <div class="empty-state">
                            <i class="bi bi-bag-x"></i>
                            <p>No products available at the moment</p>
                        </div>
                    </div>
                </div>
                @endforelse
            </div>
        </section>

        <!-- Footer -->
        <footer>
            <div class="container px-4 px-lg-5">
                <div class="row">
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="footer-section">
                            <h6><i class="bi bi-shop me-2"></i>Premium Shop</h6>
                            <p style="font-size: 0.95rem; color: rgba(255,255,255,0.7);">Your trusted online destination for quality products and great deals.</p>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="footer-section">
                            <h6>Quick Links</h6>
                            <ul>
                                <li><a href="/">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="#">Products</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="footer-section">
                            <h6>Support</h6>
                            <ul>
                                <li><a href="#">Help Center</a></li>
                                <li><a href="#">Shipping Info</a></li>
                                <li><a href="#">Returns</a></li>
                                <li><a href="#">FAQs</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 mb-4">
                        <div class="footer-section">
                            <h6>Follow Us</h6>
                            <div>
                                <a href="#" class="me-3"><i class="bi bi-facebook"></i></a>
                                <a href="#" class="me-3"><i class="bi bi-twitter"></i></a>
                                <a href="#" class="me-3"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom">
                    <p>&copy; 2024 Premium Shop. All rights reserved. | <a href="#">Privacy Policy</a> | <a href="#">Terms of Service</a></p>
                </div>
            </div>
        </footer>

        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>

