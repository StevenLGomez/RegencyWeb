
<?php 
    require_once('../../../private/initialize.php');
    require_once ('../../../private/lot_functions.php');
    require_once('../../../private/owner_functions.php');

    $page_title = 'Owner Management';

    // Variables to control actions requiring Owner Information List
    // $owner_list_required = False;
    $searching_rentals = False;
    $searching_history = False;
    $searching_owners = False;
    $creating_new_owner = False;
    $view_existing_owner = False;          // owner_form.php TBD

    if (is_post_request())
    {
        // var_dump($_POST);

        // Posted from owner_menu.php
        if (isset($_POST['search_by_last_name'])) {
            $requested_name = $_POST['last_name'];
            $switch_action = 'SearchOwners';

            $page_title = 'Owner Search';
        }

        // Posted from owner_form.php
        if (isset($_POST['show_create_owner_form'])) {
            $switch_action = 'ShowCreateOwnerForm';
            $page_title = 'Create Owner';
        }

        if (isset($_POST['apply_owner_changes_button'])) {
            // global $edited_owner_id;
            // $owner_id = $edited_owner_id;
            $owner_id = $_POST['id'];
            $switch_action = 'ApplyOwnerChanges';
            $page_title = 'Apply Owner Changes';
        }

        // Posted from owner_form.php when the Add Owner button is pressed
        if (isset($_POST['add_owner_complete_button'])) {
            $switch_action = 'AddNewOwnerToDb';
            $page_title = 'Review new Owner';

        }

        // This group requires the queried list of owner information
        if (isset($_POST['view_rentals'])) {
            $switch_action = 'ViewRentals';
            $page_title = 'Rental Properties';
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
        // var_dump($_GET);

        if (isset($_GET['view_owner_button'])) {
            $owner_id = $_GET['id'] ?? '0';  // PHP > 7.0
            $switch_action = 'ViewOwnerDetail';
            $page_title = 'View Owner Detail';

            // echo 'view_owner_button was pressed for ID: ' . $owner_id;
        }

        if (isset($_GET['edit_owner_button'])) {
            $owner_id = $_GET['id'] ?? '0';  // PHP > 7.0
            $switch_action = 'EditOwnerDetail';
            $page_title = 'Edit Owner Detail';

            // echo 'edit_owner_button was pressed for ID: ' . $owner_id;
        }

    }
    // $_GET & $_POST logic ends here

?>

    <!-- Include HTML header here, NOTE $page_title must be defined first -->
    <?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <?php echo '<h2>' . $page_title . '</h2>'; ?>

        <?php

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

        case 'ShowCreateOwnerForm':
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

        case 'ApplyOwnerChanges':

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

            update_existing_owner($owner_id, $owner);

            $view_existing_owner = True; 
            include('./owner_form.php'); 

            break;

        case 'AddNewOwnerToDb':

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

            $result = create_new_owner($owner);
            if ($result === True) {
                // echo 'Submit returned True';
                $new_id = mysqli_insert_id($db);
            }
            else
            {
                echo 'Submit returned False';
                $errors = $result;
            }

            $owner_id = $new_id; 

            $view_existing_owner = True; 
            include('./owner_form.php'); 
            break;

        default:
            include('./owner_menu.php'); 
        }
        ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

