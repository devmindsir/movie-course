<?php

namespace App\Models;

use App\Core\Model;

class CourseCategories extends Model
{
protected $table='course_categories';

public function __construct()
{
    parent::__construct();
}
}