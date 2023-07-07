<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class VideoInfoException extends Exception
{
    /**
     * The error message.
     *
     * @var string
     */
    protected $message = 'عملیات گرفتن اطلاعات ویدئو از آپارات موفقیت آمیز نبود!';

    /**
     * The error code.
     *
     * @var int
     */
    protected $code = 500;

    public function report()
    {
        Log::channel('aparat_logs')->error($this->getMessage(), [
            'exception' => $this,
        ]);
    }
}
