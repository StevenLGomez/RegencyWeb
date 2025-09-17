
<?php

class PropertySelector
{

    public function __construct(

        )
    {
    }

    public function select_by_address()
    {
        echo 'SELECT BY ADDRESS';
    }

    public function select_by_lot()
    {
        $lot_query = create_lot_list('id');
        while($lot = mysqli_fetch_assoc($lot_query)) { 
            echo '<option value="'  . htmlsc($lot['id']) . '">';
            echo htmlsc($lot['id']) . ' (' . htmlsc($lot['address']) . ')';
            echo "</option>\n";

            // mysqli_free_result($lot_query); 
        }
    }

}

?>

