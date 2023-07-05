<?php

namespace App\Services\Aparat;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AparatHandler
{
    const EXPIRE_TIME = 18000;

    public function uploadFile()
    {
        // 1. get token
        // 2. get upload form
        // 3. upload file

        $token = $this->getToken();
        $uploadForm = $this->uploadForm($token);

        // $response = Http::post($url);

        dd('hi');
        // return response->json('');
    }

    private function getToken()
    {
        return Cache::remember('aparat_token', self::EXPIRE_TIME, function () {
            $url = $this->replaceRequirement(config('aparat.login'), [
                '{user}' => config('aparat.username'),
                '{pass}' => sha1(md5(config('aparat.password'))),
            ]);
            $response = Http::get($url);
            return $response->json('login.ltoken');
        });
    }

    private function replaceRequirement($url, $options)
    {
        foreach ($options as $key => $value) {
            $url = str_replace($key, $value, $url);
        }
        return $url;
    }

    private function uploadForm($token)
    {
        $url = $this->replaceRequirement(config('aparat.upload_​form'), [
            '{user}' => config('aparat.username'),
            '{token}' => $token,
        ]);
        $response = Http::get($url);
        return $response->json('upload​form');
    }
}
