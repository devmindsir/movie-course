<?php

namespace App\Models;

use App\Core\Model;
use App\Exceptions\TeacherNotFoundException;
use App\Helper\Paginator;

class Courses extends Model
{
    protected $table = 'Courses';

    public function __construct()
    {
        parent::__construct();
    }

    //!Footer Get Course
    public static function lastCourses(): array
    {
        $instance = new self();
        return $instance->courses();
    }

    //!GET OPTIONS
    private function options($variable)
    {
        $options = Options::getOptions();
        return $options[$variable];

    }

    //!GET COURSE JOIN TEACHER
    public function getCourses(int $limit = null, string $orderby = null): array
    {
        $order = $orderby ? "ORDER BY $orderby DESC" : "";
        $sql = "
        SELECT c.*,t.id AS teacher_id,t.family
        FROM courses c 
        JOIN teachers t
        ON t.id=c.teacher_id
        WHERE c.status=?
        $order
        LIMIT ?
        ";
        return $this->db->doSelect($sql, ['publish', $limit], class: __CLASS__);
    }

    //!GET COURSE
    public function courses(): array
    {
        $limit = $this->options('limit');
        return $this->getCourses($limit);
    }

    //!GET POPULAR COURSE
    public function populars(): array
    {
        $limit = $this->options('slider_limit');
        return $this->getCourses($limit, 'views');
    }


//!GET CATEGORY COURSE
    public function getCourseCategory(int $category, int $id): array
    {
        $sql = "SELECT id,title,poster FROM $this->table WHERE `category_id`=? AND `id`!=?";
        return $this->db->doSelect($sql, [$category, $id], __CLASS__);
    }

    //!GET TEACHER COURSE
    public function getTeacherCourse(int $teacher_id, int $currentPage): array
    {
        $condition = '`teacher_id`=? AND `status`=?';
        $params = [$teacher_id, 'publish'];
        return (new Paginator($this->db, $this->table, __CLASS__))->pagination($condition, $params, $currentPage);
    }

    //!GET Category COURSE JOIN Teacher

    public function getCategoryCourse(int $category_id, int $currentPage): array
    {
        $condition = '`category_id`=? AND `status`=?';
        $params = [$category_id, 'publish'];
        $selectColumn='c.*,t.family';
        $join='courses c
               JOIN teachers t
               ON c.teacher_id=t.id';
        return (new Paginator($this->db, $this->table, __CLASS__))->
        pagination($condition, $params, $currentPage,$selectColumn,$join);
    }


}