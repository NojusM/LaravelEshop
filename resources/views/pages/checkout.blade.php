@extends('layouts.app')

@section('title', 'Checkout')

@section('extra-css')
    <script src="https://js.stripe.com/v3/"></script>
@endsection

@section('content')

    <div class="container">

        @if (session()->has('success_message'))
            <div class="spacer"></div>
            <div class="alert alert-success">
                {{ session()->get('success_message') }}
            </div>
        @endif

        @if(count($errors) > 0)
            <div class="spacer"></div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <div class="checkout-section">
        <div>
            <form action="{{ route('checkout.store') }}" method="POST" id="payment-form">
                {{ csrf_field() }}
                <h2 style="color: white">Pirkėjo duomenys</h2>

                <div class="form-group">
                    <label for="email">Paštas</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ auth()->user()->email }}" required>
                </div>
                <div class="form-group">
                    <label for="name">Vardas</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" required>
                </div>
                <div class="form-group">
                    <label for="address">Adresas</label>
                    <input type="text" class="form-control" id="address" name="address" value="{{ old('address') }}" required>
                </div>

                <div class="half-form">
                    <div class="form-group">
                        <label for="city">Miestas</label>
                        <input type="text" class="form-control" id="city" name="city" value="{{ old('city') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="province">Rajonas</label>
                        <input type="text" class="form-control" id="province" name="province" value="{{ old('province') }}" required>
                    </div>
                </div> <!-- end half-form -->

                <div class="half-form">
                    <div class="form-group">
                        <label for="postalcode">Pašto kodas</label>
                        <input type="text" class="form-control" id="postalcode" name="postalcode" value="{{ old('postalcode') }}" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">Telefonas</label>
                        <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone') }}" required>
                    </div>
                </div> <!-- end half-form -->

                <div class="spacer"></div>

                <h2 style="color: white">Mokėjimo duomenys</h2>

                <div class="form-group">
                    <label for="name_on_card">Vardas ant kortelės</label>
                    <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                </div>

                <div class="form-group">
                    <label for="card-element">
                        Kortelė
                    </label>
                    <div id="card-element">
                        <!-- a Stripe Element will be inserted here. -->
                    </div>

                    <!-- Used to display form errors -->
                    <div id="card-errors" role="alert"></div>
                </div>

                <div class="spacer"></div>
                <button type="submit" id="complete-order" class="buttonX">Apmokėti</button>


            </form>

@endsection

            @section('extra-js')
                <script>
                    (function(){
                        // Create a Stripe client
                        var stripe = Stripe('pk_test_51L2vLeEeTJJThFeK7UY5ZpkhCYRRXqnpN57lkvhxrDJGYTqy3vFKc2uv82YkhgOz9T9vXT8b0I8OrKWsXH2RVdKB00DX7AFJy6');
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
                            // remove credit card option
                            var elem = document.querySelector('.braintree-option__card');
                            elem.parentNode.removeChild(elem);
                            form.addEventListener('submit', function (event) {
                                event.preventDefault();
                                instance.requestPaymentMethod(function (err, payload) {
                                    if (err) {
                                        console.log('Request Payment Method Error', err);
                                        return;
                                    }
                                    // Add the nonce to the form and submit
                                    document.querySelector('#nonce').value = payload.nonce;
                                    form.submit();
                                });
                            });
                    })();
                </script>
@endsection
