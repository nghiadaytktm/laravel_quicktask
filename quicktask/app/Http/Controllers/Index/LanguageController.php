<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App;

class LanguageController extends Controller
{
    public function index()
    {
        return \App::getLocale();
    }
    public function switchLanguage($locale)
    {
        \Session::put('locale', $locale);

         return redirect()->back();
    }
}
