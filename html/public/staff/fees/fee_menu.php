

        <!-- ============================================================ -->
        <!-- This is the beginning of the "Fee Main Menu Page"          -->
        <!-- ============================================================ -->

            <!-- Start of Search Fee History section =================== -->
            <fieldset>

            <!-- Form for Searching by Address ============================== -->
            <form action="" method="post">
                <h4>Show Fee History</h4>

                <!-- The ADDRESS pull down select item -->
                <div class="actions"> 
                    <label for "address_id">Address:</label>
                    <select name="address_id">

                        <?php $address_query = create_address_list(); ?>
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
                    <select name="lot_number">

                        <?php $lot_query = create_lot_list(); ?>
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

            <!-- Form for Creating New Fee ================================ -->
            <fieldset>
            <form action="" method="post">
                <h4>Create New Fee</h4>

                <div class="actions"> 
                    <input type="submit" name="show_create_owner_form" value="Create Fee" />
                </div>
            </form>
            </fieldset>

        <!-- ============================================================ -->
        <!-- This is the bottom of the "Fee Main Menu Page"             -->
        <!-- ============================================================ -->
 


