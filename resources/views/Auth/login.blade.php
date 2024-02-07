

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>JBA</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background-color: #f2f2f2; /* Light grey background color */
        }

        .card {
            display: flex;
            flex-direction: column;
            width: 100%;
            max-width: 800px; /* Adjusted max-width for better responsiveness */
            background-color: #fff; /* White background color */
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Box shadow on all four corners */
            overflow: hidden;
        }

        .card-section {
            flex: 1;
        }

        .form-container {
            padding: 20px;
        }

        .form-container h2 {
            text-align: center;
        }

        .form-row {
            display: flex;
            flex-wrap: wrap;
            margin-bottom: 15px;
        }

        .form-column {
            flex: 1;
            margin-right: 0;
            margin-bottom: 10px;
        }

        .form-container label {
            display: block;
            margin-bottom: 5px;
            font-weight: 900;
            color: grey;
        }

        .form-container input,
        .form-container button {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-container button {
            margin-top: 10px;
        }

        .card-section.image-section {
            text-align: center;
        }

        .card-section.image-section img {
            max-width: 100%;
            height: auto;
        }

        @media (min-width: 768px) {
            .card {
                flex-direction: row;
            }

            .card-section.form-section {
                order: 1;
                width: 60%; /* Adjust the width as needed */
            }

            .card-section.image-section {
                order: 2;
                width: 40%; /* Adjust the width as needed */
            }
        }
    </style>
</head>
<body>
    <div class="card">
        <div class="card-section form-section">
            <!-- Content for the form section -->
            <div class="form-container">
                <h2>Login</h2>
                <form method="POST" action="{{ route('custom.login') }}">
                     <form method="POST" action="{{ route('custom.login') }}"">
                      @csrf

                        <div class="form-row">
                            <div class="form-column">
                                <label for="Name"
                                    >Phone Number(+92)
                                    <span style="color: red">*</span></label
                                >
                                <input
                                    type="number"
                                    id="Name"
                                    name="PhoneNumber" name="phone_number"
                                    required
                                />
                                @error('Name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                    
                        </div>
                        <div class="form-row">
                     
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
                        
                     
                             <p class="text-primary fw-medium" >Not Registered ? <a class="text-secondary fw-medium" href="{{route('register')}}">Sign Up</a> </p>
                         <button  class="btn btn-primary w-100 py-8 mb-4 rounded-2 " >Sign In</button>
                    </form>
                </form>
            </div>
        </div>
        <div class="card-section image-section">
            <!-- Content for the image section -->
            <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg" alt="" class="img-fluid" />
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>
