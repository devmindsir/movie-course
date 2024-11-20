<?php

namespace App\Models;

use App\Core\Model;
use App\Exceptions\TeacherNotFoundException;

class Courses extends Model
{
    protected $table = 'Courses';
    public function __construct()
    {
        parent::__construct();
    }

    public function getCourses(int $limit=null,string $orderby=null):array
    {
        $order=$orderby? "ORDER BY $orderby DESC" : "";
        $sql = "
        SELECT c.*,t.id AS teacher_id,t.family
        FROM courses c 
        JOIN teachers t
        ON t.id=c.teacher_id
        WHERE c.status=?
        $order
        LIMIT ?
        ";
        return $this->db->doSelect($sql,['publish',$limit],class:__CLASS__);
    }

    private function options($variable){
        $options=Options::getOptions();
        return $options[$variable];

    }

    public function courses():array
    {
        $limit=$this->options('limit');
        return $this->getCourses($limit);
    }
    public function populars():array
    {
        $limit=$this->options('slider_limit');
        return $this->getCourses($limit,'views');
    }


    public static function lastCourses():array
    {
        $instance=new self();
        return $instance->courses();
    }


    public function getCourseCategory(int $category,int $id):array
    {
        $sql="SELECT id,title,poster FROM $this->table WHERE `category_id`=? AND `id`!=?";
        return $this->db->doSelect($sql,[$category,$id],__CLASS__);
    }



    public function getTeacherCourse(int $teacher_id,int $currentPage):array
    {
        $sql="SELECT * FROM $this->table WHERE `teacher_id`=? AND `status`=?";
        $result=$this->db->doSelect($sql,[$teacher_id,'publish'],__CLASS__);
        $count=count($result);
        $countView=array_sum(array_column($result,'views'));


        $itemsPerPage=1;
        $totalPages=ceil($count/$itemsPerPage);

        $offset=($currentPage-1)*$itemsPerPage;
        $paginationResult=array_slice($result,$offset,$itemsPerPage);

        return [$paginationResult,$count,$countView,$totalPages];
    }

    public function getCategoryCourse(int $category_id,int $currentPage):array
    {
        $sql="SELECT c.*,t.family
               FROM courses c
               JOIN teachers t
               ON c.teacher_id=t.id
               WHERE `category_id`=? AND `status`=?";
        $result=$this->db->doSelect($sql,[$category_id,'publish'],__CLASS__);
        $count=count($result);
        $countView=array_sum(array_column($result,'views'));

        $itemsPerPage=1;
        $totalPages=ceil($count/$itemsPerPage);
        $offset=($currentPage-1)*$itemsPerPage;
        $paginationResult=array_slice($result,$offset,$itemsPerPage);

        return [$paginationResult,$count,$countView,$totalPages];
    }



}