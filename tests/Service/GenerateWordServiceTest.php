<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 30/09/18
 * Time: 18:53
 */

namespace App\Tests\Service;

use App\Service\GenerateWordService;
use Symfony\Bundle\FrameworkBundle\Tests\TestCase;

class GenerateWordServiceTest extends TestCase
{
    public function testAddContentInHtml()
    {
        $content = '##LOGO##';

        $generateWordService = new GenerateWordService();
        $actual = $generateWordService->addDataInTemplateHtml($content);

        // assert that your calculator added the numbers correctly!
        $this->assertEquals('monLogo', $actual);
    }
}