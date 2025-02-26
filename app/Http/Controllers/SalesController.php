<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {
        // Sample data for the POS system
        $products = [
            ['id' => 1, 'name' => 'Product A', 'price' => 25000, 'category' => 'Food & Beverage'],
            ['id' => 2, 'name' => 'Product B', 'price' => 15000, 'category' => 'Beauty & Health'],
            ['id' => 3, 'name' => 'Product C', 'price' => 50000, 'category' => 'Home Care'],
            ['id' => 4, 'name' => 'Product D', 'price' => 30000, 'category' => 'Baby & Kid'],
        ];

        return view('sales.index', compact('products'));
    }
}
