
<?php

  // ==========================================================================
  // Regency Estates Owner query statements ===================================
  // ==========================================================================

  function get_mail_merge_info_by_lot($lot_id) {

    // ==========================================================================
    // Fields required for creating Mail Merge documents
    // Lot, Last, First, Owner_Add, Owner_City, O_St, O_Zip, Lot_Add, Phone, email, Total, Due
    // ==========================================================================

    global $db;

    echo "| lot_id = " . $lot_id . " |<br />";

    // Read the is_rental flag for this lot/owner to determine whether to use the default
    // lot address or the owner's (absentee) address.
    $query = "SELECT is_rental FROM owner WHERE fk_lot_id = '" . db_escape($db, $lot_id) . "' AND is_current = '1'";
    echo "| Rental: " . $query . " |<br />";
    $is_rental_result = mysqli_query($db, $query);
    // for PHP 8.1+ -> $is_rental = $is_rental_result->fetch_column();
    $is_rental = $is_rental_result->fetch_row()[0];
    mysqli_free_result($is_rental_result);
    echo "| is_rental: " . $is_rental . " |<br />";
    // **************************************************************

    // Read the total amount of all historical fee (assessment) charges (same value will apply to all lots)
    $query = "SELECT SUM(amount) FROM assessment";
    $assessment_sum_result = mysqli_query($db, $query);
    $assessment_sum = $assessment_sum_result->fetch_row()[0];
    mysqli_free_result($assessment_sum_result);
    // **************************************************************

    // Read the total amount of fees paid by this lot for all history
    $query = "SELECT SUM(amount) FROM fees WHERE fk_lot_id = '" . db_escape($db, $lot_id) . "'"; 
    echo "| History: " . $query . " |<br />";
    $lot_sum_result = mysqli_query($db, $query);
    confirm_result_set($lot_sum_result);
    $lot_sum = $lot_sum_result->fetch_row()[0];
    mysqli_free_result($lot_sum_result);
    // **************************************************************

    // Read the needed values from the owner table
    $query = "SELECT fk_lot_id, last, first, address, city, state, zip, phone, email FROM owner ";
    $query .= "WHERE fk_lot_id = '" . db_escape($db, $lot_id) . "' AND is_current = '1'";
    $query .= "LIMIT 1;";
    echo "| Owner: " . $query . " |<br />";

    $owner_result = mysqli_query($db, $query);
    // $owner_result = mysqli_fetch_assoc($db, $query);
    confirm_result_set($owner_result);
    // **************************************************************

    // Read the needed values from the lot table
    $query = "SELECT id, address, city, state, zip FROM lot ";
    $query .= "WHERE id = '" . db_escape($db, $lot_id) . "'";
    echo "| Lot: " . $query . " |<br />";
    $lot_result = mysqli_query($db, $query);
    // confirm_result_set($lot_result);
    $lot_row = mysqli_fetch_row($lot_result);
    // **************************************************************

    if ($owner_result)
    {
        while ($owner_row = mysqli_fetch_row($owner_result))
        {

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

            $lot = $lot_id;
            $lot_add = $lot_row[1];
            $last = $owner_row[1];
            $first = $owner_row[2];
            $phone = $owner_row[7];
            $email = $owner_row[8];
            $total = $assessment_sum;
            $due = $assessment_sum - $lot_sum;

            $merge_string = '';
            $merge_string = $lot . ', ';
            $merge_string .= $last . ', ';
            $merge_string .= $first . ', ';
            $merge_string .= $owner_add . ', ';
            $merge_string .= $owner_city . ', ';
            $merge_string .= $o_st . ', ';
            $merge_string .= $o_zip . ', ';
            $merge_string .= $lot_add . ', ';
            $merge_string .= $phone . ', ';
            $merge_string .= $email . ', ';
            $merge_string .= $total . ', ';
            $merge_string .= $due . ', ';

            echo "| Lot addr: " . $lot_add . " |<br />";
            echo "|" . $merge_string . " |<br />";
        }
    }
  }

?>

