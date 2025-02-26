@extends('layouts.app')

@section('title', 'Point of Sale')

@section('content')
    <h1>Point of Sale System</h1>
    <p class="lead mb-4">Process transactions here</p>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-4">
                <div class="card-header">
                    <h5 class="mb-0">Product Catalog</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-4 mb-3">
                                <div class="card h-100">
                                    <div class="card-body">
                                        <h6 class="card-title">{{ $product['name'] }}</h6>
                                        <p class="card-text text-muted small">{{ $product['category'] }}</p>
                                        <p class="card-text">Rp {{ number_format($product['price'], 0, ',', '.') }}</p>
                                        <button class="btn btn-sm btn-primary add-to-cart"
                                                data-id="{{ $product['id'] }}"
                                                data-name="{{ $product['name'] }}"
                                                data-price="{{ $product['price'] }}">
                                            Add to Cart
                                        </button>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header bg-primary text-white">
                    <h5 class="mb-0">Current Transaction</h5>
                </div>
                <div class="card-body">
                    <div id="cart-items">
                        <p class="text-center text-muted">No items in cart</p>
                    </div>

                    <hr>

                    <div class="d-flex justify-content-between mb-2">
                        <strong>Subtotal:</strong>
                        <span id="subtotal">Rp 0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-2">
                        <strong>Tax (10%):</strong>
                        <span id="tax">Rp 0</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <strong>Total:</strong>
                        <span id="total" class="text-primary fw-bold">Rp 0</span>
                    </div>

                    <div class="mb-3">
                        <label for="payment" class="form-label">Payment Amount</label>
                        <input type="number" class="form-control" id="payment" placeholder="Enter payment amount">
                    </div>

                    <div class="d-grid gap-2">
                        <button class="btn btn-success" id="process-payment">Process Payment</button>
                        <button class="btn btn-danger" id="cancel-transaction">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Simple cart implementation for demonstration
            let cart = [];

            // Add to cart functionality
            document.querySelectorAll('.add-to-cart').forEach(button => {
                button.addEventListener('click', function() {
                    const id = this.getAttribute('data-id');
                    const name = this.getAttribute('data-name');
                    const price = parseInt(this.getAttribute('data-price'));

                    // Check if product is already in cart
                    const existingItem = cart.find(item => item.id === id);

                    if (existingItem) {
                        existingItem.quantity += 1;
                    } else {
                        cart.push({
                            id: id,
                            name: name,
                            price: price,
                            quantity: 1
                        });
                    }

                    updateCart();
                });
            });

            // Process payment
            document.getElementById('process-payment').addEventListener('click', function() {
                const paymentAmount = parseInt(document.getElementById('payment').value) || 0;
                const total = calculateTotal();

                if (paymentAmount < total.total) {
                    alert('Insufficient payment amount!');
                    return;
                }

                const change = paymentAmount - total.total;
                alert(`Payment successful! Change: Rp ${change.toLocaleString('id-ID')}`);

                // Reset cart
                cart = [];
                document.getElementById('payment').value = '';
                updateCart();
            });

            // Cancel transaction
            document.getElementById('cancel-transaction').addEventListener('click', function() {
                cart = [];
                document.getElementById('payment').value = '';
                updateCart();
            });

            function calculateTotal() {
                const subtotal = cart.reduce((sum, item) => sum + (item.price * item.quantity), 0);
                const tax = Math.round(subtotal * 0.1);
                const total = subtotal + tax;

                return { subtotal, tax, total };
            }

            function updateCart() {
                const cartElement = document.getElementById('cart-items');

                if (cart.length === 0) {
                    cartElement.innerHTML = '<p class="text-center text-muted">No items in cart</p>';
                } else {
                    let html = '<ul class="list-group mb-3">';

                    cart.forEach(item => {
                        html += `
                            <li class="list-group-item d-flex justify-content-between lh-sm">
                                <div>
                                    <h6 class="my-0">${item.name}</h6>
                                    <small class="text-muted">${item.quantity} x Rp ${item.price.toLocaleString('id-ID')}</small>
                                </div>
                                <span class="text-muted">Rp ${(item.price * item.quantity).toLocaleString('id-ID')}</span>
                            </li>
                        `;
                    });

                    html += '</ul>';
                    cartElement.innerHTML = html;
                }

                const total = calculateTotal();
                document.getElementById('subtotal').textContent = `Rp ${total.subtotal.toLocaleString('id-ID')}`;
                document.getElementById('tax').textContent = `Rp ${total.tax.toLocaleString('id-ID')}`;
                document.getElementById('total').textContent = `Rp ${total.total.toLocaleString('id-ID')}`;
            }
        });
    </script>
@endsection
