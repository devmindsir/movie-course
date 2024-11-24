<?php

namespace App\Helper;

use App\Core\Router;
use App\Models\Options;

class Paginator
{
    private int $itemsPerPage;
public function __construct(private $db,private string $table,private string $class)
{
    $options=Options::getOptions();
    $this->itemsPerPage=$options['items_per_page'];
}

public function pagination(
    string $condition,
    array $params,
    int $currentPage,
    string $selectColumns="*",
    string $tableAlias=null
){
$tableName=$tableAlias??$this->table;
//! COUNT
$sqlCount="
SELECT COUNT(*) as totalItems,SUM(views) as totalViews
FROM $tableName
WHERE $condition
";
$countResult=$this->db->doSelect($sqlCount,$params,$this->class);
$totalItems=$countResult[0]->totalItems;
$totalViews=$countResult[0]->totalViews;

//!Pagination
$totalPages=ceil($totalItems/$this->itemsPerPage);
$offset=($currentPage-1)*$this->itemsPerPage;

//!Check CurrentPage
 if ($currentPage>$totalPages){
     (new Router())->abort();
 }

//!Get DATA
$sqlData="SELECT $selectColumns FROM $tableName WHERE $condition LIMIT ? OFFSET ?";
$dataParams=array_merge($params,[$this->itemsPerPage,$offset]);
$data=$this->db->doSelect($sqlData,$dataParams,$this->class);

return [
    'items'=>$data,
    'totalItems'=>$totalItems,
    'totalViews'=>$totalViews,
    'totalPages'=>$totalPages,
];

}
}