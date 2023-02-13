<?php

namespace App\Services\AtlasAcademyApi;

class AtlasAcademyApi
{
    public function callApi(string $url){
        ini_set('memory_limit', '-1');
        $response = file_get_contents($url);

        $result = json_decode($response, true);

        return $result;
    }

    public function getServants(){
        $url = "https://api.atlasacademy.io/export/JP/nice_servant_lang_en.json";

        return $this->callApi($url);
    }





}