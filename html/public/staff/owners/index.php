
<?php 
    require_once('../../../private/initialize.php');

    // Set defaults for local variables
    $search_mode = False;

    $lot_is_selected = False;
    $lot_id = '';

    $fake_last_name_was_entered = False;
    $last_name_was_entered = False;
    $last_name = '';

    // $searching_rental_owners = False;

    if (is_post_request())
    {
        if (isset($_POST['address_id']))
        {
            $lot_id = $_POST['address_id'];
            $lot_is_selected = True;
        }

        if (isset($_POST['last_name']))
        {
            $last_name = $_POST['last_name'];
            $last_name_was_entered = True;
        }
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

                // Show lot selected information
                echo '$lot_is_selected: '; 
                if ($lot_is_selected) {
                    echo 'True';
                }
                else
                {
                    echo 'False';
                }
                echo '<br />';
                echo '$lot_id: ' . $lot_id;

                echo '<br />';
                echo '<br />';

                // Show Last Name entry information
                echo '$last_name_was_entered: ';
                if ($last_name_was_entered) {
                    echo 'True';
                }
                else
                {
                    echo 'False';
                }
                echo '<br />';
                echo '$last_name: ' . $last_name;

                echo '<br />';
                echo url_for('/staff/owners/create.php'); 

                echo '</div>';
                echo '<hr />';
                } ?>
            <!-- *************************** -->

        <?php if ($search_mode) { ?>
            <!-- Form for Searching by Last name -->

            <form action="<?php echo url_for('/staff/owners/create.php?last_name=' . htmlsc(urlencode($last_name))); ?>" method="get">
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

        <?php 
        } /* if ($search_mode) */
        else if ($last_name_was_entered)
        {
            echo 'You need the full form here';
        }
        else
        { /* Handle post cases here */
            echo '<h2>Howdy</h2>';
        } /* End of case ??? */ ?>






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

