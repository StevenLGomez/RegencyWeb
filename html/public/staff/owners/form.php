
    <!-- ************************************************************ -->
    <!-- Owner form sub-page - included when needed                   -->
    <!-- ************************************************************ -->

    <?php 
        // Initialize owner array as blank if not needed
        $first ='';
        $mi ='';
        $last ='';
        $phone ='';
        $primary_email ='';

        $first_2 ='';
        $mi_2 ='';
        $last_2 ='';
        $phone_2 ='';
        $email_2 ='';

        $fk_lot_id ='';
        $buy_date ='';
        $is_current ='0';
        $is_rental ='0';
        $owner_address ='';
        $owner_city ='';
        $owner_state ='';
        $owner_zip ='';
        $owner_notes ='';

        // Query existing information if viewing or editing - overwrites blank values above
        if ($view_existing_owner || $edit_existing_owner) 
        {
            $owner_set = find_owner_by_last($requested_name);
            $owner = mysqli_fetch_assoc($owner_set);

            // The queried set can be cleared since it is now in $owner
            mysqli_free_result($owner_set); 

            // Run query to get the property address of this Lot Id
            $property_set = find_address_by_lot_id($owner['fk_lot_id']); 
            $address_result = mysqli_fetch_assoc($property_set);
            $property_address = $address_result['address'];

            echo $property_address;

            // $property_set can be cleared, result is in $property_address
            mysqli_free_result($property_set);

            // Populate the local variables with the values pulled from the queries made above
            $first = $owner['first'];
            $mi = $owner['mi'];
            $last = $owner['last'];
            $phone = $owner['phone'];
            $primary_email = $owner['email'];

            $first_2 = $owner['first_2'];
            $mi_2 = $owner['mi_2'];
            $last_2 = $owner['last_2'];
            $phone_2 = $owner['phone_2'];
            $email_2 = $owner['email_2'];

            $fk_lot_id = $owner['fk_lot_id'];
            $buy_date = $owner['buy_date'];
            $is_current = $owner['is_current'];
            $is_rental = $owner['is_rental'];
            $owner_address = $owner['owner_address'];
            $owner_city = $owner['owner_city'];
            $owner_state = $owner['owner_state'];
            $owner_zip = $owner['owner_zip'];
            $owner_notes = $owner['owner_notes'];
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
                    <td><input type="text" name="first" value="<?php echo htmlsc($first); ?>" /></td>
                    <td><input type="text" name="first_2" value="<?php echo htmlsc($first_2); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Middle</b></td>
                    <td><input type="text" name="mi" value="<?php echo htmlsc($mi); ?>" /></td>
                    <td><input type="text" name="mi_2" value="<?php echo htmlsc($mi_2); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Last Name</b></td>
                    <td><input type="text" name="last" value="<?php echo htmlsc($last); ?>" /></td>
                    <td><input type="text" name="last_2" value="<?php echo htmlsc($last_2); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Phone</b></td>
                    <td><input type="text" name="phone" value="<?php echo htmlsc($phone); ?>" /></td>
                    <td><input type="text" name="phone_2" value="<?php echo htmlsc($phone_2); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Email</b></td>
                    <td><input type="text" name="primary_email" value="<?php echo htmlsc($email); ?>" /></td>
                    <td><input type="text" name="email_2" value="<?php echo htmlsc($email_2); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Lot #</b></td>
                    <td><input type="text" name="lot_number" value="<?php echo htmlsc($fk_lot_id); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Property Address</b></td>
                    <td><input type="text" name="property_address" value="<?php echo htmlsc($property_address); ?>" /></td>
                </tr>

                <tr>
                    <td><b>Purchased (YYYY-MM-DD)</b></td>
                    <td><input type="text" name="buy_date" value="<?php echo htmlsc($buy_date); ?>" /></td>
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
                echo '<input type="submit" name="add_owner_from_form" value="Add Owner"/>';
            }
            ?>

            <br />
            <br />
            <a class="back-link" href="<?php echo url_for('/staff/owners/index.php'); ?>">&laquo; Return to Search</a>

        </form>
        <!-- ============================================================ -->

        </div>
    </div>



