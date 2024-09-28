
<?php

  // ==========================================================================
  // Regency Estates Lot query statements ===================================
  // ==========================================================================

    function find_all_assessments() {
    global $db;

    $sql = "SELECT * FROM assessment ORDER BY yr";
    // echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
    }

?>

