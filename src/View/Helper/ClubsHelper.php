<?php

namespace App\View\Helper;

use Cake\View\Helper;

class ClubsHelper extends Helper
{
    public function isEditor($role_id)
    {
	    if ($role_id == 1) {
	        return true;
        } else {
            return false;
	    }
    }

    public function get_club_image($club)
    {
        if ($club->has('image')) {
            return $club->image->filepath . DS . $club->image->filename;
        } else {
            return 'group_image.png';
        }
    }

}

?>
