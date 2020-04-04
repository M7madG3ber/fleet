<?php

namespace Themes\Storefront\Http\Controllers;

use Illuminate\Routing\Controller;

class CookieBarController extends Controller
{
    public function accepted()
    {
        $cookie = cookie()->forever('cookie_bar_accepted', true);

        return response('')->withCookie($cookie);
    }
}
