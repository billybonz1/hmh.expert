@extends('website.website')

@section('content')
    <section class="container body">

        @include('website.partials.page_header')

        <div class="row pb-5">
            <div class="col-sm-7 col-lg-8">
            @include('alert::alert')

            <h3>Delivery address</h3>
            <p>Enter your shipping address below.</p>

                <form id="form-member-register" method="POST" action="{{ request()->url() }}" accept-charset="UTF-8" class="needs-validation" novalidate>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ form_error_class('address', $errors) }}">
                                <label for="address">Address</label>
                                <input type="text" class="form-control" id="address" name="address" placeholder="Please insert the Address" value="{{ ($errors && $errors->any()? old('address') : (isset($item)? $item->address : '')) }}" required>
                                {!! form_error_message('address', $errors) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ form_error_class('city', $errors) }}">
                                <label for="city">City</label>
                                <input type="text" class="form-control" id="city" name="city" placeholder="Please insert the City" value="{{ ($errors && $errors->any()? old('city') : (isset($item)? $item->city : '')) }}" required>
                                {!! form_error_message('city', $errors) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ form_error_class('province', $errors) }}">
                                <label for="province">Province</label>
                                <input type="text" class="form-control" id="province" name="province" placeholder="Please insert the Province" value="{{ ($errors && $errors->any()? old('province') : (isset($item)? $item->province : '')) }}">
                                {!! form_error_message('province', $errors) !!}
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group {{ form_error_class('country', $errors) }}">
                                <label for="country">Country</label>
                                <input type="text" class="form-control" id="country" name="country" placeholder="Please insert the Country" value="{{ ($errors && $errors->any()? old('country') : (isset($item)? $item->country : '')) }}" required>
                                {!! form_error_message('country', $errors) !!}
                            </div>
                        </div>
                    </div>

                    <div class="form-group {{ form_error_class('postal_code', $errors) }}">
                        <label for="postal_code">Postal Code or Zip Code</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" placeholder="Postal code or Zip code" value="{{ ($errors && $errors->any()? old('postal_code') : (isset($item)? $item->postal_code : '')) }}">
                        {!! form_error_message('postal_code', $errors) !!}
                    </div>

                    <div class="row">
                        <div class="col-12 text-right">
                            <button type="submit" class="btn btn-primary btn-submit">
                                Update
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @include('website.partials.page_side')
        </div>

    </section>

@endsection
@section('scripts')
    @parent
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (function() {
            'use strict';
            window.addEventListener('load', function() {
                // Fetch all the forms we want to apply custom Bootstrap validation styles to
                var forms = document.getElementsByClassName('needs-validation');
                // Loop over them and prevent submission
                var validation = Array.prototype.filter.call(forms, function(form) {
                    form.addEventListener('submit', function(event) {
                        if (form.checkValidity() === false) {
                            event.preventDefault();
                            event.stopPropagation();

                            BTN.reset($('.btn-submit[type="submit"]'));
                        }
                        form.classList.add('was-validated');

                    }, false);
                });
            }, false);
        })();
    </script>
@endsection