
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

    function create_lot_list($sort_field) {
      global $db;

      $sql = "SELECT * FROM lot ORDER BY ". $sort_field;
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

