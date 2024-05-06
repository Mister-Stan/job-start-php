<?php

namespace Framework;

use Framework\Session;

class Authorization
{
    /**
     * Check if current logged in user owns a resource
     *
     * @param int $reasourceId
     * @return bool
     */
    public static function isOwner($reasourceId) {
        $sessionUser = Session::get('user');

        if ($sessionUser !== null && isset($sessionUser['id'])) {

            $sessionUserId = (int) $sessionUser['id'];
            return $sessionUserId === $reasourceId;

        
        }
        return false;
    }
}
