@extends('admin.layout.app')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Edit Banners</h1>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <form action="{{ route('admin.homepage_banners.uploadBanners') }}" method="POST" enctype="multipart/form-data" class="mb-4">
        @csrf
        
        <div class="mb-3">
            <label for="used_cars_banner" class="form-label">Edit Used Cars Banners</label>
            <input type="file" name="used_cars_banner" class="form-control" id="used_cars_banner" accept="image/*" onchange="previewImage(event, 'used_cars_preview')">
            <div id="used_cars_preview" class="mt-2"></div> <!-- Preview for Used Cars Banner -->
        </div>

        <!-- Existing Used Cars Banner -->
        <h2>Existing Used Cars Banner</h2>
        <div class="row mb-4">
            @foreach($banner_images as $banner)
                @if($banner->type === 'used_cars') <!-- Filter for Used Cars -->
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('images/banner/' . $banner->image) }}" alt="{{ $banner->type }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ ucfirst($banner->type) }}</h5>
                                <p class="card-text">Existing Image</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <div class="mb-3">
            <label for="featured_cars_banner" class="form-label">Edit Featured Cars Banners</label>
            <input type="file" name="featured_cars_banner" class="form-control" id="featured_cars_banner" accept="image/*" onchange="previewImage(event, 'featured_cars_preview')">
            <div id="featured_cars_preview" class="mt-2"></div> <!-- Preview for Featured Cars Banner -->
        </div>

        <!-- Existing Featured Cars Banner -->
        <h2>Existing Featured Cars Banner</h2>
        <div class="row mb-4">
            @foreach($banner_images as $banner)
                @if($banner->type === 'featured_cars') <!-- Filter for Featured Cars -->
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <img src="{{ asset('images/banner/' . $banner->image) }}" alt="{{ $banner->type }}" class="card-img-top" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title">{{ ucfirst($banner->type) }}</h5>
                                <p class="card-text">Existing Image</p>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </div>

        <button type="submit" class="btn btn-primary">Upload Banners</button>
    </form>
</div>

@endsection
