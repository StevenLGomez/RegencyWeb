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

  // Lots         =============================================================

  function create_lot_list() {
    global $db;

    $sql = "SELECT id FROM lot ORDER BY id";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function create_address_list() {
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

  function get_address_for_lot($lot_id) {
      global $db;

      $sql = "SELECT address FROM lot ";
      $sql .= "WHERE id = '" . db_escape($db, $lot_id) . "' ";
      $sql .= "LIMIT 1";
      // echo $sql;
      $result = mysqli_query($db, $sql);
      confirm_result_set($result);

      $address_result = mysqli_fetch_row($result);
      $property_address = $address_result['0'];
      return $property_address;
  }


?>

