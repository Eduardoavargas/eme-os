<? // require_once '../Util/QuickGit.php';
    exec('git describe --always',$version_mini_hash);
    exec('git rev-list HEAD | wc -l',$version_number);
    exec('git log -1',$line);
    $version['short'] = "v1.".trim($version_number[0]);//.".".$version_mini_hash[0];
   // $version['full'] = "v1.".trim($version_number).".$version_mini_hash[0] (".str_replace('commit ','',$line[0]).")";
    echo $version['short'];
  //  echo $version['full'];
    
//    $placa = strtoupper($_POST['placa']);
//$placa = str_replace('-','',$placa);
$arrContextOptions=array(
    "ssl"=>array(
        "verify_peer"=>false,
        "verify_peer_name"=>false,
    ),
);  


$placa= 'mfb5745';
//$resposta = file_get_contents("https://www.carcheck.com.br/exibirdadosveiculos?placa=".$placa);
$resposta = file_get_contents("https://www.carcheck.com.br/exibirdadosveiculos?placa=".$placa, 0, stream_context_create($arrContextOptions));

$aux = explode("\"",$resposta);

$ano = $aux[3]; 
$ano = substr($ano,0,4);
$cor = $aux[11];
$modelo = $aux[15];
$ano2 = substr($ano,4,8);
echo $modelo."|".$cor."|".$ano."|".$ano2;
    ?>
</body>
</html>