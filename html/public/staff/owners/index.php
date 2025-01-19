
<?php 
    require_once('../../../private/initialize.php');
    require_once('../../../private/owner_functions.php');

    // Default is to display Top Level Owner Page
    $top_level_owner_page = True;

    // Variables to control actions requiring Full Owner Form
    $full_owner_form_required = False;
    $view_existing_owner = False;
    $edit_existing_owner = False;
    $creating_new_owner = False;
    $display_new_owner = False;
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
        // A $_POST has been made from the top level page, process the POSTed option
        $top_level_owner_page = False;

        // This group requires the Full Owner Form
        if (isset($_POST['search_last_name'])) {
            // $full_owner_form_required = True;
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
        echo '<!-- index.php - no $_POST requests were entered -->';
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
            $top_level_owner_page = False;
        }
    }
    else
    {
        echo '<!-- index.php - no $_GET requests were entered -->';
    }

    // These queries create the lists for "View By Address" & "View By Lot"
    // $address_query = create_address_list();
    // $lot_query = create_lot_list();

?>
    <!-- ================================================================ -->
    <!-- PHP logic ends here                                              -->
    <!-- ================================================================ -->

    <!-- ================================================================ -->
    <!-- HTML code begins here                                            -->
    <!-- ================================================================ -->

    <!-- Include HTML header here, NOTE $page_title must be defined first -->
    $page_title = 'Search Owners';
    <?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Owner Management</h2>

        <?php if ($top_level_owner_page) { ?>
        <!-- ============================================================ -->
        <!-- This is the beginning of the "Top Level Owner Page"          -->
        <!-- ============================================================ -->

        $address_query = create_address_list();
        $lot_query = create_lot_list();

            <!-- Start of Search Owner History section =================== -->
            <fieldset>

            <!-- Form for Searching by Address ============================== -->
            <form action="" method="post">
                <h4>Show Owner History</h4>

                <!-- The ADDRESS pull down select item -->
                <div class="actions"> 
                    <label for "address_id">Address:</label>
                    <select name="address_id" id="address_id">

                        <?php while($lot = mysqli_fetch_assoc($address_query)) { ?>
                            <option value="<?php echo htmlsc($lot['id']); ?>"><?php echo htmlsc($lot['address']); ?></option>
                        <?php } ?>

                    </select>
                    <input type="submit" name="submit" value="View By Address" />
                </div>
                <?php mysqli_free_result($address_query); ?>
                <!-- END The ADDRESS pull down select item -->

            </form>

            <!-- Form for Searching by Lot # ================================ -->
            <form action="" method="post">

                <!-- The LOT pull down select item -->
                <div class="actions> 
                    <label for "lot_number">Lot ID:&nbsp&nbsp&nbsp</label>
                    <select name="lot_number" id="lot_number">

                        <?php while($lot = mysqli_fetch_assoc($lot_query)) { ?>
                            <option value="<?php echo htmlsc($lot['id']); ?>"><?php echo htmlsc($lot['id']); ?></option>
                        <?php } ?>

                    </select>
                    <input type="submit" name="submit" value="View By Lot" />
                </div>
                <?php mysqli_free_result($lot_query); ?>
                <!-- END The LOT pull down select item and button -->
            </form>
            </fieldset>
            <!-- End of Search Property History Section ===================== -->

            <!-- Form for searching owner's last name -->
            <fieldset>
            <form action="" method="post">
                <h4>Search By Last Name</h4>
                <!-- The Last Name Entry Box -->
                <div class="actions"> 
                    <label for "last_name">Start Of Last Name</label>
                    <input type="text" id="last_name" name="last_name">
                    <input type="submit" name="search_last_name" value="Search" />
                </div>
                <!-- END The Last Name Entry Box -->

            </form>
            </fieldset>
            <!-- ============================================================ -->

            <!-- Form for Searching for Rental owners ======================= -->
            <fieldset>
            <form action="" method="post">
                <h4>View Rentals</h4>
                <div id="actions">
                    <input type="submit" name="view_rentals" value="View" />
                </div>
            </form>
            </fieldset>
            <!-- ============================================================ -->

            <!-- Form for Creating new owner ================================ -->
            <fieldset>
            <form action="" method="post">
                <!-- Create New Owner -->
                <h4>Create New Owner</h4>
                <div class="actions"> 
                    <input type="submit" name="create_owner" value="Create" />
                </div>
            </form>
            </fieldset>
            <!-- END The Create New Owner Entry Box -->

        <!-- ============================================================ -->
        <!-- This is the bottom of the "Top Level Owner Page"             -->
        <!-- ============================================================ -->
        <?php } /* END: if ($top_level_owner_page) */ ?>

        <?php if ($full_owner_form_required) 
        {
            echo '<!-- Owner Form display has been requested -->';
            include('./form.php'); 
            echo '<!-- Bottom of Owner Form include =============================== -->';
        } /* if ($full_owner_form_required) */ ?>

        <?php if ($owner_list_required) 
        {
            echo '<!-- List of Owner Information has been requested -->';
            include('./history_list.php'); 
            echo '<!-- ============================================================ -->';
        } /* if ($owner_list_required) */ ?>

        <?php if ($searching_owners) 
        {
            echo '<!-- Search of Owner Name has been requested -->';
            include('./owner_search.php'); 
            echo '<!-- ============================================================ -->';
        } /* if ($searching_owners) */ ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

