<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 30/09/18
 * Time: 18:53
 */

namespace App\Tests\Funtionnal;


class CurriculumVitaeTest extends BaseFunctionnalTest
{

    public function testRouteIsSuccess()
    {
        $this->client->request('GET', '/generate-curriculum-vitae');
        $this->assertEquals(200, $this->client->getResponse()->getStatusCode());
    }

    public function testResponseContent()
    {
        $this->client->request('GET', '/generate-curriculum-vitae');
        $this->assertEquals('["hello"]', $this->client->getResponse()->getContent());
    }
}