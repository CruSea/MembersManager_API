<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 4/21/17
 * Time: 10:15 AM
 */

namespace MembersManager\Controller;

abstract class BasicEnum
{
    private static $constCacheArray = NULL;

    public static function getConstants() {
        if (self::$constCacheArray == NULL) {
            self::$constCacheArray = [];
        }
        $calledClass = get_called_class();
        if (!array_key_exists($calledClass, self::$constCacheArray)) {
            $reflect = new \ReflectionClass($calledClass);
            self::$constCacheArray[$calledClass] = $reflect->getConstants();
        }
        return self::$constCacheArray[$calledClass];
    }

    public static function isValidName($name, $strict = false) {
        $constants = self::getConstants();

        if ($strict) {
            return array_key_exists($name, $constants);
        }

        $keys = array_map('strtolower', array_keys($constants));
        return in_array(strtolower($name), $keys);
    }

    public static function isValidValue($value, $strict = false) {
        $constants = self::getConstants();

        if ($strict) {
            $values = array_values($constants);
            return in_array($value, $values, $strict);
        }

        $values = array_map('strtolower', array_values($constants));
        return in_array(strtolower($value), $values);
    }
    public static function isValidParam($param, $strict = true){
        $constants = self::getConstants();
        $p_keys = array_keys($param);
        if($strict){
            foreach ($p_keys as $key){
                if(!in_array($key, array_values($constants))){
                    return false;
                }
            }
        }else{
            foreach ($p_keys as $key){
                if(!in_array(strtolower($key), array_values($constants))){
                    return false;
                }
            }
        }
        return true;
    }
}