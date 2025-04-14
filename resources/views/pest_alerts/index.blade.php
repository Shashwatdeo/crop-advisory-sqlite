@extends('layouts.app')

@section('content')
<div class="pest-alerts-container">
    <div class="pest-header">
        <h1><i class="fas fa-bug"></i> Pest & Disease Alert System</h1>
        <p class="subtitle">Real-time agricultural pest monitoring and early warning system</p>
    </div>

    <div class="alert-filters">
        <form class="filter-form">
            <div class="form-group">
                <label for="region"><i class="fas fa-map-marked-alt"></i> Region</label>
                <select id="region" class="form-control">
                    <option>All Regions</option>
                    <option>Northern</option>
                    <option>Central</option>
                    <option>Southern</option>
                    <option>Eastern</option>
                    <option>Western</option>
                </select>
            </div>
            <div class="form-group">
                <label for="crop"><i class="fas fa-seedling"></i> Crop Type</label>
                <select id="crop" class="form-control">
                    <option>All Crops</option>
                    <option>Rice</option>
                    <option>Wheat</option>
                    <option>Corn</option>
                    <option>Soybean</option>
                    <option>Vegetables</option>
                    <option>Fruits</option>
                </select>
            </div>
            <div class="form-group">
                <label for="severity"><i class="fas fa-exclamation-triangle"></i> Severity</label>
                <select id="severity" class="form-control">
                    <option>All Levels</option>
                    <option>Low</option>
                    <option>Medium</option>
                    <option>High</option>
                    <option>Critical</option>
                </select>
            </div>
            <button type="submit" class="filter-button">
                <i class="fas fa-filter"></i> Apply Filters
            </button>
        </form>
    </div>

    <div class="alerts-grid">
        <!-- Alert Card 1 -->
        <div class="alert-card critical">
            <div class="alert-header">
                <span class="alert-badge critical-bg">CRITICAL</span>
                <span class="alert-date">June 15, 2023</span>
            </div>
            <h3 class="alert-title">Fall Armyworm Outbreak</h3>
            <p class="alert-crop"><i class="fas fa-seedling"></i> Affected: Corn, Sorghum</p>
            <p class="alert-region"><i class="fas fa-map-marker-alt"></i> Northern Region</p>
            <div class="alert-description">
                <p>Significant infestation detected in 5 districts. Larvae found in 60% of surveyed fields. Immediate action recommended.</p>
            </div>
            <div class="alert-actions">
                <button class="action-button"><i class="fas fa-book"></i> Details</button>
                <button class="action-button"><i class="fas fa-file-download"></i> Report</button>
            </div>
        </div>

        <!-- Alert Card 2 -->
        <div class="alert-card high">
            <div class="alert-header">
                <span class="alert-badge high-bg">HIGH</span>
                <span class="alert-date">June 12, 2023</span>
            </div>
            <h3 class="alert-title">Rice Blast Disease</h3>
            <p class="alert-crop"><i class="fas fa-seedling"></i> Affected: Rice</p>
            <p class="alert-region"><i class="fas fa-map-marker-alt"></i> Central Region</p>
            <div class="alert-description">
                <p>Increasing cases reported due to recent humid weather. Fungal lesions observed on leaves in 30% of paddies.</p>
            </div>
            <div class="alert-actions">
                <button class="action-button"><i class="fas fa-book"></i> Details</button>
                <button class="action-button"><i class="fas fa-file-download"></i> Report</button>
            </div>
        </div>

        <!-- Alert Card 3 -->
        <div class="alert-card medium">
            <div class="alert-header">
                <span class="alert-badge medium-bg">MEDIUM</span>
                <span class="alert-date">June 10, 2023</span>
            </div>
            <h3 class="alert-title">Aphid Infestation</h3>
            <p class="alert-crop"><i class="fas fa-seedling"></i> Affected: Vegetables, Citrus</p>
            <p class="alert-region"><i class="fas fa-map-marker-alt"></i> Southern Region</p>
            <div class="alert-description">
                <p>Colonies detected on new growth. Currently affecting 15% of monitored plots. Monitor closely for spread.</p>
            </div>
            <div class="alert-actions">
                <button class="action-button"><i class="fas fa-book"></i> Details</button>
                <button class="action-button"><i class="fas fa-file-download"></i> Report</button>
            </div>
        </div>

        <!-- Alert Card 4 -->
        <div class="alert-card low">
            <div class="alert-header">
                <span class="alert-badge low-bg">LOW</span>
                <span class="alert-date">June 8, 2023</span>
            </div>
            <h3 class="alert-title">Tomato Leaf Miner</h3>
            <p class="alert-crop"><i class="fas fa-seedling"></i> Affected: Tomatoes</p>
            <p class="alert-region"><i class="fas fa-map-marker-alt"></i> Western Region</p>
            <div class="alert-description">
                <p>Early signs of activity detected. Currently isolated to 2 locations. Recommended preventive measures.</p>
            </div>
            <div class="alert-actions">
                <button class="action-button"><i class="fas fa-book"></i> Details</button>
                <button class="action-button"><i class="fas fa-file-download"></i> Report</button>
            </div>
        </div>
    </div>

    <div class="pest-prevention">
        <h2><i class="fas fa-shield-alt"></i> Preventive Measures & Solutions</h2>
        <div class="prevention-grid">
            <div class="prevention-column">
                <div class="prevention-card">
                    <div class="prevention-icon">
                        <i class="fas fa-search"></i>
                    </div>
                    <div class="prevention-content">
                        <h3>Regular Monitoring</h3>
                        <p>Inspect crops weekly for early signs of pest activity or disease symptoms. Look for leaf damage, discoloration, or unusual growth patterns.</p>
                    </div>
                </div>
                
                <div class="prevention-card">
                    <div class="prevention-icon">
                        <i class="fas fa-spray-can"></i>
                    </div>
                    <div class="prevention-content">
                        <h3>Biological Controls</h3>
                        <p>Use natural predators like ladybugs or parasitic wasps. Apply biopesticides such as neem oil or Bacillus thuringiensis (Bt).</p>
                    </div>
                </div>
            </div>
            
            <div class="prevention-column">
                <div class="prevention-card">
                    <div class="prevention-icon">
                        <i class="fas fa-crop-alt"></i>
                    </div>
                    <div class="prevention-content">
                        <h3>Crop Rotation</h3>
                        <p>Break pest cycles by rotating with non-host crops. Plan 3-4 year rotation cycles to disrupt pest life cycles effectively.</p>
                    </div>
                </div>
                
                <div class="prevention-card">
                    <div class="prevention-icon">
                        <i class="fas fa-tint"></i>
                    </div>
                    <div class="prevention-content">
                        <h3>Proper Irrigation</h3>
                        <p>Use drip irrigation to keep foliage dry. Avoid overwatering which creates favorable conditions for many pests and diseases.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Pest Alerts Container */
    .pest-alerts-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }

    /* Header */
    .pest-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .pest-header h1 {
        font-size: 2.2rem;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
    }

    .pest-header .subtitle {
        color: var(--dark-text);
        opacity: 0.8;
        font-size: 1.1rem;
    }

    /* Filter Form */
    .alert-filters {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        margin-bottom: 2rem;
    }

    .filter-form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 1.5rem;
        align-items: end;
    }

    .form-group {
        margin-bottom: 0;
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
        padding: 0.7rem 1rem;
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

    .filter-button {
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
        height: fit-content;
    }

    .filter-button:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
    }

    /* Alerts Grid - Fixed 4-column layout */
    .alerts-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 1.5rem;
        margin-bottom: 3rem;
    }

    @media (max-width: 1100px) {
        .alerts-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 600px) {
        .alerts-grid {
            grid-template-columns: 1fr;
        }
    }

    /* Alert Cards */
    .alert-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .alert-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .alert-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.8rem 1.2rem;
        border-bottom: 1px solid #eee;
    }

    .alert-badge {
        font-size: 0.7rem;
        font-weight: 700;
        padding: 0.3rem 0.8rem;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .critical-bg { background: #f44336; color: white; }
    .high-bg { background: #ff9800; color: white; }
    .medium-bg { background: #ffc107; color: #333; }
    .low-bg { background: #8bc34a; color: white; }

    .alert-date {
        font-size: 0.8rem;
        color: #666;
    }

    .alert-title {
        margin: 1rem 1.2rem 0.5rem;
        color: var(--primary-dark);
        font-size: 1.1rem;
    }

    .alert-crop, .alert-region {
        margin: 0.3rem 1.2rem;
        font-size: 0.9rem;
        color: #555;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .alert-description {
        margin: 1rem 1.2rem;
        font-size: 0.9rem;
        color: #444;
        line-height: 1.5;
        flex-grow: 1;
    }

    .alert-actions {
        display: flex;
        border-top: 1px solid #eee;
        padding: 0.8rem;
        gap: 0.5rem;
        margin-top: auto;
    }

    .action-button {
        flex: 1;
        background: white;
        border: 1px solid #ddd;
        padding: 0.5rem;
        border-radius: 4px;
        font-size: 0.8rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
    }

    .action-button:hover {
        background: #f5f5f5;
        border-color: #ccc;
    }

    /* Prevention Section - Balanced 2-column layout */
    .pest-prevention {
        margin-top: 3rem;
        background: rgba(129, 199, 132, 0.1);
        padding: 2rem;
        border-radius: 15px;
    }

    .pest-prevention h2 {
        text-align: center;
        margin-bottom: 2rem;
        color: var(--primary-dark);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.8rem;
    }

    .prevention-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 1.5rem;
    }

    @media (max-width: 768px) {
        .prevention-grid {
            grid-template-columns: 1fr;
        }
    }

    .prevention-column {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    .prevention-card {
        background: white;
        padding: 1.5rem;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        display: flex;
        gap: 1.5rem;
        align-items: flex-start;
        transition: var(--transition);
    }

    .prevention-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .prevention-icon {
        font-size: 1.8rem;
        color: var(--primary-color);
        background: rgba(46, 125, 50, 0.1);
        padding: 1rem;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
    }

    .prevention-content {
        flex: 1;
    }

    .prevention-content h3 {
        margin-top: 0;
        margin-bottom: 0.5rem;
        color: var(--primary-dark);
    }

    .prevention-content p {
        margin: 0;
        color: #555;
        font-size: 0.9rem;
        line-height: 1.5;
    }
</style>
@endsection