<?php
class Util
{
  static function getMultiParams($name, $query)
  {
    $params = array();
    foreach( $query as $param )
    {
      list($name, $value) = explode('=', $param);
      $params[urldecode($name)][] = urldecode($value);
    }
    return $params;
  }
  
}
?>