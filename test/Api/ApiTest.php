<?php

namespace FicoEXTScoređSimulacion\Client;

use \FicoEXTScoređSimulacion\Client\Configuration;
use \FicoEXTScoređSimulacion\Client\ApiException;
use \FicoEXTScoređSimulacion\Client\ObjectSerializer;

class ApiTest extends \PHPUnit_Framework_TestCase
{
    
    public function setUp()
    {
        $handler = \GuzzleHttp\HandlerStack::create();
        $config = new \FicoEXTScoređSimulacion\Client\Configuration();
        $config->setHost('the_url');

        $client = new \GuzzleHttp\Client(['handler' => $handler]);
        $this->apiInstance = new \FicoEXTScoređSimulacion\Client\Api\FicoEXTScoređSimulacionApi($client, $config);

        $this->x_api_key = "your_api_key";
    }    
    
public function testGetReporte()
    {
        $request = new \FicoEXTScoređSimulacion\Client\Model\Peticion();
        $persona = new \FicoEXTScoređSimulacion\Client\Model\Persona();
        $domicilio = new \FicoEXTScoređSimulacion\Client\Model\Domicilio();        
        $estado = new \FicoEXTScoređSimulacion\Client\Model\CatalogoEstados();
            
        $domicilio->setDireccion("SAN JOAQUIN");
        $domicilio->setColoniaPoblacion("EL ARENAL");
        $domicilio->setDelegacionMunicipio("IZTAPALAPA");
        $domicilio->setCiudad("MEXICO");
        $domicilio->setEstado($estado::CDMX);
        $domicilio->setCP("12345");
        $domicilio->setFechaResidencia(null);
        $domicilio->setNumeroTelefono(null);
        $domicilio->setTipoDomicilio(null);
        $domicilio->setTipoAsentamiento(null);
        $domicilio->setFechaRegistroDomicilio(null);
        $domicilio->setTipoAltaDomicilio(null);
        $domicilio->setIdDomicilio(null);

        $persona->setApellidoPaterno("OLIVOS");
        $persona->setApellidoMaterno("JIMENEZ");
        $persona->setApellidoAdicional(null);
        $persona->setNombres("PEDRO");
        $persona->setFechaNacimiento("1966-05-13");
        $persona->setRFC("CUPU800825569");
        $persona->setCURP(null);
        $persona->setNacionalidad(null);
        $persona->setResidencia(null);
        $persona->setEstadoCivil(null);
        $persona->setSexo(null);
        $persona->setNumeroDependientes(null);
        $persona->setFechaDefuncion(null);
        $persona->setDomicilio($domicilio);
         
        $request->setFolio("1235");
        $request->setPersona($persona);        

        try {
            $result = $this->apiInstance->getReporte($this->x_api_key, $request);
            print_r($result);
            $this->assertTrue($result->getFolioConsulta()!==null);

            return $result->getFolioConsulta();
        } catch (Exception $e) {
            echo 'Exception when calling FicoEXTScoređSimulacionApi->getReporte: ', $e->getMessage(), PHP_EOL;
        }
    } 
}
