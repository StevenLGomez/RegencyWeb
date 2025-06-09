
<?php


  // Fees         =============================================================
  function find_all_fees() {
    global $db;

    $sql = "SELECT * FROM fees WHERE dt >= '2024-01-01' ";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    // confirm_result_set($result);
    return $result;
  }

  function find_fees_by_lot($lot_id){
      global $db;

      $sql = "SELECT * FROM fees WHERE fk_lot_id = ". $lot_id . " ORDER BY dt";
      $result = mysqli_query($db, $sql);
      return $result;
  }




?>


