<?php

namespace App\Exceptions;

use Exception;
use Laravel\Lumen\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [];
    
    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception $exception
     * @return void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }
    
    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Exception $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        $status = $e->getStatusCode();
        $message = $e->getMessage() ?: 'Error';
        switch ($status) {
            case 404:
                $message = 'Not Found.';
                break;
            case 405:
                $message = 'Method Not Allowed.';
                break;
            case 500:
                \Log::error("{$status}: {$e->getMessage()}");
                $message = 'Internal Server Error.';
                break;
        }
        return response()->json([
          'code' => $status,
          'message' => $message
        ], $status);
    }
}
