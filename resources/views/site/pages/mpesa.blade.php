@extends('site.app')
@section('title', 'Checkout')
@section('extra-css')
    <style>
        .mt-32 {
            margin-top: 32px;
        }

    </style>

    <script src="https://js.stripe.com/v3/"></script>

@endsection

@section('content')
    <section class="section-pagetop bg-dark">
        <div class="container clearfix">
            <h2 class="title-page">Lipa na Mpesa Checkout</h2>
        </div>
    </section>
    <section class="section-content bg padding-y">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    @if (Session::has('error'))
                        <p class="alert alert-danger">{{ Session::get('error') }}</p>
                    @endif
                </div>
            </div>
            <form action="{{ route('checkout.place.order') }}" method="POST" role="form">
                @csrf
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <header class="card-header">
                                <h4 class="card-title mt-2">Billing Details</h4>
                            </header>
                            <article class="card-body">
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="email">Email Address</label>
                                        @if (auth()->user())
                                            <input type="email" class="form-control" id="email" name="email"
                                                   value="{{ auth()->user()->email }}">
                                        @else
                                            <input type="email" class="form-control" id="email" name="email"
                                                   value="{{ old('email') }}" required>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="col form-group">
                                        <label for="name">First Name</label>
                                        <input type="text" class="form-control" id="name" name="first_name"
                                               value="{{ auth()->user()->first_name }}" required>
                                    </div>
                                    <div class="col form-group">
                                        <label for="name">Last Name</label>
                                        <input type="text" class="form-control" id="name" name="last_name"
                                               value="{{ auth()->user()->last_name }}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" name="address"
                                               value="{{ auth()->user()->address }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" name="phone"
                                               value="{{ auth()->user()->phone }}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city"
                                               value="{{ auth()->user()->city }}" required>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Country</label>
                                        <input type="text" class="form-control" id="country" name="country"
                                               value="{{ auth()->user()->country }}" required>
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group  col-md-6">
                                        <label>Post Code</label>
                                        <input type="text" class="form-control" name="post_code" required>
                                    </div>
                                    <div class="form-group  col-md-6">
                                        <label>Mpesa Phone Number</label>
                                        <input type="text" class="form-control" name="phone_number" value="{{ auth()->user()->phone }}" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Order Notes</label>
                                    <textarea class="form-control" name="notes" rows="6"></textarea>
                                </div>
                                <div class="spacer"></div>
                            </article>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <header class="card-header">
                                        <h4 class="card-title mt-2">Your Order</h4>
                                    </header>
                                    <article class="card-body">
                                        <dl class="dlist-align">
                                            <dt>Total cost: </dt>
                                            <dd class="text-right h5 b">
                                                Tax ({{ config('cart.tax') }}%)<br>
                                                <span class="checkout-totals-total">Total</span>
                                                {{ config('settings.currency_symbol') }}{{ \Cart::getSubTotal() }}
                                            </dd>
                                        </dl>
                                    </article>
                                </div>
                            </div>
                            <div class="col-md-12 mt-4">
                                <a href="{{ route('checkout.mpesa') }}" >
                                    <figure class="itemside mb-4">
                                         <img src="{{ asset('../../../../frontend/images/icons/lipanampesa1.png') }}">

                                    </figure>
                                </a>
                                <button type="submit" class="subscribe btn btn-success btn-lg btn-block">Place
                                    Order</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
    @yield('extra-css')
@stop
@section('extra-js')
    <script src="https://js.braintreegateway.com/web/dropin/1.13.0/js/dropin.min.js"></script>

    <script>
        (function() {
            // Create a Stripe client
            var stripe = Stripe('{{ config('settings.stripe.key') }}');
            // Create an instance of Elements
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission
            var form = document.getElementById('payment-form');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                // Disable the submit button to prevent repeated clicks
                document.getElementById('complete-order').disabled = true;
                var options = {
                    name: document.getElementById('name_on_card').value,
                    address_line1: document.getElementById('address').value,
                    address_city: document.getElementById('city').value,
                    address_state: document.getElementById('province').value,
                    address_zip: document.getElementById('postalcode').value
                }
                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        // Enable the submit button
                        document.getElementById('complete-order').disabled = false;
                    } else {
                        // Send the token to your server
                        stripeTokenHandler(result.token);
                    }
                });
            });

            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('payment-form');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
            // PayPal Stuff
            function(createErr, instance) {
                if (createErr) {
                    console.log('Create Error', createErr);
                    return;
                }
                // remove credit card option
                var elem = document.querySelector('.braintree-option__card');
                elem.parentNode.removeChild(elem);
                form.addEventListener('submit', function(event) {
                    event.preventDefault();
                    instance.requestPaymentMethod(function(err, payload) {
                        if (err) {
                            console.log('Request Payment Method Error', err);
                            return;
                        }
                        // Add the nonce to the form and submit
                        document.querySelector('#nonce').value = payload.nonce;
                        form.submit();
                    });
                });
            });
        })();

    </script>
@endsection
