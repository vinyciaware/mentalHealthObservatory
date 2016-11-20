<?php
	
	include_once('C:/wamp64/www/mentalHealthObservatory/webroot/functions.php');
	//include_once('C:/wamp64/www/mentalHealthObservatory/webroot/banco.php');

	//$cid10[$_POST['cod_cid10']] = "selected='selected'";
	//$sexo[$_POST['cod_sexo']] = "checked='checked'";
	//$catint[$_POST['cod_catint']] = "checked='checked'";

	//ANOS NA BASE
	$ano_base[] = 13;
	$ano_base[] = 14;
	$ano_base[] = 15;

	//Regiões base
	$regiao_base[] = 13;


	$meses = array('Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez');


/*	if ($_POST['cod_output'])
		$output[$_POST['cod_output']] = "checked='checked'";
	else
		$output[1] = "checked='checked'";

	if ($_POST['ano'])
		$select_ano[$_POST['ano']] = "selected='selected'";
	else
		$select_ano[2011] = "selected='selected'";

	if ($_POST['mes'])
		$select_mes[$_POST['mes']] = "selected='selected'";

	if ($_POST['faixa_etaria']) {
		foreach ($_POST['faixa_etaria'] as $value)
			$faixaetaria[$value] = "selected='selected'";
	}

	if ($_POST['cod_csaida']) {
		foreach ($_POST['cod_csaida'] as $value)
			$condsaida[$value] = "selected='selected'";
	}

	/*if (!$_SESSION['orah_visita_fluxo']) {
		file_put_contents('../log_acesso',date('d/m/y H:i:s')."\t{$_SESSION['orah_login']}\t({$_SERVER['REMOTE_ADDR']})\tFLUXO\n",FILE_APPEND);
		$_SESSION['orah_visita_fluxo'] = true;
	}*/
?>


<html>

<head>
	<script>

function listaMicroregiao(cod_drs,nomecampo_mregiao,nomecampo_munic,nomecampo_hosp) {
	if (cod_drs == '00' || cod_drs == '-1')
		$('#'+nomecampo_mregiao).html("<option value='00'>00 - Todas Microrregiões</option>");

	else if (cod_drs == '13')
		$('#'+nomecampo_mregiao).html("<option value=\"00\">00 - Todas Microrregiões</option><option value=\"01\">01 - HORIZONTE VERDE</option><option value=\"02\">02 - AQUIFERO GUARANY</option><option value=\"03\">03 - VALE DAS CACHOEIRAS</option>");

	if (nomecampo_munic != '')
		$('#'+nomecampo_munic).html("<option value='00'>000000 - Todos Municípios</option>");

	if (nomecampo_hosp != '')
		$('#'+nomecampo_hosp).html("<option value='00'>000 - Todos Hospitais</option>");
}

function listaMunicipio(cod_mregiao,nomecampo_munic,nomecampo_hosp) {
	if (cod_mregiao == '')
		$('#'+nomecampo_munic).html("<option value='00'>000000 - Todos Municípios</option>");

	if (cod_mregiao == '00')
		$('#'+nomecampo_munic).html("<option value='00'>000000 - Todos Municípios</option>");

	else if (cod_mregiao == '03')
		$('#'+nomecampo_munic).html("<option value='00'>000000 - Todos Municípios</option><option value='350100'>350100 - ALTINOPOLIS</option><option value='350590'>350590 - BATATAIS</option><option value='350780'>350780 - BRODOWSKI</option><option value='350940'>350940 - CAJURU</option><option value='351090'>351090 - CASSIA DOS COQUEIROS</option><option value='354625'>354625 - SANTA CRUZ DA ESPERANCA</option><option value='354790'>354790 - SANTO ANTONIO DA ALEGRIA</option>");

	else if (cod_mregiao == '01')
		$('#'+nomecampo_munic).html("<option value='00'>000000 - Todos Municípios</option><option value='350560'>350560 - BARRINHA</option><option value='351460'>351460 - DUMONT</option><option value='351860'>351860 - GUARIBA</option><option value='352430'>352430 - JABOTICABAL</option><option value='353130'>353130 - MONTE ALTO</option><option value='353950'>353950 - PITANGUEIRAS</option><option value='354020'>354020 - PONTAL</option><option value='354090'>354090 - PRADOPOLIS</option><option value='355170'>355170 - SERTAOZINHO</option>");

	else if (cod_mregiao == '02')
		$('#'+nomecampo_munic).html("<option value='00'>000000 - Todos Municípios</option><option value='351310'>351310 - CRAVINHOS</option><option value='351885'>351885 - GUATAPARA</option><option value='352510'>352510 - JARDINOPOLIS</option><option value='352760'>352760 - LUIS ANTONIO</option><option value='354340'>354340 - RIBEIRAO PRETO</option><option value='354750'>354750 - SANTA RITA DO PASSA QUATRO</option><option value='354760'>354760 - SANTA ROSA DE VITERBO</option><option value='355090'>355090 - SAO SIMAO</option><option value='355140'>355140 - SERRA AZUL</option><option value='355150'>355150 - SERRANA</option>");

	if (nomecampo_hosp != '')
		$('#'+nomecampo_hosp).html("<option value='00'>000 - Todos Hospitais</option>");
}

