
<?php


  // Fees         =============================================================
  function find_all_fees() {
    global $db;

    $sql = "SELECT * FROM fees WHERE dt >= '2024-01-01' ";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }





?>


