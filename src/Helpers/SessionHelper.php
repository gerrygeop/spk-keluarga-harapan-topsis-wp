<?php

namespace App\Helpers;

class SessionHelper {
    public static function isLoggedIn() {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }
}
