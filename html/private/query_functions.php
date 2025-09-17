<?php

  // ==========================================================================
  // Regency Estates query statements =========================================
  // ==========================================================================

  // Categories   =============================================================
  function find_all_categories() {
    global $db;

    $sql = "SELECT * FROM category ";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  // Deposits     =============================================================
  function find_all_deposits() {
    global $db;

    // $sql = "SELECT * FROM deposit WHERE dt >= '2023-01-01' ORDER BY dt";
    $sql = "SELECT * FROM deposit ORDER BY dt";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

?>

