<?php


namespace App\Service;


class CompileTemplateService
{
    public function compile(string $html, array $allData)
    {
        //Si il n'y a aucune donnée, il n'y a rien a modifié
        if(empty($allData)){
            return $html;
        }

        preg_match('/{{(.*)}}/', $html, $matches);

        //Si il n'y a aucun match s'est qu'il n'y a pas de variable correspondante
        if(!isset($matches[1])){
            return $html;
        }
        foreach ($allData as $key => $value){
            foreach ($matches as $match){
                if($key == $match){
                    $html = str_replace('{{' . $key . '}}', $value, $html);
                }
            }
        }
        return $html;
    }
}