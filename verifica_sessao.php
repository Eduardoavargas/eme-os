<?php
session_start();
 if (!isset($_SESSION['id']) OR ! isset($_SESSION['nome'])) {
        // Não há usuário logado, manda pra página de login
        header("Location: ../index.php");
    }
/*
if(!isset($_SESSION['logado']) or  $_SESSION['logado'] == 'NAO'):
	header("Location: ./");
endif;*/
