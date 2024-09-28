
<?php

  // ==========================================================================
  // Regency Estates Lot query statements ===================================
  // ==========================================================================

    function find_all_lots() {
    global $db;

    $sql = "SELECT * FROM lot ORDER BY id";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
    }

?>

