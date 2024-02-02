<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>JBA</title>
        <style>
            body {
                margin: 0;
                padding: 0;
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #f2f2f2; /* Light grey background color */
            }

            .card {
                display: flex;
                width: 1400px;
                height: 80%; /* Increased width to 600px */
                background-color: #fff; /* White background color */
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow on all four corners */
                overflow: hidden;
            }

            .card-section {
                flex: 1;
                padding: 20px;
            }

            .card-section.image-section {
                background: url("your-image.jpg") center/cover; /* Replace 'your-image.jpg' with your actual image */
                color: #fff; /* Text color on the image section */
                display: flex;
                flex-direction: column;
                justify-content: center;
                align-items: center;
            }

            .card-section.form-section {
                color: #000; /* Text color in the form section */
            }

            .form-container {
                max-width: 1000px; /* Adjusted max-width for better responsiveness */
            }

            .form-container h2 {
                text-align: left;
            }

            .form-row {
                display: flex;
                margin-bottom: 15px;
            }

            .form-column {
                flex: 1;
                margin-right: 10px;
            }

            .form-column:last-child {
                margin-right: 0;
            }

            .form-container label {
                margin-bottom: 5px;
                font-weight: 900;
                color: grey;
            }

            .form-container input {
                width: 100%;
                padding: 8px;
                margin-bottom: 15px;
                box-sizing: border-box;
                border: 1px solid #ccc;
                border-radius: 4px;
            }

            .form-container button {
                background-color: #4caf50;
                color: #fff;
                padding: 10px;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                width: 100%;
            }
        </style>
    </head>
    <body>
        <div class="card">
            <div class="card-section form-section">
                <!-- Content for the form section -->
                <div class="form-container">
                    <h2>Register Now</h2>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-row">
                            <div class="form-column">
                                <label for="Name"
                                    >First Name
                                    <span style="color: red">*</span></label
                                >
                                <input
                                    type="text"
                                    id="Name"
                                    name="Name"
                                    required
                                />
                                @error('Name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-column">
                                <label for="LastName"
                                    >Last Name
                                    <span style="color: red">*</span>:</label
                                >
                                <input
                                    type="text"
                                    id="LastName"
                                    name="LastName"
                                    required
                                />
                                @error('LastName')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-column">
                                <label for="PhoneNumber"
                                    >Phone Number(+92)
                                    <span style="color: red">*</span>:</label
                                >
                                <input
                                    type="text"
                                    id="PhoneNumber"
                                    name="PhoneNumber"
                                    required
                                />
                                @if(session('phone_error'))
                                <div>
                                    <p style="color: red">
                                        {{ session('phone_error') }}
                                    </p>
                                </div>
                                @endif
                            </div>
                            <div class="form-column">
                                <label for="City"
                                    >City
                                    <span style="color: red">*</span>:</label
                                >
                                <input
                                    type="text"
                                    id="City"
                                    name="City"
                                    required
                                />
                                @error('City')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-column">
                                <label for="Email"
                                    >Email
                                    <span style="color: red">*</span>:</label
                                >
                                <input
                                    type="Email"
                                    id="Email"
                                    name="Email"
                                    required
                                />
                                @if(session('email_error'))
                                <div>
                                    <p style="color: red">
                                        {{ session('email_error') }}
                                    </p>
                                </div>
                                @endif
                            </div>
                            <div class="form-column">
                                <label for="password"
                                    >Password
                                    <span style="color: red">*</span>:</label
                                >
                                <input
                                    type="password"
                                    id="password"
                                    name="password"
                                    required
                                />
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-column">
                                <label for="Address"
                                    >Current Address
                                    <span style="color: red">*</span>:</label
                                >
                                <input
                                    type="text"
                                    id="Address"
                                    name="Address"
                                    required
                                />
                            </div>
                            <input
                                type="text"
                                name="role_id"
                                value="2"
                                hidden
                            />
                            <div class="form-column">
                                <label for="CNIC"
                                    >CNIC
                                    <span style="color: red">*</span>:</label
                                >
                                <input
                                    type="text"
                                    id="CNIC"
                                    name="CNIC"
                                    required
                                    maxlength = "13"
                                />
                                @error('CNIC')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-column">
                                <label for="BankAccount"
                                    >Bank Number
                                    <span style="color: red">*</span>:</label
                                >
                                <input
                                    type="text"
                                    id="BankAccount"
                                    name="BankAccount"
                                    maxlength = "16"
                                    required
                                />
                            </div>
                            <input
                                type="text"
                                class="form-input"
                                id="IsActive"
                                name="IsActive"
                                value="1"
                                hidden
                            />
                            <div class="form-column">
                                <label for="BankName"
                                    >Bank Name
                                    <span style="color: red">*</span>:</label
                                >
                                <input
                                    type="text"
                                    id="BankName"
                                    name="BankName"
                                    required
                                />
                            </div>
                        </div>
                        
                             <p class="text-primary fw-medium" >Already Registered ? <a class="text-secondary fw-medium" href="{{route('login')}}">Sign In</a> </p>
                        <button type="submit">{{ __('Register') }}</button>
                    </form>
                </div>
            </div>
            <div class="card-section image-section">
                <!-- Content for the image section -->
                <img
                    src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg"
                    alt=""
                    class="img-fluid"
                    width="500"
                />
            </div>
        </div>
    </body>
</html>
