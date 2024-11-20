<?php

namespace App\Models;

use App\Core\Model;

class Course_Videos extends Model
{
    protected $table='course_videos';
    public function __construct()
    {
        parent::__construct();
    }

    public function getCourseVideos(int $id):array
    {
        $sql = "SELECT * FROM $this->table WHERE `course_id`=? AND `parent`=?";
        $parents = $this->db->doSelect($sql, [$id, 0], __CLASS__);
        foreach ($parents as $row){
        $child="SELECT * FROM $this->table WHERE `parent`=?";
        $result=$this->db->doSelect($child,[$row->id],__CLASS__);
        $row->childs=$result;
        }
        return $parents;
    }


}