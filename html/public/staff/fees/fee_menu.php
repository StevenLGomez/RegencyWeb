
<?php
    require_once ('../../../private/shared/property_select.php');
?>

        <!-- ============================================================ -->
        <!-- This is the beginning of the "Fee Menu Page"                 -->
        <!-- ============================================================ -->

            <?php
                // Create a PropertySelector object
                $property_selector = new PropertySelector(); 
            ?>
                <?php // $property_selector->select_by_lot(); ?>

            <!-- Start of Search Fee History section =================== -->
            <fieldset>

            <!-- Form for Searching by Address ============================== -->
            <form action="" method="post">
                <h4>Show Fee History</h4>

                <!-- The ADDRESS pull down select item -->
                <div class="actions"> 
                    <label for "fees_by_address">Address:</label>
                    <select name="fees_by_address">
                        <?php $property_selector->select_by_address(); ?>
                    </select>
                    <input type="submit" name="submit" value="View By Address" />
                </div>
                <!-- END The ADDRESS pull down select item -->

            </form>

            <!-- Form for Searching by Lot # ================================ -->
            <form action="" method="post">

                <!-- The LOT pull down select item -->
                <div class="actions> 
                    <label for "fees_by_lot">Lot ID:&nbsp&nbsp&nbsp</label>
                    <select name="fees_by_lot">
                        <?php $property_selector->select_by_lot(); ?>
                    </select>
                    <input type="submit" name="submit" value="View By Lot" />
                </div>
                <!-- END The LOT pull down select item and button -->
            </form>
            </fieldset>
            <!-- End of Search Property History Section ===================== -->

            <!-- Form for Listing Undeposited Fees ========================== -->
            <fieldset>
            <form action="" method="post">
                <h4>List Undeposited Fees</h4>

                <!-- The View Undeposited Fees button -->
                <div class="actions">
                    <input type="submit" name="list_undeposited_fees" value="View List" />
                </div>
            </form>
            </fieldset>
            <!-- ============================================================ -->

            <!-- Form for Entering New Fee ================================ -->
            <fieldset>
            <form action="" method="post">
                <h4>Enter New Fee</h4>

                <div class="actions"> 
                    <input type="submit" name="enter_new_fee" value="Enter New Fee" />
                </div>
            </form>
            </fieldset>

        <!-- ============================================================ -->
        <!-- This is the bottom of the "Fee Menu Page"                    -->
        <!-- ============================================================ -->
 


