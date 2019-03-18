<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Session\TokenMismatchException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Symfony\Component\HttpKernel\Exception\ServiceUnavailableHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        HttpException::class,
        AccessDeniedHttpException::class,
        ServiceUnavailableHttpException::class,
        ModelNotFoundException::class,
        TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
    ];

    /**
     * @param Exception $exception
     * @return mixed|void
     * @throws Exception
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param Exception $exception
     * @return \Illuminate\Http\RedirectResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function render($request, Exception $exception)
    {
        if ($exception instanceof ValidationException) {
            return parent::render($request, $exception);
        }

        $isAdminRequest = ($request->getHost() == env('DOMAIN_ADMIN'));

        if ($isAdminRequest and !$request->user('admin')) {
            return redirect()
                ->route('admin.login');
        }

        switch (true)
        {
            case $exception instanceof AuthenticationException:
                return $isAdminRequest ?
                    redirect()
                        ->route('admin.login') :
                    redirect()
                        ->route('site.index');

            case $exception instanceof TokenMismatchException:
                if ( ! $request->ajax())
                {
                    return redirect()
                        ->back()
                        ->withInput($request->all());
                }
                break;
        }

        if ($this->isHttpException($exception)) {
            switch ($exception->getStatusCode()) {
                case 404:
                    return redirect()->route('404');
                    break;
                case 405:
                    return redirect()->route('405');
                    break;
            }
        }

        return parent::render($request, $exception);
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param AuthenticationException $exception
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    protected function unauthenticated($request, AuthenticationException $exception)
    {
        return $request->expectsJson()
            ? response()->json(['error' => 'Unauthenticated.'], 401)
            : redirect()->guest(route('admin.login'));
    }
}
