<?php

namespace App\Services\Aparat;

use App\Exceptions\VideoDeleteException;
use App\Exceptions\VideoInfoException;
use App\Exceptions\VideoUploadException;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

class AparatHandler
{
    const EXPIRE_TIME = 18000; // 5 h (for token cache)
    const TIMEOUT = 1800; // 30 m (for execution time in when upload the file)

    public function uploadVideo(UploadedFile $file, $title)
    {
        // 1. get token
        // 2. get upload form
        // 3. upload file
        try {
            ini_set('max_execution_time', self::TIMEOUT);
            set_time_limit(self::TIMEOUT);

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
        } catch (\Throwable $th) {
            try {
                throw new VideoUploadException();
            } catch (VideoUploadException $e) {
                $e->report();
            }
        }
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

    public function videoInfo($uid)
    {
        try {
            $url = $this->replaceRequirement(config('aparat.video'), [
                '{uid}' => $uid,
            ]);
            $response = Http::get($url);
            return $response->json('video');
        } catch (\Throwable $th) {
            try {
                throw new VideoInfoException();
            } catch (VideoInfoException $e) {
                $e->report();
            }
        }
    }

    public function checkProcess($uid)
    {
        try {
            return $this->videoInfo($uid)['process'];
        } catch (\Throwable $th) {
            try {
                throw new VideoInfoException();
            } catch (VideoInfoException $e) {
                $e->report();
            }
        }
    }

    public function deleteVideo($uid)
    {
        try {
            $deleteVideoLink = $this->deleteVideoLink($uid);
            $response = Http::get($deleteVideoLink);
            return $response->json('deletevideo.type') == 'success';
        } catch (\Throwable $th) {
            try {
                throw new VideoDeleteException();
            } catch (VideoDeleteException $e) {
                $e->report();
            }
        }
    }

    private function deleteVideoLink($uid)
    {
        $url = $this->replaceRequirement(config('aparat.deletevideolink'), [
            '{user}' => config('aparat.username'),
            '{token}' => $this->getToken(),
            '{uid}' => $uid,
        ]);
        $response = Http::get($url);
        return $response->json('deletevideolink.deleteurl');
    }

    public function bigPoster($uid)
    {
        try {
            return $this->videoInfo($uid)['big_poster'];
        } catch (\Throwable $th) {
            try {
                throw new VideoInfoException();
            } catch (VideoInfoException $e) {
                $e->report();
            }
        }
    }
}
