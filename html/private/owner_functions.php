
<?php

  // ==========================================================================
  // Regency Estates Owner query statements ===================================
  // ==========================================================================

  function get_mail_merge_info_by_lot($lot_id) {
    global $db;

    $sql = "SELECT last, first, address, city, state, zip FROM owner ";
    $sql .= "WHERE fk_lot_id = " . $lot_id . " AND is_current = 1 ";
    $sql .= "LIMIT 1;";
    echo $sql;

    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

?>

