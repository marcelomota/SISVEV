<?php
/**
 *Classe responsável pela manipulação dos dados
 * 
 * @author Marcelo Ferreira Mota
 * @license    GNU/GPL, see LICENSE.php
 * mod_cadastro_paciente is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */
class ModControle
{

 //pega todos os códigos inseridos na tabela consistência
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


public static function getCodigos(){
    //verifica a quantidade de códigos na tabela de consistência
    $codigos = getCod();
    //verifica o tamanho máximo do vetor para não estourar
    $qtd = count($codigos);
    if($codigos!=""){
        //percorre com o limite do vetor estabelecido
        for($i=0;$i<$qtd;$i++){
            $siab = getSiab($codigos[$i]);
            $sim = getSim($codigos[$i]);
            $sinasc = getSinasc($codigos[$i]);
            //se o siab tiver sem registro correspondente a comparação não é feita com ele
         if(($siab[$i] == null) || ($siab[$i] == "") && ($sim[$i] != "") && ($sim[$i] != null) &&($sinasc[$i] != null) && ($sinasc[$i]!= "")){
           //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
            $temp = (is_array($sim[$i]) ? count($sim[$i]) : 0);
            //for para percorrer os dados do vetor
            for($j=0;$j<$temp;$j++){ 
                 //se algum dos registros consultados entre sinasc e sim forem diferentes ja retorna
            if($sinasc[$j]!=$sim[$j]){
                return "Problemas entre o SIM e SINASC no registro ".$codigos[$i];
            }
        }
         }   
         //se sim tiver sem registro correspondente a comparação não é feita com ele
         if(($sim[$i]==null) || ($sim[$i]=="") && ($sinasc[$i]!=null) && ($sinasc[$i]!="") && ($siab[$i]!=null) && ($siab[$i]!="")){
            //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
          $temp = (is_array($sinasc[$i]) ? count($sinasc[$i]) : 0);
            //for para percorrer os dados do vetor
            for($j=0;$j<$temp;$j++){ 
            //se algum dos registros consultados entre sinasc e siab forem diferentes ja retorna
            if($sinasc[$j]!=$siab[$j]){
                return "Problemas entre o SINASC e SIAB no registro ".$codigos[$i];
            }
        }
        }
        //se sinasc tiver sem registro correspondente a comparação não é feita com ele
        if(($sinasc[$i]==null) || ($sinasc[$i]=="") && ($siab[$i]!=null) && ($siab[$i]!="") && ($sim[$i]!="") && ($sim[$i]!=null)){
            //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
            $temp = (is_array($siab[$i]) ? count($siab[$i]) : 0);
            //for para percorrer os dados do vetor
            for($j=0;$j<$temp;$j++){ 
            //se algum dos registros consultados entre sinasc e siab forem diferentes ja retorna
            if($sim[$j]!=$siab[$j]){
                return "Problemas entre o SIM e SIAB no registro ".$codigos[$i];
            }
        }
        }
        if(($sinasc[$i]!=null) && ($sinasc[$i]!="") && ($siab[$i]!=null) && ($siab[$i]!="") && ($sim[$i]!="") && ($sim[$i]!=null)){
           //testa a condição do vetor e se não for um vetor válido atribui 0 a váriavel
            $temp = (is_array($sim[$i]) ? count($sim[$i]) : 0);
            //for para percorrer os dados do vetor
            for($j=0;$j<$temp;$j++){ 
            //se algum dos registros consultados entre sinasc e sim forem diferentes ja retorna
            if($sinasc[$j]!=$sim[$j]){
                return "Problemas entre o SIM e SINASC no registro ".$codigos[$i];
            }
            //se algum dos registros consultados entre sinasc e siab forem diferentes ja retorna
            if($sinasc[$j]!=$siab[$j]){
                return "Problemas entre o SINASC e SIAB no registro ".$codigos[$i];
            }
            //se algum dos registros consultados entre sim e siab forem diferentes ja retorna
            if($sim[$j]!=$siab[$j]){
                return "Problemas entre o SIM e SIAB no registro ".$codigos[$i];
            }
        }
        }
        }
    }   
    return "Não há inconsistência no banco";
}  
      
    
}
?>