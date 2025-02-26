@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <div class="text-center my-5">
        <h1>Welcome to POS</h1>
        <p class="lead">A sample application showcasing routes, controllers, and views in Laravel</p>
    </div>

    <div class="row mt-5">
        <div class="col-md-3">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Food & Beverage</h5>
                    <p class="card-text">Browse our food and beverage products</p>
                    <a href="{{ route('products.food-beverage') }}" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Beauty & Health</h5>
                    <p class="card-text">Browse our beauty and health products</p>
                    <a href="{{ route('products.beauty-health') }}" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Home Care</h5>
                    <p class="card-text">Browse our home care <br> products</p>
                    <a href="{{ route('products.home-care') }}" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center mb-4">
                <div class="card-body">
                    <h5 class="card-title">Baby & Kid</h5>
                    <p class="card-text">Browse our baby and kid <br> products</p>
                    <a href="{{ route('products.baby-kid') }}" class="btn btn-primary">View Products</a>
                </div>
            </div>
        </div>
    </div>
@endsection
