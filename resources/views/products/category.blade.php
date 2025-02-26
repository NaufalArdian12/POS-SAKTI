@extends('layouts.app')

@section('title', $category . ' Products')

@section('content')
    <h1>{{ $category }}</h1>
    <p class="lead mb-4">Browse our selection of {{ $category }} products</p>

    <div class="row">
        @foreach($products as $product)
            <div class="col-md-4 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product['name'] }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">Rp {{ number_format($product['price'], 0, ',', '.') }}</h6>
                        <p class="card-text">{{ $product['description'] }}</p>
                        <a href="#" class="btn btn-sm btn-primary">View Details</a>
                        <a href="#" class="btn btn-sm btn-success">Add to Cart</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
