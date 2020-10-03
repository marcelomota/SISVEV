<?php 

defined('_JEXEC') or die;
require_once dirname(__FILE__) . '/helper.php';
Jhtml::_('jquery.framework');

if (isset($_POST['OK']))
{
	$nome = $_POST['nome'];
	$tipobito = ModCadastroSim::getCodigoTipObito($_POST['tipobito']);
	$dtobito = implode('',explode("-",$_POST['dtobito']));
	$horaobito = $_POST['horaobito'];
	$naturalidade = ModCadastroSim::getCodigoPais($_POST['naturalidade']);
	//a função recebe a naturalidade para verificar  se o país é diferente do Brasil, caso seja retorna 0 para o municipio
	$cidade = ModCadastroSim::getCodigoCidade($_POST['codmunicipio'],$naturalidade);
	//deixa a data no formato desejado
	$nasc = implode('',explode("-",$_POST['nasc']));
	$idade =$_POST['idade1'].$_POST['idade2'];
	$sexo = $_POST['sexo'];
	$racacor = $_POST['racacor'];
	$estciv = $_POST['estciv'];
	$esc2010 = $_POST['esc2010'];
	$seriescfal = $_POST['seriescfal'];
	//CAPTURA A DESCRIÇÃO E RETORNA O CÓDIGO EQUIVALENTE DA OCUPAÇÃO
	$cbo = ModCadastroSim::getCodigoCbo($_POST['cbo']);
	$codemunres= ModCadastroSim::getCodigoCidade($_POST['codmunicipiores'],$naturalidade);
	$lococor = $_POST['lococor'];
	$muniocor = ModCadastroSim::getCodigoCidade($_POST['codmunicipioobito'],$naturalidade);

	$idademae = $_POST['idademae'];

	$escmae2010 = $_POST['escmae2010'];

	$seriescmae = $_POST['seriescmae'];
//captura o código equivalente a seleção
	$ocupmae = ModCadastroSim::getCodigoCbo($_POST['ocupmae']);

	$qtdfilvivo = $_POST['qtdfilvivo'];
	$qtdfilmorto = $_POST['qtdfilmorto'];

	$gestacao = $_POST['gestacao'];

	$gravidez = $_POST['gravidez'];

	$parto = $_POST['parto'];

	$obitoparto = ModCadastroSim::getCodigoObitoParto($_POST['obitoparto']);
	$peso = $_POST['peso'];

	$numerodn = $_POST['numerodn'];
//codigo referente a morte
	$tpmorteoco = ModCadastroSim::getCodigoTpMorteOco($_POST['tpmorteoco']);

	$assistmed = ModCadastroSim::getCodigoAssistMed($_POST['assistmed']);

	$necropsia = ModCadastroSim::getCodigoOpcao($_POST['necropsia']);
	$linhaa = ModCadastroSim::getCodigoCid10($_POST['linhaa']);
	$linhab = ModCadastroSim::getCodigoCid10($_POST['linhab']);
	$linhac = ModCadastroSim::getCodigoCid10($_POST['linhac']);
	$linhad = ModCadastroSim::getCodigoCid10($_POST['linhad']);
	$linhaii = ModCadastroSim::getCodigoCid10($_POST['linhaii']);

	$circobito = ModCadastroSim::getCodigoCircObito($_POST['circobito']);
	$acidtrab = ModCadastroSim::getCodigoOpcao($_POST['acidtrab']);
	$fonte = ModCadastroSim::getCodigoFonte($_POST['fonte']);

	$origem = "1";

	$esc = ModCadastroSim::getCodigoEsc($_POST['esc']);
	$escmae = ModCadastroSim::getCodigoEsc($_POST['escmae']);

	$obitograve = ModCadastroSim::getCodigoOpcao($_POST['obitograve']);

	$obitopuerp = ModCadastroSim::getCodigoTpMorteOco($_POST['obitopuerp']);

	$exame = ModCadastroSim::getCodigoOpcao($_POST['exame']);
	$cirurgia = ModCadastroSim::getCodigoOpcao($_POST['cirurgia']);

	$causabas_o = ModCadastroSim::getCodigoCid10($_POST['causabas_o']);
	$causabas = ModCadastroSim::getCodigoCid10($_POST['causabas']);
	$numerolote =  implode('',explode(":",date('H:i:s:u')));

	$dtinvestig = implode('',explode("-",$_POST['dtinvestig']));

	$dtcadastro = implode('',explode("-",$_POST['dtcadastro']));

	$stcodifica = "N";

	$codifica = "S";

	$vrsist = "0000000";
	$vrscb = "0000000";

	$fonteinv = $_POST['fonteinv'];

	$dtrecebim1 = $dtcadastro;

	$atestado = $_POST['atestado'];

	$dtrecoriga = $dtrecebim1;

	$causamat = ModCadastroSim::getCodigoCid10($_POST['linhac']);

	$escmaeagr1= ModCadastroSim::getCodigoEsc2010At($_POST['escmaeagr1']);
	$escfalagr1= ModCadastroSim::getCodigoEsc2010At($_POST['escfalagr1']);

	$stdoepidem = "1";
	$stdonova="01";

	$difdata = $dtrecoriga - $dtobito;
	//variavel aux e aux1 para calculo automatico das datas em números de dias
	$aux=implode('',explode("-",$_POST['dtobito']));
	$aux1=implode('',explode("-",$_POST['dtinvestig']));
	$nudiasobco= (int)$aux[0] +((int)$aux[1]*30) +((int)$aux[2]*365) + (int)$aux1[0] + ((int)$aux1[1]*30)+ ((int)$aux[2]*365);

	$dtcadinv = implode('',explode("-",$_POST['dtcadinv']));

	$tpobitocor = ModCadastroSim::getCodigoTpObitOcor($_POST['tpobitocor']);
	$dtconinv = implode('',explode("-",$_POST['dtconinv']));

	$fontes = ModCadastroSim::setFontes("","","","","","");

	$tpresginfo = "01";//ModCadastroSim::getCodigoTpResGInf($_POST['tpresginfo']);
	$tpnivelinv="M";

	$dtcadinf = implode('',explode("-",$_POST['dtcadinf']));

	$morteparto = ModCadastroSim::getCodigoMorteParto($_POST['morteparto']);

	$dtconcaso= implode('',explode("-",$_POST['dtconcaso']));;

	$altcausa = ModCadastroSim::getCodigoOpcao($_POST['altcausa']);

	$tppos = "1";

	$gestacao2 = $_POST['gestacao2'];

	$cb_pre = ModCadastroSim::getCodigoCid10($_POST['cb_pre']);

	if (empty($_POST['gestacao2'])) {
		// Trata caso e atribui um valor para evitar erros
		$numero = 0;
	}

	$resultado = ModCadastroSim::cadastrar($nome,$tipobito,$dtobito,$horaobito,$naturalidade,$cidade,$nasc,$idade,$sexo,
	$racacor,$estciv,$esc2010,$seriescfal,$cbo,$codemunres,$lococor,$muniocor,$idademae,$escmae2010,$seriescmae,$ocupmae,
	$qtdfilvivo,$qtdfilmorto,$gestacao,$gravidez,$parto,$obitoparto,$peso,$numerodn,$tpmorteoco,$assistmed,$necropsia,$linhaa,
	$linhab,$linhac,$linhad,$linhaii,$circobito,$acidtrab,$fonte,$origem,$esc,$escmae,$obitograve,$obitopuerp,$exame,$cirurgia,
	$causabas_o,$causabas,$numerolote,$dtcadastro,$stcodifica,$codifica,$vrsist,$vrscb,$fonteinv,$dtrecebim1,$atestado,$dtrecoriga,
	$causamat,$escmaeagr1,$escfalagr1,$stdoepidem,$stdonova,$difdata,$nudiasobco,$dtcadinv,$tpobitocor,$dtconinv,$fontes,
	$tpnivelinv,$dtcadinf,$morteparto,$dtconcaso,$altcausa,$tppos,$gestacao2,$cb_pre);
	echo "cadastrado";
}

 ?>
 <!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"method="post" accept-charset="utf-8">
