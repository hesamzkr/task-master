<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class WelcomeController extends Controller
{
    public function welcome(Request $request)
    {
        $cacheKey = 'welcome_page';
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        $content = view('welcome')->render();

        Cache::put($cacheKey, $content, now()->addHour());

        return $content;
    }
}
