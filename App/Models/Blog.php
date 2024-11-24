<?php

namespace App\Models;

use App\Core\Model;
use App\Helper\Paginator;

class Blog extends Model
{
    protected $table='blog';
    public function __construct()
    {
        parent::__construct();
    }

    //!Footer Blogs
    public static function lastBlogs():array
    {
        $options=Options::getOptions();
        $instance=new self();
        $blogs=$instance->all($options['limit'],'id');
        return $blogs;
    }

    //!GET Category
    public function getCategoryBlog(int $category_id,int $currentPage):array
    {
        $condition='`category_id`=? AND `status`=?';
        $params=[$category_id,'publish'];
        return (new Paginator($this->db,$this->table,__CLASS__))->pagination($condition,$params,$currentPage);

    }

    //!GET Author
    public function getAuthorBlog(int $author_id,int $currentPage):array
    {
        $condition='`author_id`=? AND `status`=?';
        $params=[$author_id,'publish'];
        return (new Paginator($this->db,$this->table,__CLASS__))->pagination($condition,$params,$currentPage);
    }



}