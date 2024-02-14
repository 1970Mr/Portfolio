<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{

public function download($file)
{
    $file = base64_decode($file);
    $path = public_path($file);
    if (file_exists($path)) {
        return response()->download($path, 'Resume.' . pathinfo($file, PATHINFO_EXTENSION));
    } else {
        return redirect()->back()->with('error', 'فایل موردنظر موجود نمی‌باشد!');
    }
}
}
