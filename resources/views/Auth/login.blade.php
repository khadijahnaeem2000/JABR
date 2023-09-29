



<!--  -->
<!DOCTYPE html>
<html lang="en">
  
<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/dark/authentication-login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 14:42:51 GMT -->
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
    <!-- Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
      <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
        <div class="d-flex align-items-center justify-content-center w-100">
          <div class="row justify-content-center w-100">
            <div class="col-md-8 col-lg-6 col-xxl-3">
              <div class="card mb-0">
                <div class="card-body">
                  <a href="index.html" class="text-nowrap logo-img text-center d-block mb-5 w-100">
                  <h1>JBA</h1>
                  </a>
                 <form method="POST" action="{{ route('custom.login') }}">
                  @csrf
                    <div class="mb-3">
                      <label for="exampleInputEmail1" class="form-label">PhoneNumber</label>
                      <input type="number" class="form-control" name="PhoneNumber" name="phone_number" maxlength="10">
                        <div id="phone_error" style="color: red;"></div>
                    </div>
                    <div class="mb-4">
                      <label for="exampleInputPassword1" class="form-label">Password</label>
                      <input type="password"  name="password" class="form-control" id="exampleInputPassword1">
                    </div>
                 
                      <a class="text-primary fw-medium" href="authentication-forgot-password.html">Forgot Password ?</a>
                      <button  class="btn btn-primary w-100 py-8 mb-4 rounded-2 " >Sign In</button>
                    </div>
                    <div class="d-flex align-items-center justify-content-center">
                      <p class="fs-4 mb-0 fw-medium">New to JBA?</p>
                      <a class="register" href="register">Create an account</a>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Import Js Files -->
    <script src="{{asset('dist/libs/jquery/dist/jquery.min.js')}}"></script>
    <script src="{{asset('dist/libs/simplebar/dist/simplebar.min.js')}}"></script>
    <script src="{{asset('dist/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- core files -->
    <script src="{{asset('dist/js/app.min.js')}}"></script>
    <script src="{{asset('dist/js/app.dark.init.js')}}"></script>
    <script src="{{asset('dist/js/app-style-switcher.js')}}"></script>
    <script src="{{asset('dist/js/sidebarmenu.js')}}"></script>
    
    <script src="{{asset('dist/js/custom.js')}}"></script>
    <!-- current page js files -->
    <script src="{{asset('dist/libs/owl.carousel/dist/owl.carousel.min.js')}}"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const phoneInput = document.getElementById('phone_number');
            const phoneError = document.getElementById('phone_error');

            phoneInput.addEventListener('input', function () {
                const phoneNumber = phoneInput.value;
                const phoneRegex = /^\d{10}$/; // Adjust the regex as per your phone number format

                if (!phoneRegex.test(phoneNumber)) {
                    phoneError.textContent = 'Phone number is incorrect. Please enter a 10-digit number.';
                } else {
                    phoneError.textContent = ''; // Clear the error message if the input is valid
                }
            });
        });
    </script>
  </body>

<!-- Mirrored from demos.adminmart.com/premium/bootstrap/modernize-bootstrap/package/html/dark/authentication-login2.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 21 Sep 2023 14:42:51 GMT -->
</html>