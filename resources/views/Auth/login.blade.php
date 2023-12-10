



<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/dark/authentication-register2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 14:42:51 GMT -->
<head>
    <!-- Title -->
    <title>JBA</title>
    <!-- Required Meta Tag -->
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="handheldfriendly" content="true" />
    <meta name="MobileOptimized" content="width" />
    <meta name="description" content="Mordenize" />
    <meta name="author" content="" />
    <meta name="keywords" content="Mordenize" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/png" href="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" />
    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{asset('dist/libs/owl.carousel/dist/assets/owl.carousel.min.css')}}">
    <!-- Core Css -->
    <link rel="stylesheet" href="{{asset('dist/css/style-dark.min.css')}}" />
  </head>
  <body data-theme="dark">
    <!-- Preloader -->
    <div class="preloader">
      <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/logos/favicon.ico" alt="loader" class="lds-ripple img-fluid" />
    </div>

    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <div class="position-relative overflow-hidden radial-gradient min-vh-100">
        <div class="position-relative z-index-5">
          <div class="row">
            <div class="col-xl-5 col-xxl-4">
              <a href="index.html" class="text-nowrap logo-img d-block px-4 py-9 w-100">
               <h1>JBA</h1>
              </a>
              <div class="d-none d-xl-flex align-items-center justify-content-center" style="height: calc(100vh - 80px);">
                <img src="https://demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/dist/images/backgrounds/login-security.svg" alt="" class="img-fluid" width="500">
              </div>
            </div>
            <div class="col-xl-6 col-xxl-7">
              <div class="authentication-login min-vh-100 bg-body row justify-content-center align-items-center p-4">
                <div class="col-sm-8 col-md-6 col-xl-9">
                  <h2 class="mb-3 fs-7 fw-bolder">WELCOME TO JBA</h2>
                  <p class=" mb-9">Login </p>
              
               
                         <form method="POST" action="{{ route('custom.login') }}"">
                      @csrf
                    <div>
                      <div class="card-body">


                        <div class="row pt-3">
                          <div class="col-md-12">
                            <div class="mb-3">
                              <label class="control-label">Phone Number</label>
                              <input
                                type="text"
                                 id="Name"
                                name="PhoneNumber" name="phone_number"
                                class="form-control"
                                placeholder="John"
                                required
                              />
   @if($errors->has('password_error'))
    <div >
        <p style="color: red;">{{ $errors->first('password_error') }}</p>
    </div>
@endif
                            </div>
                          </div>
                          <!--/span-->
                        
                          <!--/span-->
                        </div>
                        <div class="row pt-3">
                          <div class="col-md-12">
                            <div class="mb-3">
                              <label class="control-label">Password</label>
                              <input
                                type="password"
                                id="Email"  name="password"
                                class="form-control"
                                placeholder="*******"
                                required
                              />
 
     @if(session('email_error'))
    <div >
        <p style="color: red;">{{ session('email_error') }}</p>
    </div>
@endif
                            </div>
                          </div>
                          <!--/span-->
         
                          </div>
                    <div class="col-md-9"></div>

                      <a class="text-primary fw-medium" href="authentication-forgot-password.html">Forgot Password ?</a>
                      <button  class="btn btn-primary w-100 py-8 mb-4 rounded-2 " >Sign In</button>
                       
                        </div>
                      </div>
                    
                    
                     
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
    
    <!-- Body Wrapper -->
   
    
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


    <!-- Import Js Files -->
    <script src="{{asset('dist/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('dist/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- core files -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <script src="{{asset('dist/js/app.dark.init.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('dist/js/sidebarmenu.j')}}s"></script>
    
    <script src="{{asset('dist/js/custom.js')}}"></script>
    <!-- current page js files -->
    <script src="{{asset('dist/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
<script>
    $(document).ready(function () {
      
        const phoneNumberInput = $('#PhoneNumber');
        const phoneNumberError = $('#phone-number-error');

     

        phoneNumberInput.blur(function () {
            const phoneNumber = phoneNumberInput.val();

            if (phoneNumber.trim() === '') {
                return;
            }

            $.ajax({
                url: '{{ route('register') }}', // Create a new route for phone number validation
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    phoneNumber: phoneNumber,
                },
                success: function (response) {
                    if (response.isUnique) {
                        phoneNumberError.text('');
                    } else {
                        phoneNumberError.text('This phone number is already in use.');
                    }
                },
                error: function () {
                    // Handle AJAX error
                },
            });
        });
    });
</script>

  </body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/dark/authentication-register2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 14:42:51 GMT -->
</html>