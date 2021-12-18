<?php
require_once("admin/adminislem/baglan.php");

if(isset($_POST['city_key'])){
  $city_id = $_POST['city_key'];
  $sql = "SELECT * FROM districts WHERE district_city_key = $city_id";
  $sql_prepare = $db -> prepare($sql);
  $result = $db -> query($sql);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $district_key = $row['district_key'];
      $district_name = $row['district_title'];
      echo "<option value=\"$district_key\" data-tokens=\"$district_name\">$district_name</option>\n";
    }
}

if(isset($_POST['district_key'])){
  $district_id = $_POST['district_key'];
  $sql = "SELECT * FROM neighborhoods WHERE neighborhood_district_key = $district_id";
  $sql_prepare = $db -> prepare($sql);
  $result = $db -> query($sql);

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
      $neighborhood_key = $row['neighborhood_key'];
      $neighborhood_name = $row['neighborhood_title'];
      echo "<option value=\"$neighborhood_key\" data-tokens=\"$neighborhood_name\">$neighborhood_name</option>\n";
    }
}

?>
