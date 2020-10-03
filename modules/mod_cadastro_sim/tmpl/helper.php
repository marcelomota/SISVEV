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
class ModCadastroSim
{
/**
 * 
 *Função responsável pelo cadastro do paciente utilizando transações
 * @param   string   aParam  Param
 *
 * @return  void
 */

public static function cadastrar($nome,$tipobito,$dtobito,$horaobito,$naturalidade,$cidade,$nasc,$idade,$sexo,$racacor,
$estciv,$esc2010,$seriescfal,$cbo,$codmunres,$lococor,$muniocor,$idademae,$escmae2010,$serieescmae,$ocupmae,$qtdfilvivo,
$qtdfilmorto,$gestacao,$gravidez,$parto,$obitoparto,$peso,$numerodn,$tpmorteoco,$assistmed,$necropsia,$linhaa,$linhab,$linhac,
$linhad,$linhaii,$circobito,$acidtrab,$fonte,$origem,$esc,$escmae,$obitograve,$obitopuerp,$exame,$cirurgia,$causabas_o,$causabas,
$numerolote,$dtinvestig,$dtcadastro,$stcodifica,$codifica,$fonteinv,$dtrecebim1,$atestado,$dtrecoriga,$causamat,$escmaeagr1,
$escfalagr1,$stdoepidem,$stdonova,$difdata,$nudiasobco,$dtcadinv,$tpobitocor,$dtconinv,$fontes,$tpresginfo,$tpnivelinv,$dtcadinf,$morteparto,
$dtconcaso,$altcausa,$tppos,$gestacao2,$cb_pre){
//ALTER TABLE sisvev_sim ADD CONSTRAINT TIPOBITO FOREIGN KEY(TIPOBITO) REFERENCES sisvev_tipobito (codigo);

    $conn = JFactory::getDBO(); //conexão com o BD
    
    try
    {
        $conn->transactionStart();//inicia a transação
        
        $query = $conn->getQuery(true);//ativa a query
        
        //seta o array com as variaveis capturadas
        $values = array($conn->quote($nome),$conn->quote($tipobito),$conn->quote($dtobito),$conn->quote($horaobito),
        $conn->quote($naturalidade),$conn->quote($cidade),$conn->quote($nasc),$conn->quote($idade),$conn->quote($sexo),
        $conn->quote($racacor),$conn->quote($estciv),$conn->quote($esc2010),$conn->quote($seriescfal),$conn->quote($cbo),
        $conn->quote($codmunres),$conn->quote($lococor),$conn->quote($muniocor),$conn->quote($idademae),$conn->quote($escmae2010),
        $conn->quote($serieescmae),$conn->quote($ocupmae),$conn->quote($qtdfilvivo),$conn->quote($qtdfilmorto),$conn->quote($gestacao),
        $conn->quote($gravidez),$conn->quote($parto),$conn->quote($obitoparto),$conn->quote($peso),$conn->quote($numerodn),
        $conn->quote($tpmorteoco),$conn->quote($assistmed),$conn->quote($necropsia),$conn->quote($linhaa),$conn->quote($linhab),
        $conn->quote($linhac),$conn->quote($linhad),$conn->quote($linhaii),$conn->quote($circobito),$conn->quote($acidtrab),$conn->quote($fonte),
        $conn->quote($origem),$conn->quote($esc),$conn->quote($escmae),$conn->quote($obitograve),$conn->quote($obitopuerp),$conn->quote($exame),
        $conn->quote($cirurgia),$conn->quote($causabas_o),$conn->quote($causabas),$conn->quote($numerolote),$conn->quote($dtinvestig),$conn->quote($dtcadastro),
        $conn->quote($stcodifica),$conn->quote($codifica),$conn->quote($vrsist),$conn->quote($vrscb),$conn->quote($fonteinv),$conn->quote($dtrecebim1),
        $conn->quote($atestado),$conn->quote($dtrecoriga),$conn->quote($causamat),$conn->quote($escmaeagr1),$conn->quote($escfalagr1),$conn->quote($stdoepidem),
        $conn->quote($stdonova),$conn->quote($difdata),$conn->quote($nudiasobco),$conn->quote($dtcadinv),$conn->quote($tpobitocor),$conn->quote($dtconinv),
        $conn->quote($fontes),$conn->quote($tpresginfo),$conn->quote($tpnivelinv),$conn->quote($dtcadinf),$conn->quote($morteparto),$conn->quote($dtconcaso),
        $conn->quote($altcausa),$conn->quote($tppos),$conn->quote($gestacao2),$conn->quote($cb_pre));
        //insere na tabela
        $query->insert($conn->quoteName('sisvev_sim'));
        //insere nas colunas correspondentes
        $query->columns($conn->quoteName(array('NOME','TIPOBITO','DTOBITO','HORAOBITO','NATURALIDADE','CODMUNNATU',
        'DTNASC','IDADE','SEXO1','RACACOR1','ESTCIV','ESC2010','SERIESCFAL','OCUP','CODMUNRES1','LOCOCOR','CODMUNOCOR',
        'IDADEMAE','ESCMAE2010','SERIESCMAE','OCUPMAE','QTDFILVIVO','QTDFILMORT','SEMAGESTAC','GRAVIDEZ1',
        'PARTO1','OBITOPARTO','PESO1','NUMERODN1','TPMORTEOCO','ASSISTMED','NECROPSIA','LINHAA','LINHAB','LINHAC','LINHAD',
        'LINHAII','CIRCOBITO','ACIDTRAB','FONTE','ORIGEM','ESC','ESCMAE1','OBITOGRAV','OBITOPUERP','EXAME','CIRURGIA','CAUSABAS_O',
        'CAUSABAS','NUMEROLOTE','DTINVESTIG','DTCADASTRO','STCODIFICA','CODIFICADO','VERSAOSIST','VERSAOSCB','FONTEINV','DTRECEBIM1',
        'ATESTADO','DTRECORIGA','CAUSAMAT','ESCMAEAGR1','ESCFALAGR1','STDOEPIDEM','STDONOVA','DIFDATA','NUDIASOBCO','DTCADINV',
        'TPOBITOCOR','DTCONINV','FONTES','TPRESGINFO','TPNIVELINV','DTCADINF','MORTEPARTO','DTCONCASO','ALTCAUSA','TPPOS','GESTACAO2','CB_PRE')));
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
        ->where($conn->quoteName('nome') . " = " . $conn->quote($tipobito));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; */
    }
//FUNÇÃO RESPONSÁVEL POR CAPTURAR OS DADOS DA CIDADE E RETORNAR O CÓDIGO DEVIDO
    public static function getCodigoCidade($cidade,$naturalidade){
        //caso a naturalidade seja diferente de brasileira retorna 0 para o código de cidade brasileiro
        if($naturalidade!='BRASIL'){
            return "0";
        }
        else{
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
//CAPTURA A DESCRIÇÃO E RETORNA O CÓDIGO EQUIVALENTE
    public static function getCodigoTipObito($tipobito){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_tipobito'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($tipobito));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }

    //CAPTURA A DESCRIÇÃO DO PAIS E RETORNA O CÓDIGO CORRESPONDENTE
    public static function getCodigoPais($naturalidade){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('tabpais'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($naturalidade));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }

    public static function getCodigoCbo($cbo){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('cbo')
        ->from($conn->quoteName('cbo2002'))
        ->where($conn->quoteName('ds_cbo') . " = " . $conn->quote($cbo));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }

    public static function getCodigoObitoParto($obitoparto){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_obitoparto'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($obitoparto));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
//CAPTURA O CÓDIGO DO TIPO DE MORTE QUE OCORREU
    public static function getCodigoTpMorteOco($tpmorteoco){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_tpmorteoco'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($tpmorteoco));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }

    //CAPTURA O CÓDIGO SE HOUVE ASSISTÊNCIA
    public static function getCodigoAssistMed($assistmed){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_assistimed'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($assistmed));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
    //CAPTURA A DESCRIÇÃO E RETORNA O CÓDIGO EQUIVALENTE
    public static function getCodigoOpcao($necropsia){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_simnao'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($necropsia));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
    //CAPTURA A DESCRIÇÃO E RETORNA O CÓDIGO EQUIVALENTE
    public static function getCodigoCid10($cid10){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('cid10')
        ->from($conn->quoteName('cid10'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($cid10));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
    //CAPTURA A DESCRIÇÃO E RETORNA O CÓDIGO EQUIVALENTE
    public static function getCodigoCircObito($circobito){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_circobito'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($circobito));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
    //CAPTURA A DESCRIÇÃO E RETORNA O CÓDIGO EQUIVALENTE
    public static function getCodigoFonte($fonte){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_fonte'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($fonte));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
//ESCOLARIDADE TABLE ESCMAE
    public static function getCodigoEsc($esc){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_escmae'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($esc));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }

    //ESCOLARIDADE TABLE ESCMAE
    public static function getCodigoFonteInv($fonteinv){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_fonteinv'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($fonteinv));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }

    public static function getCodigoEsc2010At($escat2010){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_esc2010at'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($escat2010));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
    public static function getCodigoTpObitOcor($tpobitocor){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_tpobitocor'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($tpobitocor));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
//calcula as fontes
    public static function setFontes($f1,$f2,$f3,$f4,$f5,$f6){
        $temp[0]=$f1;
        $temp[1]=$f2;
        $temp[2]=$f3;
        $temp[3]=$f4;
        $temp[4]=$f5;
        $temp[5]=$f6;
        $result;
        for($i=0; $i<6; $i++){
            if($temp[$i]==""){
                $result.="X";
            }
            else{
                $result.="S";
            }
            
        }

        return $result;
        
    }
    public static function getCodigoMorteParto($tpobitocor){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_obitoparto'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($tpobitocor));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }
    public static function getCodigoTpResGInf($tpresginfo){


        $conn = JFactory::getDbo();
    $query = $conn
        ->getQuery(true)
        ->select('codigo')
        ->from($conn->quoteName('sisvev_tpresginfo'))
        ->where($conn->quoteName('descr') . " = " . $conn->quote($tpresginfo));
    
    // Reset the query using our newly populated query object.
    $conn->setQuery($query);
    $count = $conn->loadResult();
    
    return $count; 
    }

}
?>