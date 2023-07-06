<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class VideoUploadException extends Exception
{
    /**
     * The error message.
     *
     * @var string
     */
    protected $message = 'Video upload failed in aparat.';

    /**
     * The error code.
     *
     * @var int
     */
    protected $code = 500;

    public function report()
    {
        Log::channel('aparat_logs')->error('Video upload failed in aparat.', [
            'exception' => $this,
        ]);
    }

    public function toResponse($message = null)
    {
        $message = $message ?? $this->getMessage();
        return back()->with(['error' => $message], $this->getCode());
    }
}
