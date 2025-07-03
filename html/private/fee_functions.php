
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

  function add_new_fee_to_db($fee) {
      global $db;

      // echo "db_escape test: " . db_escape($db, "Howdy Y'all") . "\n";

      $sql =  "INSERT INTO fees " ;
      $sql .= "(dt, payee, fk_lot_id, ck_no, amount, note) VALUES (";
      // $sql .= "'" . db_escape($db, $fee['dt']) . "', ";
      $sql .= "'" . $fee['dt'] . "', ";
      // $sql .= "'" . db_escape($db, $owner['first']) . "',";
      $sql .= "'" . db_escape($db, $fee['payee'])   . "',";
      $sql .= db_escape($db, (int)$fee['fk_lot_id'])   . ",";
      // $sql .= db_escape($db, (int)$owner['fk_lot_id']) . ",";
      $sql .= db_escape($db, (int)$fee['ck_no']) . ", ";
      $sql .= db_escape($db, (float)$fee['amount']) . ", ";
      $sql .= "'" . db_escape($db, $fee['note']) . "'";
      $sql .= ");";

      echo $sql;
                // $fee = [];
                // $fee['id'] = $_POST['id'] ?? '';
                // $fee['dt'] = $_POST['dt'] ?? '';
                // $fee['payee'] = $_POST['payee'] ?? '';
                // $fee['fk_lot_id'] = $_POST['fk_lot_id'] ?? '';
                // $fee['ck_no'] = $_POST['ck_no'] ?? '';
                // $fee['amount'] = $_POST['amount'] ?? '';
                // $fee['note'] = $_POST['note'] ?? '';

  }


?>


