<?php

namespace App\View\Helper;

use Cake\View\Helper;

class CoursesHelper extends Helper
{

    public function get_course_image($course)
    {
        //Returns file path
        if ($course->has('image')) {
            return $course->image->filepath . DS . $course->image->filename;
        } else {
            return 'course_image.jpg';
        }
    }
    
}

?>
