<?php 

defined('_JEXEC') or die;
require_once dirname(__FILE__) . '/helper.php';

if (isset($_POST['OK']))
{
	$novoNome = (string)$_POST['nome'];
	$novoCpf = (int)$_POST['cpf'];
	$novoRg = (int)$_POST['rg'];
	$novaData = $_POST['data'];
	$cep = $_POST['cep'];
	$rua = $_POST['rua'];
	$bairro = $_POST['bairro'];
	$cidade = ModCadastro::getCodigoCidade($_POST['codmunicipio']);
	$uf= $_POST['ufinform'];
    
	$resultado = ModCadastro::cadastrar($novoNome,$novoCpf,$novoRg,$novaData,$cep,$rua,$bairro,$cidade,$uf);
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
NOME: <input type=text maxlength="255" name="nome"><br>
CPF: <input type=text  maxlength="11"name="cpf"><br>
RG: <input type=text maxlength="10"name="rg"><br>
DATA DE NASCIMENTO: <input type=date maxlength="8" name="data"><br>
<div>
	CEP <input type="text" maxlength="8" name="cep">
	RUA <input type="text" maxlength="255" name="rua">
	BAIRRO <input type="text" maxlength="50" name="bairro">

	SELECIONE O MUNCÍPIO DE RESIDÊNCIA
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

</div>
<!--<input type="hidden" value="$previous" />-->
<input type=submit name="OK" value="OK">
</form>
</body>
</html>


