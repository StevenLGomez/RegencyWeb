
    <!-- ************************************************************ -->
    <!-- Owner form sub-page                                          -->
    <!-- ************************************************************ -->

    <?php

        // Query existing information if viewing or editing - creates associative array
        if ($view_existing_owner || $edit_existing_owner)
        {
            $owner_set = find_owner_by_id($owner_id);
            $owner = mysqli_fetch_assoc($owner_set);

            // The queried set can be cleared since it is now in $owner
            mysqli_free_result($owner_set);

            // Run query to get the property address of this Lot Id
            $property_set = find_address_by_lot_id($owner['fk_lot_id']);
            $address_result = mysqli_fetch_assoc($property_set);
            $property_address = $address_result['address'];

            // $property_set can be cleared, result is in $property_address
            mysqli_free_result($property_set);

        }
    ?>

    <hr />
    <a class="back-link" href="<?php echo url_for('/staff/owners/owner_index.php'); ?>">&laquo; Return to Menu</a>
    <hr />

    <?php if($view_existing_owner || $edit_existing_owner) {  
        // Display this information if this owner already exists
        echo '<b>Property Address:</b> ' . $property_address . '&nbsp&nbsp <b>Owner ID:</b> ' . htmlsc($owner['id']);
        } ?>

    <div id="content">
        <div id="regency-menu">

        <form action="" method="post">

            <table class="list">

                <!-- =========================================================== -->
                <!-- Start of Primary Owner section                              -->

                <th>Primary Owner</th>
                <?php if($view_existing_owner || $edit_existing_owner) {  
                    // Include the ID of the current table row as a hidden element.
                    // it is required in the $_POST so that the correct ID is used
                    // when updating the DB table 
                    ?>
                    <th><input type="hidden" name="id" value="<?php echo htmlsc($owner['id']); ?>"</th>
                <?php }
                else
                {
                    echo "<th></th>";
                } ?>

                <tr>
                    <td><b>First Name</b></td>
                    <td><input type="text" name="first" value="<?php echo htmlsc($owner['first']); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Middle</b></td>
                    <td><input type="text" name="mi" value="<?php echo htmlsc($owner['mi']); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Last Name</b></td>
                    <td><input type="text" name="last" value="<?php echo htmlsc($owner['last']); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Phone</b></td>
                    <td><input type="text" name="phone" value="<?php echo htmlsc($owner['phone']); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Email</b></td>
                    <td><input type="text" name="email" value="<?php echo htmlsc($owner['email']); ?>" /></td>
                </tr>
                <!-- =========================================================== -->

                <!-- =========================================================== -->
                <!-- Start of Secondary Owner section                            -->
                <th>Secondary Owner</th>
                <th></th>

                <tr>
                    <td><b>First Name</b></td>
                    <td><input type="text" name="first_2" value="<?php echo htmlsc($owner['first_2']); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Middle</b></td>
                    <td><input type="text" name="mi_2" value="<?php echo htmlsc($owner['mi_2']); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Last Name</b></td>
                    <td><input type="text" name="last_2" value="<?php echo htmlsc($owner['last_2']); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Phone</b></td>
                    <td><input type="text" name="phone_2" value="<?php echo htmlsc($owner['phone_2']); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Email</b></td>
                    <td><input type="text" name="email_2" value="<?php echo htmlsc($owner['email_2']); ?>" /></td>
                </tr>
                <!-- =========================================================== -->

                <!-- =========================================================== -->
                <!-- Start of Property Information section                       -->
                <th>Property Information</th>
                <th></th>

                <tr>
                    <td><b>Lot #</b></td>
                    <td><input type="text" name="fk_lot_id" value="<?php echo htmlsc($owner['fk_lot_id']); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Purchase Date (YYYY-MM-DD)</b></td>
                    <td><input type="text" placeholder="YYYY-MM-DD" name="buy_date" value="<?php echo htmlsc($owner['buy_date']); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Is Current Owner?</b></td>
                    <td>
                        <input type="hidden" name="is_current" value="0" />
                        <input type="checkbox" name="is_current" value="1"<?php if($owner['is_current'] == "1") {echo " checked";} ?> />
                    </td>
                </tr>

                <tr>
                    <td><b>Is Rental?</b></td>
                    <td>
                        <input type="hidden" name="is_rental" value="0" />
                        <input type="checkbox" name="is_rental" value="1"<?php if($owner['is_rental'] == "1") {echo " checked";} ?> />
                    </td>
                </tr>

                <th>Rental Property Information</th>
                <th></th>

                <tr>
                    <td><b>Owner Address</b></td>
                    <td><input type="text" name="owner_address" value="<?php if($owner['is_rental'] == "1") {echo htmlsc($owner['address']);} ?>" /></td>
                </tr>

                <tr>
                    <td><b>Owner City</b></td>
                    <td><input type="text" name="owner_city" value="<?php if($owner['is_rental'] == "1") {echo htmlsc($owner['city']);} ?>" /></td>
                </tr>

                <tr>
                    <td><b>Owner State</b></td>
                    <td><input type="text" name="owner_state" value="<?php if($owner['is_rental'] == "1") {echo htmlsc($owner['state']);} ?>" /></td>
                </tr>

                <tr>
                    <td><b>Owner Zip</b></td>
                    <td><input type="text" name="owner_zip" value="<?php if($owner['is_rental'] == "1") {echo htmlsc($owner['zip']);} ?>" /></td>
                </tr>

                <tr>
                    <td><b>Notes</b></td>
                    <td><input type="text" name="owner_notes" value="<?php echo htmlsc($owner['notes']); ?>" /></td>
                </tr>
                <!-- =========================================================== -->

            </table>

            <br />
            <?php // <!-- Provide submit buttons specific to selected action -->
            if($edit_existing_owner)
            {
                echo '<input type="submit" name="apply_owner_changes_button" value="Apply Changes"/>';
            }

            if ($creating_new_owner)
            {
                echo '<input type="submit" name="add_owner_complete_button" value="Add Owner"/>';
            }
            ?>

        </form>
        <!-- ============================================================ -->

        </div>
    </div>

