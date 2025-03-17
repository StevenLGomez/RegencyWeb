
<?php 
    require_once('../../../private/initialize.php');
    require_once('../../../private/owner_functions.php');

    // Default is to display Owner Main Menu Page
    $owner_main_menu = True;

    // Variables to control actions requiring Full Owner Form
    $full_owner_form_required = False;  // Edit, create or add owner
    $view_existing_owner = False;       // owner_form.php
    $edit_existing_owner = False;       // owner_form.php
    $creating_new_owner = False;        // owner_index.php 
    $display_new_owner = False;         // owner_index.php 
    $last_name = '';

    // Variables for searching Owner
    $searching_owners = False;

    // Variables to control actions requiring Owner Information List
    $owner_list_required = False;
    $searching_rentals = False;
    $searching_history = False;
    $lot_id = '';

    if (is_post_request())
    {
        var_dump($_POST);

        // A $_POST has been made from the top level page, process the POSTed option
        $owner_main_menu = False;

        // This group requires the Full Owner Form
        if (isset($_POST['search_last_name'])) {
            $searching_owners = True;
            $requested_name = $_POST['last_name'];

            $page_title = 'Owner Search';
        }

        if (isset($_POST['edit_owner'])) {
            $full_owner_form_required = True;
            $edit_existing_owner = True;
            $requested_name = $_POST['last_name'];

            $page_title = 'Edit Owner Detail';
        }

        if (isset($_POST['create_owner'])) {
            $full_owner_form_required = True;
            $creating_new_owner = True;

            $page_title = 'Create Owner';
        }
        // End of group requiring the Full Owner Form

        // This group supports actions request from the Owner Form
        if (isset($_POST['add_owner_from_form'])) {
            $full_owner_form_required = True;
            $display_new_owner = True;

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
            $owner_list_required = True;
            $searching_rentals = True;

            $page_title = 'Rental Properties';
        }

        // Show Owner History - View By Address was selected
        if (isset($_POST['address_id'])) {
            $owner_list_required = True;
            $searching_history = True;
            $lot_id = $_POST['address_id'];

            $page_title = 'History By Address';
        }

        // Show Owner History - View By Lot was selected
        if (isset($_POST['lot_number'])) {
            $owner_list_required = True;
            $searching_history = True;
            $lot_id = $_POST['lot_number'];

            $page_title = 'History By Lot';
        }
    } // END: if (is_post_request())
    else
    {
        echo '<!-- owner_index.php - no $_POST requests were entered -->';
    }

    if (is_get_request())
    {
        // $id = isset($_GET['id']) ? $_GET['id'] : '0';  // PHP < 7.0
        $owner_id = $_GET['id'] ?? '0';  // PHP > 7.0

        if ($owner_id > 0)
        {
            $full_owner_form_required = True;
            $view_existing_owner = True;

            // Don't create the default top level owner page
            $owner_main_menu = False;
        }
    }
    else
    {
        echo '<!-- owner_index.php - no $_GET requests were entered -->';
    }

?>
    <!-- ================================================================ -->
    <!-- PHP logic ends here                                              -->
    <!-- ================================================================ -->

    <!-- ================================================================ -->
    <!-- HTML code begins here                                            -->
    <!-- ================================================================ -->

    <!-- Include HTML header here, NOTE $page_title must be defined first -->
    <?php $page_title = 'Search Owners'; ?>
    <?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Owner Management</h2>

        <?php if ($owner_main_menu) 
        {
            echo '<!-- Owner Main Menu display -->';
            include('./owner_menu.php'); 
            echo '<!-- Bottom of Owner Main Menu =============================== -->';
        } /* Bottom of: if ($owner_main_menu) */ ?>

        <?php if ($full_owner_form_required) 
        {
            echo '<!-- Owner Form display has been requested -->';
            include('./owner_form.php'); 
            echo '<!-- Bottom of Owner Form include =============================== -->';
        } /* Bottom of: if ($full_owner_form_required) */ ?>

        <?php if ($owner_list_required) 
        {
            echo '<!-- List of Owner Information has been requested -->';
            include('./owner_history.php'); 
            echo '<!-- ============================================================ -->';
        } /* Bottom of: if ($owner_list_required) */ ?>

        <?php if ($searching_owners) 
        {
            echo '<!-- Search of Owner Name has been requested -->';
            include('./owner_search.php'); 
            echo '<!-- ============================================================ -->';
        } /* Bottom of: if ($searching_owners) */ ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

