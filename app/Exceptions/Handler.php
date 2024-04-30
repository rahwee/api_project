<?php

namespace App\Exceptions;

use App\Enums\Constants;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array<int, class-string<Throwable>>
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     *
     * @return void
     */
    public function register()
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        return parent::render($request, $exception);
    }

    public function unauthenticated($request, \Illuminate\Auth\AuthenticationException $exception) {
        // for api, we response the json
        if ($request->is('api/*')) {
            $msg = $exception->getMessage();
            return response()->json([
                'success' => false,
                'error_code' => $msg == 'Expired token' ? Constants::TOKEN_EXPIRED : Constants::ERROR_CODE_WRONG_AUTH_HEADER,
                'error_message' => $msg
            ], Response::HTTP_UNAUTHORIZED);
        }

        // for web, we need to redirect to login page
        return redirect()->guest(route('login'));
    }
}
