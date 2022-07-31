<?php

namespace Login\Management\Middleware;

class AuthMiddleware implements Middleware {

    public function boot():void {

        $sessionName = "X-SESSION";
        $path = $_SERVER["REQUEST_URI"];
        if (isset($_COOKIE[$sessionName])) {
            if ($path == "/login" || $path == "/register") {
                header("location: /");
            }
        } else {
            if ($path != "/login" && $path != "/register") {
                header("location: /login");
            }
        }

    }

}