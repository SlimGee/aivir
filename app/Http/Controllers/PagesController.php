<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PagesController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(string $page)
    {
        throw_unless(view()->exists('pages.'.$page), NotFoundHttpException::class);

        return view('pages.'.$page);
    }
}
