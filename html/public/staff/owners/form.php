
    <!-- ************************************************************ -->
    <!-- Owner form sub-page - included when needed                   -->
    <!-- ************************************************************ -->

    <?php 
        // Initialize owner variables as blank for all cases
        $primary_first='';
        $primary_middle='';
        $primary_last='';
        $primary_phone='';
        $primary_email='';

        $secondary_first='';
        $secondary_middle='';
        $secondary_last='';
        $secondary_phone='';
        $secondary_email='';

        $lot_number='';
        $purchase_date='';
        $is_current='0';
        $is_rental='0';
        $owner_address='';
        $owner_city='';
        $owner_state='';
        $owner_zip='';
        $owner_notes='';

        // Query existing information if viewing or editing
        if ($view_existing_owner || $edit_existing_owner) 
        {
            $owner_set = find_owner_by_last($requested_name);
            $owner = mysqli_fetch_assoc($owner_set);

            // The queried set can be cleared since it is now in $owner
            mysqli_free_result($owner_set); 

            // Populate local variables with the database values just read
            $this_owner_id = $owner['id']; 

            $primary_first=$owner['first'];
            $primary_middle=$owner['mi'];
            $primary_last=$owner['last'];
            $primary_phone=$owner['phone'];
            $primary_email=$owner['email'];

            $secondary_first=$owner['first_2'];
            $secondary_middle=$owner['mi_2'];
            $secondary_last=$owner['last_2'];
            $secondary_phone=$owner['phone_2'];
            $secondary_email=$owner['email_2'];

            $lot_number=$owner['fk_lot_id'] ?? '';
            $purchase_date=$owner['buy_date'] ?? '';
            $is_current=$owner['is_current'] ?? '';
            $is_rental=False;

            $owner_address=$owner['address'] ?? '';
            $owner_city=$owner['city'] ?? '';
            $owner_state=$owner['state'] ?? '';
            $owner_zip=$owner['zip'] ?? '';
            $owner_notes=$owner['notes'];

            # Run query to get the property address of this Lot Id
            $property_set = find_address_by_lot_id($lot_number); 
            $address_result = mysqli_fetch_assoc($property_set);
            $property_address = $address_result['address'];

            # $property_set can be cleared, result is in $property_address
            mysqli_free_result($property_set);
        }
    ?>

    <div id="content">
        <div id="regency-menu">

        <form action="" method="post">
            <table class="list">

                <th></th>
                <th>Primary Owner</th>
                <th>Secondary Owner</th>

                <tr>
                    <td><b>First Name</b></td>
                    <td><input type="text" name="primary_first" value="<?php echo htmlsc($primary_first); ?>" /></td>
                    <td><input type="text" name="secondary_first" value="<?php echo htmlsc($secondary_first); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Middle</b></td>
                    <td><input type="text" name="primary_middle" value="<?php echo htmlsc($primary_middle); ?>" /></td>
                    <td><input type="text" name="secondary_middle" value="<?php echo htmlsc($secondary_middle); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Last Name</b></td>
                    <td><input type="text" name="primary_last" value="<?php echo htmlsc($primary_last); ?>" /></td>
                    <td><input type="text" name="secondary_last" value="<?php echo htmlsc($secondary_last); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Phone</b></td>
                    <td><input type="text" name="primary_phone" value="<?php echo htmlsc($primary_phone); ?>" /></td>
                    <td><input type="text" name="secondary_phone" value="<?php echo htmlsc($secondary_phone); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Email</b></td>
                    <td><input type="text" name="primary_email" value="<?php echo htmlsc($primary_email); ?>" /></td>
                    <td><input type="text" name="secondary_email" value="<?php echo htmlsc($secondary_email); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Lot #</b></td>
                    <td><input type="text" name="lot_number" value="<?php echo htmlsc($lot_number); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Property Address</b></td>
                    <td><input type="text" name="property_address" value="<?php echo htmlsc($property_address); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Purchased (YYYY-MM-DD)</b></td>
                    <td><input type="text" name="purchase_date" value="<?php echo htmlsc($purchase_date); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Is Current Owner?</b></td>
                    <td>
                        <input type="hidden" name="is_current" value="0" />
                        <input type="checkbox" name="is_current" value="1"<?php if($is_current == "1") {echo " checked";} ?> />
                    </td>
                </tr>

                <tr>
                    <td><b>Is Rental?</b></td>
                    <td>
                        <input type="hidden" name="is_rental" value="0" />
                        <input type="checkbox" name="is_rental" value="1"<?php if($is_rental == "1") {echo " checked";} ?> />
                    </td>
                </tr>

                <tr>
                    <td><b>Owner Address</b></td>
                    <td><input type="text" name="owner_address" value="<?php if($is_rental == "1") {echo htmlsc($owner_address);} ?>" /></td>
                </tr>

                <tr>
                    <td><b>Owner City</b></td>
                    <td><input type="text" name="owner_city" value="<?php if($is_rental == "1") {echo htmlsc($owner_city);} ?>" /></td>
                </tr>

                <tr>
                    <td><b>Owner State</b></td>
                    <td><input type="text" name="owner_state" value="<?php if($is_rental == "1") {echo htmlsc($owner_state);} ?>" /></td>
                </tr>

                <tr>
                    <td><b>Owner Zip</b></td>
                    <td><input type="text" name="owner_zip" value="<?php if($is_rental == "1") {echo htmlsc($owner_zip);} ?>" /></td>
                </tr>

                <tr>
                    <td><b>Notes</b></td>
                    <td><input type="text" name="owner_notes" value="<?php echo htmlsc($owner_notes); ?>" /></td>
                </tr>

            </table>

            <!-- Provide submit buttons specific for selected action -->
            <br />
            <?php 
            if($edit_existing_owner) 
            {
                echo '<input type="submit" value="Apply Changes"/>';
            }

            if ($create_new_owner)
            {
                echo '<input type="submit" value="Add Owner"/>';
            }
            ?>

            <br />
            <br />
            <a class="back-link" href="<?php echo url_for('/staff/owners/index.php'); ?>">&laquo; Return to Search</a>

        </form>
        <!-- ============================================================ -->

        </div>
    </div>



