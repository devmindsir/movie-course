<?php

//!Fetch Data
function fetchData($sql,$prams=[],$fetch=""){
  global $connect;
  $stmt=mysqli_prepare($connect,$sql);
  if(!$stmt || !mysqli_stmt_execute($stmt,$prams)){
    die("Error Execute Query:".mysqli_stmt_error($stmt));
  }
  $result=mysqli_stmt_get_result($stmt);
  if($fetch===""){
  $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
  }elseif($fetch==="fetch"){
    $data=mysqli_fetch_assoc($result);
  }
  return $data;
}


?>