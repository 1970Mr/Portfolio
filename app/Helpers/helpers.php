<?php

// $special_route for error time (for when route want variables)
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
    try {
        // check has file
        if (is_null($file)) throw new Exception('Not Implemented');

        // move file
        $fileName = uniqid('RtsRfFw' . time() . mt_rand()) . '.' . $file->getClientOriginalExtension();
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

function image_delete($path)
{
    if (file_exists($path)) unlink($path);

    //   try {
    //     if (!file_exists($path)) throw new Exception('Not Implemented');
    //     unlink($path);
    //   } catch (Exception $e) {
    //     return abort(501, $e->getMessage());
    //   }
}
