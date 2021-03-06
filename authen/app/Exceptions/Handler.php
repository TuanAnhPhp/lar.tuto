<?php

namespace App\Exceptions;

use App\Http\Middleware\Authenticate;
use Exception;
use http\Env\Response;
use Illuminate\Auth\AuthenticationException;
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
        return parent::render($request, $exception);
    }

    /**
     * Phuong thuc nay se redirect khi nguoi dung khong xac thuc
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */


    protected function unauthenticated($request, AuthenticationException $exception)
    {
        if ($request->expectsJson()) {
            return response()->json(['error' => 'Unauthenticated.'],401);
        }

        $guard = array_get($exception->guards(),0);
        switch ($guard) {
            case 'admin':
                $login = 'admin.auth.login';
                break;
            case 'seller':
                $login = 'seller.auth.login';
                break;
            case 'shipper':
                $login = 'shipper.auth.login';
                break;
            default:
                $login = 'login';
                break;
        }

        return redirect()->guest(route($login));
    }
}
