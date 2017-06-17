<?php
/**
 * Created by PhpStorm.
 * User: bengeos
 * Date: 4/9/17
 * Time: 8:49 AM
 */

require_once "bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);