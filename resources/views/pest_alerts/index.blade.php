@extends('layouts.app')

@section('content')
<div class="pest-alerts-container">
    <div class="pest-header">
        <h1><i class="fas fa-bug"></i> Pest & Disease Alert System</h1>
        <p class="subtitle">Real-time agricultural pest monitoring and early warning system</p>
    </div>

    <div class="alert-filters">
        <form class="filter-form" action="{{ route('pestalerts.filter') }}" method="GET">
            <div class="form-row">
                <div class="form-group">
                    <label for="region"><i class="fas fa-map-marked-alt"></i> Region</label>
                    <select id="region" name="region" class="form-control">
                        <option value="">All Regions</option>
                        <option value="Northern">Northern</option>
                        <option value="Central">Central</option>
                        <option value="Southern">Southern</option>
                        <option value="Eastern">Eastern</option>
                        <option value="Western">Western</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="crop"><i class="fas fa-seedling"></i> Crop Type</label>
                    <select id="crop" name="crop" class="form-control">
                        <option value="">All Crops</option>
                        <option value="Rice">Rice</option>
                        <option value="Wheat">Wheat</option>
                        <option value="Corn">Corn</option>
                        <option value="Soybean">Soybean</option>
                        <option value="Vegetables">Vegetables</option>
                        <option value="Fruits">Fruits</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="severity"><i class="fas fa-exclamation-triangle"></i> Severity</label>
                    <select id="severity" name="severity" class="form-control">
                        <option value="">All Levels</option>
                        <option value="Low">Low</option>
                        <option value="Medium">Medium</option>
                        <option value="High">High</option>
                        <option value="Critical">Critical</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="filter-button">
                        <i class="fas fa-filter"></i> Apply Filters
                    </button>
                </div>
            </div>
        </form>
    </div>

    <div class="alert-results-container">
        <div class="results-header">
            <h2>Current Alerts <span class="badge">{{ count($alerts) }} active</span></h2>
            <div class="sort-options">
                <span>Sort by:</span>
                <select class="sort-select">
                    <option value="date-desc">Newest First</option>
                    <option value="date-asc">Oldest First</option>
                    <option value="severity">Severity Level</option>
                </select>
            </div>
        </div>
        
        <div class="alerts-grid">
            @foreach ($alerts as $alert)
            <div class="alert-card {{ strtolower($alert->severity) }}">
                <div class="alert-header">
                    <span class="alert-badge {{ strtolower($alert->severity) }}-bg">{{ strtoupper($alert->severity) }}</span>
                    <span class="alert-date">{{ \Carbon\Carbon::parse($alert->date)->format('M d, Y') }}</span>
                </div>
                <div class="alert-content">
                    <h3 class="alert-title">{{ $alert->title }}</h3>
                    <div class="alert-meta">
                        <span class="meta-item"><i class="fas fa-seedling"></i> {{ $alert->crop }}</span>
                        <span class="meta-item"><i class="fas fa-map-marker-alt"></i> {{ $alert->location }}</span>
                    </div>
                    <div class="alert-description">
                        <p>{{ Str::limit($alert->description, 150) }}</p>
                    </div>
                </div>
                <div class="alert-actions">
                    <button class="action-button view-details"><i class="fas fa-search"></i> Details</button>
                    <button class="action-button download-report"><i class="fas fa-download"></i> PDF</button>
                </div>
            </div>
            @endforeach
        </div>
        
        @if(count($alerts) === 0)
        <div class="no-results">
            <i class="fas fa-check-circle"></i>
            <h3>No Active Alerts Found</h3>
            <p>There are currently no pest alerts matching your criteria.</p>
        </div>
        @endif
    </div>

    <div class="pest-prevention">
        <div class="prevention-header">
            <h2><i class="fas fa-shield-alt"></i> Preventive Measures & Solutions</h2>
            <p>Proactive strategies to protect your crops from pests and diseases</p>
        </div>
        <div class="prevention-grid">
            <div class="prevention-card">
                <div class="prevention-icon">
                    <i class="fas fa-search"></i>
                </div>
                <div class="prevention-content">
                    <h3>Regular Monitoring</h3>
                    <p>Inspect crops weekly for early signs of pest activity or disease symptoms. Keep detailed records of observations.</p>
                </div>
            </div>
            <div class="prevention-card">
                <div class="prevention-icon">
                    <i class="fas fa-spray-can"></i>
                </div>
                <div class="prevention-content">
                    <h3>Biological Controls</h3>
                    <p>Use natural predators like ladybugs or parasitic wasps to maintain ecological balance in your fields.</p>
                </div>
            </div>
            <div class="prevention-card">
                <div class="prevention-icon">
                    <i class="fas fa-crop-alt"></i>
                </div>
                <div class="prevention-content">
                    <h3>Crop Rotation</h3>
                    <p>Break pest cycles by rotating with non-host crops. Plan 3-4 year rotation schedules for maximum effectiveness.</p>
                </div>
            </div>
            <div class="prevention-card">
                <div class="prevention-icon">
                    <i class="fas fa-tint"></i>
                </div>
                <div class="prevention-content">
                    <h3>Proper Irrigation</h3>
                    <p>Use drip irrigation to keep foliage dry and prevent conditions favorable for fungal diseases.</p>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        // Filter form submission
        $('#filter-form').on('submit', function (e) {
            e.preventDefault();
            applyFilters();
        });
        
        // Sort functionality
        $('.sort-select').change(function() {
            applyFilters();
        });
        
        function applyFilters() {
            var region = $('#location').val();
            var crop = $('#crop').val();
            var severity = $('#severity').val();
            var sort = $('.sort-select').val();

            $.ajax({
                url: "{{ route('pestalerts.filter') }}",
                method: "GET",
                data: {
                    region: region,
                    crop: crop,
                    severity: severity,
                    sort: sort
                },
                success: function (response) {
                    $('#alert-results').html(response);
                },
                error: function () {
                    alert('Error applying filters. Please try again.');
                }
            });
        }
    });
