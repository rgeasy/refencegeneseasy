<?php

namespace App\Http\Controllers;

class CookieController extends Controller
{

    public function accept()
    {
        if(!isset($_COOKIE['cookies']) || !$_COOKIE['cookies'] === 'accepted')
        {
            setcookie("cookies", "accepted", time() + (86400 * 30 * 12));
        }

        $success = true;

        return \Response::json(compact('success'));
    }
}