<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LocaleController extends Controller
{
    public function switch($locale)
    {
        if (! in_array($locale, ['en', 'nl'])) {
            abort(400);
        }

        session(['locale' => $locale]);

        return back();
    }
}
