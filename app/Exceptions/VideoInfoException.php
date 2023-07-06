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
    protected $message = 'Get video info failed from aparat.';

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

    public function toResponse($message = null)
    {
        $message = $message ?? $this->getMessage();
        return back()->with(['error' => $message], $this->getCode());
    }
}
