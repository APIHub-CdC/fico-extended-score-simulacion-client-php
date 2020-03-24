<?php

namespace FicoEXTScoređSimulacion\Client\Model;

interface ModelInterface
{
    
    public function getModelName();
    
    public static function FicoEXTScoređTypes();
    
    public static function FicoEXTScoređFormats();
    
    public static function attributeMap();
    
    public static function setters();
    
    public static function getters();
    
    public function listInvalidProperties();
    
    public function valid();
}
