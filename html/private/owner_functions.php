
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

    // Read the is_rental flag for this lot/owner to determine whether to use the default
    // lot address or the owner's (absentee) address.
    $query = "SELECT is_rental FROM owner WHERE fk_lot_id = '" . db_escape($db, $lot_id) . "' AND is_current = 1";
    $is_rental_result = mysqli_query($db, $query);
    // for PHP 8.1+ -> $is_rental = $is_rental_result->fetch_column();
    $is_rental = $is_rental_result->fetch_row()[0];
    mysqli_free_result($is_rental_result);
    // **************************************************************

    // Read the total amount of all historical fee (assessment) charges (same value will apply to all lots)
    $query = "SELECT SUM(amount) FROM assessment";
    $assessment_sum_result = mysqli_query($db, $query);
    $assessment_sum = $assessment_sum_result->fetch_row()[0];
    mysqli_free_result($assessment_sum_result);
    // **************************************************************

    // Read the total amount of fees paid by this lot for all history
    $query = "SELECT SUM(amount) FROM fees WHERE fk_lot_id = " . db_escape($db, $lot_id); 
    echo $query;
    $lot_sum_result = mysqli_query($db, $query);
    $lot_sum = $lot_sum_result->fetch_row()[0];
    mysqli_free_result($lot_sum_result);
    // **************************************************************

    if ($is_rental)
    {
        echo "Assessment Sum: " . $assessment_sum . " Lot SUM ". $lot_sum . " Lot #" . $lot_id . " is RENTAL Property\n";
    }
    else
    {
        echo "Assessment Sum: " . $assessment_sum . " Lot SUM " . $lot_sum . "Lot #" . $lot_id . " NOT rental property\n";
    }
    echo '<br />';

    $query = "SELECT fk_lot_id, last, first, address, city, state, zip, phone, email FROM owner ";
    $query .= "WHERE fk_lot_id = '" . db_escape($db, $lot_id) . "' AND is_current = 1 ";
    $query .= "LIMIT 1;";
    // echo $query;

    $result = mysqli_query($db, $query);
    // $result = mysqli_fetch_assoc($db, $query);
    confirm_result_set($result);

    if ($result)
    {
        while ($row = mysqli_fetch_row($result))
        {
            $lot = $row[0];
            $last = $row[1];
            $first = $row[2];
            $owner_add = $row[3];
            $owner_city = $row[4];
            $o_st = $row[5];
            $o_zip = $row[6];
            $phone = $row[7];
            $email = $row[8];
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

            echo $merge_string;
        }
    }
  }

?>

