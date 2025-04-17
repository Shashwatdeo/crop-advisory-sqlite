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

            <button class="generate-btn" id="generate-btn">
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

        <div class="crops-grid" id="crops-grid">
            <div class="loading-message" id="loading-message">Loading recommendations...</div>
        </div>
    </div>

    <style>
        .crop-suggestions-container {
            padding: 20px;
            font-family: 'Arial', sans-serif;
            color: #333;
            background-color: #f8f9fa;
        }

        .suggestions-header {
            text-align: center;
            margin-bottom: 30px;
        }

        .suggestions-header h1 {
            color: #28a745;
            margin-bottom: 10px;
        }

        .suggestions-header .subtitle {
            color: #6c757d;
        }

        .selection-panel {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .selection-form, .weather-integration {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            flex: 1 1 300px; /* Distribute space and set a minimum width */
        }

        .selection-form h2, .weather-integration h3 {
            color: #007bff;
            margin-bottom: 15px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Responsive grid */
            gap: 15px;
            margin-bottom: 20px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        .form-group label {
            margin-bottom: 5px;
            color: #555;
            font-weight: bold;
        }

        .form-control {
            padding: 10px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            font-size: 16px;
        }

        .generate-btn {
            background-color: #28a745;
            color: white;
            padding: 12px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s ease;
        }

        .generate-btn:hover {
            background-color: #1e7e34;
        }

        .weather-card {
            text-align: center;
        }

        .weather-data {
            display: flex;
            justify-content: space-around;
            margin-bottom: 10px;
        }

        .weather-item {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .weather-item i {
            font-size: 20px;
            color: #007bff;
            margin-bottom: 5px;
        }

        .weather-item span {
            font-weight: bold;
        }

        .weather-note {
            color: #6c757d;
            font-size: 14px;
        }

        .recommendations-section {
            margin-top: 30px;
            text-align: center;
        }

        .recommendations-section h2 {
            color: #ffc107;
            margin-bottom: 10px;
        }

        .recommendations-section .section-description {
            color: #6c757d;
            margin-bottom: 20px;
        }

        .crops-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); /* Responsive grid for crops */
            gap: 20px;
        }

        .crop-card {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            transition: transform 0.2s ease-in-out;
        }

        .crop-card:hover {
            transform: translateY(-5px);
        }

        .crop-header {
            background-color: #f0f8ff;
            padding: 10px;
            text-align: right;
        }

        .profit-potential {
            background-color: #28a745;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            font-size: 14px;
        }

        .crop-image {
            width: 100%;
            height: 150px;
            overflow: hidden;
        }

        .crop-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: block;
        }

        .crop-name {
            padding: 15px;
            text-align: center;
            color: #333;
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 0;
        }

        .crop-details {
            padding: 10px 15px;
            display: flex;
            flex-direction: column;
            gap: 8px;
        }

        .detail-item {
            display: flex;
            align-items: center;
            color: #555;
            font-size: 14px;
        }

        .detail-item i {
            margin-right: 8px;
            color: #007bff;
        }

        .loading-message {
            text-align: center;
            padding: 20px;
            font-style: italic;
            color: #777;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .selection-panel {
                flex-direction: column;
            }

            .form-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const generateBtn = document.getElementById('generate-btn');
        const cropsGrid = document.getElementById('crops-grid');
        const loadingMessage = document.getElementById('loading-message');

        generateBtn.addEventListener('click', function() {
            const region = document.getElementById('region').value;
            const soilType = document.getElementById('soil-type').value;
            const season = document.getElementById('season').value;
            const waterAvailability = document.getElementById('water-availability').value;

            // Show loading message
            cropsGrid.innerHTML = '';
            loadingMessage.style.display = 'block';

            fetch('/crop-suggestions', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify({
                    region: region,
                    soil_type: soilType,
                    season: season,
                    water_availability: waterAvailability
                })
            })
            .then(response => {
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                return response.json();
            })
            .then(data => {
                loadingMessage.style.display = 'none';
                if (data.length > 0) {
                    data.forEach(crop => {
                        const cropCard = `
                            <div class="crop-card">
                                <div class="crop-header">
                                    <span class="profit-potential">${crop.profit_potential}</span>
                                </div>
                                <div class="crop-image">
                                    <img src="${crop.image_url}" alt="${crop.crop_name}">
                                </div>
                                <h3 class="crop-name">${crop.crop_name}</h3>
                                <div class="crop-details">
                                    <div class="detail-item">
                                        <i class="fas fa-calendar-day"></i>
                                        <span>${crop.growth_duration}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-tint"></i>
                                        <span>${crop.water_requirement}</span>
                                    </div>
                                    <div class="detail-item">
                                        <i class="fas fa-thermometer-half"></i>
                                        <span>${crop.temperature_range}</span>
                                    </div>
                                </div>
                            </div>
                        `;
                        cropsGrid.innerHTML += cropCard;
                    });
                } else {
                    cropsGrid.innerHTML = '<div class="no-recommendations">No recommendations found for the selected parameters.</div>';
                }
            })
            .catch(error => {
                loadingMessage.style.display = 'none';
                console.error('Error:', error);
                cropsGrid.innerHTML = '<div class="error-message">Failed to load recommendations. Please try again later.</div>';
            });
        });
    });
</script>
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

        .crop-header {
            display: flex;
            justify-content: space-between;
            padding: 0.8rem 1rem;
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