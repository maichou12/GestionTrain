<!-- /*
* Template Name: Learner
* Template Author: Untree.co
* Tempalte URI: https://untree.co/
* License: https://creativecommons.org/licenses/by/3.0/
*/ -->
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="author" content="Untree.co">
  <link rel="shortcut icon" href="favicon.png">

  <meta name="description" content="" />
  <meta name="keywords" content="bootstrap, bootstrap4" />

  <link href="https://fonts.googleapis.com/css2?family=Display+Playfair:wght@400;700&family=Inter:wght@400;700&display=swap" rel="stylesheet">


  <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/animate.min.css">
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/jquery.fancybox.min.css">
  <link rel="stylesheet" href="fonts/icomoon/style.css">
  <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  <link rel="stylesheet" href="css/aos.css">
  <link rel="stylesheet" href="css/style.css">

  <title>Inscription</title>
</head>

<body>

  <div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
      <div class="site-mobile-menu-close">
        <span class="icofont-close js-menu-toggle"></span>
      </div>
    </div>
    <div class="site-mobile-menu-body"></div>
  </div>

  @include('Layouts.navbar')

  <!--style image arriere plan et ecriture-->
  <div class="untree_co-hero inner-page overlay" style="background-image: url('image/TER Dakar-AIBD.jpeg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-1 heading text-white" data-aos="fade-up" data-aos-delay="100">Register</h1>
            <p class="text-center text-white mb-5">Create an account if you don't have one</p>
            </div>
          </div>
        </div>
      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div> <!-- /.untree_co-hero -->




  <div class="untree_co-section">
    <div class="container">

      <div class="row mb-5 justify-content-center">
        <div class="col-lg-5 mx-auto order-1" data-aos="fade-up" data-aos-delay="200">
          <form method="POST" action="{{route('register')}}" class="form-box">
            @csrf

            <br>
            <div class="row">
              <div class="col-12 mb-3">
                <input type="text" class="form-control @error('prenom') is-invalid  @enderror" placeholder="First Name" id="prenom" name="prenom" value="{{old('prenom')}}" required autocomplete="prenom" autofocus >
                @error('prenom')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                @enderror
                <small class="text-danger fw-bold" id="error-register-prenom"></small>
              </div>
              <div class="col-12 mb-3">
                <input type="text" class="form-control @error('nom') is-invalid  @enderror" placeholder="Last Name" id="nom" name="nom" value="{{old('nom')}}" required autocomplete="nom" >
                @error('nom')
                <span class="invalid-feedback" role="alert">
                    {{$message}}
                </span>
                @enderror
                <small class="text-danger fw-bold" id="error-register-nom"></small>
                {{--email--}}
              </div>
              <div class="col-12 mb-3">
                <input type="email" class="form-control @error('email') is-invalid  @enderror" placeholder="Email" id="email" name="email" value="{{old('email')}}" required autocomplete="email" >
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                @enderror

                <small class="text-danger fw-bold" id="error-register-email"></small>
              </div>
              <div class="col-12 mb-3">
                <input type="password" class="form-control @error('password') is-invalid  @enderror" aria-describedby="password"  placeholder="Password" id="password" name="password" required autocomplete="password" >
                <span id="passwordLength" class="form-text">
                    Must be 8-20 characters long.
                  </span>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                @enderror
                <small class="text-danger fw-bold" id="error-register-password"></small>
              </div>
              <div class="col-12 mb-3">
                <input type="password" class="form-control @error('password_confirmation') is-invalid  @enderror" placeholder="Password Confirm" id="password-confirm" name="password_confirmation" required autocomplete="password">
                @error('password_confirmation')
                    <span class="invalid-feedback" role="alert">
                        {{$message}}
                    </span>
                @enderror

                <small class="text-danger fw-bold" id="error-register-password-confirm"></small>
              </div>

              <div class="col-12 mb-3">
                <label class="control control--checkbox">
                  <span class="caption">Accept our <a href="#">terms and conditions</a></span>
                  <input type="checkbox" id="agreeTerms" checked="checked" />
                  <div class="control__indicator"></div>
                </label>
                <small class="text-danger fw-bold" id="error-register-agree-term"></small>
              </div>
              {{--btn Inscription--}}
              <div class="col-12 text-center">
                <input type="submit" id="register-user" value="Sign up" class="btn btn-primary">


              </div>
              <p class="text-center text-muted mt-2">Alrady have an account ? <a href="{{route('login')}}"> login</a> </p>
            </div>
          </form>
        </div>
      </div>


    </div>
  </div> <!-- /.untree_co-section -->

  <div class="site-footer">


    <div class="container">

      <div class="row">
        <div class="col-lg-3 mr-auto">
          <div class="widget">
            <h3>About Us<span class="text-primary">.</span> </h3>
            <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
          </div> <!-- /.widget -->
          <div class="widget">
            <h3>Connect</h3>
            <ul class="list-unstyled social">
              <li><a href="#"><span class="icon-instagram"></span></a></li>
              <li><a href="#"><span class="icon-twitter"></span></a></li>
              <li><a href="#"><span class="icon-facebook"></span></a></li>
              <li><a href="#"><span class="icon-linkedin"></span></a></li>
              <li><a href="#"><span class="icon-pinterest"></span></a></li>
              <li><a href="#"><span class="icon-dribbble"></span></a></li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-3 -->

        <div class="col-lg-2 ml-auto">
          <div class="widget">
            <h3>Projects</h3>
            <ul class="list-unstyled float-left links">
              <li><a href="#">Web Design</a></li>
              <li><a href="#">HTML5</a></li>
              <li><a href="#">CSS3</a></li>
              <li><a href="#">jQuery</a></li>
              <li><a href="#">Bootstrap</a></li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-3 -->

        <div class="col-lg-3">
          <div class="widget">
            <h3>Gallery</h3>
            <ul class="instafeed instagram-gallery list-unstyled">
              <li><a class="instagram-item" href="images/gal_1.jpg" data-fancybox="gal"><img src="images/gal_1.jpg" alt="" width="72" height="72"></a>
              </li>
              <li><a class="instagram-item" href="images/gal_2.jpg" data-fancybox="gal"><img src="images/gal_2.jpg" alt="" width="72" height="72"></a>
              </li>
              <li><a class="instagram-item" href="images/gal_3.jpg" data-fancybox="gal"><img src="images/gal_3.jpg" alt="" width="72" height="72"></a>
              </li>
              <li><a class="instagram-item" href="images/gal_4.jpg" data-fancybox="gal"><img src="images/gal_4.jpg" alt="" width="72" height="72"></a>
              </li>
              <li><a class="instagram-item" href="images/gal_5.jpg" data-fancybox="gal"><img src="images/gal_5.jpg" alt="" width="72" height="72"></a>
              </li>
              <li><a class="instagram-item" href="images/gal_6.jpg" data-fancybox="gal"><img src="images/gal_6.jpg" alt="" width="72" height="72"></a>
              </li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-3 -->


        <div class="col-lg-3">
          <div class="widget">
            <h3>Contact</h3>
            <address>43 Raymouth Rd. Baltemoer, London 3910</address>
            <ul class="list-unstyled links mb-4">
              <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
              <li><a href="tel://11234567890">+1(123)-456-7890</a></li>
              <li><a href="mailto:info@mydomain.com">info@mydomain.com</a></li>
            </ul>
          </div> <!-- /.widget -->
        </div> <!-- /.col-lg-3 -->

      </div> <!-- /.row -->

      <div class="row mt-5">
        <div class="col-12 text-center">
          <p class="copyright">Copyright &copy;<script>document.write(new Date().getFullYear());</script>. All Rights Reserved. &mdash; Designed with love by <a href="https://untree.co">Untree.co</a>  Distributed By <a href="https://themewagon.com">ThemeWagon</a> <!-- License information: https://untree.co/license/ -->
          </div>
        </div>
      </div> <!-- /.container -->
    </div> <!-- /.site-footer -->

    <div id="overlayer"></div>
    <div class="loader">
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
      </div>
    </div>

    <script src="js/jquery-3.4.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/jquery.animateNumber.min.js"></script>
    <script src="js/jquery.waypoints.min.js"></script>
    <script src="js/jquery.fancybox.min.js"></script>
    <script src="js/jquery.sticky.js"></script>
    <script src="js/aos.js"></script>
    <script src="js/custom.js"></script>

  </body>

  </html>
