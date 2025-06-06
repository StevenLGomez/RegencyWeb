
<?php

  // ==========================================================================
  // Regency Estates Owner query statements ===================================
  // ==========================================================================

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
    $sql .= "ORDER BY buy_date DESC;";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function search_rental_properties() {
    global $db;

    $sql = "SELECT * FROM owner ";
    $sql .= "WHERE is_rental = 1";
    //echo $sql;
    $result = mysqli_query($db, $sql);
    confirm_result_set($result);
    return $result;
  }

  function create_new_owner($owner) {
      global $db;

      $errors = validate_owner($owner);
      if(!empty($errors))
      {
          return $errors;
      }

      // Insert logic to remove all previous 'current owner' tags if this addition
      // is the new 'current owner'.
      if ($owner['is_current'] == 1)
      {
          $sql = "UPDATE owner ";
          $sql .= "SET is_current = 0 ";
          $sql .= "WHERE fk_lot_id = ";
          $sql .= db_escape($db, (int)$owner['fk_lot_id']);
          $sql .= ";";

          $is_current_result = mysqli_query($db, $sql);

          if ($is_current_result) {
              echo 'Clearing of old is_current succeded';
          }
          else
          {
              // Cleanup failed !
              echo 'Clearing is_current Failed :(';
              echo mysqli_error($db);
              db_disconnect($db);
              exit;
          }
      }

      // Create query for adding this new owner
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
      $sql .= ");";

      // echo $sql;

      // For INSERT statements $result is True or False
      $result = mysqli_query($db, $sql);

      if ($result) {
          return True;
      }
      else
      {
          // INSERT statement failed !
          echo 'Insert Failed :(';
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }
  }

  function update_existing_owner($id, $owner) {
      global $db;

      $errors = validate_owner($owner);
      if(!empty($errors))
      {
          return $errors;
      }

      // Create UPDATE query for these modifications
      $sql = "UPDATE owner SET ";
      $sql .=   "first = '" . db_escape($db, $owner['first']) . "'";
      $sql .= ", mi = '" . db_escape($db, $owner['mi']) . "'";
      $sql .= ", last = '" . db_escape($db, $owner['last']) . "'";
      $sql .= ", first_2 = '" . db_escape($db, $owner['first_2']) . "'";
      $sql .= ", mi_2 = '" . db_escape($db, $owner['mi_2']) . "'";
      $sql .= ", last_2 = '" . db_escape($db, $owner['last_2']) . "'";
      $sql .= ", phone = '" . db_escape($db, $owner['phone']) . "'";
      $sql .= ", email = '" . db_escape($db, $owner['email']) . "'";
      $sql .= ", phone_2 = '" . db_escape($db, $owner['phone_2']) . "'";
      $sql .= ", email_2 = '" . db_escape($db, $owner['email_2']) . "'";
      $sql .= ", buy_date = '" . db_escape($db, $owner['buy_date']) . "'";
      $sql .= ", is_current = '" . db_escape($db, $owner['is_current']) . "'";
      $sql .= ", is_rental = '" . db_escape($db, $owner['is_rental']) . "'";

      $sql .= ", address = '" . db_escape($db, $owner['owner_address']) . "'";
      $sql .= ", city = '" . db_escape($db, $owner['owner_city']) . "'";
      $sql .= ", state = '" . db_escape($db, $owner['owner_state']) . "'";
      $sql .= ", zip = '" . db_escape($db, $owner['owner_zip']) . "'";

      $sql .= ", notes = '" . db_escape($db, $owner['owner_notes']) . "'";

      $sql .= " WHERE id = " . (int)$id;
      $sql .= ";";

      // echo $sql;

      // Check for successful UPDATE 
      $result = mysqli_query($db, $sql);

      if ($result) {
          return True;
      }
      else
      {
          // UPDATE statement failed !
          echo 'Update Failed :(';
          echo mysqli_error($db);
          db_disconnect($db);
          exit;
      }











  }

  function generate_mail_merge_csv() {

      global $db;

    // ==========================================================================
    // Fields required for creating Mail Merge documents
    // Lot, Last, First, Owner_Add, Owner_City, O_St, O_Zip, Lot_Add, Phone, email, Total, Due
    // ==========================================================================

    // Create an opening marker
    echo "VVVVVVVVVVVVVVVVVVVVVV  COPY INFORMATION BELOW THIS LINE VVVVVVVVVVVVVVVVVVVVVVVVVVVVVV<br />";

    // Create header line for CSV output
    echo "Lot, Last, First, Owner_Add, Owner_City, O_St, O_Zip, Lot_Add, Phone, email, Total, Due<br />";

    // Read the total amount of all assessment charges (same value applies to all lots)
    $query = "SELECT SUM(amount) FROM assessment";
    $assessment_sum_result = mysqli_query($db, $query);
    $assessment_sum = $assessment_sum_result->fetch_row()[0];
    mysqli_free_result($assessment_sum_result);
    // **************************************************************

    // Loop through all lots to query the necessary information for mail merge
    for ($lot_id = 1; $lot_id <= 68; $lot_id++)
    {
        // echo "| lot_id = " . $lot_id . " |<br />";

        // Read the total amount of fees paid for this lot for all history
        $query = "SELECT SUM(amount) FROM fees WHERE fk_lot_id = '" . db_escape($db, $lot_id) . "'"; 
        // echo "| History: " . $query . " |<br />";
        $lot_sum_result = mysqli_query($db, $query);
        confirm_result_set($lot_sum_result);
        $lot_sum = $lot_sum_result->fetch_row()[0];
        mysqli_free_result($lot_sum_result);

        // Calculate the total amount currently due from this lot
        $due_from_this_lot = $assessment_sum - $lot_sum;
        // **************************************************************

        // Read the needed values from the lot table
        $query = "SELECT id, address, city, state, zip FROM lot ";
        $query .= "WHERE id = '" . db_escape($db, $lot_id) . "'";
        // echo "| Lot: " . $query . " |<br />";
        $lot_result = mysqli_query($db, $query);
        // confirm_result_set($lot_result);
        $lot_row = mysqli_fetch_row($lot_result);
        // **************************************************************

        // Read the needed values from the owner table
        $query = "SELECT fk_lot_id, last, first, address, city, state, zip, phone, email, is_rental FROM owner ";
        $query .= "WHERE fk_lot_id = '" . db_escape($db, $lot_id) . "' AND is_current = '1'";
        $query .= "LIMIT 1;";
        // echo "| Owner: " . $query . " |<br />";

        $owner_result = mysqli_query($db, $query);
        // $owner_result = mysqli_fetch_assoc($db, $query);
        confirm_result_set($owner_result);

        // **************************************************************
        if ($owner_result)
        {
            while ($owner_row = mysqli_fetch_row($owner_result))
            {
                $is_rental = $owner_row[9];

                if ($is_rental == 1)
                {
                    // Rentals use values from the owner table
                    $owner_add = $owner_row[3];
                    $owner_city = $owner_row[4];
                    $o_st = $owner_row[5];
                    $o_zip = $owner_row[6];
                }
                else
                {
                    // NON Rentals use the default values from the lot table
                    $owner_add = $lot_row[1];
                    $owner_city = $lot_row[2];
                    $o_st = $lot_row[3];
                    $o_zip = $lot_row[4];
                }

                // The order of items below MUST match the order of the header line
                $merge_string = $lot_id . ', ';                  // This Lot #
                $merge_string .= $owner_row[1] . ', ';           // Owner's last name
                $merge_string .= $owner_row[2] . ', ';           // Owner's first name
                $merge_string .= $owner_add . ', ';              // Owner's address  (may differ from lot address)
                $merge_string .= $owner_city . ', ';             // Owner's city     (may differ from lot city)
                $merge_string .= $o_st . ', ';                   // Owner's state    (may differ from lot state)
                $merge_string .= $o_zip . ', ';                  // Owner's zip code (may differ from lot zip code)
                $merge_string .= $lot_row[1] . ', ';             // Lot Address (physical address of property)
                $merge_string .= $owner_row[7] . ', ';           // Owner's phone number
                $merge_string .= $owner_row[8] . ', ';           // Owner's email
                $merge_string .= $assessment_sum . ', ';         // Total assessment due from all lots
                $merge_string .= $due_from_this_lot;             // Amount due from this lot (including late/missed payments

                echo $merge_string . "<br />";
            }
        }
    }
    echo "^^^^^^^^^^^^^^^^^^^^^^  COPY INFORMATION ABOVE THIS LINE ^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^<br />";
}

  function find_owner_by_last($last_name) {
    global $db;

    $sql = "SELECT * FROM owner ";
    $sql .= "WHERE last LIKE '" . "%" . db_escape($db, $last_name) . "%' ";
    $sql .= "ORDER BY last;";
    //$sql .= "LIMIT 1;";
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
    // echo $sql;

     $result = mysqli_query($db, $sql);
     confirm_result_set($result);
     return $result;
  }



?>

