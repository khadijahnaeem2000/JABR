


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>JBA</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            background-color: #f2f2f2;
        }
        .card {
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-body {
            padding: 20px;
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: 900;
            color: grey;
        }
        .form-control {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            margin-bottom: 15px;
        }
        .btn-primary {
            background-color: #4caf50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        img.img-fluid {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Register Now</h2>
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="Name">First Name <span style="color: red">*</span></label>
                                    <input type="text" id="Name" name="Name"  class="form-control">
                                    @error('Name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="col-md-6">
                                    <label for="LastName">Last Name <span style="color: red">*</span>:</label>
                                    <input type="text" id="LastName" name="LastName"  class="form-control">
                                    @error('LastName')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="PhoneNumber">Phone Number(+92) <span style="color: red">*</span>:</label>
                                    <input type="number" id="PhoneNumber" name="PhoneNumber"  class="form-control">
                                    @if(session('phone_error'))
                                    <div>
                                        <p style="color: red">{{ session('phone_error') }}</p>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="City">City <span style="color: red">*</span>:</label>
                                    <input type="text" id="City" name="City"  class="form-control">
                                    @error('City')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                             <div class="row">
                                <div class="col-md-6">
                                    <label for="Email">Email <span style="color: red">*</span>:</label>
                                    <input type="email" id="Email" name="Email"  class="form-control">
                                    @if(session('email_error'))
                                <div>
                                    <p style="color: red">
                                        {{ session('email_error') }}
                                    </p>
                                </div>
                                @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="password">Password <span style="color: red">*</span>:</label>
                                    <input type="password" id="password" name="password"  class="form-control">
                                    @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                                </div>
                            </div>
                           <div class="row">
                                <div class="col-md-6">
                                    <label for="Address">Current Address <span style="color: red">*</span>:</label>
                                    <input type="text" id="Address" name="Address"  class="form-control">
                                    @if(session('phone_error'))
                                    <div>
                                        <p style="color: red">{{ session('phone_error') }}</p>
                                    </div>
                                    @endif
                                </div>
                                 <input
                                type="text"
                                name="role_id"
                                value="2"
                                hidden
                            />
                                 <input
                                type="text"
                                class="form-input"
                                id="IsActive"
                                name="IsActive"
                                value="1"
                                hidden
                            />
                                <div class="col-md-6">
                                    <label for="CNIC">CNIC <span style="color: red">*</span>:</label>
                                    <input type="text" id="CNIC" name="CNIC"  class="form-control" maxlength = "13">
                                    @error('CNIC')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                                <div class="row">
                                <div class="col-md-6">
                                    <label for="BankName">BankName<span style="color: red">*</span>:</label>
                                    <input type="text" id="BankName" name="BankName"  class="form-control">
                                    @if(session('BankName'))
                                    <div>
                                        <p style="color: red">{{ session('BankName') }}</p>
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <label for="BankAccount">Bank Account <span style="color: red">*</span>:</label>
                                    <input type="text" id="BankAccount" name="BankAccount"  class="form-control"   maxlength = "16">
                                    @error('BankAccount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <!-- Add the remaining form rows similarly -->
                            <p class="text-primary fw-medium">Already Registered ? <a class="text-secondary fw-medium" href="{{route('login')}}">Sign In</a> </p>
                            <button type="submit" class="btn btn-primary w-100 py-8 mb-4 rounded-2">{{ __('Register') }}</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg" alt="" class="img-fluid">
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>

