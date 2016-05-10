<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


  $placa   = 'mfb5745';
  $informacoesDaPlacaEmJSON = shell_exec('python placa.py ' . $placa);
  $informacoesDaPlaca = json_decode($informacoesDaPlacaEmJSON);

?>
<div id="page">
		<div class="container_16">
                    
                  <? var_dump($informacoesDaPlaca);
                  var_dump($informacoesDaPlacaEmJSON);
                  echo 'teste';?>
                </div></div>