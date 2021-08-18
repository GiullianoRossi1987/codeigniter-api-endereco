<?php
defined("BASEPATH") or die("No Direct Scripts Allowed");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <title>Menu de Endereços</title>
        <link rel="stylesheet" href="assets/bootstrap/dist/css/bootstrap.css">
        <link rel="stylesheet" href="assets/general.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
    </head>
    <style media="screen">
        .bt-row > *{
            margin-right: 10px;
        }

        .invalid-field{
            border-color: red;
            background-color: red;
        }
    </style>
    <body>
        <div class="container container-fluid">
            <div class="row">
                <div class="col-md-10 col-sm-10 col-lg-10" style="margin-left: auto; margin-right: auto; margin-top: 10%; border: 1px solid black">
                    <h1 class="text-center">Formulario de enderecos</h1>
                    <div class="form">
                        <div class="form-row">
                            <div class="input-group input-group-inline col-4">
                                <label for="estado" class="form-label col-5">Estado: </label>
                                <select id="estado" name="estado" class="form-control col-5">
                                    <option value=""></option>
                                    <option value="AC">Acre</option>
                                    <option value="AL">Alagoas</option>
                                    <option value="AP">Amapá</option>
                                    <option value="AM">Amazonas</option>
                                    <option value="BA">Bahia</option>
                                    <option value="CE">Ceará</option>
                                    <option value="DF">Distrito Federal</option>
                                    <option value="ES">Espírito Santo</option>
                                    <option value="GO">Goiás</option>
                                    <option value="MA">Maranhão</option>
                                    <option value="MT">Mato Grosso</option>
                                    <option value="MS">Mato Grosso do Sul</option>
                                    <option value="MG">Minas Gerais</option>
                                    <option value="PA">Pará</option>
                                    <option value="PB">Paraíba</option>
                                    <option value="PR">Paraná</option>
                                    <option value="PE">Pernambuco</option>
                                    <option value="PI">Piauí</option>
                                    <option value="RJ">Rio de Janeiro</option>
                                    <option value="RN">Rio Grande do Norte</option>
                                    <option value="RS">Rio Grande do Sul</option>
                                    <option value="RO">Rondônia</option>
                                    <option value="RR">Roraima</option>
                                    <option value="SC">Santa Catarina</option>
                                    <option value="SP">São Paulo</option>
                                    <option value="SE">Sergipe</option>
                                    <option value="TO">Tocantins</option>
                                    <option value="EX">Estrangeiro</option>
                                </select>
                            </div>
                            <div class="input-group input-group-inline col-4">
                                <label for="cidade" class="form-label col-3">Cidade: </label>
                                <input type="text" name="cidade" id="cidade" class="form-control col-9">
                            </div>
                            <div class="input-group input-group-inline col-4">
                                <label for="cep" class="form-label col-2">CEP: </label>
                                <input type="text" name="cep" id="cep" class="form-control col-5">
                            </div>
                        </div>
                        <br>
                        <div class="form-row">
                            <div class="col-5 input-group input-group-inline">
                                <label for="rua" class="form-label col-3">Rua: </label>
                                <input type="text" name="rua" id="rua" class="form-control col-10">
                            </div>
                            <div class="col-5 input-group input-group-inline">
                                <label for="bairro" class="form-label col-3">Bairro: </label>
                                <input type="text" name="bairro" id="bairro" class="form-control col-10">
                            </div>
                            <div class="col-2 input-group input-group-inline">
                                <label for="num" class="form-label col-3">Nº: </label>
                                <input type="text" name="num" id="num" class="form-control col-5">
                            </div>
                        </div>
                        <br>
                        <hr>
                        <div class="form-row bt-row">
                            <!-- buttons row -->
                            <a href="logoff" role="button" class="btn btn-lg btn-danger">Logoff</a>
                            <button type="button" id="bt-add" class="btn btn-lg btn-success">Adicionar endereco</button>
                            <button type="button" id="bt-get" class="btn btn-lg btn-primary">Buscar endereco</button>
                            <div class="ctrl-pos">
                                <button type="button" id="qr-bw" class="btn btn-secondary disabled">
                                    <span class="fas fa-caret-left"></span>
                                </button>
                                <span id="msg-opt">Nenhuma busca realizada ainda</span>
                                <button type="button" id="qr-fw" class="btn btn-secondary disabled">
                                    <span class="fas fa-caret-right"></span>
                                </button>
                            </div>
                            <button type="button" id="bt-cl" class="btn btn-secondary btn-lg">Limpar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Scripts -->
        <script src="assets/jquery/lib/jquery-3.4.1.min.js" charset="utf-8"></script>
        <script src="assets/bootstrap/dist/js/bootstrap.js" charset="utf-8"></script>
        <script type="text/javascript">
            var ac_pos = 0;
            var lim_pos = 0;
            var results = null;
            var rr = null;

            $(document).on("click", "#bt-add", function(){
                $.post({
                    url: "endereco/add",
                    data: {
                        estado: $("#estado").val(),
                        cidade: $("#cidade").val(),
                        cep: $("#cep").val(),
                        rua: $("#rua").val(),
                        bairro: $("#bairro").val(),
                        numero: $("#num").val()
                    },
                    dataType: "json",
                    complete: function(resp){ console.log(resp); }
                });
            });

            $(document).on("click", "#bt-get", function(){
                $.post({
                    url: "endereco/get",
                    data: {
                        estado: $("#estado").val(),
                        cidade: $("#cidade").val(),
                        cep: $("#cep").val(),
                        rua: $("#rua").val(),
                        bairro: $("#bairro").val(),
                        numero: $("#num").val()
                    },
                    dataType: "json",
                    success: function(resp){
                        console.log(resp.length);
                        results = resp;
                        if(resp.length == 0) $("#msg-opt").text("Nenhum resultado encontrado");
                        else{
                            ac_pos = 0;
                            lim_pos = resp.length;
                            load_end();
                            $("#msg-opt").text((ac_pos + 1) + " de " + lim_pos);
                        }
                    },
                    error: function(resp){
                        $("#msg-opt").text("Nenhum resultado encontrado");
                    }
                });
            });

            function load_end(){
                var dt = results[ac_pos];
                $("#estado").val(dt["vl_estado"]);
                $("#cidade").val(dt["vl_cidade"]);
                $("#cep").val(dt["vl_cep"]);
                $("#bairro").val(dt["vl_bairro"]);
                $("#rua").val(dt["vl_rua"]);
                $("#num").val(dt["vl_num"]);

                $("#qr-fw").toggleClass("disabled", (ac_pos + 1) == lim_pos);
                $("#qr-bw").toggleClass("disabled", ac_pos == 0);
            }

            $(document).on("click", "#bt-cl", function(){
                $("#estado").val("");
                $("#cidade").val("");
                $("#cep").val("");
                $("#bairro").val("");
                $("#rua").val("");
                $("#num").val("");

                var ac_pos = 0;
                var lim_pos = 0;
                var results = [];

                $("#qr-fw").addClass("disabled");
                $("#qr-bw").addClass("disabled");

                $("#msg-opt").text("Pesquisa limpa");

            });

            $(document).on("click", "#qr-fw", function(){
                ac_pos++;
                load_end();
            });

            $(document).on("click", "#qr-bw", function(){
                ac_pos--;
                load_end();
            });

            // verificacao do cep
            $(document).on("keyup keydown", "#cep", function(){
                if($(this).val().length != 8){
                    $(this).addClass("invalid-field");
                }
                else{
                    $(this).removeClass("invalid-field");
                    $.get({
                        url: "https://viacep.com.br/ws/" + $("#cep").val() + "/json",
                        dataType: "json",
                        success: function(resp){
                            $("#estado").val(resp["uf"]);
                            $("#cidade").val(resp["localidade"]);
                        }
                    });
                }
            });
        </script>
    </body>
</html>
