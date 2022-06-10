<!DOCTYPE html>
<html lang="en">
<head>
    <title>Se Connecter - BujaMart</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="frontend/login/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/login/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/login/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/login/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/login/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/login/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/login/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/login/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/login/css/util.css">
    <link rel="stylesheet" type="text/css" href="frontend/login/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <form class="login100-form validate-form">
                <a href="{{url('/')}}" style="cursor: pointer;">
                    <span class="login100-form-title p-b-26">
						BujaMart
					</span>
                </a>

                <div class="wrap-input100 validate-input" data-validate = "Adresse email valide: moi@exemple.com">
                    <input class="input100" type="text" name="email">
                    <span class="focus-input100" data-placeholder="Email"></span>
                </div>

                <div class="wrap-input100 validate-input" data-validate="Votre Mot de passe">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
                    <input class="input100" type="password" name="pass">
                    <span class="focus-input100" data-placeholder="Mot de Passe"></span>
                </div>

                <div class="container-login100-form-btn">
                    <div class="wrap-login100-form-btn">
                        <div class="login100-form-bgbtn"></div>
                        <button class="login100-form-btn">
                            Se Connecter
                        </button>
                    </div>
                </div>

                <div class="text-center p-t-115">
						<span class="txt1">
							Vous n'avez pas de compte ?
						</span>

                    <a class="txt2" href="{{ url('/signup') }}">
                        S'inscrire
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>


<div id="dropDownSelect1"></div>

<!--===============================================================================================-->
<script src="frontend/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
<script src="frontend/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
<script src="frontend/login/vendor/bootstrap/js/popper.js"></script>
<script src="frontend/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
<script src="frontend/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
<script src="frontend/login/vendor/daterangepicker/moment.min.js"></script>
<script src="frontend/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
<script src="frontend/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
<script src="frontend/login/js/main.js"></script>

</body>
</html>
