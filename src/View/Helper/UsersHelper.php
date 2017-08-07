<?php

namespace App\View\Helper;

use Cake\View\Helper;

class UsersHelper extends Helper
{
    public function get_role_name($id)
    {
	    switch ($id) {
	        case 1: return "administrator";
		        break;
	        case 2: return "faculty";
		        break;
	        case 3: return "student";
                break;
            case 4: return "parents";
                break;
            case 5: return "government";
                break;
	        default: return "student";
	    }
    }

    public function get_profile_image($user)
    {
        //Returns file path
        if ($user->has('image')) {
            return $user->image->filepath . DS . $user->image->filename;
        } else {
            return 'profile_image.png';
        }
    }
    
    public function get_gender($gender)
    {
        if ($gender == 2) {
            return "female";
        } else {
            return "male";
        }
    }
}

?>
