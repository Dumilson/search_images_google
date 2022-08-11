<?php 
  require_once 'ScrapperGoogle.php';

  if(isset($_GET["url"]) AND !empty($_GET["url"])):
    echo ScrapperGoogle::GetImages($_GET["url"]);
  else:
    echo "<h1 style='color:red; text-align:center;'>Preencha o Campo de Pesquisa E Clique Enter</h1>";
  endif;
