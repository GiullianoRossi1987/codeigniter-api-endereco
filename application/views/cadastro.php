<?php
defined("BASEPATH") or die("No Direct Scripts Allowed");
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Cadastro de Usuarios</title>
        <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="assets/general.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
    <style media="screen">
        .hwarning, .dwarning{
            visibility: hidden;
        }

        .warning{ color: red;}

        #pwa{
            float: right;
            margin-right: 50px;
        }

        .invalid-field{
            border-color: red !important;
            background-color: red;
        }
    </style>
    <body>
        <div class="container container-fluid">
            <div class="row main-row">
                <div class="col-md-6 col-sm-6 col-lg-6" style="margin-left: auto; margin-right: auto; border: 1px solid black; margin-top: 10%; padding: 20px 20px">
                    <form class="form" action="usuario/add" method="post">
                        <h1 class="center-title text-center">Cadastro de usuario</h1>
                        <br>
                        <div class="input-group input-group-inline">
                            <label for="name" class="form-label col-5">Nome de Usuario: </label>
                            <input type="text" id="name" name="name" value="" clas="form-control col-6">
                        </div>
                        <br>
                        <div class="input-group input-group-inline">
                            <label for="email" class="form-label col-5">E-mail: </label>
                            <input type="email" id="email" name="email" value="" class="form-control col-6">
                        </div>
                        <br>
                        <div class="input-group input-group-inline">
                            <label for="passwd" class="form-label col-5"> Senha: </label>
                            <input type="password" id="passwd" name="passwd" value="" class="form-control col-6">
                            <button type="button" id="bts1" class="btn col-1">
                                <span class="fas fa-eye"></span>
                            </button>
                        </div>
                        <br>
                        <div class="input-group input-group-inline">
                            <label for="cpasswd" class="form-label col-5">Confirme a senha: </label>
                            <input type="password" name="cpass" id="cpasswd" class="form-control col-6">
                            <button type="button" id="bts2" class="btn col-1">
                                <span class="fas fa-eye"></span>
                            </button>
                        </div>
                        <p class="hwarning warning" id="pwa">As senhas nao condizem</p>
                        <br>
                        <button type="submit" class="btn btn-success btn-block" name="button">Criar conta</button>
                        <hr>
                        <a href="login" role="button" class="btn btn-primary btn-block">Fazer login</a>
                    </form>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="assets/jquery/lib/jquery-3.4.1.min.js" charset="utf-8"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.js" charset="utf-8"></script>
        <script type="text/javascript">

            $(document).on("click", "#bts1", function(){
                $("#passwd").prop("type", $("#passwd").prop("type") == "text" ? "password" : "text");
            });

            $(document).on("click", "#bts2", function(){
                $("#cpasswd").prop("type", $("#cpasswd").prop("type") == "text" ? "password" : "text");
            });

            $(document).on("keyup keydown", "#cpasswd", function(){
                $("#pwa").toggleClass("hwarning", $(this).val() == $("#passwd").val());
            });

            $(document).on("change keyup keydown", "#email", function(){
                $.post({
                    url: "usuario/check/email",
                    data: {email: $("#email").val()},
                    dataTyoe: "json",
                    success: function(resp){
                        $("#email").toggleClass("invalid-field", resp["valid"]);
                        $("#email").prop("title", "Esse email ja esta cadastrado");
                        $("#email").prop("data-toggle", "tooltip");
                        $("#email").tooltip("show");
                    },
                    error: function(resp){
                        $("#email").removeClass("invalid-field");
                        $("#email").prop("title", "");
                        $("#email").prop("data-toggle", "");
                        // $("#email").tooltip("show");
                    }
                });
            });

            $(document).on("change keyup keydown", "#name", function(){
                $.post({
                    url: "usuario/check/name",
                    data: {name: $("#name").val()},
                    dataTyoe: "json",
                    success: function(resp){
                        $("#name").toggleClass("invalid-field", resp["valid"]);
                        $("#name").prop("title", "Esse nome ja esta cadastrado");
                        $("#name").prop("data-toggle", "tooltip");
                        $("#name").tooltip("show");
                    },
                    error: function(resp){
                        $("#name").removeClass("invalid-field");
                        $("#name").prop("title", "");
                        $("#name").prop("data-toggle", "");
                        // $("#email").tooltip("show");
                    }
                });
            });
        </script>
    </body>
</html>
