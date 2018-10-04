<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 04/10/18
 * Time: 19:16
 */

namespace App\Controller;

use App\Service\GenerateWordService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class CurriculumVitae
{

    /**
     * @Route("generate-curriculum-vitae", name="generate_curriculum_vitae")
     * @throws \Exception
     */
    public function generateCurriculumVitae()
    {
        $generateWordService = new GenerateWordService();

        $content = $generateWordService->getContentHtml('ER_CV.html');
        $content = $generateWordService->addDataInTemplateHtml($content);
        $generateWordService->createDocFile($content);

        return new JsonResponse(
            ['hello']
        );
    }
}