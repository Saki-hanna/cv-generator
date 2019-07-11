<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 30/09/18
 * Time: 18:53
 */

namespace App\Service;


use App\Entity\SkillCategories;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\File\Exception\FileException;

class GenerateWordService
{

    private $objectManager;

    public function __construct(ObjectManager $objectManager)
    {
        $this->objectManager = $objectManager;
    }
    /**
     * @param $pathFile
     * @return bool|string
     * @throws \Exception
     */
    public function getContentHtml($pathFile)
    {
        if(is_file($pathFile)){
            return file_get_contents($pathFile);
        }
        throw new FileException();
    }

    public function getSkillCategories()
    {
        $skillCategoriesRepository = $this->objectManager
            ->getRepository(SkillCategories::class);
        return $skillCategoriesRepository->find(1);
    }
    /**
     * Ajoute les données dans le template word
     */
    public function addDataInTemplateHtml($content)
    {
        $content = str_replace('##NOM##', 'Roux', $content);
        $content = str_replace('##PRENOM##', 'EVA', $content);
        $content = str_replace('##EXPERIENCE##', 'mon experience', $content);

        return $content;
    }

    /**
     * @param $content
     */
    public function createDocFile($content)
    {
        $filename = "ER_CV.doc";
        if (!$handle = fopen($filename, 'w')) {
            exit("Impossible d'ouvrir le fichier ($filename)");
        }

        // On ajoute le contenu
        if (fwrite($handle, $content) === FALSE) {
            exit("Impossible d'écrire dans le fichier ($filename)");
        }

        fclose($handle);
    }
}