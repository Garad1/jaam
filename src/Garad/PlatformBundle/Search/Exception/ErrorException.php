<?php
/**
 * Created by PhpStorm.
 * User: Proprietaire
 * Date: 10/01/2018
 * Time: 17:12
 */

namespace Garad\PlatformBundle\Search\Exception;

class ErrorException extends \Exception
{
    const WARNING = 1;
    const ERROR = 2;

    public function __construct($message,$code = 0)
    {
        parent::__construct($message, $code);
    }
}