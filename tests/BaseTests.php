<?php
/**
 * Created by PhpStorm.
 * User: evaro
 * Date: 17/03/2019
 * Time: 19:01
 */

namespace App\Tests;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class BaseTests extends WebTestCase
{
    public function __construct()
    {
        parent::__construct();
        $_SERVER['DOCUMENT_ROOT'] = 'C:\Application\er_cv-generator\public';
    }

}