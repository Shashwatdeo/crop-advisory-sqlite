@extends('layouts.app')

@section('content')
<div class="crop-suggestions-container">
    <div class="suggestions-header">
        <h1><i class="fas fa-lightbulb"></i> Smart Crop Recommendations</h1>
        <p class="subtitle">Personalized crop suggestions based on your location, soil, and climate conditions</p>
    </div>

    <div class="selection-panel">
        <div class="selection-form">
            <h2><i class="fas fa-sliders-h"></i> Customize Your Parameters</h2>
            
            <div class="form-grid">
                <div class="form-group">
                    <label for="region"><i class="fas fa-map-marker-alt"></i> Region</label>
                    <select id="region" class="form-control">
                        <option value="">Select your region</option>
                        <option>Northern Highlands</option>
                        <option>Central Valley</option>
                        <option>Southern Plains</option>
                        <option>Eastern Foothills</option>
                        <option>Western Coast</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="soil-type"><i class="fas fa-mountain"></i> Soil Type</label>
                    <select id="soil-type" class="form-control">
                        <option value="">Select soil type</option>
                        <option>Clay</option>
                        <option>Sandy</option>
                        <option>Loamy</option>
                        <option>Silty</option>
                        <option>Peaty</option>
                        <option>Chalky</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="season"><i class="fas fa-calendar-alt"></i> Growing Season</label>
                    <select id="season" class="form-control">
                        <option value="">Select season</option>
                        <option>Spring (Mar-May)</option>
                        <option>Summer (Jun-Aug)</option>
                        <option>Autumn (Sep-Nov)</option>
                        <option>Winter (Dec-Feb)</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="water-availability"><i class="fas fa-tint"></i> Water Availability</label>
                    <select id="water-availability" class="form-control">
                        <option value="">Select availability</option>
                        <option>High (Irrigation available)</option>
                        <option>Moderate (Limited irrigation)</option>
                        <option>Low (Rainfed only)</option>
                    </select>
                </div>
            </div>

            <button class="generate-btn">
                <i class="fas fa-seedling"></i> Generate Recommendations
            </button>
        </div>

        <div class="weather-integration">
            <div class="weather-card">
                <h3><i class="fas fa-cloud-sun"></i> Current Weather Conditions</h3>
                <div class="weather-data">
                    <div class="weather-item">
                        <i class="fas fa-temperature-high"></i>
                        <span>24°C</span>
                    </div>
                    <div class="weather-item">
                        <i class="fas fa-tint"></i>
                        <span>65% RH</span>
                    </div>
                    <div class="weather-item">
                        <i class="fas fa-wind"></i>
                        <span>12 km/h</span>
                    </div>
                </div>
                <p class="weather-note">Using current weather data for more accurate suggestions</p>
            </div>
        </div>
    </div>

    <div class="recommendations-section">
        <h2><i class="fas fa-star"></i> Recommended Crops</h2>
        <p class="section-description">Based on your selected parameters and current conditions</p>

        <div class="crops-grid">
            <!-- Crop Card 1 -->
            <div class="crop-card best-match">
                <div class="crop-header">
                    <span class="match-badge">Best Match</span>
                    <span class="profit-potential">High Profit</span>
                </div>
                <div class="crop-image">
                    <img src="https://images.unsplash.com/photo-1605000797499-95a51c5269ae?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Tomatoes">
                </div>
                <h3 class="crop-name">Tomatoes</h3>
                <div class="crop-details">
                    <div class="detail-item">
                        <i class="fas fa-calendar-day"></i>
                        <span>90-120 days</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-tint"></i>
                        <span>Moderate water</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-thermometer-half"></i>
                        <span>18-28°C</span>
                    </div>
                </div>
                <div class="crop-actions">
                    <button class="details-btn"><i class="fas fa-book"></i> Details</button>
                    <button class="save-btn"><i class="fas fa-bookmark"></i> Save</button>
                </div>
            </div>

            <!-- Crop Card 2 -->
            <div class="crop-card">
                <div class="crop-header">
                    <span class="profit-potential">Medium Profit</span>
                </div>
                <div class="crop-image">
                    <img src="https://images.unsplash.com/photo-1594282418426-1f7ab0bfa29a?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Bell Peppers">
                </div>
                <h3 class="crop-name">Bell Peppers</h3>
                <div class="crop-details">
                    <div class="detail-item">
                        <i class="fas fa-calendar-day"></i>
                        <span>60-90 days</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-tint"></i>
                        <span>Moderate water</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-thermometer-half"></i>
                        <span>21-29°C</span>
                    </div>
                </div>
                <div class="crop-actions">
                    <button class="details-btn"><i class="fas fa-book"></i> Details</button>
                    <button class="save-btn"><i class="fas fa-bookmark"></i> Save</button>
                </div>
            </div>

            <!-- Crop Card 3 -->
            <div class="crop-card">
                <div class="crop-header">
                    <span class="profit-potential">Stable Market</span>
                </div>
                <div class="crop-image">
                    <img src="https://images.unsplash.com/photo-1601493700631-2b16ec4b4716?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Spinach">
                </div>
                <h3 class="crop-name">Spinach</h3>
                <div class="crop-details">
                    <div class="detail-item">
                        <i class="fas fa-calendar-day"></i>
                        <span>37-45 days</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-tint"></i>
                        <span>Regular water</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-thermometer-half"></i>
                        <span>7-24°C</span>
                    </div>
                </div>
                <div class="crop-actions">
                    <button class="details-btn"><i class="fas fa-book"></i> Details</button>
                    <button class="save-btn"><i class="fas fa-bookmark"></i> Save</button>
                </div>
            </div>

            <!-- Crop Card 4 -->
            <div class="crop-card">
                <div class="crop-header">
                    <span class="profit-potential">Low Risk</span>
                </div>
                <div class="crop-image">
                    <img src="https://images.unsplash.com/photo-1594282486552-451ac4b5ad1e?ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=80" alt="Green Beans">
                </div>
                <h3 class="crop-name">Green Beans</h3>
                <div class="crop-details">
                    <div class="detail-item">
                        <i class="fas fa-calendar-day"></i>
                        <span>50-60 days</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-tint"></i>
                        <span>Moderate water</span>
                    </div>
                    <div class="detail-item">
                        <i class="fas fa-thermometer-half"></i>
                        <span>16-24°C</span>
                    </div>
                </div>
                <div class="crop-actions">
                    <button class="details-btn"><i class="fas fa-book"></i> Details</button>
                    <button class="save-btn"><i class="fas fa-bookmark"></i> Save</button>
                </div>
            </div>
        </div>
    </div>

    <div class="market-insights">
        <h2><i class="fas fa-chart-line"></i> Market Insights</h2>
        <div class="insights-grid">
            <div class="insight-card">
                <i class="fas fa-dollar-sign"></i>
                <h3>Price Trends</h3>
                <p>Tomato prices expected to rise 15% next quarter due to reduced supply.</p>
            </div>
            <div class="insight-card">
                <i class="fas fa-truck"></i>
                <h3>Demand Forecast</h3>
                <p>Increased demand for organic bell peppers in urban markets.</p>
            </div>
            <div class="insight-card">
                <i class="fas fa-globe-americas"></i>
                <h3>Export Potential</h3>
                <p>Growing international demand for premium spinach varieties.</p>
            </div>
        </div>
    </div>