function listaHospital(cod_mnibge,nomecampo_hosp) {
	if (cod_mnibge == '00')
		$('#'+nomecampo_hosp).html("<option value='00'>000 - Todos Hospitais</option>");

	else if (cod_mnibge == '354340')
		$('#'+nomecampo_hosp).html("<option value='00'>000 - Todos Hospitais</option><option value='38'>38 - HOSPITAL DAS CLINICAS - UNIDADE DE EMERGÊNCIA</option><option value='43'>43 - HST - ACOLHIMENTO</option><option value='44'>44 - HST - AGUDOS GERAL FEMININO</option><option value='45'>45 - HST - AGUDOS GERAL MASCULINO</option><option value='46'>46 - HST - ATENÇÃO PSICOSSOCIAL FEMININO</option><option value='48'>48 - HST - ATENÇÃO PSICOSSOCIAL MASCULINO</option><option value='49'>49 - HST - DEPENDENTE QUÍMICO MASCULINO I</option><option value='50'>50 - HST - PRIMEIRAS INTERNAÇÕES FEMININO</option><option value='51'>51 - HST - PRIMEIRAS INTERNAÇÕES MASCULINO</option><option value='56'>56 - HOSPITAL DAS CLINICAS - EPIB</option><option value='58'>58 - HOSPITAL DAS CLINICAS - EPQU</option><option value='134'>134 - HST - DEPENDENTE QUÍMICO MASCULINO II</option><option value='150'>150 - HST - DEPENDENCIA QUÍMICO MASCULINO</option><option value='151'>151 - HST - ACOLHIMENTO - TRANSTORNOS MENTAIS</option><option value='187'>187 - HST ACOLHIMENTO - TRANSTORNO MENTAL E DEPENDÊNCIA QUÍMICA COM COMORBIDADE</option>");
	else if(cod_mnibge == '354750') 
		$('#'+nomecampo_hosp).html("<option value='00'>000 - Todos Hospitais</option><option value='53'>53 - CAIS NAIC</option><option value='54'>54 - CAIS NAD FEMININO</option><option value='55'>55 - CAIS NAD MASCULINO</option><option value='57'>57 - CAIS NAD FEMININO GESTANTE</option><option value='182'>182 - CAIS NAD MISTO</option>")
	else
		$('#'+nomecampo_hosp).html("<option value='00'>Município não possui hospital cadastrado.</option>");
}

</script>

	<title>Fluxo de Altas - Portal OSM</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel='stylesheet' href='../webroot/css/filtros.css' type='text/css' media='all' />
	<script type='text/javascript' src='..webroot/js/jquery.min.js'></script>
	<script type='text/javascript' src='..webroot/js/funcoes_gerais.js'></script>



	<style>
		#tabDados td {
			padding: 2px;
		}

		th div {
			width: 1em;
			margin: 0px 5px;
		}
	</style>
	
</head>

<body>


