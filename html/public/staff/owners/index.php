
<?php 
    require_once('../../../private/initialize.php');

    // Set defaults for local variables
    $search_mode = False;

    // Variables to control actions requiring Full Owner Form
    $full_owner_form_required = False;
    $view_existing_owner = False;
    $edit_existing_owner = False;
    $create_new_owner = False;

    // Variables to control actions requiring Owner Information List
    $owner_list_required = False;
    $searching_rental_owners = False;
    $searching_history = False;

    // The following variables to be obsoleted
    $lot_is_selected = False;
    $lot_id = '';
    $fake_last_name_was_entered = False;
    $last_name_was_entered = False;
    $last_name = '';


    if (is_post_request())
    {
        // This group requires the Full Owner Form
        if (isset($_POST['view_owner'])) {
            $full_owner_form_required = True;
            $view_existing_owner = True;
            $primary_last = $_POST['last_name'];
        }

        if (isset($_POST['edit_owner'])) {
            $full_owner_form_required = True;
            $edit_existing_owner = True;
            $primary_last = $_POST['last_name'];
        }

        if (isset($_POST['create_owner'])) {
            $full_owner_form_required = True;
            $create_new_owner = True;
        }
        // End of group requiring the Full Owner Form

        // This group requires the queried list of owner information
        if (isset($_POST['view_rentals'])) {
            $owner_list_required = True;
            $searching_rental_owners = True;
        }

        if (isset($_POST['address_id'])) {
            $owner_list_required = True;
            $searching_history = True;
            $lot_id = $_POST['address_id'];
        }

        //if (isset($_POST['address_id']))
        //{
        //    $lot_id = $_POST['address_id'];
        //    $lot_is_selected = True;
        //}

        //if (isset($_POST['last_name']))
        //{
        //    $last_name = $_POST['last_name'];
        //    $last_name_was_entered = True;
        //}
        // End of group requiring the queried list of owner information
    }
    else
    {
        // If nothing was posted, this page returns to Search Mode
        $search_mode = True;
    }

    $lot_query = find_all_lots();

?>

