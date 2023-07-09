<?php

// $special_route for error time (for when route want variables)

use App\Services\Aparat\AparatHandler;

function active_route($route, $exactly = false)
{
    $route = route($route);

    if ($exactly) {
        if  ( $route == url()->current() ) return 'active';
        return;
    }

    $route = str_replace('/', '\/', $route);
    if  ( preg_match("/$route/", url()->current()) ) return 'active';
}

function text_limitation($text, $limit = 50)
{
    if (mb_strlen($text) <= $limit) return $text;
    return mb_substr($text, 0, $limit) . '...';
}

function image_upload($file, $destinationPath)
{
    return file_upload($file, $destinationPath);
}

function image_delete($path)
{
    file_delete($path);
}

function video_upload($file, $destinationPath)
{
    return file_upload($file, $destinationPath);
}

function video_delete($path)
{
    file_delete($path);
}

function file_upload($file, $destinationPath)
{
    try {
        // check has file
        if (is_null($file)) throw new Exception('Not Implemented');

        // move file
        $fileName = uniqid(time() . mt_rand()) . '.' . $file->getClientOriginalExtension();
        $file->move($destinationPath, $fileName);

        // return name, relative_path
        $fullPath = $destinationPath . '/' . $fileName;
        $WithoutPublicPath = preg_replace('~.+[\\\/]public[\\\/]~', '', $fullPath);
        return [
            'name' => $fileName,
            'relative_path' => $WithoutPublicPath,
        ];
    } catch (Exception $e) {
        // return error page
        return abort(501, $e->getMessage());
    }
}

function file_delete($path)
{
    if (file_exists($path)) unlink($path);

    //   try {
    //     if (!file_exists($path)) throw new Exception('Not Implemented');
    //     unlink($path);
    //   } catch (Exception $e) {
    //     return abort(501, $e->getMessage());
    //   }
}

function aparat() : AparatHandler {
    return new AparatHandler;
}

function addHttpsIfNeeded($url) {
    if (strpos($url, 'http://') === 0 || strpos($url, 'https://') === 0) {
        return $url;
    } else {
        return 'https://' . $url;
    }
}
