
<?php


  // Fees         =============================================================


  function validate_fee_entry($fee_entry) {
      global $db;

  }

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

  function find_undeposited_fees() {
      global $db;

      // $sql = "SELECT * FROM fees WHERE (fk_deposit_id = NULL OR fk_deposit_id = 0) dt >= '2024-01-01' ORDER BY dt";
      // $sql = "SELECT * FROM fees WHERE fk_deposit_id = '' AND dt >= '2011-01-01' ORDER BY dt";
      $sql = "SELECT * FROM fees WHERE dt >= '2011-01-01' AND dt <= '2011-12-31' ORDER BY dt";
      $result = mysqli_query($db, $sql);
      return $result;
  }

  function create_new_fee($fee) {
      global $db;

      echo 'Function: create_new_fee';

  }


?>


