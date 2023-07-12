<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{

public function download($file)
{
    $path = public_path($file);
    if (file_exists($path)) {
        return response()->download($path, $file);
    } else {
        return redirect()->back()->with('error', 'فایل موردنظر موجود نمی‌یاشد!');
    }
}
}