<!-- Assign page title (used in header) & include header -->
<?php $page_title = 'Search Owners'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <div id="content">
        <div id="regency-menu">
            <h2>Owner Management</h2>

            <!-- Show diagnostic information -->
            <?php
            if ( $diagnostics_enabled) {
                echo '<hr />';
                echo '<div>';

                echo '$view_existing_owner: '; 
                if ($view_existing_owner) {
                    echo 'True';
                }
                else
                {
                    echo 'False';
                }
                echo '<br />';

                echo '$edit_existing_owner: '; 
                if ($edit_existing_owner) {
                    echo 'True';
                }
                else
                {
                    echo 'False';
                }
                echo '<br />';

                echo '$create_new_owner: '; 
                if ($create_new_owner) {
                    echo 'True';
                }
                else
                {
                    echo 'False';
                }
                echo '<br />';

//                echo '<br />';
//                echo '$lot_id: ' . $lot_id;
//
//                echo '<br />';
//                echo '<br />';
//
//                // Show Last Name entry information
//                echo '$last_name_was_entered: ';
//                if ($last_name_was_entered) {
//                    echo 'True';
//                }
//                else
//                {
//                    echo 'False';
//                }
//                echo '<br />';
//                echo '$last_name: ' . $last_name;
//
//                echo '</div>';
//                echo '<hr />';

                echo '<!-- End of diagnostic information -->';
                echo '<!-- *************************** -->';
            } ?>

        <!-- ============================================================ -->
        <!-- This is the beginning of the "Default Owner Page "           -->
        <!-- ============================================================ -->
        <?php if ($search_mode) { ?>
            <!-- Form for Searching by Last name -->

            <form action="" method="post">
            <fieldset>
                <!-- The Last Name Entry Box -->
                <div class="actions"> 
                    <label for "last_name">Search By Last Name</label>
                    <input type="text" id="last_name" name="last_name">
                </div>
                <!-- END The Last Name Entry Box -->

                <div id="actions">
                    <input type="submit" name="view_owner" value="View" />
                    <input type="submit" name="edit_owner" value="Edit" />
                    <input type="submit" name="create_owner" value="Create" />
                </div>

            </fieldset>
            </form>
            <!-- ============================================================ -->

            <!-- Form for Searching for Rental owners -->
            <form action="" method="post">
            <fieldset>
                <div id="actions">
                    <label for "view_rentals">View Renting Owners</label>
                    <input type="submit" name="view_rentals" value="View Rentals" />
                </div>
            </fieldset>
            </form>
            <!-- ============================================================ -->

            <!-- Form for Searching by Address -->
            <form action="" method="post">
            <fieldset>

                <!-- The ADDRESS pull down select item -->
                <div class="actions"> 
                    <label for "address_id">Show Owner History For:</label>
                    <select name="address_id" id="address_id">

                        <?php while($lot = mysqli_fetch_assoc($lot_query)) { ?>
                            <option value="<?php echo htmlsc($lot['id']); ?>"><?php echo htmlsc($lot['address']); ?></option>
                        <?php } ?>

                    </select>
                </div>
                <?php mysqli_free_result($lot_query); ?>
                <!-- END The ADDRESS pull down select item -->

                <div id="actions">
                    <input type="submit" name="submit" value="Display History" />
                </div>

            </fieldset>
            </form>
            <!-- ============================================================ -->
        <?php } /* if ($search_mode) */ ?>
        <!-- ============================================================ -->
        <!-- This is the end of the "Default Owner Page " =============== -->
        <!-- ============================================================ -->

        <!-- Owner Form display has been requested -->
        <?php if ($full_owner_form_required) { ?>

            <h2>Full owner form required here.</h2>

            <?php if ($view_existing_owner) {echo 'View Existing Owner: ' . $primary_last;} echo ' <br />'; ?>
            <?php if ($edit_existing_owner) {echo 'Edit Existing Owner: ' . $primary_last;} echo ' <br />'; ?>
            <?php if ($create_new_owner) {echo 'Create New Owner';} echo ' <br />'; ?>

        <?php } /* if ($full_owner_form_required) */ ?>
        <!-- ============================================================ -->


        <!-- List of Owner Information has been requested -->
        <?php if ($owner_list_required) { ?>

            <h2>Owner list required here.</h2>

            <?php if ($searching_rental_owners) {echo 'Searching Rentals';} echo ' <br />'; ?>
            <?php if ($searching_history) {echo 'Searching History: ' . $lot_id;} echo ' <br />'; ?>

        <?php } /* if ($owner_list_required) */ ?>
        <!-- ============================================================ -->


            <!-- ************************************************************ -->
            <!-- This section only entered after an Address has been selected -->
            <!-- ************************************************************ -->
            <?php if ($lot_is_selected) { ?>
            <?php $owner_query = find_owners_by_lot($lot_id); ?>
               <hr />
               <h3> Owner History for Lot#: <?php echo $lot_id ?> </h3> 
                  <table class="list">
                      <tr>
                          <th>First</th>
                          <th>MI</th>
                          <th>Last</th>
                          <th>Buy Date</th>
                          <th>Owner Address</th>
                          <th>Current</th>
                          <th>Rental</th>
                      </tr>

                <?php while($owner = mysqli_fetch_assoc($owner_query)) { ?>
                    <tr>
                        <td><?php echo htmlsc($owner['first']); ?>    </td>
                        <td><?php echo htmlsc($owner['mi']); ?>       </td>
                        <td><?php echo htmlsc($owner['last']); ?>     </td>
                        <td><?php echo htmlsc($owner['buy_date']); ?>     </td>
                        <td><?php echo htmlsc($owner['address']); ?>  </td>
                        <td><?php echo $owner['is_current'] == 1 ? 'Yes' : 'No'; ?></td>
                        <td><?php echo $owner['is_rental'] == 1 ? 'Yes' : 'No'; ?></td>
                    </tr>
                <?php } /* Bottom of while loop */ ?>

                  </table>
                  <?php mysqli_free_result($owner_query); ?>

            <?php } /* if ($lot_is_selected) */  ?>
            <!-- ============================================================ -->

            <!-- ************************************************************ -->
            <!-- This section only entered after a Last Name has been entered -->
            <!-- ************************************************************ -->
            <?php if ($fake_last_name_was_entered) { ?>

            <?php $owner_query = find_owners_by_last($last_name); ?>
               <hr />
               <?php echo '<h3> Search Results for: ' . $last_name . '</h3>'; ?>

                  <table class="list">
                      <tr>
                          <th></th>
                          <th>Primary Owner</th>
                          <th>Secondary Owner</th>
                      </tr>

                    <?php $owner = mysqli_fetch_assoc($owner_query); ?>

                      <tr>
                          <td><b>First Name</b></td>
                          <td><?php echo htmlsc($owner['first']); ?>    </td>
                          <td><?php echo htmlsc($owner['first_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Middle</b></td>
                          <td><?php echo htmlsc($owner['mi']); ?>    </td>
                          <td><?php echo htmlsc($owner['mi_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Last Name</b></td>
                          <td><?php echo htmlsc($owner['last']); ?>    </td>
                          <td><?php echo htmlsc($owner['last_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Phone</b></td>
                          <td><?php echo htmlsc($owner['phone']); ?>    </td>
                          <td><?php echo htmlsc($owner['phone_2']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Email</b></td>
                          <td><?php echo htmlsc($owner['email']); ?>    </td>
                          <td><?php echo htmlsc($owner['email_2']); ?>    </td>
                      </tr>

                      <!-- Add empty row for a spacer -->
                      <tr>
                          <td></td>
                          <td></td>
                      </tr>

                      <tr>
                          <td><b>Lot #</b></td>
                          <td><?php echo htmlsc($owner['fk_lot_id']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Buy Date</b></td>
                          <td><?php echo htmlsc($owner['buy_date']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Current Owner?</b></td>
                          <td><?php echo $owner['is_current'] == 1 ? 'Yes' : 'No'; ?></td>
                      </tr>

                      <tr>
                          <td><b>Is Rental?</b></td>
                          <td>TBD</td>
                      </tr>

                      <tr>
                          <td><b>Address</b></td>
                          <td><?php echo htmlsc($owner['address']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>City</b></td>
                          <td><?php echo htmlsc($owner['city']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>State</b></td>
                          <td><?php echo htmlsc($owner['state']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Zip</b></td>
                          <td><?php echo htmlsc($owner['zip']); ?>    </td>
                      </tr>

                      <tr>
                          <td><b>Notes</b></td>
                          <td>Enjoys skydiving</td>
                      </tr>

                  </table>

                  <?php mysqli_free_result($owner_query); ?>

            <?php } /* if ($last_name_was_entered) */  ?>
            <!-- ============================================================ -->

            <br />
            <br />

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

