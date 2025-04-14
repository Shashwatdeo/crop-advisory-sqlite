@extends('layouts.app')

@section('content')
<div class="hero-section">
    <div class="hero-content">
        <h1 class="hero-title">Welcome to the Crop Advisory Portal</h1>
        <p class="hero-subtitle">Get data-driven agricultural insights for better farming decisions</p>
        <div class="hero-buttons">
            <a href="{{ route('crops.index') }}" class="btn btn-primary">
                <i class="fas fa-seedling"></i> Browse Crops Database
            </a>
            <a href="{{ route('crops.create') }}" class="btn btn-secondary">
                <i class="fas fa-plus-circle"></i> Add New Crop
            </a>
        </div>
    </div>
    <div class="hero-image">
        <img src="https://images.unsplash.com/photo-1500382017468-9049fed747ef?ixlib=rb-1.2.1&auto=format&fit=crop&w=800&q=80" alt="Farm landscape">
    </div>
</div>

<div class="features-section">
    <h2 class="section-title">Our Services</h2>
    <div class="features-grid">
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-cloud-sun"></i>
            </div>
            <h3>Weather Intelligence</h3>
            <p>Get hyper-local weather forecasts and agricultural advisories tailored to your location.</p>
            <a href="{{ route('weather.index') }}" class="feature-link">View Weather <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-bug"></i>
            </div>
            <h3>Pest Alerts</h3>
            <p>Real-time notifications about pest outbreaks in your region with prevention strategies.</p>
            <a href="{{ route('pest-alerts.index') }}" class="feature-link">View Alerts <i class="fas fa-arrow-right"></i></a>
        </div>
        
        <div class="feature-card">
            <div class="feature-icon">
                <i class="fas fa-lightbulb"></i>
            </div>
            <h3>Crop Suggestions</h3>
            <p>Personalized crop recommendations based on your soil, climate, and market trends.</p>
            <a href="{{ route('crop-suggestions.index') }}" class="feature-link">Get Suggestions <i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</div>

<style>
    /* Hero Section */
    .hero-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 3rem;
        padding: 4rem 0;
        margin-bottom: 3rem;
    }

    .hero-content {
        flex: 1;
        max-width: 600px;
    }

    .hero-image {
        flex: 1;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
    }

    .hero-image img {
        width: 100%;
        height: auto;
        display: block;
        transition: transform 0.5s ease;
    }

    .hero-image:hover img {
        transform: scale(1.03);
    }

    .hero-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: var(--primary-dark);
        margin-bottom: 1.5rem;
        line-height: 1.2;
    }

    .hero-subtitle {
        font-size: 1.2rem;
        color: var(--dark-text);
        margin-bottom: 2rem;
        opacity: 0.9;
    }

    .hero-buttons {
        display: flex;
        gap: 1rem;
        flex-wrap: wrap;
    }

    /* Buttons */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.8rem 1.5rem;
        border-radius: 6px;
        font-weight: 500;
        text-decoration: none;
        transition: var(--transition);
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-primary:hover {
        background-color: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(46, 125, 50, 0.3);
    }

    .btn-secondary {
        background-color: white;
        color: var(--primary-color);
        border: 1px solid var(--primary-color);
    }

    .btn-secondary:hover {
        background-color: var(--primary-light);
        color: white;
        transform: translateY(-2px);
    }

    /* Features Section */
    .features-section {
        padding: 4rem 0;
        background-color: rgba(129, 199, 132, 0.1);
        border-radius: 15px;
        margin: 3rem 0;
    }

    .section-title {
        text-align: center;
        font-size: 2rem;
        color: var(--primary-dark);
        margin-bottom: 3rem;
    }

    .features-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 2rem;
        padding: 0 2rem;
    }

    .feature-card {
        background: white;
        padding: 2rem;
        border-radius: 10px;
        box-shadow: var(--shadow);
        transition: var(--transition);
    }

    .feature-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .feature-icon {
        font-size: 2.5rem;
        color: var(--primary-color);
        margin-bottom: 1.5rem;
    }

    .feature-card h3 {
        font-size: 1.3rem;
        margin-bottom: 1rem;
        color: var(--primary-dark);
    }

    .feature-card p {
        color: var(--dark-text);
        margin-bottom: 1.5rem;
        opacity: 0.9;
    }

    .feature-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: var(--primary-color);
        font-weight: 500;
        text-decoration: none;
        transition: var(--transition);
    }

    .feature-link:hover {
        color: var(--primary-dark);
        gap: 0.8rem;
    }

    /* Responsive */
    @media (max-width: 900px) {
        .hero-section {
            flex-direction: column;
            text-align: center;
        }

        .hero-buttons {
            justify-content: center;
        }

        .hero-image {
            width: 100%;
        }
    }

    @media (max-width: 500px) {
        .hero-title {
            font-size: 2rem;
        }

        .hero-subtitle {
            font-size: 1rem;
        }

        .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endsection