 

<?
$empresa = strtoupper("EMPRESA");
$endEmpresa = strtoupper("Endereço da Emepresa");
$fone = "FONE: (00) 0000-0000";
$cnpj = "00.000.000/0000-00";

include_once("../Model/Model.php");
include_once("../Model/Cliente.php");
include_once("../Model/Funcionario.php");
include_once("../Model/OS.php");
$OsId = $_REQUEST['OsId'];

$os = new OS();
$dados = $os->getOS($OsId);
if (count($dados) > 0) {
    foreach ($dados as $row) {
        $OsClienteId = $row['OsClienteId'];
        $OsVeiculo = $row['OsVeiculo'];
        $OsVeiculoPlaca = $row['OsVeiculoPlaca'];
        $OsVeiculoCor = $row['OsVeiculoCor'];
        $OsVeiculoAnoModelo = $row['OsVeiculoAnoModelo'];
        if ($OsVeiculoAnoModelo != null && $OsVeiculoAnoModelo != '') {
            $OsVeiculoAnoModelo = $OsVeiculoAnoModelo[0] . $OsVeiculoAnoModelo[1] . $OsVeiculoAnoModelo[2] . $OsVeiculoAnoModelo[3] . '/' . $OsVeiculoAnoModelo[4] . $OsVeiculoAnoModelo[5] . $OsVeiculoAnoModelo[6] . $OsVeiculoAnoModelo[7];
        }
        $OsSubTotal = $row['OsSubTotal'];
        $OsDesconto = $row['OsDesconto'];
        $OsTotal = $row['OsTotal'];
        $OsPagamento = $row['OsPagamento'];
        $OsStatus = $row['OsStatus'];
        $OsObs = $row['OsObs'];
        $OsFuncionarioServicoId = $row['OsFuncionarioServicoId'];
    }
} else {
    echo "erro";
    return;
}

$os = null;
$dados = null;

$os = new OS();
$OsServico = $os->getServicos($OsId);
$os = null;

if ($OsFuncionarioServicoId != 0 && (!empty($OsFuncionarioServicoId))) {
    $funcionario = new Funcionario();
    $dados = $funcionario->getFuncionario($OsFuncionarioServicoId);
    if (count($dados) > 0) {
        foreach ($dados as $row) {
            $OsFuncionario = $row['FuncionarioNome'];
        }
    } else {
        $OsFuncionario = '';
    }
} else {
    $OsFuncionario = '';
}

$cliente = new Cliente();
$dados = $cliente->getCliente($OsClienteId);
if (count($dados) > 0) {
    foreach ($dados as $row) {
        $ClienteNome = $row['ClienteNome'];
        if (!empty($ClienteObs)) {
            $ClienteObs = "<b>Obs.</b>: " . $ClienteObs;
        }
        $CTp = $row['ClienteTipo'];
        $CCC = $row['ClienteCpfOrCnpj'];
        if ($CTp == 0 && !empty($CCC)) {
            $ClienteCpfOrCnpj = $CCC[0] . $CCC[1] . $CCC[2] . '.' . $CCC[3] . $CCC[4] . $CCC[5] . '.' . $CCC[6] . $CCC[7] . $CCC[8] . '-' . $CCC[9] . $CCC[10];
        } elseif ($CTp == 1 && !empty($CCC)) {
            $ClienteCpfOrCnpj = $CCC[0] . $CCC[1] . '.' . $CCC[2] . $CCC[3] . $CCC[4] . '.' . $CCC[5] . $CCC[6] . $CCC[7] . '/' . $CCC[8] . $CCC[9] . $CCC[10] . $CCC[11] . '-' . $CCC[12] . $CCC[13];
        } else {
            $ClienteCpfOrCnpj = '';
        }
        $ClienteEndereco = $row['ClienteEndereco'];

        if ($ClienteEndereco != null) {
            if ($row['ClienteEndNumero'] != 0) {
                $ClienteEndereco.= ' N ' . $row['ClienteEndNumero'];
            }
        }
        $ClienteObs = $row['ClienteObs'];
        $ClienteCidade = $row['ClienteCidade'];
        $ClienteEstado = $row['ClienteEstado'];
        $ClienteTelefone = '';
        $ClienteCelular ='';
        if ($row['ClienteTelefone'] != null) {
            $ClT = $row['ClienteTelefone'];
            $ClienteTelefone.='(' . $ClT[0] . $ClT[1] . ') ' . $ClT[2] . $ClT[3] . $ClT[4] . $ClT[5] . '-' . $ClT[6] . $ClT[7] . $ClT[8] . $ClT[9];
        }
        if ($row['ClienteCelular'] != null) {
            $ClT = $row['ClienteCelular'];
            $ClienteCelular.= '(' . $ClT[0] . $ClT[1] . ') ' . $ClT[2] . $ClT[3] . $ClT[4] . $ClT[5] . '-' . $ClT[6] . $ClT[7] . $ClT[8] . $ClT[9];
        }
    }
}

