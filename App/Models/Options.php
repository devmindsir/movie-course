<?php

namespace App\Models;

use App\Core\Model;

class Options extends Model
{
    protected $table='options';
    public function __construct()
    {
        parent::__construct();
    }

    public static function getOptions(): array
    {
        $instance=new self();
        $options=$instance->all();
        $result=[];
        foreach ($options as $option){
            $setting=$option->setting;
            $value=$option->value;
            $result[$setting]=$value;
        }
        return $result;
    }

}