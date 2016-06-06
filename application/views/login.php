﻿<?php
   header('Access-Control-Allow-Origin: http://www.aslave.org.br');
?>
<!doctype html>
<html>
<head>
  <title>Login Page | Aslave</title>
  <meta charset="UTF-8">
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">

  <link rel="stylesheet" type="text/css" href="<?= base_url ('assets/css/materialize.css');?>">
  <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/templateMenu.css'); ?>">
  <link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet' type='text/css'>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.2.js"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/materialize.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/jquery.maskedinput.js');?>"></script>
  <script type="text/javascript" src="<?= base_url('assets/js/jquery.validate.js'); ?>"></script>


  <script type="text/javascript">
    $(document).ready(function(){
      $("#form_login").submit(function(e){
        e.preventDefault();

        $.ajax({
          url: "<?php echo site_url('/UserController/login')?>",
          type: "POST",
          data: $("#form_login").serialize(),
          success: function(data){
           if(data == '1'){
            document.location.href = "<?= base_url(''); ?>";
           }else{
            Materialize.toast(data, 4000);
           }
          },
          error: function(data){
            console.log(data);
            Materialize.toast('Ocorreu algum erro', 4000);
          }
        });
      });
    });
  </script>
  </head>
  <body class="blue">
    <div class="row">
        <div class="col s12 m4 offset-m4 l4 offset-l4 card-panel" >
            <form id="form_login">
                <div class="row">
                  <div class="input-field col s12 center">
                        <img src="<?= base_url('assets/img/vovo_cadeira.jpg');?>" class="responsive-img">
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                        <p class="center">ASSOCIAÇÃO LAR DOS VELHINHOS DE TORRES</p>
                    </div>
                </div>
                <div class="row margin">
                    <div class="input-field col s12">
                      <i class="mdi-social-person-outline prefix"></i>
                      <input id="login" type="text" autocomplete="off" value="<?php if(isset($_COOKIE['login_aslave'])){ echo $_COOKIE['login_aslave'] ;}else{"";} ?>" name="login" required>
                      <label for="login">Usuário</label>

                    </div>
               </div>
               <div class="row margin">
                  <div class="input-field col s12">
                      <i class="mdi-action-lock-outline prefix"></i>
                      <input id="password" value="<?php if(isset($_COOKIE['password_aslave'])){ echo $_COOKIE['password_aslave'];}else{echo "";} ?>" name="password" type="password" required>
                      <label for="password">Password</label>
                </div>
              </div>
              <div class="row">          
                  <div class="input-field col s12 login-text">
                        <input type="checkbox" name="remember_me" id="remember-me" />
                        <label for="remember-me">Lembrar senha</label>
                    </div>
              </div>
            <div class="row">
                <div class="input-field col s12">
                   <button class="btn waves-effect waves-light col s12" type="submit">Entrar</button>
                </div>
            </div>
            <div class="row">
                <div class="col s12">
                  <hr>
                </div>
            </div>
            <div class="row">
                <div class="center col s12">
                  <img class="responsive-img" src="<?= base_url('assets/img/logo_computacao.jpg');?>">
                </div>
            </div>
          </form>
        </div>
      </div>
	</div>
  </body>
</html>