<!--	<div id='ocultarFiltro' style='width: 259px;'> <!-- Div Ocultar Filtros 
	<br><a href="#" onclick="javascript: hide('painelFiltro', 'output');">Exibir/Ocultar Filtros</a> 
	</div>
-->

	<div id='painelFiltro'> <!-- Div Filtros -->

	<?php echo $this->form->create(null, ['url'=>[' action' => 'getdata']]);?>


	<span class='filter'><label for='ano'>Data de Refer&ecirc;ncia</label></span>
	<select name='mes' id='mes' style='width: 50px;'>
		<option value='00'> - </option>
		<?php
			foreach ($meses as $n => $mes) {
				echo "<option value='$n' {$select_mes[$n]}>$mes</option>";
			}
		?>
	</select>
	
	<select name='ano' id='ano' style='width: 65px;'>
		<option value='00'>Todos</option>
		<?php
			foreach ($ano_base as $n) {
				echo "<option value='$n' {$select_ano[$n]}>$n </option>";
			}
		?>
	</select>

		<hr>

		<b>Procedência</b><img title="Escolha a região de origem do paciente" src='../img/ferramentas_dica.jpg'>

			<div class='filter'><label for='procede_regiao'>Região </label></div>
			<select name='procede_regiao' id='procede_regiao' onchange="listaMicroregiao($(this).val(),'procede_microregiao','procede_municipio','')" style='width: 250px;'>
				<option value='00'> Selecione </option>
				<option value='13'>DRS-XIII</option>
				
			</select>
			<br/>

			<script type='text/javascript'>
				$('#procede_regiao').val('<?php echo $_REQUEST['procede_regiao']; ?>')
			</script>

			<div class='filter'><label for='procede_microregiao'>Microrregião</label></div>
			<select name='procede_microregiao' id='procede_microregiao' options default='00'  onchange="listaMunicipio($(this).val(),'procede_municipio','')" style='width:250px'></select>
				

			<script type='text/javascript'>
				listaMicroregiao($('#procede_regiao').val(),'procede_microregiao',	'procede_municipio','');
				$('#procede_microregiao').val('<?php echo $_REQUEST['procede_microregiao']; ?>')
			</script>

			<br/>

			<div class='filter'><label for='procede_municipio'>Município</label></div>
			<select name='procede_municipio' id='procede_municipio' onchange="listaHospital($(this).val(),'')" style='width:250px'></select>
			<script type='text/javascript'>
				listaMunicipio($('#procede_microregiao').val(),'procede_municipio','');
				$('#procede_municipio').val('<?php echo $_REQUEST['procede_municipio']; ?>')
			</script>

			<?php
			//if (!$_SESSION['orah_cod_hosp'])
				echo "
			<hr>
			<b>Destino </b><img title='Escolha a região que o paciente foi atendido' src='../img/ferramentas_dica.jpg'>"?>
			<input type='hidden' name='regiao' value='13' />

			<?php/*
				if (!$_SESSION['orah_cod_hosp']) { */
			?>
			<div class='filter'><label for='microregiao'>Microrregião</label></div>
			<select name='microregiao' id='microregiao' onchange="listaMunicipio($(this).val(),'municipio','hospital')" style='width:250px'>
				<option value="00">00 - Todas Microrregiões</option>
				<option value="01">01 - HORIZONTE VERDE</option>
				<option value="02">02 - AQUIFERO GUARANY</option>
				<option value="03">03 - VALE DAS CACHOEIRAS</option>
			</select>
			<script type='text/javascript'>
				$('#microregiao').val('<?php echo $_REQUEST['microregiao']; ?>');
			</script>
			
			<?php
				//}
			/*	else {
					echo "
					<input type='hidden' name='microregiao' id='microregiao' value='{$_SESSION['orah_cod_mregiao']}'>";
				}
*/
				/*if (!$_SESSION['orah_cod_hosp']) {*/
			?>
			<br/>
			<div class='filter'><label for='municipio'>Município</label></div>
			<select name='municipio' id='municipio' onchange="listaHospital($(this).val(),'hospital')" style='width:250px'></select>
			<script type='text/javascript'>
				listaMunicipio($('#microregiao').val(),'municipio','hospital');
				$('#municipio').val('<?php echo $_REQUEST['municipio']; ?>')
			</script>
			<?php
				/*}
				else {
					echo "
					<input type='hidden' name='municipio' id='municipio' value='{$_SESSION['orah_cod_mnibge']}'>";
				}*/

				/*if (!$_SESSION['orah_cod_hosp']) {*/
			?>
			<br/>
			<div class='filter'><label for='hospital'>Hospital</label></div>
			<select name='hospital' id='hospital' style='width:250px'></select>
			<script type='text/javascript'>
				listaHospital($('#municipio').val(),'hospital');
				$('#hospital').val('<?php echo $_REQUEST['hospital']; ?>')
			</script>
			<?php
				/*}
				else {
					echo "
					<input type='hidden' name='hospital' id='hospital' value='{$_SESSION['orah_cod_hosp']}'>";
				}*/
			?>

	<hr>
	<div class='filter'><label for='cod_cid10'>Cap&iacute;tulos CID10 </label><img title="Escolha o capítulo CID 10. É possível selecionar todos os capítulos, apenas um ou então mais que um capítulo por meio da lista personalizada." src='../img/ferramentas_dica.jpg'></div>
	<select name='cod_cid10' id='cod_cid10' style='width: 250px;'>
		<option value='00' >Todos</option>
		<option value='00' >V - Transtornos mentais e comportamentais</option>	
	</select>

	<div id='cod_cid10_lista_box' style='display: none;'>
	&nbsp; <input type='text' name='cod_cid10_lista' id='cod_cid10_lista' value='' style='width: 100px;'/> <span style='font-size: 10px;'>(separada por virgulas)</span>
	</div>
    <hr>

	<div class='filter'><label for='faixa_etaria'>Faixa Et&aacute;ria </label><img title="Escolha a faixa etária. É possível selecionar mais que uma faixa etária. Para escolher faixas etárias não consecutivas mantenha a tecla Shift selecionada." src='../img/ferramentas_dica.jpg'></div>

	<select size='12' name='faixa_etaria[]' id='faixa_etaria' style='width: 250px;'>
		<option value='00' >Todas Idades</option>
		<option value='000-999-dm' >Menor que 1 ano</option>
		<option value='001-004-a' >1 a 4 anos</option>
		<option value='005-009-a' >5 a 9 anos</option>
		<option value='010-014-a' >10 a 14 anos</option>
		<option value='015-019-a' >15 a 19 anos</option>
		<option value='020-029-a' >20 a 29 anos</option>
		<option value='030-039-a' >30 a 39 anos</option>
		<option value='040-049-a' >40 a 49 anos</option>
		<option value='050-059-a' >50 a 59 anos</option>
		<option value='060-069-a' >60 a 69 anos</option>
		<option value='070-079-a' >70 a 79 anos</option>
		<option value='080-999-a' >Maior que 80 anos</option>
	</select>
    <hr>

	<div class='filter'>Sexo</div>
	<input type='radio' name='cod_sexo' id='cod_sexo_0' value='' checked='checked'><label for='cod_sexo_0'>Ambos</label>
	<input type='radio' name='cod_sexo' id='cod_sexo_1' value='1' ><label for='cod_sexo_1'>Masculino</label>
	<input type='radio' name='cod_sexo' id='cod_sexo_2' value='2' ><label for='cod_sexo_2'>Feminino</label>
    <hr>
	<!--<div class='filter'>Categoria de Interna&ccedil;&atilde;o</div>
	<input type='radio' name='cod_catint' id='cod_catint_0' value='' checked='checked'><label for='cod_catint_0'>Ambos</label>
	<input type='radio' name='cod_catint' id='cod_catint_1' value='1' ><label for='cod_catint_1'>SUS</label>
	<input type='radio' name='cod_catint' id='cod_catint_2' value='2' ><label for='cod_catint_2'>N&atilde;o-SUS</label>
    <hr>
    -->
	<div class='filter'><label for='cod_csaida'>Condi&ccedil;&atilde;o de Sa&iacute;da </label><img title="Escolha a condição de saída do paciente." src='../img/ferramentas_dica.jpg'></div>
	<select size='6' name='cod_csaida[]' id='cod_csaida' style='width:250px'>
		<option value='0' ><label for='cod_csaida0'>Todas</option>
		<option value='1' ><label for='cod_csaida1'>Clínica</option>
		<option value='2' ><label for='cod_csaida2'>A Pedido</option>
		<option value='3' ><label for='cod_csaida3'>Administrativa</option>
		<option value='4' ><label for='cod_csaida4'>Evasão</option>
		<option value='5' ><label for='cod_csaida5'>&Oacute;bito</option>
		<option value='6' ><label for='cod_csaida6'>Transferência</option>
		<option value='7' ><label for='cod_csaida7'>Transferência da UCP</option>

	</select>
    <hr>

	<div class='filter'>Gerar Mapa <img title="Gerar visualização do mapa de fluxo." src='../img/ferramentas_dica.jpg'></div>
		<input type='radio' name='cod_output' id='cod_output_1' value='1' checked='checked'><label for='cod_output_1'>Mapa</label>
		

	<div style='margin: 10px 0px;'>
		<input type='submit' value='Filtrar' style='width: 115px;'>

	</div>

	<?php echo $this->Form->end(); ?>
	</div>
	
	<div id='output'> <!-- Div Resultados -->

