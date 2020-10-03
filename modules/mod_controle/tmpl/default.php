<?php 

defined('_JEXEC') or die;
require_once dirname(__FILE__) . '/helper.php';

//JHtml::_('bootstrap.framework');
//JHtml::_('stylesheet', 'bootstrap.min.css', ['version' => 'auto', 'relative' => true]);
JHtml::_('jquery.framework');
use Joomla\CMS\Factory;
$document = Factory::getDocument();
$document->addStyleSheet(JURI::base().'modules/mod_controle/tmpl/css/materialize.css');
$document->addScript(JURI::base().'modules/mod_controle/tmpl/js/materialize.js');



 ?>
 <!DOCTYPE html>
<html>
<head>
<jdoc:include type="head" />
    </head>
<body>
<div class="row"><img class="responsive-img" src="imagem/logosus.png" title="Governo Federal"></div>
<div class="row">

<div>
	<table class="responsive-table">
        <thead>
          <tr>
              <th>Resultado</th>
          </tr>
        </thead>

        <tbody>
          <tr>
          <td>
		  <?php 
  defined('_JEXEC') or die;
  require_once dirname(__FILE__) . '/helper.php';
  
        $count = getCodigos();
       //print_r($count);
      // if($count==""){
      //  echo "<td=\"".$count."\"".">"."$count"."</td>";
      // }// else {

        $qtd = (is_array($count) ? count(array($count)) : 1);
        if($qtd==0){
          echo "<td=\"".$count."\"".">"."$count"."</td>";
        }
        for($valor=0;$valor<$qtd;$valor++){
          //print_r($count);
          echo "<td=\"".$count[$valor]."\"".">".$count[$valor]."</td>";
       }
		//foreach	($count as $indice){
            //echo "<td=\"".$indice."\"".">"."$indice"."</td>";
            //print_r($indice);
			
        //}
     // }

        
          //pega todos os códigos inseridos na tabela de inconsistência
     function getCod(){


      $conn = JFactory::getDbo();
      $query = $conn
      ->getQuery(true)
      ->select('codigo')
      ->from($conn->quoteName('consistencia'));
      //->where($conn->quoteName('desc_uf') . " = " . $conn->quote($inc));
  
  // Reset the query using our newly populated query object.
      $conn->setQuery($query);
      $count = $conn->loadColumn();
  
      return $count; 
      }

  function getSiab($codigo){

      $conn = JFactory::getDbo();
      $query = $conn->getQuery(true);
  
      $query
      ->select(array('siab_NOME', 'siab_IDADE', 'siab_ESTADOCIVIL',
      'siab_ESCOL','siab_LOGRD','siab_NUMERO','siab_COMPLE','siab_CEP','siab_BAIRRO','siab_CIDADERES',
      'siab_UFRES'))
      ->from($conn->quoteName('siab'))
      ->where($conn->quoteName('siab_NOME') . ' = ' . $conn->quote($codigo));
      
  
  
      $conn->setQuery($query);
      $count = $conn->loadRow();
      
      return $count;

  } 
  
   function getSim($codigo){

      $conn = JFactory::getDbo();
      $query = $conn->getQuery(true);
  
      $query
      ->select(array('sim_NOME', 'sim_IDADE', 'sim_ESTADOCIVIL',
      'sim_ESCOL','sim_LOGRD','sim_NUMERO','sim_COMPLE','sim_CEP','sim_BAIRRO','sim_CIDADERES',
      'sim_UFRES'))
      ->from($conn->quoteName('sim'))
      ->where($conn->quoteName('sim_NOME') . ' = ' . $conn->quote($codigo));
      
  
  
      $conn->setQuery($query);
      $count = $conn->loadRow();
      
      return $count;

  }

  function getSinasc($codigo){

      $conn = JFactory::getDbo();
      $query = $conn->getQuery(true);
  
      $query
      ->select(array('sinasc_NOME', 'sinasc_IDADE', 'sinasc_ESTADOCIVIL',
      'sinasc_ESCOL','sinasc_LOGRD','sinasc_NUMERO','sinasc_COMPLE','sinasc_CEP','sinasc_BAIRRO','sinasc_CIDADERES',
      'sinasc_UFRES'))
      ->from($conn->quoteName('sinasc'))
      ->where($conn->quoteName('sinasc_NOME') . ' = ' . $conn->quote($codigo));
      
  
  
      $conn->setQuery($query);
      $count = $conn->loadRow();
      
      return $count;

  }


  function getCodigos(){
      //verifica a quantidade de códigos na tabela de consistência
      $codigos = getCod();
      
    if($codigos!=""){
        //caso ela não seja manipulada eu chamo a condição de esvaziar a lista
        $control ="";
    if(!is_array($codigos)){

        
              $siab = getSiab($codigos);
              $sim = getSim($codigos);
              $sinasc = getSinasc($codigos);
              
              $msgSimSinasc = "";
              $msgSinascSiab = "";
              $msgSimSiab = "";
            
              if( ($siab == "") && ($sim != "") && ($sinasc!= "")){
                //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
                 $temp = (is_array($sim) ? count($sim) : 0);
                 //for para percorrer os dados do vetor
                 for($j=0;$j<$temp;$j++){ 
                      //se algum dos registros consultados entre sinasc e sim forem diferentes ja retorna
                 if($sinasc[$j]!=$sim[$j]){
                    $msgSimSinasc = "Problemas entre o SIM e SINASC no registro ".$codigos;
                 }
             }
            }

            if(($sim=="") && ($sinasc!="") && ($siab!="")){
                //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
              $temp = (is_array($sinasc) ? count($sinasc) : 0);
                //for para percorrer os dados do vetor
                for($j=0;$j<$temp;$j++){ 
                //se algum dos registros consultados entre sinasc e siab forem diferentes ja retorna
                if($sinasc[$j]!=$siab[$j]){
                    $msgSinascSiab = "Problemas entre o SINASC e SIAB no registro ".$codigos;
                }
            }
            }

            if(($sinasc=="") && ($siab!="") && ($sim!="")){
                //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
                $temp = (is_array($siab) ? count($siab) : 0);
                //for para percorrer os dados do vetor
                for($j=0;$j<$temp;$j++){ 
                //se algum dos registros consultados entre sinasc e siab forem diferentes ja retorna
                if($sim[$j]!=$siab[$j]){
                    $msgSimSiab= "Problemas entre o SIM e SIAB no registro ".$codigos;
                }
            }
            }


            if(($sinasc!="") && ($siab!="") && ($sim!="")){
                //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
                 $temp = (is_array($sim) ? count($sim) : 0);
                 //for para percorrer os dados do vetor
                 for($j=0;$j<$temp;$j++){ 
                 //se algum dos registros consultados entre sinasc e sim forem diferentes ja retorna
                 if($sinasc[$j]!=$sim[$j]){
                     $msgSimSinasc= "Problemas entre o SIM e SINASC no registro ".$codigos;
                 }
                 //se algum dos registros consultados entre sinasc e siab forem diferentes ja retorna
                else if($sinasc[$j]!=$siab[$j]){
                     $msgSinascSiab ="Problemas entre o SINASC e SIAB no registro ".$codigos;
                 }
                 //se algum dos registros consultados entre sim e siab forem diferentes ja retorna
                else if($sim[$j]!=$siab[$j]){
                    $msgSimSiab= "Problemas entre o SIM e SIAB no registro ".$codigos;
                 }
             }
             }

             $control .= $msgSimSiab.$msgSimSinasc.$msgSinascSiab;
             return $control; 

    } else{
      //verifica o tamanho máximo do vetor para não estourar
      $qtd = (is_array($codigos) ? count($codigos) : 0);
      //variável de controle usada para retornar todos os códigos
      
      $msgSimSinasc = "";
      $msgSinascSiab = "";
      $msgSimSiab = "";
          //percorre com o limite do vetor estabelecido
          for($i=0;$i<$qtd;$i++){
              $siab = getSiab($codigos[$i]);
              $sim = getSim($codigos[$i]);
              $sinasc = getSinasc($codigos[$i]);
              
              //se o siab tiver sem registro correspondente a comparação não é feita com ele
           if( ($siab[$i] == "") && ($sim[$i] != "") && ($sinasc[$i]!= "")){
             //testa a condição do vetor e se não for um vetor válido atribui 11 a váriavel que percorre
              $temp = (is_array($sim[$i]) ? count($sim[$i]) : 11);
              //for para percorrer os dados do vetor
              for($j=0;$j<$temp;$j++){ 
                   //se algum dos registros consultados entre sinasc e sim forem diferentes ja retorna
              if($sinasc[$j]!=$sim[$j]){
                  $msgSimSinasc = "Problemas entre o SIM e SINASC no registro ".$codigos[$i];
              }
          }
           }   
           //se sim tiver sem registro correspondente a comparação não é feita com ele
            if(($sim[$i]=="") && ($sinasc[$i]!="") && ($siab[$i]!="")){
              //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
            $temp = (is_array($sinasc[$i]) ? count($sinasc[$i]) : 11);
              //for para percorrer os dados do vetor
              for($j=0;$j<$temp;$j++){ 
              //se algum dos registros consultados entre sinasc e siab forem diferentes ja retorna
              if($sinasc[$j]!=$siab[$j]){
                $msgSinascSiab = "Problemas entre o SINASC e SIAB no registro ".$codigos[$i];
              }
          }
          }
          //se sinasc tiver sem registro correspondente a comparação não é feita com ele
          if(($sinasc[$i]=="") && ($siab[$i]!="") && ($sim[$i]!="")){
              
              //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
              $temp = (is_array($siab[$i]) ? count($siab[$i]):11);
              
              //for para percorrer os dados do vetor
              for($j=0;$j<$temp;$j++){ 
              //se algum dos registros consultados entre sinasc e siab forem diferentes ja retorna
              if($sim[$j]!=$siab[$j]){
                $msgSimSiab = "Problemas entre o SIM e SIAB no registro ".$codigos[$i];
              }
          }
          }
           if(($sinasc[$i]!="") && ($siab[$i]!="") && ($sim[$i]!="")){
             //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
              $temp = (is_array($sim[$i]) ? count($sim[$i]) : 11);
              //for para percorrer os dados do vetor
              for($j=0;$j<$temp;$j++){ 
              //se algum dos registros consultados entre sinasc e sim forem diferentes ja retorna
              if($sinasc[$j]!=$sim[$j]){
                $msgSimSinasc = "Problemas entre o SIM e SINASC no registro ".$codigos[$i];
              }
              //se algum dos registros consultados entre sinasc e siab forem diferentes ja retorna
             else if($sinasc[$j]!=$siab[$j]){
                $msgSinascSiab = "Problemas entre o SINASC e SIAB no registro ".$codigos[$i];
              }
              //se algum dos registros consultados entre sim e siab forem diferentes ja retorna
             else if($sim[$j]!=$siab[$j]){
                $msgSimSiab = "Problemas entre o SIM e SIAB no registro ".$codigos[$i];
              }
          }
          }
          }
          $control .= $msgSimSiab.$msgSimSinasc.$msgSinascSiab;
          //a chamada tem que ser aqui
          if(($control=="") && ($codigos!=null) ){
                if (is_array($codigos)) {
                        atualizaListaConsistencia($codigos[0]);                    
                }
                else {
                    atualizaListaConsistencia($codigos);
                }
        } 
        return $control; 
    }//Incompleto
     
  }
  else return "Não há inconsistência entre os sistemas";	
}
//remove da tabela as informações que ja foram analisadas e que não possuem inconsistência
function atualizaListaConsistencia($value){
    $db = JFactory::getDbo();

    $query = $db->getQuery(true);

// delete all custom keys for user 1001.
$conditions = array( 
    $db->quoteName('codigo') . ' = ' . $db->quote($value)
);

$query->delete($db->quoteName('consistencia'));
$query->where($conditions);

$db->setQuery($query);

$result = $db->execute();

}
    ?>
    </td>
          </tr>
        </tbody>
      </table>

  
	
	</div>


<script type="text/javascript" src="js/materialize.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function(){
    jQuery('table').formSelect();
  });
</script>
  
</body>
</html>


