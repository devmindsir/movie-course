<?php

//!Fetch Data
function fetchData($connect,$sql,$prams=[]){
  $stmt=mysqli_prepare($connect,$sql);
  if(!$stmt || !mysqli_stmt_execute($stmt,$prams)){
    die("Error Execute Query:".mysqli_stmt_error($stmt));
  }
  $result=mysqli_stmt_get_result($stmt);
  $data=mysqli_fetch_all($result,MYSQLI_ASSOC);
  return $data;
}


?>