<div>
<div>
I - IDENTIFICAÇÃO



<div>
NOME: <input type=text maxlength="255" name="nome"><br>
DATA DO ÓBITO: <input type=date  maxlength="8"name="dtobito"><br>
HORA QUE OCORREU O ÓBITO: <input type=text maxlength="5"name="horaobito"><br>
</div>
<div>
SELECIONE A NATURALIDADE
<select name="naturalidade">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('tabpais'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>
</div>
<div>
SELECIONE O MUNICÍPIO DE NATURALIDADE
<select name="codmunicipio">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('desc_municipio')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_municipio'))
	->order($conn->quoteName('desc_municipio') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
DATA DE NASCIMENTO DO FALECIDO: <input type=date maxlength="8"name="nasc"><br>
</div>
<div>
	SELECIONE O FORMATO DA IDADE
	<select name="idade1" onchange="verifica(this.value)">
		
		<option value="1">1. Minutos</option>
		<option value="2">2. Horas</option>
		<option value="3">3. Meses</option>
		<option value="4">4. Anos</option>
		<option value="5">5. 100 anos ou mais</option>
		<option value="9">Ignorado</option>
		
	</select>
	<script>
    //Script de verificação de marcação de atributo em idade
    function verifica(value){
	var input = document.getElementById("idade2");
	var inputdiv = document.getElementById("IV").getElementsByTagName('*');
    
//desativa os campos
  if(value == 9){
    input.disabled = true;
	
  }
  if(value >=4){
	for(var i=0; i< inputdiv.length; i++){
		inputdiv[i].disabled = true;
	  }
  }
  else{
    input.disabled = false;
	for(var i=0; i< inputdiv.length; i++){
		inputdiv[i].disabled = false;
	  }
  }
};
</script>
<div>
	INFORME OS VALORES CORRESPONDENTES<input name="idade2" id="idade2" type="text" maxlength="2">
</div>
</div>
<div>
SEXO
	<select name="sexo">
		
		<option value="1">MASCULINO</option>
		<option value="2">FEMININO</option>
		<option value="9">IGNORADO</option>
		
	</select>
</div>
<div>
SELECIONE A RAÇA/COR
	<select name="racacor">
		
		<option value="1">BRANCA</option>
		<option value="2">PRETA</option>
		<option value="3">AMARELA</option>
		<option value="4">PARDA</option>
		<option value="5">INDIGENA</option>
		
		
	</select>
</div>
<div>
SELECIONE O ESTADO CÍVIL
	<select name="estciv">
		
		<option value="1">SOLTEIRO</option>
		<option value="2">CASADO</option>
		<option value="3">VIÚVO</option>
		<option value="4">SEPARADO JUDICIALMENTE/DIVORCIADO</option>
		<option value="9">IGNORADO</option>
		
		
	</select>
</div>
ESCOLARIDADE - NÍVEL
	<select name="esc2010">
		
		<option value="0">SEM ESCOLARIDADE</option>
		<option value="1">FUNDAMENTAL I(1ª a 4ª série)</option>
		<option value="2">FUNDAMENTAL II(5ª a 8ª série)</option>
		<option value="3">ENSINO MÉDIO(Antigo 2º grau)</option>
		<option value="4">SUPERIOR INCOMPLETO</option>
		<option value="5">SUPERIOR COMPLETO</option>
		<option value="9">IGNORADO</option>
		
		
	</select>
</div>
<div>
ESCOLARIDADE (última série
concluída) - SÉRIE
	<input name="seriescfal" maxlength="1"type="text">
</div>
<div>
SELECIONE A OCUPAÇÃO
<select name="cbo">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('ds_cbo')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('cbo2002'))
	->order($conn->quoteName('cbo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

	?>
	</select>
</div>
</div>

</div>












<div>
II - RESIDÊNCIA
<div>
SELECIONE O MUNICÍPIO DE RESIDÊNCIA
<select name="codmunicipiores">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('desc_municipio')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_municipio'))
	->order($conn->quoteName('desc_municipio') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>
</div>
</div>


























<div>
III - OCORRÊNCIA

<div>
	

	SELECIONE O TIPO DE ÓBITO
<select name="tipobito">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_tipobito'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

	?>
	</select>
	
	SELECIONE A UF
<select name="ufinform">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('sigla_uf')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_uf'))
	->order($conn->quoteName('sigla_uf') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
		
		
        
        
		

    ?>
</select>
<div>
SELECIONE O LOCAL DE OCORRÊNCIA DO OBITO
	<select name="lococor">
		
		<option value="1">HOSPITAL</option>
		<option value="2">OUTROS ESTABELECIMENTOS DE SAÚDE</option>
		<option value="3">DOMÍCILIO</option>
		<option value="4">VIA PÚBLICA</option>
		<option value="5">OUTROS</option>
		<option value="6">ALDEIA INDÍGENA</option>
		<option value="9">IGNORADO</option>
		
		
	</select>
</div>
<div>
SELECIONE O MUNICÍPIO QUE OCORREU O ÓBITO 
<select name="codmunicipioobito">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('desc_municipio')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_municipio'))
	->order($conn->quoteName('desc_municipio') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>
</div>

</div>























<div id="IV">
IV - FETAL OU MENOR QUE 1 ANO
<div>
IDADE DE MÃE <input type="text" maxlength="2" name="idademae">
</div>
<div>
ESCOLARIDADE DA MÃE - NÍVEL
	<select name="escmae2010">
		
		<option value="0">SEM ESCOLARIDADE</option>
		<option value="1">FUNDAMENTAL I(1ª a 4ª série)</option>
		<option value="2">FUNDAMENTAL II(5ª a 8ª série)</option>
		<option value="3">ENSINO MÉDIO(Antigo 2º grau)</option>
		<option value="4">SUPERIOR INCOMPLETO</option>
		<option value="5">SUPERIOR COMPLETO</option>
		<option value="9">IGNORADO</option>
		
		
	</select>
</div>
<div>
ÚLTIMA SÉRIE ESCOLAR CONCLUIDA PELA MÃE(1, 2 OU 3)<input type="text" maxlength="1" name="seriescmae">
</div>
<div>
SELECIONE A OCUPAÇÃO DA MÃE
<select name="ocupmae">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('ds_cbo')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('cbo2002'))
	->order($conn->quoteName('cbo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

	?>
	</select>
</div>
<div>
QUANTIDADE DE FILHOS VIVOS <input type="text" maxlength="2" name="qtdfilvivo">
</div>
<div>
QUANTIDADE DE FILHOS FALECIDOS (NÃO INCLUIR O PREENCHIDO NO RESPECTIVO DO) <input type="text" maxlength="2" name="qtdfilmorto">
</div>
<div>
TEMPO DE GESTAÇÃO
<select name="gestacao">
<option value="1">Menos de 22 semanas</option>
<option value="2">22 a 27 semanas</option>
<option value="3">28 a 31 semanas</option>
<option value="4">32 a 36 semanas</option>
<option value="5">37 a 41 semanas</option>
<option value="6">42 semanas ou mais</option>
<option value="9">Ignorado</option>
</select>
</div>
<div>
GRAVIDEZ
<select name="gravidez">
<option value="1">Única</option>
<option value="2">Dupla</option>
<option value="3">Tripla ou mais</option>
<option value="9">Ignorado</option>
</select>
</div>


<div>
PARTO
<select name="parto">
<option value="1">Vaginal</option>
<option value="2">Cesário</option>
<option value="9">Ignorado</option>
</select>
</div>

<div>
SELECIONE A MORTE EM RELAÇÃO AO PARTO
<select name="obitoparto">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_obitoparto'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>
</div>
<div>
PESO EM GRAMAS<input type="text" maxlength="4" name="peso">
</div>
<div>
NÚMERO DA DN<input type="text" maxlength="8" name="numerodn">
</div>

</div>

























<div>
V - CONDIÇÕES E CAUSAS DO ÓBITO
<div>
A MORTE OCORREU:
<select name="tpmorteoco">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_tpmorteoco'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>
</div>
<div>
HOUVE ASSISTÊNCIA MÉDICA
<select name="assistmed">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_assistimed'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
NECRÓPSIA
<select name="necropsia">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_simnao'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
CAUSA TERMINAL
<select name="linhaa">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('cid10'))
	->order($conn->quoteName('cid10') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
CAUSA ANTECEDENTE OU CONSEQUÊNCIAL
<select name="linhab">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('cid10'))
	->order($conn->quoteName('cid10') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
CAUSA ANTECEDENTE OU CONSEQUÊNCIAL
<select name="linhac">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('cid10'))
	->order($conn->quoteName('cid10') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
CAUSA BÁSICA
<select name="linhad">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('cid10'))
	->order($conn->quoteName('cid10') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
CAUSA CONTRIBUINTE
<select name="linhaii">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('cid10'))
	->order($conn->quoteName('cid10') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>

</div>





























<div>
VI - CAUSAS EXTERNAS

<div>
CIRCUNSTÂNCIA DO ÓBITO
<select name="circobito">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_circobito'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>

<div>
ACIDENTE DE TRABALHO
<select name="acidtrab">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_simnao'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>

<div>
FONTE DA INFORMAÇÃO
<select name="fonte">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_fonte'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
</div>























<div>
VII - FICHA DE INVESTIGAÇÃO MATERNA OU INFANTIL	
<div>

<div>
ESCOLARIDADE(DO ANTIGA)
<select name="esc">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_escmae'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
ESCOLARIDADE DA MÃE(DO ANTIGA)
<select name="escmae">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_escmae'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>

<div>
ÓBITO NA GRAVIDEZ
<select name="obitograve">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_simnao'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
ÓBITO NO PUÉRPERIO
<select name="obitopuerp">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_tpmorteoco'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>
</div>
<div>
EXAME
<select name="exame">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_simnao'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
CIRURGIA
<select name="cirurgia">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_simnao'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
CAUSA BÁSICA INFORMADA ANTES DA RESSELEÇÃO
<select name="causabas_o">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('cid10'))
	->order($conn->quoteName('cid10') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
CAUSA BÁSICA DA DO
<select name="causabas">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('cid10'))
	->order($conn->quoteName('cid10') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>

<div>
DATA DA INVESTIGAÇÃO DO ÓBITO: <input type=date maxlength="8"name="dtinvestig"><br>
</div>
<div>
DATA DO CADASTRO DO ÓBITO: <input type=date maxlength="8"name="dtcadastro"><br>
</div>

<div>
FONTE DE INVESTIGAÇÃO
<select name="fonteinv">
  
	<option value='1'>Comitê de Morte Materna e/ou
Infantil</option>
	<option value='2'>Visita domiciliar /
Entrevista família</option>
	<option value='3'>Estabelecimento de Saúde /
Prontuário</option>
	<option value='4'>Relacionado com
outros bancos de dados</option>
	<option value='5'>S V O</option>
	<option value='6'>I M L</option>
	<option value='7'>Outra fonte</option>
	<option value='8'>Múltiplas fontes</option>
	<option value='9'>Ignorado</option>
</select>

</div>
<div>
ATESTADO
<input type="text" name="atestado" maxlength="70">
</div>

<div>
ESCOLARIDADE DA MÃE AGREGADA
<select name="escmaeagr1">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_esc2010at'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
ESCOLARIDADE DA MÃE AGREGADA
<select name="escfalagr1">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_esc2010at'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
<div>
DATA DO CADASTRO DE INVESTIGAÇÃO
<input type="date" name="dtcadinv"></div>

<div>
MOMENTO DA OCORRÊNCIA DO ÓBITO
<select name="tpobitocor">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_tpobitocor'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>
</div>

<div>
DATA DA CONCLUSÃO DE INVESTIGAÇÃO
<input type="date" name="dtconinv">
</div>

<div>
DATA DA REALIZAÇÃO DA INVESTIGAÇÃO
<input type="date" name="dtcadinf">
</div>

<div>
ÓBITO NO PUÉRPERIO
<select name="morteparto">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_obitoparto'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>
</div>
<div>
DATA DE CONCLUSÃO DO CASO
<input type="date" name="dtconcaso">
</div>
<div>
HOUVE CORREÇÃO OU ALTERAÇÃO APÓS A INVESTIGAÇÃO: 
<select name="altacausa">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('sisvev_simnao'))
	->order($conn->quoteName('codigo') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>
</div>

<div>
FAIXAS DE SEMANAS DA GESTAÇÃO
<select name="gestacao2">
<option value="1">Menos de 22 semanas</option>
<option value="2">22 a 27 semanas</option>
<option value="3">28 a 31 semanas</option>
<option value="4">32 a 36 semanas</option>
<option value="5">37 a 41 semanas</option>
<option value="6">42 semanas ou mais</option>
<option value="9">Ignorado</option>
</select>
</div>

<div>
CAUSA BÁSICA INFORMADA ANTES DA RESSELEÇÃO
<select name="cb_pre">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
	->from($conn->quoteName('cid10'))
	->order($conn->quoteName('cid10') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>

</div>
</div>
</div>


</div>

<!--<input type="hidden" value="$previous" />-->
<input type=submit name="OK" value="OK">
</form>
</body>
</html>


