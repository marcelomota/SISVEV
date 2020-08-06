<?php 

defined('_JEXEC') or die;
require_once dirname(__FILE__) . '/helper.php';

if (isset($_POST['OK']))
{
	$numeroDN = $_POST['numeroDN'];
    $locnasc = $_POST['locnasc'];

    $nomeEstab = $_POST['codestab'];
    //captura a descrição do estabelecimento e retorna o código correspondente
    $codestab = ModBusca::getCodigoEstabSaude($nomeEstab);
    $codbainasc = $_POST['cep'];
    //função responsável por buscar o código correspondente a cidade
    $codcidadeOcor = ModBusca::getCodigoCidade($_POST['codmunicipio']);
    $idadeMae = $_POST['idademae'];
    $estadoCvlMae = $_POST['estadoCvlMae'];

    $escol = $_POST['escol'];
    //função responsável por converter a descrição no código equivalente
    $codocupmae =  ModBusca::getCodigoOcupMae($_POST['codocupmae']);

    $qtdfilvivo = $_POST['qtdfilvivo'];

    $qtdfilmort = $_POST['qtdfilmort'];

    $codbaires = $_POST['codbaires'];
    $codmunres = ModBusca::getCodigoCidade($_POST['codmunres']);

    $gestacao = $_POST['gestacao'];

    $gravidez = $_POST['gravidez'];

    $parto = $_POST['parto'];

    $consultas = $_POST['consultas'];

    $dtnasc = $_POST['dtnasc'];

    $horanasc = $_POST['horanasc'];
    $sexo = $_POST['sexo'];

    $apgar1 = $_POST['apgar1'];
    $apgar5 = $_POST['apgar5'];

    $racacor = $_POST['racacor'];
    $peso = $_POST['peso'];

    $idanomal = $_POST['idanomal'];
    //CAPTURA A DESCRIÇÃO E CONVERTE NO CÓDIGO CORRESPONDENTE
    $codanomal = ModBusca::getCodigoAnomalia($_POST['codanomal']);

    $datacadastroSistema = date('d/m/Y');
    $dataRecebimentoSistema = $datacadastroSistema;
    //FUNÇÃO QUE RETORNA O CÓDIGO DO ESTABELECIMENTO QUE PREENCHEU AS INFORMAÇÕES
    $codinst = ModBusca::getCodigoEstabSaude( $_POST['codinst']);
    //função que captura a sigla da uf e retorna o código equivalente equivalente
    $ufinform = ModBusca::getCodigoUf($_POST['ufinform']);

    
    $resultado = ModBusca::cadastrar($numeroDN,$locnasc,$codestab,$codbainasc,$codcidadeOcor,$idadeMae,$estadoCvlMae,$escol,$codocupmae,$qtdfilvivo,$qtdfilmort,$codbaires,$codmunres,$gestacao,$gravidez,$parto,$consultas,$dtnasc,$horanasc,$sexo,$apgar1,$apgar5,$racacor,$peso,$idanomal,$codanomal,$datacadastroSistema,$dataRecebimentoSistema,$codinst,$ufinform);
	
	echo "cadastrado com SUCESSO";
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
    NÚMERO DA DECLARAÇÃO DE NASCIMENTO: <input type=text maxlength="8" name="numeroDN"><br>
</div>
<div>
TIPO DE ESTABELECIMENTO ONDE OCORREU O NASCIMENTO
<select name="locnasc">
<option value="1"> Hospital</option>
<option value="2">Outro Estab Saúde</option>
<option value="3">Domicílio</option>
<option value="4">Outros</option>
<option value="9">Ignorado</option>
</select>
</div>
<div>
    CEP LOCAL DE NASCIMENTO: <input type=text maxlength="8" name="cep"><br>
</div>
<div>
SELECIONE O ESTABELECIMENTO DE SAÚDE
<select name="codestab">
  
	<?php 
	defined('_JEXEC') or die;
//FUNÇÃO RESPONSÁVEL POR EXIBIR AS DESCRIÇÕES CONTIDAS NO BANCO DE DADOS
	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descestab')//('cod_cep','sigla_uf','cod_municipio')
    ->from($conn->quoteName('cnesdn18'))
    ->order($conn->quoteName('descestab') . 'ASC');
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
SELECIONE O MUNCÍPIO DO ESTABELECIMENTO DE SAÚDE
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
IDADE DA MÃE<input type="text" maxlength="2" name="idademae">
</div>
<div>
ESTADO CÍVIL DA MÃE
<select name="estadoCvlMae">
<option value="1">Solteira</option>
<option value="2">Casada</option>
<option value="3">Viúva</option>
<option value="4">Separado judicialmente/Divorciado</option>
<option value="9">Ignorado</option>
</select>
</div>
<div>
ESCOLARIDADE
<select name="escol">
<option value="1">Nenhuma</option>
<option value="2">1 a 3 anos</option>
<option value="3">4 a 7 anos</option>
<option value="4">8 a 11 anos</option>
<option value="5">12 anos ou mais</option>
<option value="9">Ignorado</option>
</select>
</div>
<div>
SELECIONE A OCUPAÇÃO DA MÃE
<select name="codocupmae">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('ds_cbo')//('cod_cep','sigla_uf','cod_municipio')
    ->from($conn->quoteName('cbo2002'))
    ->order($conn->quoteName('ds_cbo') . 'ASC');
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
QUANTIDADE DE FILHOS VIVOS
<input type="text" maxlenght="2" name="qtdfilvivo">
</div>

<div>
QUANTIDADE DE FILHOS FALECIDOS
<input type="text" maxlenght="2" name="qtdfilmort">
</div>

<div>
CEP DA RESIDÊNCIA DA MÃE: <input type=text maxlength="8" name="codbaires"><br>
</div>
<div>
SELECIONE O MUNCÍPIO DE RESIDÊNCIA DA MÃE
<select name="codmunres">
  
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
QUANTIDADE DE CONSULTAS DE PRÉ-NATAL
<select name="consultas">
<option value="1">Nenhuma</option>
<option value="2">1 a 3</option>
<option value="3">4 a 6</option>
<option value="4">7 ou mais</option>
<option value="9">Ignorado</option>
</select>
</div>
<div>
DATA DO NASCIMENTO
<input type="date" name="dtnasc">
</div>
<div>
HORA DO NASCIMENTO
<input type="text" name="horanasc">
</div>
<div>
SEXO
<select name="sexo">
<option value="1">Masculino</option>
<option value="2">Feminino</option>
<option value="9">Ignorado</option>
</select>
</div>

<div>
APGAR NO PRIMEIRO MINUTO
<input type="text" maxlenght="2" name="apgar1">
</div>
<div>
APGAR NO QUINTO MINUTO
<input type="text" maxlenght="2" name="apgar5">
</div>
<div>
RAÇA/COR
<select name="racacor">
    <option value="1">Branca</option>
    <option value="2">Preta</option>
    <option value="3">Amarela</option>
    <option value="4">Parda</option>
    <option value="5">Indígena</option>
</select>
</div>

<div>
PESO EM GRAMAS
<input type="text" maxlenght="4" name="peso">
</div>
<div>
POSSUÍ ANÔMALIA CONGÊNITA?
<select name="idanomal" onchange="verifica(this.value)">
    <option value="1">Sim</option>
    <option value="2">Não</option>
    <option value="9">Ignorado</option>
</select>
</div>
<script>
    //Script de verificação de marcação de atributo
    function verifica(value){
	var input = document.getElementById("codanomal");
    

  if(value == 1){
    input.disabled = false;
  }else if(value >= 2 ){
    input.disabled = true;
  }
};
</script>
<div>
ANOMALIA
<select name="codanomal" id="codanomal">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descr')//('cod_cep','sigla_uf','cod_municipio')
    ->from($conn->quoteName('cid10'))
    ->order($conn->quoteName('descr') . 'ASC');
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
SELECIONE O ESTABELECIMENTO DE REGISTRO
<select name="codinst">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('descestab')//('cod_cep','sigla_uf','cod_municipio')
    ->from($conn->quoteName('cnesdn18'))
    ->order($conn->quoteName('descestab') . 'ASC');
 // Reset the query using our newly populated query object.
    	$conn->setQuery($query);
        $count = $conn->loadColumn();
        
		foreach	($count as $indice){
            echo "<option value=\"".$indice."\"".">"."$indice"."</option>";
            
			
        }
        
        
        
		

    ?>
</select>
</div>

SELECIONE A UF QUE INFORMOU O REGISTRO
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
</div>
<input type=submit name="OK" value="OK">
</form>
</body>
</html>