if ($ClienteEstado != 0) {
    include_once("../Model/Estado.php");
    $estado = new Estado();
    $ClienteEstado = $estado->getEstadoNome($ClienteEstado);
    if ($row['ClienteCidade'] != 0) {
        include_once("../Model/Cidade.php");
        $cidade = new Cidade();
        $ClienteCidade = $cidade->getCidadeNome($ClienteCidade);
        $ClienteEndereco.= ' - ' . $ClienteCidade;
    }
    $ClienteEndereco.= ' - ' . $ClienteEstado;
}

$cliente = null;
$dados = null;


$OsSubTotal = number_format($OsSubTotal, 2, '.', '');
$OsTotal = number_format($OsTotal, 2, '.', '');
if ($OsDesconto != null && $OsDesconto != '') {
    $OsDesconto = number_format($OsDesconto, 2, '.', '');
} else {
    $OsDesconto = '0.00';
}

//$os = new OS();
//$dados = $os->getServicos($OsId);
//readfile("os.pdf");
?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="../View/css/imprimirOs.css" />
<title></title>
</head>
<body>
  <div  id="printOs">
  <div class="">
    <div class="" style="margin-bottom: 0">
    <table class="cabecario">
      <tbody>
        <tr>
          <td>
            <img class="imglogo"src=http://aveletronic.com.br/loja/image/data/Logotipo/iconeOsNet.jpg></td>
          <td style="text-align: center"> <span style="font-size: 20px;  "> MECANICA AMADEU</span><br/>
   <span>Osório Gonçalves viana, 255 - CEP 88370356 <br>Centro -  Navegantes - SC</span><br>
   <span> contato@mecanicaamadeu.com.br <br/>(47) 3342-2820</span>
          </td>
<td style="text-align: right">Ordem de Serviço Nº: <span ><?php echo $OsId; ?></span><br> <br> <span>Emissão: <?php echo date('d/m/Y') ?></span></td>
 </tr>              
      </tbody> 
       </table><br/>
                             <table class="cabecario">
                            <tbody>
                              <tr> <span style="text-align: left">DADOS DO CLIENTE</span>
                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                           
                                 
                                <span>Nome: <? echo $ClienteNome;?></span><br/>
                                <span>Endereço: <? echo $ClienteEndereco;?></span><br/> <span>Cidade: <? echo $ClienteCidade;?></span> <span> Estado: <? echo $ClienteEstado;?></span><br/>
                  
                                           
                                        </ul>
                                    </td>
                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                           
                                              <br/>
                                          <span>CPF: <? echo $ClienteCpfOrCnpj;?></span> <br/>
                                           <span>Telefone: <? echo $ClienteTelefone;?></span><br/>
                                                <span>Celular: <? echo $ClienteObs;?></span>
                                           
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                                                          
                        </table> 
       <table class="cabecario">
                            <tbody>
                              <tr> <span style="text-align: left">DADOS DO VEÍCULO</span>
                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                           
                                 
                                <span>Placa: <? echo $OsVeiculoPlaca;?></span><br/>
                                          <span>Veículo: <?echo $OsVeiculo;?></span><br/>
                                <span>Cor: </span><br/> 
                  
                                           
                                        </ul>
                                    </td>
                                    <td style="width: 50%; padding-left: 0">
                                        <ul>
                                           
                                              <br/>
                                          <span>KM:</span> <br/>
                                           <span>Ano: <? echo $OsVeiculoAnoModelo;?></span><br/>
                                          <span>Obs: </span>
                                           
                                        </ul>
                                    </td>
                                </tr>
                            </tbody>
                                                          
                        </table> <br/><br/>
      <div class="datagrid"><table>
              <thead><tr><th>Cod.</th><th WIDTH="500" >Descrição</th><th>Valor</th><th>Quant.</th><th>Total</th></tr></thead>

<tbody><? $os = new OS();
$dados = $os->getServicos($OsId);
    foreach ($dados as $row) {?><tr><td>data</td><td><? echo $row['ServicoNome']; ?></td><td>data</td><td>data</td><td>data</td><?}?></tr>
  
    </tbody>
</table></div>
      
      
    </div>
    </div>
    <br/>
    <br/>
    
</body>


<script type="text/javascript">

    var conteudo = document.getElementById("printOs").innerHTML;
    var win = window.open();
     win.document.write("<link rel='stylesheet' href='../View/css/imprimirOs.css' />");
    win.document.write(conteudo);
    win.print();
    win.close();//Fecha após a impressão. 



</script>
  </html>