<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class VideoDeleteException extends Exception
{
    /**
     * The error message.
     *
     * @var string
     */
    protected $message = 'عملیات حذف ویدئو از آپارات موفقیت آمیز نبود!';

    /**
     * The error code.
     *
     * @var int
     */
    protected $code = 500;

    /**
     * Report the exception.
     *
     * @return bool|null
     */
    public function report()
    {
        Log::channel('aparat_logs')->error($this->getMessage(), [
            'exception' => $this,
        ]);
    }
}
