
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

      $sql = 'SELECT * FROM fees WHERE (fk_deposit_id IS NULL OR fk_deposit_id = "") AND dt >= "2023-10-17" ORDER BY dt';
      $result = mysqli_query($db, $sql);
      return $result;
  }

  // INSERT INTO fees (dt, payee, fk_lot_id, ck_no, amount, note) VALUES ('2025-09-17', 'Gomez',35,3569, 50, 'Best resident'); 
  // Reports: #1364 - Field 'id' doesn't have a default value
  function add_new_fee_to_db($fee) {
      global $db;

      $sql =  "INSERT INTO fees " ;
      $sql .= "(dt, payee, fk_lot_id, ck_no, amount, note) VALUES (";
      $sql .= "'" . db_escape($db, $fee['dt']) . "', ";
      $sql .= "'" . db_escape($db, $fee['payee'])   . "',";
      $sql .= db_escape($db, (int)$fee['fk_lot_id'])   . ",";
      $sql .= db_escape($db, (int)$fee['ck_no']) . ", ";
      $sql .= db_escape($db, (float)$fee['amount']) . ", ";
      $sql .= "'" . db_escape($db, $fee['note']) . "'";
      $sql .= ");";

      echo $sql;

  }


?>


