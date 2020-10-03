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
class ModAttSiab
{
/**
 * 
 *Função responsável pelo cadastro do paciente utilizando transações
 * @param   string   aParam  Param
 *
 * @return  void
 */

public static function atualizar($novoNome,$dtnasc,$estcivil,$escol,$logradouro,$numero,$complemento,$cep,$bairro,$cidade,$uf){


    $conn = JFactory::getDBO(); //conexão com o BD
    
    try
    {
        $conn->transactionStart();//inicia a transação
        
        $query = $conn->getQuery(true);//ativa a query
        //campos que serão atualizados
        $fields = array(
            $conn->quoteName('siab_IDADE') . ' = ' . $conn->quote($dtnasc),
            $conn->quoteName('siab_ESTADOCIVIL') . ' = '. $conn->quote($estcivil),
            $conn->quoteName('siab_ESCOL') . ' = '. $conn->quote($escol),
            $conn->quoteName('siab_LOGRD') . ' = '. $conn->quote($logradouro),
            $conn->quoteName('siab_NUMERO') . ' = '. $conn->quote($numero),
            $conn->quoteName('siab_COMPLE') . ' = '. $conn->quote($complemento),
            $conn->quoteName('siab_CEP') . ' = '. $conn->quote($cep),
            $conn->quoteName('siab_BAIRRO') . ' = '. $conn->quote($bairro),
            $conn->quoteName('siab_CIDADERES') . ' = '. $conn->quote($cidade),
            $conn->quoteName('siab_UFRES') . ' = '. $conn->quote($uf)
        );
        //condições para atualizar
        $conditions = array(
            $conn->quoteName('siab_NOME') . ' = ' . $conn->quote($novoNome)
        );
        //atualiza as informações baseada nos campos e condições
        $query->update($conn->quoteName('siab'))->set($fields)->where($conditions);
        //esvazia a query
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
    
    
        /*$conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('nome')
        ->from($conn->quoteName('teste_pessoa'))
        ->where($conn->quoteName('nome') . " = " . $conn->quote($novoNome));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; */
    }
    // metodo responsável por recuperar os dados a serem editados
    public static function completar($parametro)
    {
        $conn = JFactory::getDBO(); //conexão com o BD
        $query = $conn->getQuery(true);

        $query
    ->select(array('s.siab_NOME','s.siab_IDADE','s.siab_ESTADOCIVIL','s.siab_ESCOL', 's.siab_LOGRD','s.siab_NUMERO','s.siab_COMPLE','s.siab_CEP','s.siab_BAIRRO','m.desc_municipio','s.siab_UFRES'))
    ->from($conn->quoteName('siab','s'))
    ->join('INNER', $conn->quoteName('sisvev_municipio', 'm') . ' ON ' . $conn->quoteName('m.cod_municipio') . ' = ' . $conn->quoteName('s.siab_CIDADERES'))
	->where($conn->quoteName('siab_NOME') . ' = ' . $conn->quote($parametro));
    


	$conn->setQuery($query);
    $count = $conn->loadRow();
    
   // Se fosse utilizando Jquery o json seria interessante $json = json_encode($count);
	
    return $count;
    }
// metodo responsável por cadastrar na tabela de controle o código para verificação futura dos dados conssitentes.
    public static function insertControle($codigo){


        $conn = JFactory::getDBO(); //conexão com o BD
        
        try
        {
            $conn->transactionStart();//inicia a transação
            
            $query = $conn->getQuery(true);//ativa a query
            
            //seta o array com as variaveis capturadas
            $values = array($conn->quote($codigo));
            //insere na tabela
            $query->insert($conn->quoteName('consistencia'));
            //insere nas colunas correspondentes
            $query->columns($conn->quoteName(array('codigo')));
            //separa os valores devidamente
            $query->values(implode(',',$values));
            //esvazia a query
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
        
        
            /*$conn = JFactory::getDbo();
        $query = $conn
            ->getQuery(true)
            ->select('nome')
            ->from($conn->quoteName('teste_pessoa'))
            ->where($conn->quoteName('nome') . " = " . $conn->quote($novoNome));
        
        // Reset the query using our newly populated query object.
        $conn->setQuery($query);
        $count = $conn->loadResult();
        
        return $count; */
        }

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