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
class ModBusca
{
/**
 * 
 *
 * @param   string   aParam  Param
 *
 * @return  void
 */
public static function cadastrar($numeroDN,$locnasc ,$codestab,$codbainasc,$codcidadeOcor,$idadeMae,$estadoCvlMae,$escol,$codocupmae,$qtdfilvivo,$qtdfilmort,$codbaires,$codmunres,$gestacao,$gravidez,$parto,$consultas,$dtnasc,$horanasc,$sexo,$apgar1,$apgar5,$racacor,$peso,$idanomal,$codanomal,$datacadastroSistema,$dataRecebimentoSistema,$codinst,$ufinform)
{
    $conn = JFactory::getDBO(); //conexão com o BD

    try
    {
        $conn->transactionStart();
        
        $query = $conn->getQuery(true);
        
        $values = array($conn->quote($numeroDN),$conn->quote($locnasc), $conn->quote($codestab), 
        $conn->quote($codbainasc), $conn->quote($codcidadeOcor),$conn->quote($idadeMae),$conn->quote($estadoCvlMae),
        $conn->quote($escol),$conn->quote($codocupmae),$conn->quote($qtdfilvivo),$conn->quote($qtdfilmort),$conn->quote($codbaires),
        $conn->quote($codmunres),$conn->quote($gestacao),$conn->quote($gravidez),$conn->quote($parto),$conn->quote($consultas),$conn->quote($dtnasc),$conn->quote($horanasc),
        $conn->quote($sexo),$conn->quote($apgar1),$conn->quote($apgar5),$conn->quote($racacor),$conn->quote($peso),$conn->quote($idanomal),$conn->quote($codanomal),
        $conn->quote($datacadastroSistema),$conn->quote($dataRecebimentoSistema),$conn->quote($codinst),$conn->quote($ufinform));
        
        $query->insert($conn->quoteName('sisvev_certidao_nascimento'));
        $query->columns($conn->quoteName(array('NUMERODN','LOCNASC','CODESTAB','CODBAINASC','CODMUNNASC','IDADEMAE','ESTCIVMAE','ESCMAE','CODOCUPMAE','QTDFILVIVO','QTDFILMORT','CODBAIRES','CODMUNRES','GESTACAO','GRAVIDEZ','PARTO','CONSULTAS','DTNASC','HORANASC','SEXO','APGAR_1','APGAR_5','RACACOR','PESO','IDANOMAL','CODANOMAL','DTCADASTRO','DTRECEBIM','CODINST','UFINFORM')));
        $query->values(implode(',',$values));
    
        $conn->setQuery($query);
        $result = $conn->execute();
    
        $conn->transactionCommit();
    }
    catch (Exception $e)
    {
        // catch any database errors.
        $conn->transactionRollback();
        JErrorPage::render($e);
    }
}


//FUNÇÃO QUE CAPTURA A DESCRIÇÃO E CONVERTE NO CÓDIGO EQUIVALENTE
public static function getCodigoEstabSaude($estab){


    $conn = JFactory::getDbo();
$query = $conn
    ->getQuery(true)
    ->select('codestab')
    ->from($conn->quoteName('cnesdn18'))
    ->where($conn->quoteName('descestab') . " LIKE " . $conn->quote($estab));

// Reset the query using our newly populated query object.
$conn->setQuery($query);
$count = $conn->loadResult();

return $count; 
}
//FUNÇÃO RESPONSÁVEL POR CONVERTER A STRING COM O NOME DA CIDADE E INSERIR NO BANCO O CÓDIGO RESPECTIVO
public static function getCodigoCidade($cidade){


    $conn = JFactory::getDbo();
$query = $conn
    ->getQuery(true)
    ->select('cod_municipio')
    ->from($conn->quoteName('sisvev_municipio'))
    ->where($conn->quoteName('desc_municipio') . " = " . $conn->quote($cidade));

// Reset the query using our newly populated query object.
$conn->setQuery($query);
$count = $conn->loadResult();

return $count; 
}

//FUNÇÃO RESPONSÁVEL POR CAPTURAR O CÓDIGO EQUIVALENTE A OCUPAÇÃO DA MÃE
public static function getCodigoOcupMae($codocupmae){


    $conn = JFactory::getDbo();
$query = $conn
    ->getQuery(true)
    ->select('cbo')
    ->from($conn->quoteName('cbo2002'))
    ->where($conn->quoteName('ds_cbo') . " = " . $conn->quote($codocupmae));

// Reset the query using our newly populated query object.
$conn->setQuery($query);
$count = $conn->loadResult();

return $count; 
}


//FUNÇÃO QUE CAPTURA O CÓDIGO EQUIVALENTE

public static function getCodigoAnomalia($codanomal){


    $conn = JFactory::getDbo();
$query = $conn
    ->getQuery(true)
    ->select('cid10')
    ->from($conn->quoteName('cid10'))
    ->where($conn->quoteName('descr') . " = " . $conn->quote($codanomal));

// Reset the query using our newly populated query object.
$conn->setQuery($query);
$count = $conn->loadResult();

return $count; 
}

//FUNÇÃO RESPONSÁVEL POR CAPTURAR O CÓDIGO EQUIVALENTE DA UF QUE INFORMOU O REGISTRO
public static function getCodigoUf($ufinform){


    $conn = JFactory::getDbo();
$query = $conn
    ->getQuery(true)
    ->select('cod_uf')
    ->from($conn->quoteName('sisvev_uf'))
    ->where($conn->quoteName('desc_uf') . " = " . $conn->quote($ufinform));

// Reset the query using our newly populated query object.
$conn->setQuery($query);
$count = $conn->loadResult();

return $count; 
}








    
}
?>