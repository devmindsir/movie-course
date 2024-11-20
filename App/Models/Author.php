<?php

namespace App\Models;

use App\Core\Model;

class Author extends Model
{
    protected $table = 'author';

    public function __construct()
    {
        parent::__construct();
    }

}