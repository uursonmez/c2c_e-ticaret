<?php
if(isset($_GET["searchkeyword"]))
{
  $searchkeyword =$_GET["searchkeyword"];
  $query .= "
  AND (urun.urun_ad LIKE '%$searchkeyword%' or urun.urun_id  LIKE '%$searchkeyword%')
  ";
}

 ?>
