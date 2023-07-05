<?php

namespace App\Services\Aparat;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AparatHandler
{
    const EXPIRE_TIME = 18000;
    const TIMEOUT = 300;

    public function uploadFile(UploadedFile $file, $title)
    {
        // 1. get token
        // 2. get upload form
        // 3. upload file

        $token = $this->getToken();
        $uploadForm = $this->uploadForm($token);

        $fileName = uniqid(time() . mt_rand()) . '.' . $file->getClientOriginalExtension();
        $response = Http::attach(
            // 'video', file_get_contents($file->getPathname()), $fileName
            'video',
            $file->get(),
            $fileName,
        )->timeout(self::TIMEOUT)->post($uploadForm['formAction'], [
            'frm-id' => $uploadForm['frm-id'],
            'data[title]' => $title,
            'data[category]' => config('aparat.tech_category_id'),
        ]);

        return $response->json('uploadpost.uid');
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

    private function uploadForm($token)
    {
        $url = $this->replaceRequirement(config('aparat.upload_​form'), [
            '{user}' => config('aparat.username'),
            '{token}' => $token,
        ]);
        $response = Http::get($url);
        return $response->json('uploadform');
    }

    private function replaceRequirement($url, $options)
    {
        foreach ($options as $key => $value) {
            $url = str_replace($key, $value, $url);
        }
        return $url;
    }
}
