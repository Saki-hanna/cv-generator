<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 30/09/18
 * Time: 18:53
 */

namespace App\Tests\Unit;

use App\Tests\BaseTests;
use App\Service\GenerateWordService;

class GenerateWordServiceTest extends BaseTests
{

    public function testReplaceVarInDataWithCustomTemplate()
    {
        $template = 'simple_template';
        $data = [
            'TRIGRAMME' => 'FRE',
            'POSTE' => 'Chirurgien'
        ];

        $generateWordService = new GenerateWordService();
        $html = $generateWordService->setTemplate($template)
                                    ->replaceVarInData($data)
                                    ->getHtml();

        $this->assertStringContainsString('<h1>CUSTOM TEMPLATE</h1>',$html);
        $this->assertStringContainsString('FRE',$html);
        $this->assertStringContainsString('Chirurgien',$html);
    }

    public function testReplaceVarInDataWithoutCustomTemplate()
    {
        $data = [
            'TRIGRAMME' => 'FRE',
            'POSTE' => 'Chirurgien'
        ];
        $generateWordService = new GenerateWordService();
        $html = $generateWordService->replaceVarInData($data)
                                    ->getHtml();

        $this->assertStringContainsString('<h1>DEFAULT TEMPLATE</h1>',$html);
        $this->assertStringContainsString('FRE',$html);
        $this->assertStringContainsString('Chirurgien',$html);
    }

    public function testGenerateInDoc()
    {
        $fileName = 'test';
        $filepath = $_SERVER['DOCUMENT_ROOT'] . "/doc/$fileName.doc";
        $data = [
            'TRIGRAMME' => 'FRE',
            'POSTE' => 'Chirurgien'
        ];

        if (file_exists($filepath)) {
            unlink($filepath);
        }

        $generateWordService = new GenerateWordService();
        $generateWordService->replaceVarInData($data)
                            ->generateInDoc($fileName);

        $this->assertFileExists($filepath);

        if (file_exists($filepath)) {
            unlink($filepath);
        }
    }
}