<?php 

defined('_JEXEC') or die;
require_once dirname(__FILE__) . '/helper.php';
require_once dirname(__FILE__) . '/completar.php';

//JHtml::_('bootstrap.framework');
//JHtml::_('stylesheet', 'bootstrap.min.css', ['version' => 'auto', 'relative' => true]);
JHtml::_('jquery.framework');
use Joomla\CMS\Factory;
$document = Factory::getDocument();
$document->addStyleSheet(JURI::base().'modules/mod_siab_a/tmpl/css/materialize.css');
$document->addStyleSheet(JURI::base().'modules/mod_siab_a/tmpl/css/imgconfig.css');
$document->addScript(JURI::base().'modules/mod_siab_a/tmpl/js/materialize.js');
$resultBusca;

if (isset($_POST['OK']))
{
	$novoNome = $_POST['nome'];
	$dtnasc = $_POST['dtnasc'];
	$estcivil = $_POST['estcivil'];
	$escol = $_POST['escol'];
	$logradouro = $_POST['logradouro'];
	$numero = $_POST['numero'];
	$complemento = $_POST['complemento'];
	$cep = $_POST['cep'];
	$bairro =$_POST['bairro'];
	$cidade = ModAttSiab::getCodigoCidade($_POST['codmunicipio']);
	$uf= $_POST['ufinform'];
    
	$resultado = ModAttSiab::atualizar($novoNome,$dtnasc,$estcivil,$escol,$logradouro,$numero,$complemento,$cep,$bairro,$cidade,$uf);
	$controle = ModAttSiab::insertControle($novoNome);
	echo "Atualização realizada";
}
if(isset($_POST['BUSCAR'])){
	$busca = $_POST['nomeBusca'];
	$resultBusca = ModAttSiab::completar($busca);

	

}

 ?>
 <!DOCTYPE html>
<html>
<head>
<jdoc:include type="head" />
    </head>
<body>
<div class="row">
<div class="row">
<form class="col s12" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"method="post" accept-charset="utf-8">
<div class="input-field col s6">
BUSCAR<input type=text maxlength="155" name="nomeBusca" id="nomeBusca"><br>
<input class="btn waves-effect waves-light" type="submit" name="BUSCAR" value="BUSCAR">
</form>
</div>
<a></a>
<form class="col s12" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>"method="post" accept-charset="utf-8">

<div class="row">
<div class="input-field col s6">
Nome Completo<input type=text maxlength="155" name="nome" id="nome"><br>

</div>
<div class="input-field col s3">
Data de Nascimento <input type=date  name="dtnasc" id="dtnasc"><br>
</div>
</div>

<div class="row">
<div class="input-field col s3">
Estado Civil
 <select name="estcivil" id="estcivil">
	<option value="1">Solteiro</option>
	<option value="2">Casado</option>
	<option value="3">Viúvo</option>
	<option value="4">Separado Judicialmente/Divorciado</option>
	<option value="5">União Estável</option>
	<option value="9">Ignorado</option>
</select>
</div>
<div class="input-field col s6">
Escolaridade
 <select name="escol" id="escol">
 <option value="00">Sem escolaridade</option>
	<option value="01">Fundamental I Incompleto</option>
	<option value="02">Fundamental I Completo</option>
	<option value="03">Fundamental II Incompleto</option>
	<option value="04">Fundamental II Completo</option>
	<option value="05">Ensino Médio Incompleto</option>
	<option value="06">Ensino Nédio Completo</option>
	<option value="07">Ensino Superior Incompleto</option>
	<option value="08">Ensino Superior Completo</option>
	<option value="09">Ignorado</option>
	<option value="10">Fundamental I Incompleto ou Inespecífico</option>
	<option value="11">Fundamental II Incompleto ou Inespecífico</option>
	<option value="12">Ensino Médio ou Inespecífico</option>
 </select>
</div>
</div>

<div class="row">
<div class="input-field col s6">
Logradouro <input type="text" maxlength="40" name="logradouro" id="logradouro">
</div>
<div class="input-field col s1">
Nº <input type="text" maxlength="10" name="numero" id="numero">
</div>
<div class="input-field col s4">
Complemento <input type="text" maxlength="40" name="complemento" id="complemento">
</div>
<div class="input-field col s2">
Cep <input type="text" maxlength="8" name="cep" id="cep">
</div>
<div class="input-field col s4">
Bairro <input type="text" maxlength="30" name="bairro" id="bairro">
</div>
<div class="row">

<div class="input-field col s2">
	UF
<select name="ufinform" id="ufinform">
  
	<?php 
	defined('_JEXEC') or die;

	$conn = JFactory::getDbo();
	$query = $conn
	->getQuery(true)
	->select ('sigla_uf')//('cod_logradouro','sigla_uf','cod_municipio')
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

<div class="input-field col s6">
	
	MUNCÍPIO DE RESIDÊNCIA
<select name="codmunicipio" id="codmunicipio">
  
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

</div>

<!--<input type="hidden" value="$previous" />-->
<input class="btn waves-effect waves-light" type="submit" name="OK" value="OK">
</form>
</div>

<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
    jQuery('select').formSelect();
  });
</script>
<script type="text/javascript">
var nome = "<?php echo $resultBusca[0];?>";
var idade = "<?php echo $resultBusca[1];?>";
var estcivil = "<?php echo $resultBusca[2];?>";
var escol = "<?php echo $resultBusca[3];?>";
var logradouro = "<?php echo $resultBusca[4];?>";
var numero = "<?php echo $resultBusca[5];?>";
var complemento = "<?php echo $resultBusca[6];?>";
var cep = "<?php echo $resultBusca[7];?>";
var bairro = "<?php echo $resultBusca[8];?>";
var cidade = "<?php echo $resultBusca[9];?>";
var uf = "<?php echo $resultBusca[10];?>";

document.getElementById("nome").value =nome ;
document.getElementById("dtnasc").value =idade ;
document.getElementById("estcivil").value = estcivil ;
document.getElementById("escol").value =escol ;
document.getElementById("logradouro").value = logradouro ;
document.getElementById("numero").value = numero ;
document.getElementById("complemento").value = complemento ;
document.getElementById("cep").value =cep ;
document.getElementById("bairro").value =bairro ;
document.getElementById("codmunicipio").value = cidade ;
document.getElementById("ufinform").value =uf ;

</script>
  
</body>
</html>


