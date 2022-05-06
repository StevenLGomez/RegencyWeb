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

    $sql = "SELECT * FROM deposit WHERE dt > '2021-01-01' ";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  // Expenses     =============================================================
  function find_all_expenses() {
    global $db;

    $sql = "SELECT * FROM expense WHERE dt > '2020-01-01' ";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  // Fees         =============================================================
  function find_all_fees() {
    global $db;

    $sql = "SELECT * FROM fees WHERE dt > '2020-01-01' ";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  // Lots         =============================================================
  function find_all_lots() {
    global $db;

    $sql = "SELECT * FROM lot ORDER BY address";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_address_by_lot_id($lot_id) {
      global $db;

      $sql = "SELECT address FROM lot ";
      $sql .= "WHERE id = '" . db_escape($db, $lot_id) . "' ";
      $sql .= "LIMIT 1";
      // echo $sql;
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);
      return $result;
  }

  // Owners       =============================================================
  function find_all_owners() {
    global $db;

    // $sql = "SELECT * FROM owner LIMIT 15";
    $sql = "SELECT * FROM owner ORDER BY last";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_owners_by_lot($lot_id) {
    global $db;

    $sql = "SELECT * FROM owner "; 
    $sql .= "WHERE fk_lot_id='" . db_escape($db, $lot_id) . "' ";
    $sql .= "ORDER BY buy_date;";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_owner_by_id($id) {
    global $db;

    $sql = "SELECT * FROM owner "; 
    $sql .= "WHERE id='" . db_escape($db, $id) . "' ";
    $sql .= "LIMIT 1;";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function find_owner_by_last($last_name) {
    global $db;

    $sql = "SELECT * FROM owner "; 
    $sql .= "WHERE last='" . db_escape($db, $last_name) . "' ";
    $sql .= "LIMIT 1;";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

?>

