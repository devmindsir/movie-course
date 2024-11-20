<?php

namespace App\Models;

use App\Core\Model;

class Blog extends Model
{
    protected $table='blog';
    public function __construct()
    {
        parent::__construct();
    }

    public static function lastBlogs():array
    {
        $options=Options::getOptions();
        $instance=new self();
        $blogs=$instance->all($options['limit'],'id');
        return $blogs;
    }

    public function getCategoryBlog(int $category_id,int $currentPage):array
    {
        $sql="SELECT * FROM $this->table WHERE `category_id`=? AND `status`=?";
        $result=$this->db->doSelect($sql,[$category_id,'publish'],__CLASS__);
        $count=count($result);

        $itemsPerPage=1;
        $totalPages=ceil($count/$itemsPerPage);
        $offset=($currentPage-1)*$itemsPerPage;
        $paginationResult=array_slice($result,$offset,$itemsPerPage);
        return [$paginationResult,$count,$totalPages];
    }

    public function getAuthorBlog(int $author_id,int $currentPage):array
    {
        $sql="SELECT * FROM $this->table WHERE `author_id`=? AND `status`=?";
        $result=$this->db->doSelect($sql,[$author_id,'publish'],__CLASS__);
        $count=count($result);
        $countView=array_sum(array_column($result,'views'));

        $itemsPerPage=1;
        $totalPages=ceil($count/$itemsPerPage);
        $offset=($currentPage-1)*$itemsPerPage;
        $paginationResult=array_slice($result,$offset,$itemsPerPage);

        return [$paginationResult,$count,$countView,$totalPages];
    }



}