<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 30/09/18
 * Time: 18:53
 */

namespace App\Service;


class GenerateWordService
{
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
        throw new \ErrorException('pas de fichier');
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