</script>
@endpush

<style>
    :root {
        --primary-color: #2e7d32;
        --primary-dark: #1b5e20;
        --primary-light: #81c784;
        --secondary-color: #ff8f00;
        --danger-color: #d32f2f;
        --warning-color: #ffa000;
        --success-color: #388e3c;
        --light-gray: #f5f5f5;
        --medium-gray: #e0e0e0;
        --dark-gray: #757575;
        --dark-text: #212121;
        --white: #ffffff;
        --transition: all 0.3s ease;
    }

    /* Base Styles */
    .pest-alerts-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        color: var(--dark-text);
    }

    /* Header Section */
    .pest-header {
        text-align: center;
        margin-bottom: 3rem;
        padding-bottom: 1.5rem;
        border-bottom: 1px solid var(--medium-gray);
    }

    .pest-header h1 {
        font-size: 2.4rem;
        color: var(--primary-dark);
        margin-bottom: 0.8rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .pest-header .subtitle {
        color: var(--dark-gray);
        font-size: 1.2rem;
        font-weight: 400;
        max-width: 700px;
        margin: 0 auto;
        line-height: 1.5;
    }

    /* Filter Section */
    .alert-filters {
        background: var(--white);
        padding: 1.5rem;
        border-radius: 12px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.08);
        margin-bottom: 2.5rem;
    }

    .form-row {
        display: flex;
        flex-wrap: wrap;
        gap: 1.5rem;
        align-items: flex-end;
    }

    .form-group {
        flex: 1;
        min-width: 180px;
        margin-bottom: 0;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.6rem;
        font-weight: 500;
        color: var(--dark-text);
        display: flex;
        align-items: center;
        gap: 0.6rem;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 1px solid var(--medium-gray);
        border-radius: 8px;
        font-size: 0.95rem;
        transition: var(--transition);
        background-color: var(--white);
    }

    .form-control:focus {
        border-color: var(--primary-color);
        outline: none;
        box-shadow: 0 0 0 3px rgba(46, 125, 50, 0.2);
    }

    .filter-button {
        background: var(--primary-color);
        color: var(--white);
        border: none;
        padding: 0.85rem 1.75rem;
        border-radius: 8px;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.6rem;
        height: fit-content;
        font-size: 0.95rem;
        width: 100%;
    }

    .filter-button:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Alert Results Section */
    .alert-results-container {
        margin-bottom: 3rem;
    }

    .results-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .results-header h2 {
        font-size: 1.5rem;
        color: var(--primary-dark);
        margin: 0;
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .results-header .badge {
        background: var(--primary-light);
        color: var(--primary-dark);
        padding: 0.3rem 0.8rem;
        border-radius: 50px;
        font-size: 0.9rem;
        font-weight: 600;
    }

    .sort-options {
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    .sort-options span {
        font-size: 0.9rem;
        color: var(--dark-gray);
    }

    .sort-select {
        padding: 0.5rem 1rem;
        border-radius: 6px;
        border: 1px solid var(--medium-gray);
        background-color: var(--white);
        font-size: 0.9rem;
    }

    /* Alerts Grid */
    .alerts-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
        gap: 1.5rem;
    }

    /* Alert Cards */
    .alert-card {
        background: var(--white);
        border-radius: 12px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: var(--transition);
        display: flex;
        flex-direction: column;
        height: 100%;
        border-top: 4px solid transparent;
    }

    .alert-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    /* Severity-specific border colors */
    .alert-card.critical {
        border-top-color: var(--danger-color);
    }
    .alert-card.high {
        border-top-color: var(--warning-color);
    }
    .alert-card.medium {
        border-top-color: #ffc107;
    }
    .alert-card.low {
        border-top-color: var(--success-color);
    }

    .alert-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0.9rem 1.2rem;
        background-color: rgba(245, 245, 245, 0.5);
    }

    .alert-badge {
        font-size: 0.75rem;
        font-weight: 700;
        padding: 0.35rem 0.9rem;
        border-radius: 50px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .critical-bg { background: var(--danger-color); color: white; }
    .high-bg { background: var(--warning-color); color: white; }
    .medium-bg { background: #ffc107; color: #333; }
    .low-bg { background: var(--success-color); color: white; }

    .alert-date {
        font-size: 0.8rem;
        color: var(--dark-gray);
    }

    .alert-content {
        padding: 1.2rem;
        flex-grow: 1;
    }

    .alert-title {
        margin: 0 0 0.8rem;
        color: var(--primary-dark);
        font-size: 1.1rem;
        font-weight: 600;
        line-height: 1.4;
    }

    .alert-meta {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
        margin-bottom: 1rem;
    }

    .meta-item {
        font-size: 0.85rem;
        color: var(--dark-gray);
        display: flex;
        align-items: center;
        gap: 0.4rem;
    }

    .alert-description {
        font-size: 0.9rem;
        color: #555;
        line-height: 1.5;
        margin-bottom: 0.5rem;
    }

    .alert-actions {
        display: flex;
        border-top: 1px solid var(--medium-gray);
        padding: 0.8rem;
        gap: 0.8rem;
    }

    .action-button {
        flex: 1;
        background: var(--white);
        border: 1px solid var(--medium-gray);
        padding: 0.6rem;
        border-radius: 6px;
        font-size: 0.85rem;
        cursor: pointer;
        transition: var(--transition);
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.5rem;
    }

    .action-button:hover {
        background: var(--light-gray);
    }

    .action-button.view-details {
        color: var(--primary-color);
        border-color: var(--primary-light);
    }

    .action-button.download-report {
        color: var(--dark-gray);
    }

    /* No Results State */
    .no-results {
        text-align: center;
        padding: 3rem 2rem;
        background: var(--light-gray);
        border-radius: 12px;
    }

    .no-results i {
        font-size: 3rem;
        color: var(--success-color);
        margin-bottom: 1rem;
    }

    .no-results h3 {
        font-size: 1.3rem;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
    }

    .no-results p {
        color: var(--dark-gray);
        max-width: 500px;
        margin: 0 auto;
    }

    /* Prevention Section */
    .pest-prevention {
        margin-top: 3rem;
        background: rgba(129, 199, 132, 0.08);
        padding: 2.5rem;
        border-radius: 16px;
        border: 1px solid rgba(46, 125, 50, 0.1);
    }

    .prevention-header {
        text-align: center;
        margin-bottom: 2.5rem;
    }

    .prevention-header h2 {
        font-size: 1.8rem;
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .prevention-header p {
        color: var(--dark-gray);
        font-size: 1rem;
        max-width: 700px;
        margin: 0 auto;
    }

    .prevention-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        gap: 1.5rem;
    }

    .prevention-card {
        background: var(--white);
        padding: 1.8rem;
        border-radius: 12px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        display: flex;
        gap: 1.5rem;
        align-items: flex-start;
        transition: var(--transition);
        border-left: 4px solid var(--primary-color);
    }

    .prevention-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .prevention-icon {
        font-size: 1.8rem;
        color: var(--primary-color);
        background: rgba(46, 125, 50, 0.1);
        padding: 1.2rem;
        border-radius: 12px;
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
        margin-bottom: 0.8rem;
        color: var(--primary-dark);
        font-size: 1.1rem;
    }

    .prevention-content p {
        margin: 0;
        color: var(--dark-gray);
        font-size: 0.95rem;
        line-height: 1.6;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .pest-header h1 {
            font-size: 2rem;
        }
        
        .form-row {
            flex-direction: column;
            gap: 1rem;
        }
        
        .form-group {
            width: 100%;
        }
        
        .filter-button {
            width: 100%;
        }
        
        .results-header {
            flex-direction: column;
            align-items: flex-start;
        }
        
        .pest-prevention {
            padding: 1.5rem;
        }
    }

    @media (max-width: 480px) {
        .pest-alerts-container {
            padding: 0 1rem;
        }
        
        .pest-header h1 {
            font-size: 1.8rem;
        }
        
        .alert-filters {
            padding: 1.2rem;
        }
        
        .prevention-card {
            flex-direction: column;
            gap: 1rem;
        }
        
        .prevention-icon {
            padding: 0.8rem;
            width: 50px;
            height: 50px;
            font-size: 1.5rem;
        }
    }
</style>
@endsection