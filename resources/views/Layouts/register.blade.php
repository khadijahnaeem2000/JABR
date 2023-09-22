@extends('dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group">
                            <label for="Name">name</label>
                            <input id="Name" type="text" class="form-control @error('Name') is-invalid @enderror" name="Name" value="{{ old('Name') }}" required autofocus>
                            @error('Name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="LastName">lname</label>
                            <input id="LastName" type="text" class="form-control @error('LastName') is-invalid @enderror" name="LastName" value="{{ old('LastName') }}" required>
                            @error('LastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                      <div class="form-group">
        <label for="PhoneNumber">Phone Number</label>
        <div class="input-group">
            <div class="input-group-prepend">
                <select class="custom-select" id="countryCode" name="countryCode">
                    <option value="+1">+1 (USA)</option>
                    <!-- Add more country code options here -->
                </select>
            </div>
            <input type="text" class="form-control" id="PhoneNumber" name="PhoneNumber">
        </div>
        <span id="phone-error" class="text-danger"></span>
    </div>

                        <div class="form-group">
                            <label for="CNIC">cnic</label>
                            <input id="CNIC" type="text" class="form-control @error('CNIC') is-invalid @enderror" name="CNIC" value="{{ old('CNIC') }}" required>
                            @error('CNIC')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="Address">address</label>
                            <input id="Address" type="text" class="form-control @error('Address') is-invalid @enderror" name="Address" value="{{ old('Address') }}" required>
                            @error('Address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                       <!-- Bank Account Input -->
    <div class="form-group">
        <label for="BankAccount">Bank Account</label>
        <input type="text" class="form-control" id="BankAccount" name="BankAccount">
        <span id="bank-account-error" class="text-danger"></span>
    </div>

                        <div class="form-group">
                            <label for="City">city</label>
                            <input id="City" type="text" class="form-control @error('City') is-invalid @enderror" name="City" value="{{ old('City') }}" required>
                            @error('City')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

   <div class="form-group">
        <label for="Email">Email Address</label>
        <input type="email" class="form-control" id="Email" name="Email">
        <span id="email-error" class="text-danger"></span>
    </div>
                        <div class="form-group">
                            <label for="password">password</label>
                            <input id="password" type="password" name="password" required autocomplete="new-password">
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                  

                        <div class="form-group">
                            <label for="role_id">role</label>
                            <select id="role_id" name="role_id" class="form-control">
                                 @foreach($role as $role)
                                <option value=""></option>
                                <option value="{{$role->id}}">{{$role->Role}}</option>
                             
                                @endforeach
                                <!-- Add more role options as needed -->
                            </select>
                        </div>

                        <div class="form-group form-check">
                            <input type="checkbox" class="form-check-input" id="IsActive" name="IsActive" value="1" checked>
                            <label class="form-check-label" for="IsActive"></label>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            {{ __('Register') }}
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.querySelector('form');
        const cnicInput = document.getElementById('CNIC');
        const phoneInput = document.getElementById('PhoneNumber');
        const emailInput = document.getElementById('Email');
        const bankAccountInput = document.getElementById('BankAccount');
        const cnicError = document.getElementById('cnic-error');
        const phoneError = document.getElementById('phone-error');
        const emailError = document.getElementById('email-error');
        const bankAccountError = document.getElementById('bank-account-error');

        form.addEventListener('submit', function (event) {
            // CNIC Validation (Example: 12345-6789012-3)
            const cnicPattern = /^[0-9]{5}-[0-9]{7}-[0-9]{1}$/;
            if (!cnicPattern.test(cnicInput.value)) {
                cnicError.textContent = 'Invalid CNIC format (e.g., 12345-6789012-3)';
                event.preventDefault();
            } else {
                cnicError.textContent = '';
            }

            // Phone Number Validation (Example: +1 123-456-7890)
            const phonePattern = /^\+\d{1,4} \d{3}-\d{3}-\d{4}$/;
            if (!phonePattern.test(phoneInput.value)) {
                phoneError.textContent = 'Invalid phone number format (e.g., +1 123-456-7890)';
                event.preventDefault();
            } else {
                phoneError.textContent = '';
            }

          

            // Bank Account Validation (Custom validation)
            const bankAccountPattern = /^(\d{4}-\d{4}-\d{4}-\d{4})?$/;
            if (!bankAccountPattern.test(bankAccountInput.value)) {
                bankAccountError.textContent = 'Invalid bank account format';
                event.preventDefault();
            } else {
                bankAccountError.textContent = '';
            }
        });
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        const emailInput = $('#Email');
        const emailError = $('#email-error');
        
        emailInput.blur(function () {
            const email = emailInput.val();

            // Check if the email is not empty
            if (email.trim() === '') {
                return;
            }

            // Send an AJAX request to check email uniqueness
            $.ajax({
                url: '{{ route('register') }}', // Replace with your Laravel route
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    email: email,
                },
                success: function (response) {
                    if (response.isUnique) {
                        // Email is unique
                        emailError.text('');
                    } else {
                        // Email is already in use
                        emailError.text('This email address is already in use.');
                    }
                },
                error: function () {
                    // Handle AJAX error
                },
            });
        });
    });
</script>










