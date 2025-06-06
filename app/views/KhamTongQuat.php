<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khám Tổng Quát</title>
    <style>
        :root {
            --primary-color: #2c82c9;
            --secondary-color: #f8b500;
            --accent-color: #18a4e0;
            --text-color: #333333;
            --text-light: #777777;
            --light-bg: #f9f9f9;
            --white: #ffffff;
            --shadow-sm: 0 2px 10px rgba(0, 0, 0, 0.05);
            --shadow-md: 0 5px 20px rgba(0, 0, 0, 0.08);
            --shadow-lg: 0 10px 30px rgba(0, 0, 0, 0.12);
            --transition: all 0.3s ease;
            --radius-sm: 8px;
            --radius-md: 12px;
            --radius-lg: 20px;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Roboto', sans-serif;
            color: var(--text-color);
            background-color: var(--light-bg);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1300px;
            margin: 0 auto;
            padding: 0 20px;
        }
        
        /* Header & Navigation */
        header {
            background-color: var(--white);
            padding: 15px 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }
        
        header.scrolled {
            padding: 10px 0;
        }
        
        .header-container {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-family: 'Montserrat', sans-serif;
            font-weight: 700;
            font-size: 24px;
            color: var(--primary-color);
            text-decoration: none;
            display: flex;
            align-items: center;
            gap: 10px;
        }
        
        .logo i {
            color: var(--secondary-color);
        }
        
        .main-nav ul {
            display: flex;
            list-style: none;
            gap: 30px;
        }
        
        .main-nav a {
            text-decoration: none;
            color: var(--text-color);
            font-weight: 500;
            font-size: 15px;
            transition: var(--transition);
            position: relative;
        }
        
        .main-nav a:hover {
            color: var(--primary-color);
        }
        
        .main-nav a::after {
            content: '';
            position: absolute;
            bottom: -5px;
            left: 0;
            width: 0;
            height: 2px;
            background-color: var(--primary-color);
            transition: var(--transition);
        }
        
        .main-nav a:hover::after {
            width: 100%;
        }
        
        .auth-buttons {
            display: flex;
            gap: 15px;
        }
        
        .auth-buttons button {
            padding: 10px 20px;
            border-radius: 50px;
            border: none;
            font-weight: 500;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .mobile-menu-btn {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-color);
        }
        
        /* Hero Section */
        .hero-section {
            position: relative;
            height: 500px;
            background-color: #000;
            margin-top: 70px;
            overflow: hidden;
            border-radius: var(--radius-md);
        }
        
        .hero-image {
            width: 100%;
            height: 100%;
            object-fit: cover;
            opacity: 0.8;
            transform: scale(1);
            transition: transform 10s ease;
        }
        
        .hero-section:hover .hero-image {
            transform: scale(1.05);
        }
        
        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to right, rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.4));
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            padding-left: 10%;
        }
        
        .hero-content {
            max-width: 650px;
            animation: fadeInUp 1s ease;
        }
        
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .page-title {
            font-family: 'Montserrat', sans-serif;
            color: var(--white);
            font-size: 46px;
            font-weight: 700;
            margin-bottom: 20px;
            line-height: 1.2;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }
        
        .hero-text {
            color: rgba(255, 255, 255, 0.9);
            font-size: 18px;
            margin-bottom: 30px;
            max-width: 500px;
        }
        
        .hero-btn {
            display: inline-block;
            padding: 14px 30px;
            background-color: var(--secondary-color);
            color: var(--white);
            border-radius: 50px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            box-shadow: 0 5px 15px rgba(248, 181, 0, 0.3);
        }
        
        .hero-btn:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 25px rgba(248, 181, 0, 0.4);
        }
        
        /* Search Section */
        .search-section {
            margin-top: -50px;
            position: relative;
            z-index: 10;
        }
        
        .search-container {
            background-color: var(--white);
            border-radius: var(--radius-lg);
            padding: 30px;
            box-shadow: var(--shadow-lg);
        }
        
        .search-row {
            display: flex;
            margin-bottom: 20px;
        }
        
        .search-bar {
            display: flex;
            width: 100%;
            border-radius: 50px;
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            border: 1px solid #eee;
            transition: var(--transition);
        }
        
        .search-bar:focus-within {
            box-shadow: 0 0 0 3px rgba(44, 130, 201, 0.2);
        }
        
        .search-input {
            flex: 1;
            padding: 16px 25px;
            border: none;
            outline: none;
            font-size: 16px;
            border-radius: 50px 0 0 50px;
        }
        
        .search-button {
            padding: 0 30px;
            background: linear-gradient(45deg, var(--primary-color), var(--accent-color));
            color: white;
            border: none;
            font-weight: 500;
            font-size: 16px;
            cursor: pointer;
            transition: var(--transition);
            border-radius: 0 50px 50px 0;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .search-button:hover {
            background: linear-gradient(45deg, #256bad, #1493c9);
        }
        
        .filter-group {
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            margin-top: 20px;
        }
        
        .filter-select {
            flex: 1;
            min-width: 200px;
            padding: 14px 20px;
            border: 1px solid #eee;
            border-radius: 50px;
            font-size: 15px;
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='%232c82c9' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3E%3Cpolyline points='6 9 12 15 18 9'%3E%3C/polyline%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 15px center;
            background-size: 16px;
            background-color: var(--white);
            cursor: pointer;
            transition: var(--transition);
        }
        
        .filter-select:hover {
            border-color: #ccc;
        }
        
        .filter-select:focus {
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(44, 130, 201, 0.2);
        }
        
        .refresh-button {
            width: 50px;
            height: 50px;
            background-color: var(--light-bg);
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            color: var(--primary-color);
            font-size: 20px;
            transition: var(--transition);
        }
        
        .refresh-button:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: rotate(180deg);
        }
        
        /* Kategories Section */
        .content-section {
            margin: 60px auto;
        }
        
        .section-header {
            text-align: center;
            margin-bottom: 50px;
        }
        
        .section-subtitle {
            color: var(--primary-color);
            font-weight: 600;
            font-size: 16px;
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 10px;
        }
        
        .section-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 36px;
            margin-bottom: 15px;
            color: var(--text-color);
        }
        
        .section-description {
            max-width: 700px;
            margin: 0 auto;
            color: var(--text-light);
            font-size: 16px;
        }
        
        .category-heading {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 30px;
        }
        
        .category-title {
            font-family: 'Montserrat', sans-serif;
            font-size: 28px;
            color: var(--text-color);
            position: relative;
            padding-bottom: 10px;
        }
        
        .category-title::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--secondary-color);
        }
        
        .view-more {
            padding: 10px 20px;
            background-color: transparent;
            border: 2px solid var(--primary-color);
            border-radius: 50px;
            font-size: 14px;
            font-weight: 600;
            color: var(--primary-color);
            cursor: pointer;
            transition: var(--transition);
        }
        
        .view-more:hover {
            background-color: var(--primary-color);
            color: var(--white);
        }
        
        .category-grid {
            display: grid;
            grid-template-columns: repeat(6, 1fr);
            gap: 25px;
            position: relative;
        }
        
        .category-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: var(--white);
            border-radius: var(--radius-md);
            padding: 25px 15px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
            position: relative;
            overflow: hidden;
            cursor: pointer;
            min-height: 250px;
        }
        
        .category-item::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(45deg, var(--primary-color), var(--secondary-color));
            transform: scaleX(0);
            transform-origin: right;
            transition: transform 0.5s ease;
        }
        
        .category-item:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-md);
        }
        
        .category-item:hover::before {
            transform: scaleX(1);
            transform-origin: left;
        }
        
        .category-icon {
            width: 110px;
            height: 110px;
            border-radius: 50%;
            margin-bottom: 20px;
            background-color: #f0f7ff;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
            position: relative;
        }
        
        .category-icon::after {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            border-radius: 50%;
            border: 2px dashed rgba(44, 130, 201, 0.3);
            top: 0;
            left: 0;
            animation: spin 15s linear infinite;
        }
        
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .category-item:hover .category-icon {
            background-color: #e0efff;
        }
        
        .category-icon img {
            width: 60%;
            height: 60%;
            object-fit: contain;
            transition: var(--transition);
        }
        
        .category-item:hover .category-icon img {
            transform: scale(1.1);
        }
        
        .category-name {
            font-size: 17px;
            font-weight: 600;
            color: var(--text-color);
            margin-top: 10px;
            text-align: center;
            transition: var(--transition);
        }
        
        .category-item:hover .category-name {
            color: var(--primary-color);
        }
        
        .category-description {
            font-size: 14px;
            color: var(--text-light);
            text-align: center;
            margin-top: 10px;
            display: none;
        }
        
        .category-item:hover .category-description {
            display: block;
            animation: fadeIn 0.5s ease;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        .slider-controls {
            position: absolute;
            top: 50%;
            width: 100%;
            display: flex;
            justify-content: space-between;
            transform: translateY(-50%);
            pointer-events: none;
        }
        
        .slider-nav {
            width: 50px;
            height: 50px;
            background-color: var(--white);
            border: none;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            pointer-events: auto;
            transition: var(--transition);
            margin: 0 -25px;
            color: var(--primary-color);
            font-size: 18px;
        }
        
        .slider-nav:hover {
            background-color: var(--primary-color);
            color: var(--white);
            transform: scale(1.1);
        }
        
        .prev-btn {
            left: -25px;
        }
        
        .next-btn {
            right: -25px;
        }
        
        /* Popular Packages */
        .packages-section {
            margin: 80px auto;
        }
        
        .packages-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        
        .package-card {
            background-color: var(--white);
            border-radius: var(--radius-md);
            overflow: hidden;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }
        
        .package-card:hover {
            transform: translateY(-10px);
            box-shadow: var(--shadow-md);
        }
        
        .package-image {
            height: 200px;
            position: relative;
            overflow: hidden;
        }
        
        .package-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: var(--transition);
        }
        
        .package-card:hover .package-image img {
            transform: scale(1.1);
        }
        
        .package-tag {
            position: absolute;
            top: 15px;
            right: 15px;
            background: var(--secondary-color);
            color: var(--white);
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 12px;
            font-weight: 600;
            text-transform: uppercase;
        }
        
        .package-content {
            padding: 25px;
        }
        
        .package-title {
            font-size: 20px;
            font-weight: 700;
            margin-bottom: 10px;
            color: var(--text-color);
        }
        
        .package-hospital {
            font-size: 14px;
            color: var(--text-light);
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            gap: 5px;
        }
        
        .package-features {
            margin: 15px 0;
        }
        
        .feature-item {
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 8px;
            font-size: 14px;
        }
        
        .feature-icon {
            color: var(--primary-color);
            font-size: 16px;
        }
        
        .package-footer {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 20px;
            padding-top: 15px;
            border-top: 1px solid #eee;
        }
        
        .package-price {
            font-weight: 700;
            font-size: 22px;
            color: var(--primary-color);
        }
        
        .price-old {
            font-size: 14px;
            text-decoration: line-through;
            color: var(--text-light);
            margin-left: 5px;
        }
        
        .book-btn {
            padding: 8px 20px;
            background-color: var(--primary-color);
            color: var(--white);
            border: none;
            border-radius: 50px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: var(--transition);
        }
        
        .book-btn:hover {
            background-color: #1e6ca8;
        }
        
        /* Testimonials */
        .testimonials-section {
            background-color: #f0f7ff;
            padding: 80px 0;
            margin: 80px 0;
        }
        
        .testimonials-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
        }
        
        .testimonial-card {
            background-color: var(--white);
            border-radius: var(--radius-md);
            padding: 30px;
            box-shadow: var(--shadow-sm);
            transition: var(--transition);
        }
        
        .testimonial-card:hover {
            transform: translateY(-5px);
            box-shadow: var(--shadow-md);
        }
        
        .testimonial-header {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }
        
        .testimonial-avatar {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 15px;
        }
        
        .testimonial-author h4 {
            font-size: 18px;
            margin-bottom: 5px;
            color: var(--text-color);
        }
        
        .testimonial-author p {
            font-size: 14px;
            color: var(--text-light);
        }
        
        .testimonial-rating {
            color: #ffc107;
            margin: 15px 0;
            font-size: 18px;
        }
        
        .testimonial-text {
            color: var(--text-light);
            font-size: 15px;
            line-height: 1.7;
        }
        
        /* Partners */
        .partners-section {
            margin: 60px auto;
        }
        
        .partners-grid {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            gap: 50px;
            margin-top: 30px;
        }
        
        .partner-logo {
            height: 60px;
            opacity: 0.7;
            transition: var(--transition);
            filter: grayscale(100%);
        }
        
        .partner-logo:hover {
            opacity: 1;
            filter: grayscale(0%);
        }
        
        /* Footer */
        footer {
            background-color: #313652;
            color: #D4D6E0;
            padding: 70px 0 30px;
        }
        
        .footer-grid {
            display: grid;
            grid-template-columns: 2fr 1fr 1fr 1fr;
            gap: 40px;
            margin-bottom: 50px;
        }
        
        .footer-about h3 {
            color: var(--white);
            margin-bottom: 20px;
            font-size: 20px;
        }
        
        .footer-about p {
            margin-bottom: 20px;
            line-height: 1.7;
            font-size: 15px;
        }
        
        .footer-social {
            display: flex;
            gap: 15px;
        }
        
        .social-link {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: rgba(255, 255, 255, 0.1);
            color: var(--white);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: var(--transition);
        }
        
        .social-link:hover {
            background-color: var(--primary-color);
            transform: translateY(-3px);
        }
        
        .footer-links h3 {
            color: var(--white);
            margin-bottom: 25px;
            font-size: 18px;
        }
        
        .footer-links ul {
            list-style: none;
        }
        
        .footer-links li {
            margin-bottom: 12px;
        }
        
        .footer-links a {
            color: #D4D6E0;
            text-decoration: none;
            transition: var(--transition);
            font-size: 15px;
            display: flex;
            align-items: center;
            gap: 8px;
        }
        
        .footer-links a:hover {
            color: var(--secondary-color);
            padding-left: 5px;
        }
        
        .footer-links i {
            font-size: 12px;
        }
        
        .footer-contact p {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 15px;
        }
        
        .footer-contact i {
            width: 35px;
            height: 35px;
            background-color: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--secondary-color);
        }
        
        .footer-bottom {
            text-align: center;
            padding-top: 30px;
            border-top: 1px solid rgba(255, 255, 255, 0.1);
            font-size: 14px;
        }
        
        /* Back to top button */
        .back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: var(--primary-color);
            color: var(--white);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            cursor: pointer;
            box-shadow: var(--shadow-md);
            transition: var(--transition);
            opacity: 0;
            visibility: hidden;
            z-index: 999;
        }
        
        .back-to-top.active {
            opacity: 1;
            visibility: visible;
        }
        
        .back-to-top:hover {
            background-color: var(--secondary-color);
            transform: translateY(-5px);
        }
        
        /* Responsive */
        @media (max-width: 1200px) {
            .category-grid {
                grid-template-columns: repeat(4, 1fr);
            }
            
            .packages-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 992px) {
            .main-nav {
                display: none;
            }
            
            .mobile-menu-btn {
                display: block;
            }
            
            .hero-section {
                height: 400px;
            }
            
            .page-title {
                font-size: 36px;
            }
            
            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 30px;
            }
            
            .testimonials-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 768px) {
            .category-grid {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .hero-section {
                height: 350px;
                margin-top: 60px;
            }
            
            .overlay {
                padding-left: 20px;
                padding-right: 20px;
            }
            
            .page-title {
                font-size: 32px;
            }
            
            .hero-text {
                font-size: 16px;
            }
            
            .search-container {
                padding: 20px;
            }
            
            .packages-grid {
                grid-template-columns: 1fr;
            }
            
            .testimonials-grid {
                grid-template-columns: 1fr;
            }
            
            .section-title {
                font-size: 28px;
            }
        }
        
        @media (max-width: 576px) {
            .category-grid {
                grid-template-columns: repeat(2, 1fr);
            }
            
            .category-icon {
                width: 90px;
                height: 90px;
            }
            
            .hero-section {
                height: 300px;
            }
            
            .page-title {
                font-size: 28px;
            }
            
            .hero-text {
                font-size: 14px;
                margin-bottom: 20px;
            }
            
            .hero-btn {
                padding: 10px 20px;
                font-size: 14px;
            }
            
            .search-input {
                padding: 14px 20px;
            }
            
            .search-button {
                padding: 0 20px;
            }
            
            .filter-group {
                gap: 10px;
            }
            .filter-select {
                width: 100%;
                min-width: 100%;
            }
            
            .footer-grid {
                grid-template-columns: 1fr;
            }
            
            .auth-buttons {
                gap: 10px;
            }
            
            .auth-buttons button {
                padding: 8px 15px;
                font-size: 14px;
            }
            
            .section-subtitle {
                font-size: 14px;
            }
            
            .section-title {
                font-size: 24px;
            }
        }
        
        /* Animation */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.05);
            }
            100% {
                transform: scale(1);
            }
        }
        
        /* Mobile Menu */
        .mobile-menu {
            position: fixed;
            top: 0;
            right: -100%;
            width: 80%;
            max-width: 320px;
            height: 100vh;
            background-color: var(--white);
            padding: 80px 20px 30px;
            transition: right 0.4s ease;
            z-index: 998;
            box-shadow: var(--shadow-lg);
            overflow-y: auto;
        }
        
        .mobile-menu.active {
            right: 0;
        }
        
        .close-menu {
            position: absolute;
            top: 20px;
            right: 20px;
            background: none;
            border: none;
            font-size: 24px;
            cursor: pointer;
            color: var(--text-color);
        }
        
        .mobile-menu ul {
            list-style: none;
            margin-bottom: 30px;
        }
        
        .mobile-menu li {
            margin-bottom: 15px;
        }
        
        .mobile-menu a {
            display: block;
            padding: 10px 0;
            color: var(--text-color);
            font-weight: 500;
            text-decoration: none;
            font-size: 16px;
            border-bottom: 1px solid #eee;
            transition: var(--transition);
        }
        
        .mobile-menu a:hover {
            color: var(--primary-color);
            padding-left: 5px;
        }
        
        .overlay-menu {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 997;
            opacity: 0;
            visibility: hidden;
            transition: var(--transition);
        }
        
        .overlay-menu.active {
            opacity: 1;
            visibility: visible;
        }
        
        /* Floating CTA */
        .floating-cta {
            position: fixed;
            bottom: 30px;
            left: 30px;
            background-color: var(--secondary-color);
            color: var(--white);
            padding: 15px 25px;
            border-radius: 50px;
            box-shadow: 0 5px 20px rgba(248, 181, 0, 0.3);
            display: flex;
            align-items: center;
            gap: 10px;
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            z-index: 99;
            animation: pulse 2s infinite;
        }
        
        .floating-cta:hover {
            background-color: var(--primary-color);
            transform: translateY(-5px);
            animation: none;
        }
        
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 10px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #c8c8c8;
            border-radius: 5px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="#" class="logo">
                <i class="fas fa-heartbeat"></i>
                HealthCare
            </a>
            
            <nav class="main-nav">
                <ul>
                    <li><a href="/index.php">Trang chủ</a></li>
                    <li><a href="#">Dịch vụ</a></li>
                    <li><a href="#">Gói khám</a></li>
                    <li><a href="#">Bác sĩ</a></li>
                    <li><a href="#">Bệnh viện</a></li>
                    <li><a href="#">Liên hệ</a></li>
                </ul>
            </nav>
            
            
            
            <button class="mobile-menu-btn">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>
    
    <!-- Mobile Menu -->
    <div class="mobile-menu">
        <button class="close-menu">
            <i class="fas fa-times"></i>
        </button>
        <ul>
            <li><a href="#">Trang chủ</a></li>
            <li><a href="#">Dịch vụ</a></li>
            <li><a href="#">Gói khám</a></li>
            <li><a href="#">Bác sĩ</a></li>
            <li><a href="#">Bệnh viện</a></li>
            <li><a href="#">Liên hệ</a></li>
        </ul>
        <div class="auth-buttons" style="flex-direction: column; gap: 10px;">
            <button class="login-btn" style="width: 100%">Đăng nhập</button>
            <button class="signup-btn" style="width: 100%">Đăng ký</button>
        </div>
    </div>
    <div class="overlay-menu"></div>
    
    <!-- Hero Section -->
    <div class="container">
        <div class="hero-section">
            <img src="../../assets/images/Banner/banner-kham-tong-quat.png" alt="Family walking outdoors" class="hero-image">
            <div class="overlay">
                <div class="hero-content">
                    <h1 class="page-title">KHÁM TỔNG QUÁT</h1>
                    <p class="hero-text">Giải pháp chăm sóc sức khỏe toàn diện cho cả gia đình với đội ngũ y bác sĩ chuyên môn cao và trang thiết bị hiện đại.</p>
                    <a href="#" class="hero-btn">Đặt lịch ngay <i class="fas fa-arrow-right" style="margin-left: 5px;"></i></a>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Search Section -->
    <div class="container search-section">
        <div class="search-container">
            <div class="search-row">
                <div class="search-bar">
                    <input type="text" class="search-input" placeholder="Tìm kiếm gói khám...">
                    <button class="search-button">
                        <i class="fas fa-search"></i>
                        Tìm kiếm
                    </button>
                </div>
            </div>
            <div class="filter-group">
                <select class="filter-select">
                    <option value="" disabled selected>Khu vực</option>
                    <option value="hanoi">Hà Nội</option>
                    <option value="hcm">Hồ Chí Minh</option>
                    <option value="danang">Đà Nẵng</option>
                </select>
                <select class="filter-select">
                    <option value="" disabled selected>Danh mục</option>
                    <option value="basic">Cơ bản</option>
                    <option value="vip">Gói khám VIP</option>
                    <option value="advanced">Nâng cao</option>
                </select>
                <select class="filter-select">
                    <option value="" disabled selected>Mức giá</option>
                    <option value="low">Dưới 1 triệu</option>
                    <option value="medium">1-3 triệu</option>
                    <option value="high">Trên 3 triệu</option>
                </select>
                <select class="filter-select">
                    <option value="" disabled selected>Cơ sở y tế</option>
                    <option value="hospital">Bệnh viện</option>
                    <option value="clinic">Phòng khám</option>
                </select>
                <button class="refresh-button">
                    <i class="fas fa-sync-alt"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Categories Section -->
    <div class="container content-section">
        <div class="section-header">
            <p class="section-subtitle">Dịch vụ khám sức khỏe</p>
            <h2 class="section-title">Khám phá các gói khám tổng quát</h2>
            <p class="section-description">Chúng tôi cung cấp các gói khám tổng quát đa dạng phù hợp với từng đối tượng và nhu cầu khác nhau</p>
        </div>
        
        <div class="category-heading">
            <h2 class="category-title">Danh mục</h2>
            <button class="view-more">XEM THÊM</button>
        </div>
        
        <div class="category-grid">
            <div class="category-item">
                <div class="category-icon">
                    <img src="../../assets/images/Icon/khamtongquat-logo.png" alt="Basic checkup">
                </div>
                <span class="category-name">Cơ bản</span>
                <p class="category-description">Gói khám tổng quát đầy đủ các hạng mục cơ bản với chi phí hợp lý</p>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <img src="../../assets/images/Icon/iconkhamvip.png" alt="VIP checkup">
                </div>
                <span class="category-name">Gói khám VIP</span>
                <p class="category-description">Trải nghiệm dịch vụ cao cấp với phòng riêng và đội ngũ bác sĩ hàng đầu</p>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <img src="../../assets/images/Icon/nangcao-logo.png" alt="Advanced checkup">
                </div>
                <span class="category-name">Nâng cao</span>
                <p class="category-description">Khám chuyên sâu với các xét nghiệm và chẩn đoán hình ảnh chi tiết</p>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <img src="../../assets/images/Icon/icon-nam.png" alt="Male checkup">
                </div>
                <span class="category-name">Nam</span>
                <p class="category-description">Gói khám chuyên biệt cho nam giới với các hạng mục tầm soát riêng</p>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <img src="../../assets/images/Icon/icon-nu.png" alt="Female checkup">
                </div>
                <span class="category-name">Nữ</span>
                <p class="category-description">Gói khám chuyên biệt cho phụ nữ với các hạng mục tầm soát riêng</p>
            </div>
            
            <div class="category-item">
                <div class="category-icon">
                    <img src="../../assets/images/Icon/icon-trem.png" alt="Children checkup">
                </div>
                <span class="category-name">Trẻ em</span>
                <p class="category-description">Khám sức khỏe định kỳ và phát hiện sớm các vấn đề ở trẻ</p>
            </div>
            
            <div class="slider-controls">
                <button class="slider-nav prev-btn">
                    <i class="fas fa-chevron-left"></i>
                </button>
                <button class="slider-nav next-btn">
                    <i class="fas fa-chevron-right"></i>
                </button>
            </div>
        </div>
    </div>
    
    <!-- Popular Packages Section -->
    <div class="container packages-section">
        <div class="section-header">
            <p class="section-subtitle">KHÁM PHÁ</p>
            <h2 class="section-title">Gói khám phổ biến</h2>
            <p class="section-description">Các gói khám sức khỏe được nhiều người lựa chọn với chất lượng dịch vụ tốt và giá cả hợp lý</p>
        </div>
        
        <div class="packages-grid">
            <div class="package-card">
                <div class="package-image">
                    <img src="../../assets/images/Icon/goi-kham-suc-khoe-co-ban.png" alt="Gói khám tổng quát cơ bản">
                    <span class="package-tag">Phổ biến</span>
                </div>
                <div class="package-content">
                    <h3 class="package-title">Gói khám sức khỏe tổng quát cơ bản cho nam (PKYD1M)</h3>
                    <p class="package-hospital"><i class="fas fa-hospital"></i> Bệnh viện Việt Đức</p>
                    <div class="package-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Gói khám bao gồm: Khám lâm sàng</span>
                        </div>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle feature-icon"></i>
                        <span>Xét nghiệm máu</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle feature-icon"></i>
                        <span>Xét nghiệm chức năng gan,thận,chức năng chuyển hóa</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle feature-icon"></i>
                        <span>Chụp Xquang, siêu âm ổ bụng, điện tim</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle feature-icon"></i>
                        <span>Gói khám tại Phòng khám Bệnh viện Đại học Y dược 1</span>
                    </div>
                    <div class="feature-item">
                        <i class="fas fa-check-circle feature-icon"></i>
                        <span>Gói khám dành cho đối tượng trên 15 tuổi.</span>
                    </div>
                    <div class="package-footer">
                        <div class="package-price">
                            950.000đ <span class="price-old">1.200.000đ</span>
                        </div>
                        <button class="book-btn">Đặt lịch</button>
                    </div>
                </div>
            </div>
            
            <div class="package-card">
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1631815588090-d4bfec5b9876?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Gói khám VIP">
                    <span class="package-tag">VIP</span>
                </div>
                <div class="package-content">
                    <h3 class="package-title">Gói khám tổng quát VIP 1</h3>
                    <p class="package-hospital"><i class="fas fa-hospital"></i> Bệnh viện Vinmec</p>
                    <div class="package-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Khám chuyên khoa toàn diện</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Xét nghiệm máu, nước tiểu chi tiết</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Siêu âm 4D ổ bụng</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Chụp CT Scan ngực</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="package-price">
                            3.500.000đ <span class="price-old">4.200.000đ</span>
                        </div>
                        <button class="book-btn">Đặt lịch</button>
                    </div>
                </div>
            </div>
            
            <div class="package-card">
                <div class="package-image">
                    <img src="https://images.unsplash.com/photo-1526256262350-7da7584cf5eb?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Gói khám gia đình">
                    <span class="package-tag">Gia đình</span>
                </div>
                <div class="package-content">
                    <h3 class="package-title">Gói khám sức khỏe gia đình</h3>
                    <p class="package-hospital"><i class="fas fa-hospital"></i> Bệnh viện Quốc tế Hồng Ngọc</p>
                    <div class="package-features">
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Khám 4 người (2 người lớn, 2 trẻ em)</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Xét nghiệm cơ bản cho cả gia đình</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Tư vấn dinh dưỡng gia đình</span>
                        </div>
                        <div class="feature-item">
                            <i class="fas fa-check-circle feature-icon"></i>
                            <span>Miễn phí tái khám trong vòng 1 tháng</span>
                        </div>
                    </div>
                    <div class="package-footer">
                        <div class="package-price">
                            5.200.000đ <span class="price-old">6.500.000đ</span>
                        </div>
                        <button class="book-btn">Đặt lịch</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Testimonials Section -->
    <div class="testimonials-section">
        <div class="container">
            <div class="section-header">
                <p class="section-subtitle">ĐÁNH GIÁ</p>
                <h2 class="section-title">Khách hàng nói gì về chúng tôi</h2>
                <p class="section-description">Những phản hồi từ khách hàng đã trải nghiệm dịch vụ khám tổng quát của chúng tôi</p>
            </div>
            
            <div class="testimonials-grid">
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <img src="https://randomuser.me/api/portraits/women/45.jpg" alt="Customer" class="testimonial-avatar">
                        <div class="testimonial-author">
                            <h4>Nguyễn Thị Mai</h4>
                            <p>Hà Nội</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Tôi rất hài lòng với dịch vụ khám tổng quát ở đây. Quy trình nhanh chóng, bác sĩ tư vấn tận tâm và chi tiết. Sẽ quay lại trong những lần kiểm tra sức khỏe tiếp theo."</p>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <img src="https://randomuser.me/api/portraits/men/32.jpg" alt="Customer" class="testimonial-avatar">
                        <div class="testimonial-author">
                            <h4>Trần Văn Minh</h4>
                            <p>TP. Hồ Chí Minh</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="testimonial-text">"Gói khám VIP thực sự xứng đáng với giá tiền. Tôi được khám trong phòng riêng, không phải chờ đợi và đội ngũ y bác sĩ rất chuyên nghiệp. Báo cáo kết quả chi tiết và dễ hiểu."</p>
                </div>
                
                <div class="testimonial-card">
                    <div class="testimonial-header">
                        <img src="https://randomuser.me/api/portraits/women/68.jpg" alt="Customer" class="testimonial-avatar">
                        <div class="testimonial-author">
                            <h4>Lê Hoài Anh</h4>
                            <p>Đà Nẵng</p>
                        </div>
                    </div>
                    <div class="testimonial-rating">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <p class="testimonial-text">"Đã đặt gói khám gia đình cho cả nhà và rất hài lòng. Các con tôi được các bác sĩ nhi khoa chăm sóc rất tốt, không khóc như mọi khi đi khám. Sẽ giới thiệu cho bạn bè và người thân."</p>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Partners Section -->
    <div class="container partners-section">
        <div class="section-header">
            <p class="section-subtitle">ĐỐI TÁC</p>
            <h2 class="section-title">Đơn vị hợp tác</h2>
        </div>
        
        <div class="partners-grid">
            <img src="https://upload.wikimedia.org/wikipedia/vi/1/1d/Logo_benhvien_vietduc.png" alt="Bệnh viện Việt Đức" class="partner-logo">
            <img src="https://vinmec-prod.s3.amazonaws.com/images/vicaread/20190614_042350_812243_logo-vinmec.max-1800x1800.png" alt="Vinmec" class="partner-logo">
            <img src="https://www.bachmai.gov.vn/images/logo_print.png" alt="Bệnh viện Bạch Mai" class="partner-logo">
            <img src="https://upload.wikimedia.org/wikipedia/vi/4/44/Logo_BV_Cho_Ray.png" alt="Bệnh viện Chợ Rẫy" class="partner-logo">
            <img src="https://hongngochospital.vn/wp-content/themes/hongngoc/images/logo.png" alt="Bệnh viện Hồng Ngọc" class="partner-logo">
        </div>
    </div>
    
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="footer-grid">
                <div class="footer-about">
                    <h3>Về chúng tôi</h3>
                    <p>HealthCare là nền tảng đặt lịch khám bệnh, khám sức khỏe trực tuyến hàng đầu Việt Nam, kết nối người dùng với hệ thống bệnh viện và phòng khám uy tín trên toàn quốc.</p>
                    <div class="footer-social">
                        <a href="#" class="social-link"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="social-link"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                </div>
                
                <div class="footer-links">
                    <h3>Liên kết nhanh</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Trang chủ</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Giới thiệu</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Dịch vụ</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Bác sĩ</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Tin tức</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Liên hệ</a></li>
                    </ul>
                </div>
                
                <div class="footer-links">
                    <h3>Dịch vụ</h3>
                    <ul>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Khám tổng quát</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Khám chuyên khoa</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Tư vấn sức khỏe</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Xét nghiệm</a></li>
                        <li><a href="#"><i class="fas fa-chevron-right"></i> Tiêm chủng</a></li>
                    </ul>
                </div>
                
                <div class="footer-contact">
                    <h3>Liên hệ</h3>
                    <p><i class="fas fa-map-marker-alt"></i> 123 Đường Lê Lợi, Quận 1, TP.HCM</p>
                    <p><i class="fas fa-phone-alt"></i> +84 123 456 789</p>
                    <p><i class="fas fa-envelope"></i> info@healthcare.vn</p>
                    <p><i class="fas fa-clock"></i> T2-T7: 8:00 - 18:00</p>
                </div>
            </div>
            
            <div class="footer-bottom">
                <p>© 2025 HealthCare. Tất cả quyền được bảo lưu.</p>
            </div>
        </div>
    </footer>
    
    <!-- Floating CTA -->
    <a href="#" class="floating-cta">
        <i class="fas fa-headset"></i>
        Hỗ trợ trực tuyến
    </a>
    
    <!-- Back to Top Button -->
    <button class="back-to-top">
        <i class="fas fa-arrow-up"></i>
    </button>
    
    <!-- JavaScript -->
    <script>
        // Mobile Menu Toggle
        const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
        const closeMenuBtn = document.querySelector('.close-menu');
        const mobileMenu = document.querySelector('.mobile-menu');
        const overlayMenu = document.querySelector('.overlay-menu');
        
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('active');
            overlayMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
            mobileMenu.classList.add('active');
            overlayMenu.classList.add('active');
            document.body.style.overflow = 'hidden';
        });
        
        closeMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            overlayMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
        
        overlayMenu.addEventListener('click', () => {
            mobileMenu.classList.remove('active');
            overlayMenu.classList.remove('active');
            document.body.style.overflow = '';
        });
        
        // Header Scroll Effect
        const header = document.querySelector('header');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                header.classList.add('scrolled');
            } else {
                header.classList.remove('scrolled');
            }
        });
        
        // Back to Top Button
        const backToTopBtn = document.querySelector('.back-to-top');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 300) {
                backToTopBtn.classList.add('active');
            } else {
                backToTopBtn.classList.remove('active');
            }
        });
        
        backToTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
        
        // Category Slider
        const categoryGrid = document.querySelector('.category-grid');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        
        let scrollAmount = 0;
        const scrollStep = 300;
        
        nextBtn.addEventListener('click', () => {
            scrollAmount += scrollStep;
            if (scrollAmount > categoryGrid.scrollWidth - categoryGrid.clientWidth) {
                scrollAmount = categoryGrid.scrollWidth - categoryGrid.clientWidth;
            }
            categoryGrid.scrollTo({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        prevBtn.addEventListener('click', () => {
            scrollAmount -= scrollStep;
            if (scrollAmount < 0) {
                scrollAmount = 0;
            }
            categoryGrid.scrollTo({
                left: scrollAmount,
                behavior: 'smooth'
            });
        });
        
        // Filter Animation
        const filterSelects = document.querySelectorAll('.filter-select');
        filterSelects.forEach(select => {
            select.addEventListener('change', function() {
                this.classList.add('active');
                setTimeout(() => {
                    this.classList.remove('active');
                }, 500);
            });
        });
        
        // Refresh Button Animation
        const refreshBtn = document.querySelector('.refresh-button');
        refreshBtn.addEventListener('click', function() {
            this.classList.add('spinning');
            setTimeout(() => {
                this.classList.remove('spinning');
                // Reset filters
                filterSelects.forEach(select => {
                    select.selectedIndex = 0;
                });
                // Reset search
                document.querySelector('.search-input').value = '';
            }, 1000);
        });
        
        // Add hover effect for package cards
        const packageCards = document.querySelectorAll('.package-card');
        packageCards.forEach(card => {
            card.addEventListener('mouseover', function() {
                packageCards.forEach(c => c.classList.remove('active'));
                this.classList.add('active');
            });
        });
        
        // Add animations on scroll
        const animateElements = document.querySelectorAll('.category-item, .package-card, .testimonial-card');
        
        function checkIfInView() {
            const windowHeight = window.innerHeight;
            const windowTopPosition = window.scrollY;
            const windowBottomPosition = windowTopPosition + windowHeight;
            
            animateElements.forEach(element => {
                const elementHeight = element.offsetHeight;
                const elementTopPosition = element.offsetTop;
                const elementBottomPosition = elementTopPosition + elementHeight;
                
                if (
                    (elementBottomPosition >= windowTopPosition) &&
                    (elementTopPosition <= windowBottomPosition)
                ) {
                    element.classList.add('in-view');
                }
            });
        }
        
        window.addEventListener('scroll', checkIfInView);
        window.addEventListener('load', checkIfInView);
        
        // Add animation for call-to-action buttons
        const ctaButtons = document.querySelectorAll('.hero-btn, .book-btn');
        ctaButtons.forEach(button => {
            button.addEventListener('mouseover', function() {
                this.classList.add('pulse');
                setTimeout(() => {
                    this.classList.remove('pulse');
                }, 1000);
            });
        });
        
        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                if (targetId === '#') return;
                
                const targetElement = document.querySelector(targetId);
                if (targetElement) {
                    targetElement.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>


            

