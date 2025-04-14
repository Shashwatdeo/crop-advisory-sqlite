@extends('layouts.app')

@section('content')
<div class="crops-container">
    <div class="crops-header">
        <h1><i class="fas fa-seedling"></i> Crop Database</h1>
        <div class="header-actions">
            <a href="{{ route('crops.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add New Crop
            </a>
        </div>
    </div>

    <div class="search-filter">
        <form method="GET" action="{{ route('crops.index') }}" class="search-form">
            <div class="search-input-group">
                <i class="fas fa-search"></i>
                <input type="text" name="search" placeholder="Search crops..." value="{{ request('search') }}">
                <button type="submit" class="search-button">Search</button>
            </div>
        </form>
    </div>

    @if($crops->isEmpty())
        <div class="empty-state">
            <i class="fas fa-leaf"></i>
            <h3>No Crops Found</h3>
            <p>There are currently no crops in the database. Add your first crop to get started.</p>
            <a href="{{ route('crops.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Add First Crop
            </a>
        </div>
    @else
        <div class="crops-grid">
            @foreach($crops as $crop)
                <div class="crop-card">
                    <div class="crop-header">
                        <h3>{{ $crop->name }}</h3>
                        <span class="crop-id">#{{ $crop->id }}</span>
                    </div>
                    <div class="crop-body">
                        <p class="crop-description">{{ Str::limit($crop->description, 150) }}</p>
                        <div class="crop-meta">
                            <div class="meta-item">
                                <i class="fas fa-info-circle"></i>
                                <span>{{ Str::limit($crop->ideal_conditions, 50) }}</span>
                            </div>
                        </div>
                    </div>
                    <div class="crop-actions">
                        <a href="{{ route('crops.show', $crop->id) }}" class="action-btn view-btn">
                            <i class="fas fa-eye"></i> View
                        </a>
                        <a href="{{ route('crops.edit', $crop->id) }}" class="action-btn edit-btn">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('crops.destroy', $crop->id) }}" method="POST" class="delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="action-btn delete-btn" onclick="return confirm('Are you sure you want to delete this crop?')">
                                <i class="fas fa-trash"></i> Delete
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

        @if($crops instanceof \Illuminate\Pagination\AbstractPaginator)
            <div class="pagination-links">
                {{ $crops->links() }}
            </div>
        @endif
    @endif
</div>

<style>
    /* Main Container */
    .crops-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 1.5rem;
    }

    /* Header */
    .crops-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 2rem;
    }

    .crops-header h1 {
        font-size: 2rem;
        color: var(--primary-dark);
        display: flex;
        align-items: center;
        gap: 0.8rem;
    }

    /* Buttons */
    .btn {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        padding: 0.7rem 1.2rem;
        border-radius: 6px;
        font-weight: 500;
        text-decoration: none;
        transition: var(--transition);
    }

    .btn-primary {
        background: var(--primary-color);
        color: white;
        border: 1px solid var(--primary-color);
    }

    .btn-primary:hover {
        background: var(--primary-dark);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(46, 125, 50, 0.3);
    }

    /* Search Filter */
    .search-filter {
        margin-bottom: 2rem;
    }

    .search-form {
        width: 100%;
    }

    .search-input-group {
        display: flex;
        align-items: center;
        background: white;
        border-radius: 6px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .search-input-group i {
        padding: 0 1rem;
        color: #666;
    }

    .search-input-group input {
        flex: 1;
        border: none;
        padding: 0.8rem 0;
        font-size: 1rem;
        outline: none;
    }

    .search-button {
        background: var(--primary-color);
        color: white;
        border: none;
        padding: 0.8rem 1.5rem;
        font-weight: 500;
        cursor: pointer;
        transition: var(--transition);
    }

    .search-button:hover {
        background: var(--primary-dark);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem;
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .empty-state i {
        font-size: 3rem;
        color: var(--primary-light);
        margin-bottom: 1rem;
    }

    .empty-state h3 {
        color: var(--primary-dark);
        margin-bottom: 0.5rem;
    }

    .empty-state p {
        color: #666;
        margin-bottom: 1.5rem;
    }

    /* Crops Grid */
    .crops-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
        gap: 1.5rem;
        margin-bottom: 2rem;
    }

    /* Crop Card */
    .crop-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        overflow: hidden;
        transition: var(--transition);
    }

    .crop-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.12);
    }

    .crop-header {
        padding: 1.2rem 1.5rem;
        border-bottom: 1px solid #eee;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .crop-header h3 {
        margin: 0;
        color: var(--primary-dark);
        font-size: 1.2rem;
    }

    .crop-id {
        font-size: 0.8rem;
        background: #f5f5f5;
        padding: 0.2rem 0.5rem;
        border-radius: 50px;
        color: #666;
    }

    .crop-body {
        padding: 1.5rem;
    }

    .crop-description {
        color: #444;
        margin-bottom: 1rem;
        line-height: 1.5;
    }

    .crop-meta {
        display: flex;
        flex-direction: column;
        gap: 0.5rem;
    }

    .meta-item {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        font-size: 0.9rem;
        color: #666;
    }

    .meta-item i {
        color: var(--primary-color);
    }

    /* Crop Actions */
    .crop-actions {
        display: flex;
        border-top: 1px solid #eee;
    }

    .action-btn {
        flex: 1;
        padding: 0.8rem;
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

    .view-btn {
        color: var(--primary-color);
        border-right: 1px solid #eee;
    }

    .view-btn:hover {
        background: rgba(46, 125, 50, 0.05);
    }

    .edit-btn {
        color: #ff9800;
        border-right: 1px solid #eee;
    }

    .edit-btn:hover {
        background: rgba(255, 152, 0, 0.05);
    }

    .delete-btn {
        color: #f44336;
    }

    .delete-btn:hover {
        background: rgba(244, 67, 54, 0.05);
    }

    .delete-form {
        flex: 1;
        display: flex;
    }

    /* Pagination */
    .pagination-links {
        display: flex;
        justify-content: center;
        margin-top: 2rem;
    }

    .pagination-links .pagination {
        display: flex;
        gap: 0.5rem;
    }

    .pagination-links .page-item.active .page-link {
        background: var(--primary-color);
        border-color: var(--primary-color);
    }

    .pagination-links .page-link {
        color: var(--primary-dark);
        border: 1px solid #ddd;
        padding: 0.5rem 0.8rem;
        border-radius: 4px;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .crops-header {
            flex-direction: column;
            align-items: flex-start;
            gap: 1rem;
        }

        .crops-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endsection