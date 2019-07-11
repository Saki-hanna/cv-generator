<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 30/09/18
 * Time: 18:53
 */

namespace App\Tests\Funtionnal;

use App\Tests\BaseTests;
use Symfony\Bundle\FrameworkBundle\Client;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

abstract class BaseFunctionnalTest extends BaseTests
{

    /** @var Client */
    protected $client;

    public function __construct()
    {
        parent::__construct();
        $this->client = static::createClient([], [
            'DOCUMENT_ROOT' => $_SERVER['DOCUMENT_ROOT'],
        ]);

    }

}