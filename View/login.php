<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width">
<meta charset="utf-8" />
<title>EME-OS</title>
<link rel="stylesheet" href="css/meuestilo.css" />
<link rel="stylesheet" href="css/material.min.css" />
<script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>
<body>

<div class="mdl-card mdl-shadow--2dp wrapper">
  <div class="mdl-card__title text-center">
    <h2 class="mdl-card__title-text">Entre para acessar o sistema</h2>
  </div>
  <div class="mdl-card__supporting-text">
   <form method="post" action="valida.php" autocomplete="off">
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
        <input class="mdl-textfield__input" type="text" name="usuario" id="usuario" autocomplete="on">
    <label class="mdl-textfield__label" for="usuario">Usuário</label>
      </div>
      <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label textfield-demo">
        <input   class="mdl-textfield__input" type="password" name="senha" id="senha">
    <label class="mdl-textfield__label" for="senha">Senha</label>
      </div>
   
 
  <div class="mdl-card__actions mdl-card--border text-center">
      <input type="submit"  value="Entrar" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--colored"/>
   
 
  </div>
       </form>
   </div>
</div>
</body>