
        <!-- ============================================================ -->
        <!-- This is the beginning of the "Owner Main Menu Page"          -->
        <!-- ============================================================ -->

            <!-- Start of Search Owner History section =================== -->
            <fieldset>

            <!-- Form for Searching by Address ============================== -->
            <form action="" method="post">
                <h4>Show Owner History</h4>

                <!-- The ADDRESS pull down select item -->
                <div class="actions"> 
                    <label for "address_id">Address:</label>
                    <select name="address_id">

                        <?php $address_query = create_lot_list('address'); ?>
                        <?php while($lot = mysqli_fetch_assoc($address_query)) { ?>
                            <option value="<?php echo htmlsc($lot['id']); ?>">
                            <?php echo htmlsc($lot['address']) . ' (' . htmlsc($lot['id']) . ')';?>
                            </option>
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
                    <select name="lot_number">

                        <?php $lot_query = create_lot_list('id'); ?>
                        <?php while($lot = mysqli_fetch_assoc($lot_query)) { ?>
                            <option value="<?php echo htmlsc($lot['id']); ?>">
                            <?php echo htmlsc($lot['id']) . ' (' . htmlsc($lot['address']) . ')'; ?>
                            </option>
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
                    <label for "last_name">Last Name Segment</label>
                    <input type="text" name="last_name">
                    <input type="submit" name="search_by_last_name" value="Search" />
                </div>
                <!-- END The Last Name Entry Box -->

            </form>
            </fieldset>
            <!-- ============================================================ -->

            <!-- Form for Searching for Rental owners ======================= -->
            <fieldset>
            <form action="" method="post">
                <h4>View Rental Properties</h4>

                <!-- The View Rentals select button -->
                <div class="actions">
                    <input type="submit" name="view_rentals" value="View Rentals" />
                </div>
            </form>
            </fieldset>
            <!-- ============================================================ -->

            <!-- Form for Creating New Owner ================================ -->
            <fieldset>
            <form action="" method="post">
                <h4>Create New Owner</h4>

                <div class="actions"> 
                    <input type="submit" name="show_create_owner_form" value="Create Owner" />
                </div>
            </form>
            </fieldset>

        <!-- ============================================================ -->
        <!-- This is the bottom of the "Owner Main Menu Page"             -->
        <!-- ============================================================ -->
 

