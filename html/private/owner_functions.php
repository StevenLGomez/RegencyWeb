
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

    $sql = "SELECT fk_lot_id, last, first, address, city, state, zip, phone, email FROM owner ";
    $sql .= "WHERE fk_lot_id = '" . db_escape($db, $lot_id) . "' AND is_current = 1 ";
    $sql .= "LIMIT 1;";
    // echo $sql;

    $result = mysqli_query($db, $sql);
    // $result = mysqli_fetch_assoc($db, $sql);
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
            $total = 'TOTAL';
            $due = 'DUE';

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

