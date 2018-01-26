<?php

namespace App\View\Helper;

use Cake\View\Helper;

class SchoolsHelper extends Helper
{
    public function get_school_image($school)
    {
        //Returns file path
        if ($school->has('image')) {
            return $school->image->filepath . DS . $school->image->filename;
        } else {
            return 'school-image.jpeg';
        }
    }
}
?>
