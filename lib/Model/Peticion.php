<?php

namespace FicoEXTScoredSimulacion\Client\Model;

use \ArrayAccess;
use \FicoEXTScoredSimulacion\Client\ObjectSerializer;

class Peticion implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;
    
    protected static $FicoEXTScoređModelName = 'Peticion';
    
    protected static $FicoEXTScoređTypes = [
        'folio' => 'string',
        'persona' => '\FicoEXTScoredSimulacion\Client\Model\Persona'
    ];
    
    protected static $FicoEXTScoređFormats = [
        'folio' => null,
        'persona' => null
    ];
    
    public static function FicoEXTScoređTypes()
    {
        return self::$FicoEXTScoređTypes;
    }
    
    public static function FicoEXTScoređFormats()
    {
        return self::$FicoEXTScoređFormats;
    }
    
    protected static $attributeMap = [
        'folio' => 'folio',
        'persona' => 'persona'
    ];
    
    protected static $setters = [
        'folio' => 'setFolio',
        'persona' => 'setPersona'
    ];
    
    protected static $getters = [
        'folio' => 'getFolio',
        'persona' => 'getPersona'
    ];
    
    public static function attributeMap()
    {
        return self::$attributeMap;
    }
    
    public static function setters()
    {
        return self::$setters;
    }
    
    public static function getters()
    {
        return self::$getters;
    }
    
    public function getModelName()
    {
        return self::$FicoEXTScoređModelName;
    }
    
    
    
    protected $container = [];
    
    public function __construct(array $data = null)
    {
        $this->container['folio'] = isset($data['folio']) ? $data['folio'] : null;
        $this->container['persona'] = isset($data['persona']) ? $data['persona'] : null;
    }
    
    public function listInvalidProperties()
    {
        $invalidProperties = [];
        if ($this->container['persona'] === null) {
            $invalidProperties[] = "'persona' can't be null";
        }
        return $invalidProperties;
    }
    
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }
    
    public function getFolio()
    {
        return $this->container['folio'];
    }
    
    public function setFolio($folio)
    {
        $this->container['folio'] = $folio;
        return $this;
    }
    
    public function getPersona()
    {
        return $this->container['persona'];
    }
    
    public function setPersona($persona)
    {
        $this->container['persona'] = $persona;
        return $this;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }
    
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }
    
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) {
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }
        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}
