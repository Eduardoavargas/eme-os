<?
	include_once("../Model/OS.php");
	include_once("../Model/Cliente.php");
	include_once("../Model/Funcionario.php");
	//$OsStatus = 2;
	$os = new OS();
      
	$aberta = $os->getOSbyStatus(1);
      	$fechada = $os->getOSbyStatus(2);
      	$aguardando = $os->getOSbyStatus(0);
	/*if(count($dados)>0){
		foreach($dados as $row){
			$OsClienteId = $row['OsClienteId'];
			$OsVeiculo = $row['OsVeiculo'];
			$OsVeiculoPlaca = $row['OsVeiculoPlaca'];
			$OsVeiculoCor = $row['OsVeiculoCor'];
			$OsVeiculoAnoModelo = $row['OsVeiculoAnoModelo'];
			$OsSubTotal = $row['OsSubTotal'];
			$OsDesconto = $row['OsDesconto'];
			$OsTotal = $row['OsTotal'];
			$OsPagamento = $row['OsPagamento'];
			$OsStatus = $row['OsStatus'];
			$OsObs = $row['OsObs'];
			$OsFuncionarioServicoId = $row['OsFuncionarioServicoId'];
			//$OsFuncionarioCadastroId = 
		}
	}else{
		return Alerta();
	}*/
?>
<div id="page">
		<div class="container_16">
			<div id="ordens_em_aberto" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Em Aberto</div>
                                <? $i = 0;foreach($aberta as $row) : ?>
                                <div class="<?php echo ($i == 0) ? 'em_aberto_item gray' : 'em_aberto_item white'; ?>">
                                   <?
                                  
                                    $OsClienteIdh = $row['OsClienteId'];
                                    $cliente = new Cliente();
                                     $ClienteNome = $cliente->getCliente($OsClienteIdh);
                               foreach($ClienteNome as $rowd) {  ?>
                                 
                              
                                    
                                    <label>Cliente</label> : <? echo  $ClienteNome = $rowd['ClienteNome'];?> 
					<br>
                                        <label>Telefone</label> : <? echo  $ClienteNome = $rowd['ClienteTelefone'];?>
                                        <?}
                                        ?>
                                        
                                        <label>Veículo</label> : <? echo $OsVeiculo = $row['OsVeiculo'];?> 
					<br>
					<label>Ano/Modelo</label> : <? echo $OsVeiculoAnoModelo = $row['OsVeiculoAnoModelo'];?> 
                                        <label class="veiculo">Cor</label> :  <? echo $OsVeiculoCor = $row['OsVeiculoCor'];?> 
                                        <label class="veiculo">Placa</label> :  <? echo $OsVeiculoPlaca = $row['OsVeiculoPlaca'];?> 
                                        <label>
					<a href="?page=OS&action=ver&OsId=<?echo $OsId = $row['OsId'];?> " alt="Ver OS"><img src="./images/ver_os2.png" class="ver_os"/></a>
				</div>
                                <?php $i++; endforeach; ?>
                                                                 
				
			</div>
			<div id="dados_empresa" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Aguardando autorização</div>
				<? $i = 0;foreach($aguardando as $row) : ?>
                                <div class="<?php echo ($i == 0) ? 'em_aberto_item gray' : 'em_aberto_item white'; ?>">
                                   	<label>Veículo</label> : <? echo $OsVeiculo = $row['OsVeiculo'];?> 
					<br>
					<label>Ano/Modelo</label> : <? echo $OsVeiculoAnoModelo = $row['OsVeiculoAnoModelo'];?> 
                                        <label class="veiculo">Cor</label> :  <? echo $OsVeiculoCor = $row['OsVeiculoCor'];?> 
                                        <label class="veiculo">Placa</label> :  <? echo $OsVeiculoPlaca = $row['OsVeiculoPlaca'];?> 
                                        <label>
					<a href="?page=OS&action=ver&OsId=<?echo $OsId = $row['OsId'];?> " alt="Ver OS"><img src="./images/ver_os2.png" class="ver_os"/></a>
				</div>
                                <?php $i++; endforeach; ?>
			</div>
			<div id="ultimos_servicos" class="grid_8 ui-widget-content ui-corner-all">
				<div class="title ui-widget-header ui-corner-all">Ultimos Serviços (Entregues)</div>
				<? $i = 0;foreach($fechada as $row) : ?>
                                <div class="<?php echo ($i == 0) ? 'em_aberto_item gray' : 'em_aberto_item white'; ?>">
                                   	<label>Veículo</label> : <? echo $OsVeiculo = $row['OsVeiculo'];?> 
					<br>
					<label>Ano/Modelo</label> : <? echo $OsVeiculoAnoModelo = $row['OsVeiculoAnoModelo'];?> 
                                        <label class="veiculo">Cor</label> :  <? echo $OsVeiculoCor = $row['OsVeiculoCor'];?> 
                                        <label class="veiculo">Placa</label> :  <? echo $OsVeiculoPlaca = $row['OsVeiculoPlaca'];?> 
                                        <label>
					<a href="?page=OS&action=ver&OsId=<?echo $OsId = $row['OsId'];?> " alt="Ver OS"><img src="./images/ver_os2.png" class="ver_os"/></a>
				</div>
                                <?php $i++; endforeach; ?>
				
				
			</div>
		</div>
	</div> 
        
        