
<?php

class PropertySelector
{

    public function __construct(

        )
    {
    }

    public function select_by_address()
    {
        $lot_list = create_lot_list('address');
        while($lot = mysqli_fetch_assoc($lot_list)) { 
            echo '<option value="'  . htmlsc($lot['id']) . '">';
            echo htmlsc($lot['address']) . ' (' . htmlsc($lot['id']) . ')';
            echo "</option>\n";
        }
        mysqli_free_result($lot_list); 
    }

    public function select_by_lot()
    {
        $lot_list = create_lot_list('id');
        while($lot = mysqli_fetch_assoc($lot_list)) { 
            echo '<option value="'  . htmlsc($lot['id']) . '">';
            echo htmlsc($lot['id']) . ' (' . htmlsc($lot['address']) . ')';
            echo "</option>\n";
        }
        mysqli_free_result($lot_list); 
    }

}

?>

