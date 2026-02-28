
<?php

class FeeSelector
{

    public function __construct()
    {
    }

    public function select_by_year($year)
    {        
        global $db;

        $sql =  "SELECT * FROM fees ";
        $sql .= "WHERE dt >= '" . $year . "-01-01' AND dt <= '" . $year . "-12-31'";
        $sql .= "ORDER BY fk_lot_id ASC";
        // echo $sql;

        $result = mysqli_query($db, $sql);
        return $result;
    }

    public function fee_count_for_year($year)
    {
        global $db;

        $sql =  "SELECT COUNT(*) FROM fees ";
        $sql .= "WHERE dt >= '" . $year . "-01-01' AND dt <= '" . $year . "-12-31'";
        // echo $sql;

        $result = mysqli_query($db, $sql);
        $row = mysqli_fetch_array($result);

        return $row[0];
    }

}

?>