</div>

<style>
    /* Main Container */
    .crop-suggestions-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }

    /* Header */
    .suggestions-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .suggestions-header h1 {
        font-size: 2.3rem;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
    }

    .suggestions-header .subtitle {
        color: var(--dark-text);
        opacity: 0.8;
        font-size: 1.1rem;
        max-width: 700px;
        margin: 0 auto;
    }

    /* Selection Panel */
    .selection-panel {
        display: grid;
        grid-template-columns: 2fr 1fr;
        gap: 2rem;
        margin-bottom: 3rem;
    }

    @media (max-width: 900px) {
        .selection-panel {
            grid-template-columns: 1fr;
        }
    }

    .selection-form {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .selection-form h2 {
        margin-top: 0;
        margin-bottom: 1.5rem;
        color: var(--primary-dark);
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .form-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        margin-bottom: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        font-weight: 500;
        color: var(--dark-text);
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .form-control {
        width: 100%;
        padding: 0.8rem 1rem;
        border: 1px solid #ddd;
        border-radius: 6px;
        font-size: 1rem;
        transition: var(--transition);
    }

    .form-control:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
    }

    .generate-btn {
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 0.8rem 1.5rem;
        border-radius: 6px;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        width: 100%;
        font-size: 1rem;
    }

    .generate-btn:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    /* Weather Integration */
    .weather-integration {
        display: flex;
        align-items: flex-start;
    }

    .weather-card {
        background: linear-gradient(135deg, #4a6fa5, #2e4d7d);
        color: white;
        padding: 1.5rem;
        border-radius: 10px;
        width: 100%;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    }

    .weather-card h3 {
        margin-top: 0;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .weather-data {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .weather-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0.3rem;
    }

    .weather-item i {
        font-size: 1.5rem;
    }

    .weather-note {
        font-size: 0.8rem;
        opacity: 0.8;
        margin: 0;
        text-align: center;
    }

    /* Recommendations Section */
    .recommendations-section {
        margin-bottom: 3rem;
    }

    .recommendations-section h2 {
        text-align: center;
        margin-bottom: 0.5rem;
        color: var(--primary-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
    }

    .section-description {
        text-align: center;
        color: var(--dark-text);
        opacity: 0.8;
        margin-bottom: 2rem;
    }

    .crops-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    /* Crop Cards */
    .crop-card {
        background: white;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        transition: var(--transition);
    }

    .crop-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .crop-card.best-match {
        border: 2px solid var(--primary-color);
    }

    .crop-header {
        display: flex;
        justify-content: space-between;
        padding: 0.8rem 1rem;
    }

    .match-badge {
        background: var(--primary-color);
        color: white;
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.2rem 0.6rem;
        border-radius: 50px;
        text-transform: uppercase;
    }

    .profit-potential {
        font-size: 0.7rem;
        font-weight: 600;
        padding: 0.2rem 0.6rem;
        border-radius: 50px;
        background: #f5f5f5;
        color: #333;
    }

    .crop-image {
        height: 150px;
        overflow: hidden;
    }

    .crop-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }

    .crop-card:hover .crop-image img {
        transform: scale(1.05);
    }

    .crop-name {
        margin: 1rem 1rem 0.5rem;
        color: var(--primary-dark);
    }

    .crop-details {
        margin: 0 1rem 1rem;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 0.5rem;
    }

    .detail-item {
        display: flex;
        flex-direction: column;
        align-items: center;
        font-size: 0.8rem;
        color: #555;
    }

    .detail-item i {
        font-size: 1rem;
        margin-bottom: 0.2rem;
        color: var(--primary-color);
    }

    .crop-actions {
        display: flex;
        border-top: 1px solid #eee;
    }

    .details-btn, .save-btn {
        flex: 1;
        padding: 0.7rem;
        border: none;
        background: white;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
        font-size: 0.9rem;
    }

    .details-btn {
        border-right: 1px solid #eee;
    }

    .details-btn:hover {
        background: #f5f5f5;
        color: var(--primary-color);
    }

    .save-btn:hover {
        background: #f5f5f5;
        color: var(--primary-color);
    }

    /* Market Insights */
    .market-insights {
        margin-bottom: 3rem;
    }

    .market-insights h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        color: var(--primary-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
    }

    .insights-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .insight-card {
        background: white;
        padding: 1.5rem;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        text-align: center;
        transition: var(--transition);
    }

    .insight-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .insight-card i {
        font-size: 2rem;
        color: var(--primary-color);
        margin-bottom: 1rem;
    }

    .insight-card h3 {
        margin: 0.5rem 0;
        color: var(--primary-dark);
    }

    .insight-card p {
        margin: 0;
        font-size: 0.9rem;
        color: #555;
    }
</style>
@endsection