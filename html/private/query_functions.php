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

  function search_renting_owners() {
    global $db;

    $sql = "SELECT * FROM owner "; 
    $sql .= "WHERE is_rental = 1";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function insert_new_owner($owner) {
      global $db;

      $errors = validate_owner($owner);
      if(!empty($errors))
      {
          return $errors;
      }

      $sql = "INSERT INTO owner ";
      $sql .= "(fk_lot_id, first, mi, last, first_2, mi_2, last_2, ";
      $sql .= "address, city, state, zip, phone, email, phone_2, ";
      $sql .= "email_2, buy_date, is_current, is_rental) ";
      $sql .= "VALUES (";
      $sql .= db_escape($db, (int)$owner['fk_lot_id']) . ",";
      $sql .= "'" . db_escape($db, $owner['first']) . "',";
      $sql .= "'" . db_escape($db, $owner['mi']) . "',";
      $sql .= "'" . db_escape($db, $owner['last']) . "',";
      $sql .= "'" . db_escape($db, $owner['first_2']) . "',";
      $sql .= "'" . db_escape($db, $owner['mi_2']) . "',";
      $sql .= "'" . db_escape($db, $owner['last_2']) . "',";
      $sql .= "'" . db_escape($db, $owner['address']) . "',";
      $sql .= "'" . db_escape($db, $owner['city']) . "',";
      $sql .= "'" . db_escape($db, $owner['state']) . "',";
      $sql .= "'" . db_escape($db, $owner['zip']) . "',";
      $sql .= "'" . db_escape($db, $owner['phone']) . "',";
      $sql .= "'" . db_escape($db, $owner['email']) . "',";
      $sql .= "'" . db_escape($db, $owner['phone_2']) . "',";
      $sql .= "'" . db_escape($db, $owner['email_2']) . "',";
      $sql .= "'" . db_escape($db, $owner['buy_date']) . "',";
      $sql .= "'" . db_escape($db, $owner['is_current']) . "',";
      $sql .= "'" . db_escape($db, $owner['is_rental']) . "'";
      $sql .= ")";

      echo $sql;

      //return $sql;
      //exit;

      // For INSERT statements $result is True or False
      $result = mysqli_query($db, $sql);

      if ($result) {
          return True;
      }
      else
      {
          // INSERT failed !
          echo 'Insert Failed :(';
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }
  }


?>

