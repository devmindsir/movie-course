<?php

namespace App\Models;

use App\Core\Model;

class CourseIntro extends Model
{
    protected $table='course_intro';
    public function __construct()
    {
        parent::__construct();
    }

    public function getCourseIntro(int $id):mixed
    {
       $sql="SELECT * FROM $this->table WHERE `course_id`=?";
       return $this->db->doFetch($sql,[$id],__CLASS__);
    }

}