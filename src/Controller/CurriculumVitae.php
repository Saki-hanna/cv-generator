<?php

namespace App\Controller;

use App\Service\GenerateWordService;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class CurriculumVitae
{
    /** @var GenerateWordService */
    private $generateWordService;


    public function __construct(GenerateWordService $generator)
    {
        $this->generateWordService = $generator;
    }

    /**
     * @Route("/generate-curriculum-vitae", name="generate_curriculum_vitae")
     * @param string $template nom du template a utilisé.
     * @param array $data données récupéré depuis le formulaire afin de compléter le cv
     *
     * @return JsonResponse
     */
    public function generateCurriculumVitae()
    {
        $template = 'simple_template';
        $data = ['TRIGRAMME'=>'FRE', 'POSTE'=> 'Chirurgien'];
        $fileName = 'FRE_CV';
        $this->generateWordService
            ->setTemplate($template)
            ->replaceVarInData($data)
            ->generateInDoc($fileName);

        return new JsonResponse(
            ['hello']
        );
    }


}