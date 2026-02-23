
<?php

class FeeSelector
{

    public function __construct(

        )
    {
    }

    public function select_by_year($year)
    {
        $fee_list = find_fees_by_year($year);
        while($lot = mysqli_fetch_assoc($fee_list)) { 
            echo '<option value="'  . htmlsc($lot['id']) . '">';
            echo htmlsc($lot['address']) . ' (' . htmlsc($lot['id']) . ')';
            echo "</option>\n";
        }
        mysqli_free_result($fee_list); 
    }

//    public function select_by_lot()
//    {
//        $fee_list = create_fee_list('id');
//        while($lot = mysqli_fetch_assoc($fee_list)) { 
//            echo '<option value="'  . htmlsc($lot['id']) . '">';
//            echo htmlsc($lot['id']) . ' (' . htmlsc($lot['address']) . ')';
//            echo "</option>\n";
//        }
//        mysqli_free_result($fee_list); 
//    }

}

?>

