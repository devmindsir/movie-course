<?php

namespace App\Models;

use App\Core\Model;

class BlogCategories extends Model
{
    protected $table='blog_categories';
    public function __construct()
    {
        parent::__construct();
    }

}