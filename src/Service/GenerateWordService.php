<?php
/**
 * Created by PhpStorm.
 * User: eva
 * Date: 30/09/18
 * Time: 18:53
 */

namespace App\Service;


use Symfony\Component\Filesystem\Exception\FileNotFoundException;
use Symfony\Component\Finder\Finder;

class GenerateWordService
{
    private $templatePathFile = '/html/template.html';
    private $htmlFile;

    public function setTemplate($templateName)
    {
        $this->templatePathFile = '/html/'. $templateName . '.html';
        return $this;
    }


    public function replaceVarInData($data)
    {
        //récupère le fichier
        if(file_exists($_SERVER['DOCUMENT_ROOT'] . $this->templatePathFile) === false){
            throw new FileNotFoundException;
        }
        $this->htmlFile = file_get_contents($_SERVER['DOCUMENT_ROOT'] . $this->templatePathFile, true);

        //transforme  les valeurs
        foreach ($data as $key => $value){
            $this->htmlFile = str_replace("##$key##", $value, $this->htmlFile);
        }
        return $this;
    }

    //upload
    public function generateInDoc($fileName)
    {
        $filepath = $_SERVER['DOCUMENT_ROOT'] .  "/doc/$fileName.doc";
        if (!$handle = fopen($filepath, 'w')) {
            exit("Impossible d'ouvrir le fichier ($filepath)");
        }

        // On ajoute le contenu
        if (fwrite($handle, $this->htmlFile) === FALSE) {
            exit("Impossible d'écrire dans le fichier ($filepath)");
        }

        fclose($handle);
    }

    //upload
    public function getHtml()
    {
        return $this->htmlFile;
    }
}