<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        HttpException::class,
        ModelNotFoundException::class,
    ];

    /**
     * Report or log an exception.
     *
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $e
     * @return void
     */
    public function report(Exception $e)
    {
        return parent::report($e);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $e
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {
        if ($this->isHttpException($e)) {
            switch ($e->getStatusCode()) {
                // not found
                case 404:
                    return \Response::view('admin.404');
                    break;
                // Forbidden
                case 401:
                    return \Response::view('errors.401');
                    break;
                // Unauthorized action.
                case 403:
                    return \Response::view('errors.403');
                    break;
                // internal error_log(message)
                case 500:
                    return \Response::view('admin.500');
                    break;
                // Link expire.
                case 410;
                    return \Response::view('errors.410');
                    break;

                default:
                    return $this->renderHttpException($e);
                break;
            }
        } else {
            return parent::render($request, $e);
        }
    }
}
