
<?php 
    require_once('../../../private/initialize.php');
    require_once('../../../private/owner_functions.php');

    $page_title = 'Owner Management';

    // Variables to control actions requiring Full Owner Form
    // $view_existing_owner = False;       // owner_form.php TBD
    // $edit_existing_owner = False;       // owner_form.php TBD
    // $display_new_owner = False;         // owner_index.php 
    // $last_name = '';

    // Variables to control actions requiring Owner Information List
    // $owner_list_required = False;
    // $searching_history = False;
    // $lot_id = '';

    // Variables to control actions requiring Owner Information List
    // $owner_list_required = False;
    // $full_owner_form_required = False;  // Edit, create or add owner
    $searching_rentals = False;
    $searching_history = False;
    $searching_owners = False;
    $creating_new_owner = False;

    if (is_post_request())
    {
        // Posted from owner_menu.php
        if (isset($_POST['search_last_name'])) {
            $requested_name = $_POST['last_name'];
            $switch_action = 'SearchOwners';

            $page_title = 'Owner Search';
        }
        // Posted from owner_form.php
        if (isset($_POST['create_owner'])) {
            $switch_action = 'CreateOwner';
            $page_title = 'Create Owner';
        }

        // This group supports actions request from the Owner Form
        if (isset($_POST['add_owner_from_form'])) {

            // Read the values posted from the form (recreate a local copy of $owner)
            $owner = [];
            $owner['first'] = $_POST['first'] ?? '';
            $owner['mi'] = $_POST['mi'] ?? '';
            $owner['last'] = $_POST['last'] ?? '';
            $owner['phone'] = $_POST['phone'] ?? '';
            $owner['email'] = $_POST['email'] ?? '';
            
            $owner['first_2'] = $_POST['first_2'] ?? '';
            $owner['mi_2'] = $_POST['mi_2'] ?? '';
            $owner['last_2'] = $_POST['last_2'] ?? '';
            $owner['phone_2'] = $_POST['phone_2'] ?? '';
            $owner['email_2'] = $_POST['email_2'] ?? '';
            
            $owner['fk_lot_id'] = $_POST['fk_lot_id'] ?? '';
            $owner['buy_date'] = $_POST['buy_date'] ?? '';
            $owner['is_current'] = $_POST['is_current'] ?? '';
            $owner['is_rental'] = $_POST['is_rental'] ?? '';
            $owner['owner_address'] = $_POST['owner_address'] ?? '';
            $owner['owner_city'] = $_POST['owner_city'] ?? '';
            $owner['owner_state'] = $_POST['owner_state'] ?? '';
            $owner['owner_zip'] = $_POST['owner_zip'] ?? '';
            $owner['owner_notes'] = $_POST['owner_notes'] ?? '';

            $result = insert_new_owner($owner);
            if ($result === True) {
                echo 'Submit returned True';
                $new_id = mysqli_insert_id($db);
            }
            else
            {
                echo 'Submit returned False';
                $errors = $result;
            }
        }
        // End of group of actions requested from the Owner Form

        // This group requires the queried list of owner information
        if (isset($_POST['view_rentals'])) {
            $switch_action = 'ViewRentals';
            $page_title = 'Rental Property Listing';
        }

        // Show Owner History - View By Address was selected
        if (isset($_POST['address_id'])) {
            $lot_id = $_POST['address_id'];
            $switch_action = 'ShowOwnerHistory';
            $page_title = 'History By Address';
        }

        // Show Owner History - View By Lot was selected
        if (isset($_POST['lot_number'])) {
            $lot_id = $_POST['lot_number'];
            $switch_action = 'ShowOwnerHistory';
            $page_title = 'History By Lot';
        }
    } // END: if (is_post_request())

    if (is_get_request())
    {
        var_dump($_GET);

        if (isset($_GET['view_owner'])) {
            $owner_id = $_GET['id'] ?? '0';  // PHP > 7.0
            // $full_owner_form_required = True;

            $page_title = 'View Owner Detail';

            $switch_action = 'ViewOwnerDetail';

            echo 'Received view_owner request for ID: ' . $owner_id;
        }

        if (isset($_GET['edit_owner'])) {
            $owner_id = $_GET['id'] ?? '0';  // PHP > 7.0
            $full_owner_form_required = True;

            $page_title = 'Edit Owner Detail';

            $switch_action = 'EditOwnerDetail';

            echo 'Received edit_owner request for ID: ' . $owner_id;
        }
    }

?>
    <!-- ================================================================ -->
    <!-- PHP logic ends here                                              -->
    <!-- ================================================================ -->

    <!-- ================================================================ -->
    <!-- HTML code begins here                                            -->
    <!-- ================================================================ -->

    <!-- Include HTML header here, NOTE $page_title must be defined first -->
    <?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <?php echo '<h2>' . $page_title . '</h2>'; ?>

        <?php

        // Implemented Cases:
        //
        // ViewRentals
        // ShowOwnerHistory
        // SearchOwners
        // CreateOwner
        // ViewOwnerDetail
        // EditOwnerDetail

        switch ($switch_action)
        {
        case 'ViewRentals':
            $searching_rentals = True;
            include('./owner_history.php');
            break;

        case 'ShowOwnerHistory':
            $searching_history = True;
            include('./owner_history.php'); 
            break;

        case 'SearchOwners':
            $searching_owners = True;
            include('./owner_search.php'); 
            break;

        case 'CreateOwner':
            // $full_owner_form_required = True;
            $creating_new_owner = True;
            include('./owner_form.php'); 
            break;

        case 'ViewOwnerDetail':
            $view_existing_owner = True; 
            include('./owner_form.php'); 
            break;

        case 'EditOwnerDetail':
            $edit_existing_owner = True;
            include('./owner_form.php'); 
            break;

        default:
            include('./owner_menu.php'); 
        }
        ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

