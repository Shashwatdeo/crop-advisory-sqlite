<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crop Advisory and Farmer's Companion</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        :root {
            --primary-color: #2E7D32;
            --primary-dark: #1B5E20;
            --primary-light: #81C784;
            --secondary-color: #FFA000;
            --light-bg: #F5F5F6;
            --dark-text: #263238;
            --light-text: #ECEFF1;
            --success-color: #4CAF50;
            --shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            --transition: all 0.3s ease;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
            line-height: 1.6;
            margin: 0;
            padding: 0;
        }

        /* Header Styling */
        header {
            background: linear-gradient(135deg, var(--primary-color), var(--primary-dark));
            color: var(--light-text);
            padding: 1.5rem 2rem;
            box-shadow: var(--shadow);
            position: relative;
            z-index: 100;
        }

        header h2 {
            margin: 0;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        header h2 i {
            font-size: 1.5rem;
        }

        /* Navbar Styling */
        nav {
            background-color: white;
            box-shadow: var(--shadow);
            position: sticky;
            top: 0;
            z-index: 90;
        }

        nav ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        nav ul li {
            margin: 0;
        }

        nav ul li a {
            color: var(--dark-text);
            text-decoration: none;
            padding: 1rem 1.5rem;
            display: block;
            font-weight: 500;
            transition: var(--transition);
            position: relative;
        }

        nav ul li a:hover {
            color: var(--primary-color);
        }

        nav ul li a:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 0;
            height: 3px;
            background: var(--primary-color);
            transition: var(--transition);
        }

        nav ul li a:hover:after {
            width: 70%;
        }

        nav ul li a.active {
            color: var(--primary-color);
        }

        nav ul li a.active:after {
            width: 70%;
        }

        nav ul li a i {
            margin-right: 8px;
        }

        /* Main Content */
        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 1.5rem;
        }

        /* Success Message */
        .success-message {
            background-color: rgba(76, 175, 80, 0.2);
            color: var(--success-color);
            padding: 1rem;
            border-radius: 4px;
            margin: 1.5rem 0;
            border-left: 4px solid var(--success-color);
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .success-message i {
            font-size: 1.2rem;
        }

        /* Footer */
        footer {
            background: linear-gradient(135deg, var(--primary-dark), var(--primary-color));
            color: var(--light-text);
            padding: 2rem;
            text-align: center;
            margin-top: 3rem;
        }

        footer p {
            margin: 0;
            font-weight: 300;
        }

        .social-links {
            display: flex;
            justify-content: center;
            gap: 1.5rem;
            margin: 1rem 0;
        }

        .social-links a {
            color: var(--light-text);
            font-size: 1.5rem;
            transition: var(--transition);
        }

        .social-links a:hover {
            color: var(--secondary-color);
            transform: translateY(-3px);
        }

        /* Responsive */
        @media (max-width: 768px) {
            nav ul {
                flex-direction: column;
                align-items: center;
            }
            
            nav ul li {
                width: 100%;
                text-align: center;
            }
            
            nav ul li a {
                padding: 0.8rem;
            }
        }
    </style>
</head>
<body>
    <!-- Header Section -->
    <header>
        <h2><i class="fas fa-leaf"></i> Crop Advisory and Farmer's Companion</h2>
    </header>

    <!-- Navbar Section -->
    <nav>
        <ul>
            <li><a href="{{ url('/') }}" class="{{ request()->is('/') ? 'active' : '' }}"><i class="fas fa-home"></i> Home</a></li>
            <li><a href="{{ route('crops.index') }}" class="{{ request()->is('crops') ? 'active' : '' }}"><i class="fas fa-seedling"></i> All Crops</a></li>
            <li><a href="{{ route('crops.create') }}" class="{{ request()->is('crops/create') ? 'active' : '' }}"><i class="fas fa-plus-circle"></i> Add Crop</a></li>
            <li><a href="{{ route('weather.index') }}" class="{{ request()->is('weather') ? 'active' : '' }}"><i class="fas fa-cloud-sun"></i> Weather</a></li>
            <li><a href="{{ route('pest-alerts.index') }}" class="{{ request()->is('pest-alerts') ? 'active' : '' }}"><i class="fas fa-bug"></i> Pest Alerts</a></li>
            <li><a href="{{ route('crop-suggestions.index') }}" class="{{ request()->is('crop-suggestions') ? 'active' : '' }}"><i class="fas fa-lightbulb"></i> Crop Suggestions</a></li>
        </ul>
    </nav>

    <!-- Main Content Section -->
    <main class="container">
        @yield('content')

        <!-- Success Message -->
        @if(session('success'))
            <div class="success-message">
                <i class="fas fa-check-circle"></i>
                {{ session('success') }}
            </div>
        @endif
    </main>

    <!-- Footer Section -->
    <footer>
        <div class="social-links">
            <a href="#"><i class="fab fa-facebook"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-linkedin"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
        </div>
        <p>&copy; {{ date('Y') }} Crop Advisory System | Powered by Laravel MVC</p>
    </footer>
</body>
</html>