<?php
	
	echo $cod_output;

	if ($cod_output == 1){

			//Gera mapa

	
		$labels = array();

		function drawText($source, $cx, $cy, $valor) {
			global $black;
			global $white;

			$padding = 3;
			$bbox = imagettfbbox(12, 0, './arial.ttf', $valor);

			imagefilledrectangle($source, $cx+$bbox[6]-$padding, $cy+$bbox[7]-$padding-8, $cx+$bbox[2]+$padding+3, $cy+$bbox[3]+$padding-8, $white);
			imagettftext($source, 12, 0, $cx, $cy-8, $black, './arial.ttf', $valor);
		}

		function rotatedellipse($source, $cx, $cy, $width, $height, $rotateangle, $direcao, $color, $valor) {
			global $labels;

			$step=5;
			$cosangle=cos(deg2rad($rotateangle));
			$sinangle=sin(deg2rad($rotateangle));

			$squishratio = $height/$width;
			$nopreviouspoint = true;

			for ($angle=0; $angle<=(180+$step); $angle+=$step) {
				$ox = ($width * cos(deg2rad($angle)));
				$oy = ($width * sin(deg2rad($angle))) * $squishratio;

				$x = ($ox * $cosangle) - ($oy * $sinangle);
				$y = ($ox * $sinangle) + ($oy * $cosangle);

				if ($nopreviouspoint) {
					$px=$x;
					$py=$y;
					$nopreviouspoint=false;
				}
				else if ($angle == 180-$step*5) {
					if ($direcao == 1) {
						$x_ = $cx - $width * $cosangle;
						$y_ = $cy - $width * $sinangle;
						$xi = $cx+$x - $x_;
						$yi = $cy+$y - $y_;
					}
					else {
						$x_ = $cx + $width * $cosangle;
						$y_ = $cy + $width * $sinangle;
						$xi = $cx-$x - $x_;
						$yi = $cy-$y - $y_;
					}

					$len = sqrt($xi*$xi + $yi*$yi);

					$xi = $xi/$len * 20;
					$yi = $yi/$len * 20;

					$xj1 = $xi * 0.707106781 - $yi * 0.707106781;
					$yj1 = $xi * 0.707106781 + $yi * 0.707106781;

					$xj2 = $xi * 0.707106781 + $yi * 0.707106781;
					$yj2 = - $xi * 0.707106781 + $yi * 0.707106781;

					imagefilledpolygon($source, array($x_,$y_,$x_+$xj1,$y_+$yj1,$x_+$xj2,$y_+$yj2), 3, $color);
				}

				if ($direcao == 1) {
					imageline($source, $cx+$px, $cy+$py, $cx+$x, $cy+$y, $color);
					if ($angle == 90)
						$labels[] = array($source, $cx+$px, $cy+$py, $valor);
				}
				else {
					imageline($source, $cx-$px, $cy-$py, $cx-$x, $cy-$y, $color);
					if ($angle == 90)
						$labels[] = array($source, $cx-$px, $cy-$py, $valor);
				}

				$px=$x;
				$py=$y;
			}
		}

		function desenhaLinha($source, $prev_lon, $prev_lat, $lon, $lat, $color, $valor) {
			global $labels;

			if ($prev_lon == $lon && $prev_lat == $lat) {
				$size = 50;
				imagearc($source, $prev_lon - $size/2, $prev_lat - $size/2, $size, $size, 0, 359.9, $color);
				$labels[] = array($source, $prev_lon, $prev_lat-$size/1.5, $valor);

				$x_ = $prev_lon;
				$y_ = $prev_lat;
				$xi = $cx-$x - $x_;
				$yi = $cy-$y - $y_;

				$len = sqrt($xi*$xi + $yi*$yi);

				$xi = $xi/$len * 20;
				$yi = $yi/$len * 20;

				$xj1 = $xi * 0.707106781 - $yi * 0.707106781;
				$yj1 = $xi * 0.707106781 + $yi * 0.707106781;

				$xj2 = $xi * 0.707106781 + $yi * 0.707106781;
				$yj2 = - $xi * 0.707106781 + $yi * 0.707106781;

				imagefilledpolygon($source, array($x_,$y_,$x_+$xj1,$y_+$yj1,$x_+$xj2,$y_+$yj2), 3, $color);
			}
			else {
				$c_lon = ($prev_lon + $lon) / 2;
				$c_lat = ($prev_lat + $lat) / 2;

				$w = sqrt(($prev_lon - $lon)*($prev_lon - $lon) + ($prev_lat - $lat)*($prev_lat - $lat))/2;

				$h = $w/3;

				if ($prev_lon < $lon) {
					if ($prev_lat < $lat)
						$ang_final = rad2deg(acos(($lon - $c_lon)/$w));
					else if ($prev_lat == $lat)
						$ang_final = 360;
					else if ($prev_lat > $lat)
						$ang_final = rad2deg(-acos(($lon - $c_lon)/$w));
				}
				else if ($prev_lon == $lon) {
					if ($prev_lat < $lat)
						$ang_final = 90;
					else if ($prev_lat > $lat)
						$ang_final = 270;
				}
				else if ($prev_lon > $lon) {
					if ($prev_lat < $lat)
						$ang_final = rad2deg(acos(($lon - $c_lon)/$w));
					else if ($prev_lat == $lat)
						$ang_final = 180;
					else if ($prev_lat > $lat)
						$ang_final = rad2deg(-acos(($lon - $c_lon)/$w));
				}

				if ($ang_final)
					rotatedellipse($source, $c_lon, $c_lat, $w, $h, $ang_final, 2, $color, $valor);
			}
		}

		$coord[350100] = array(800,220);
		$coord[350560] = array(360,330);
		$coord[350590] = array(690,110);
		$coord[350780] = array(660,230);
		$coord[350940] = array(840,380);
		$coord[351090] = array(930,380);
		$coord[351310] = array(580,410);
		$coord[351460] = array(430,350);
		$coord[351860] = array(280,440);
		$coord[351885] = array(430,480);
		$coord[352430] = array(250,320);
		$coord[352510] = array(530,180);
		$coord[352760] = array(540,540);
		$coord[353130] = array(100,350);
		$coord[353950] = array(280,190);
		$coord[354020] = array(390,180);
		$coord[354090] = array(370,400);
		$coord[354340] = array(530,330);
		$coord[354625] = array(760,380);
		$coord[354750] = array(700,640);
		$coord[354760] = array(800,520);
		$coord[354790] = array(910,270);
		$coord[355090] = array(680,500);
		$coord[355140] = array(690,400);
		$coord[355150] = array(655,335);
		$coord[355170] = array(420,270);

	
			
		if ($resultFinal == null){  
				//Mensagem de aviso: fluxo não encontrado - saída de dados em forma de mapa

				$source = imagecreatefromgif('C:/wamp64/www/mentalHealthObservatory/webroot/img/msgmaviso_ferramentafluxo.gif');
				imagepng($source);
		}
		else{
			$source = @imagecreatefromgif('mapa_regiao.gif');
			imagesetthickness($source, 3);

			$blue = imagecolorallocate($source, 0, 0, 255);
			$gray = imagecolorallocate($source, 128, 128, 128);
			$black = imagecolorallocate($source, 0, 0, 0);
			$white = imagecolorallocate($source, 255, 255, 255);

			$grad_color[1] = imagecolorallocate($source, 132, 132, 132);
			$grad_color[2] = imagecolorallocate($source, 99, 255, 99);
			$grad_color[3] = imagecolorallocate($source, 33, 192, 33);
			$grad_color[4] = imagecolorallocate($source, 255, 231, 66);
			$grad_color[5] = imagecolorallocate($source, 255, 132, 0);
			$grad_color[6] = imagecolorallocate($source, 231, 66, 66);
			$grad_color[7] = imagecolorallocate($source, 132, 33, 33);

			$cos = 0.707106781;
			$sin = 0.707106781;

			$max = 0;
			

			if ($resultFinal != null) {
				$valor = count($resultFinal);
				for ($i=0; $i < count($resultFinal); $i++) { 

					if ($resultFinal[$i][0] != $resultFinal[1])
						$nivel = ceil($resultFinal[$i][2]*6/count($resultFinal))+1;
					else
						$nivel = 1;

					desenhaLinha($source, $coord[$resultFinal[$i][0]][0], $coord[$resultFinal[$i][0]][1], 
						$coord[$resultFinal[$i][1]][0], $coord[$resultFinal[$i][1]][1], $grad_color[$nivel], $valor);
				}

			}
				/*foreach ($resultFinal as $cod_mnibge_alta => $demanda2) {
					if ($demanda2 != null) {
						foreach ($demanda2 as $cod_mnibge_hosp => $valor) {

							if ($cod_mnibge_alta != $cod_mnibge_hosp)
								$nivel = ceil($valor*6/$max)+1;
							else
								$nivel = 1;

							desenhaLinha($source, $coord[$cod_mnibge_alta][0], $coord[$cod_mnibge_alta][1], $coord[$cod_mnibge_hosp][0], $coord[$cod_mnibge_hosp][1], $grad_color[$nivel], $valor);
						}
					}
				}
				

				foreach ($labels as $label)
					drawText($label[0], $label[1], $label[2], $label[3]);

				if ($label_fora_drs13)
					drawText($source, 0, 23, '                Fora do DRS XIII');
				*/
			header("Content-Type: image/png");
			imagepng($source);
		}
			
	} //fim construção do mapa 
	
		else {
			echo"<!-- Início descricao da ferramenta -->
			<div id='descricao'>
			<div style='text-align: justify; margin-right: 30px' id='descricao'>
			<h1> Fluxo de Altas </h1>
			<p><b>Descrição:</b> A ferramenta de Fluxo de Altas provê a visualização do número de altas que cada hospital ou município faz de acordo com a procedência do paciente por meio de mapas e/ou tabelas.</p>
			<p><b>Operações Realizáveis pelo Usuário:</b> O usuário pode especificar o mês e o ano de referência dos dados e filtrar as informações de acordo com: 
			<ul>
			<li> A origem e o destino das internações;</li>
			<li> O(s) capítulo(s) CID envolvido(s);</li>  
			<li> A faixa etária e o sexo do paciente;</li> 
			<li> A condição de saída do paciente.</ul></p>
			</div>
			</div>
			<!-- Fim descricao da ferramenta --> 
			";
		}
	
?>
	</div>

<script>
jQuery(document).ready(function($) {
	$('#painelFiltro').height($('#painelFiltro').height()-$('#header').outerHeight()-10);
	$('#output').height($('#output').height()-$('#header').outerHeight()-10);
});
</script>
</body>
</html>