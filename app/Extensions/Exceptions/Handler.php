<?php

namespace App\Extensions\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

class Handler extends ExceptionHandler
{

    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $exception)
    {
        if ($request->expectsJson()) {
            return $this->handleApiException($request, $exception);
        }

        return parent::render($request, $exception);
    }

    /**
     * Handle API Exception
	 *
	 * @param Exception $exception
	 * @param Illuminate\Http\Request $request
	 * @return \Illuminate\Http\JsonResponse
     */

    private function handleApiException($request, Exception $exception)
    {
        $exception = $this->prepareException($exception);

        if ($exception instanceof \Illuminate\Http\Exception\HttpResponseException) {
            $exception = $exception->getResponse();
        }

        if ($exception instanceof \Illuminate\Auth\AuthenticationException) {
            $exception = $this->unauthenticated($request, $exception);
        }

        return $this->customApiResponse($exception);
    }

    /**
     * Returns an appropriate JSON response by exception status code
     *
     * @param Exception $exception
     * @return \Illuminate\Http\JsonResponse
     */
    private function customApiResponse($exception)
    {
        if (method_exists($exception, 'getStatusCode')) {
            $statusCode = $exception->getStatusCode();
        } else {
            $statusCode = 500;
        }

        $response = [];

        switch ($statusCode) {
            case 401:
                $response['message'] = 'Unauthorized.';
                break;
            case 403:
                $response['message'] = 'Forbidden.';
                break;
            case 404:
                $response['message'] = 'Not Found.';
                break;
            case 405:
                $response['message'] = 'Method Not Allowed.';
                break;
            case 500:
                $response['message'] = 'An error occured.';
                break;
            default:
                $response['message'] = $exception->getMessage();
        }

        if (config('app.debug')) {
            if ($exception instanceof \Illuminate\Http\JsonResponse) {
                if ($exception->exception !== null) {
                    $response['trace'] = $exception->exception->getTrace();
                    $response['code'] = $exception->exception->getCode();
                }
            } else {
                $response['trace'] = $exception->getTrace();
                $response['code'] = $exception->getCode();
            }
        }

        $response['status'] = $statusCode;

        return response()->json($response, $statusCode);
    }
}
