<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">
        #login-main{
            margin-left: auto;
            margin-right: auto;
            margin-top: 10%;
            border: 1px solid black;
            pading: 20px 20px;
        }

        #lg-bt, #cd-bt{
            margin-left: auto;
            margin-right: auto;
            /* padding: 5px 5px; */
        }
	</style>

    <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="assets/general.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>
<body>
    <!-- Main content -->
    <div class="container container-fluid">
        <div class="main-row row">
            <div class="col-md-6 col-6 col-sm-6 col-lg-6" id="login-main">
                <div class="container">
                    <div class="row center-title">
                        <!-- Title Row -->
                        <h1 class="center-title">Login</h1>
                    </div>
                    <br>
                    <!-- Form row -->
                    <div class="row justify-content-center">
                        <form class="form" action="login/auth" method="post">
                            <div class="form-group form-group-inline col-12">
                                <label for="i-email" class="form-label col-5">Email do usuario: </label>
                                <input type="email" name="email" value="" class="form-input col-5" id="i-email" placeholder="exemplo@gmail.com">
                            </div>
                            <br>
                            <div class="form-group form-group-inline col-12">
                                <label for="passwd" class="form-label col-5">Senha: </label>
                                <input type="password" name="passwd" class="form-input col-5" value="" id="passwd">
                                <button type="button" class="btn" id="bp1" name="button">
                                    <span class="fas fa-eye"></span>
                                </button>
                            </div>
                            <div class="form-group form-group-inline col-12">
                                <label for="c-passwd" class="form-label col-5">Confirme a Senha: </label>
                                <input type="password" name="c-passwd" class="form-input col-5" id="c-passwd">
                                <button type="button" class="btn btn-grey" id="bp2" name="button">
                                    <span class="fas fa-eye"></span>
                                </button>
                            </div>
                            <br>
                            <button type="submit" class="btn btn-block btn-success" name="button" id="lg-bt">Entrar</button>
                            <hr>
                            <a href="cadastro_usuario" role="button" class="btn btn-block btn-primary" id="cd-bt">Cadastre-se</a>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="assets/jquery/lib/jquery-3.4.1.min.js" charset="utf-8"></script>
    <script src="assets/bootstrap/dist/js/bootstrap.js" charset="utf-8"></script>
    <script type="text/javascript">
        $(document).on("click", "#bp1", function(){
            if($("#passwd").prop("type") == "password")
                $("#passwd").prop("type", "text");
            else
                $("#passwd").prop("type", "password");
        });

        $(document).on("click", "#bp2", function(){
            if($("#c-passwd").prop("type") == "password")
                $("#c-passwd").prop("type", "text");
            else
                $("#c-passwd").prop("type", "password");
        });

        $(document).on("click", "#lg-bt", function(){

        });
    </script>
</body>
</html>
