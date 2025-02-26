<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function foodBeverage()
    {
        $category = 'Food & Beverage';
        $products = $this->getDummyProducts($category);

        return view('products.category', compact('category', 'products'));
    }

    public function beautyHealth()
    {
        $category = 'Beauty & Health';
        $products = $this->getDummyProducts($category);

        return view('products.category', compact('category', 'products'));
    }

    public function homeCare()
    {
        $category = 'Home Care';
        $products = $this->getDummyProducts($category);

        return view('products.category', compact('category', 'products'));
    }

    public function babyKid()
    {
        $category = 'Baby & Kid';
        $products = $this->getDummyProducts($category);

        return view('products.category', compact('category', 'products'));
    }

    // Helper method to generate dummy products
    private function getDummyProducts($category)
    {
        // This would typically come from your database
        $products = [];

        // Generate some dummy products based on category
        for ($i = 1; $i <= 6; $i++) {
            $products[] = [
                'id' => $i,
                'name' => $category . ' Product ' . $i,
                'price' => rand(10, 100) * 1000,
                'description' => 'This is a sample product in the ' . $category . ' category.'
            ];
        }

        return $products;
    }
}
