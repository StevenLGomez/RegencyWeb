
<?php
    require_once ('../../../private/shared/property_select.php');
    require_once ('../../../private/shared/fee_select.php');
?>

        <!-- ============================================================ -->
        <!-- This is the beginning of the "Fee Menu Page"                 -->
        <!-- ============================================================ -->

            <?php
                // Create Selector objects
                $property_selector = new PropertySelector(); 
            ?>

            <!-- Start of Search Fee History section =================== -->
            <fieldset>
            <h4>Show Fee History</h4>

            <!-- Form for Searching by Address ============================== -->
            <form action="" method="post">

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

            <!-- Form for Searching by years # ================================ -->
            <br />
            <form action="" method="post">

                <!-- The Year pull down select item -->
                <div class="actions> 
                    <label for "fees_by_year">By Year:&nbsp</label>
                    <select name="fees_by_year">
                        <option value = "2000">2000</option>
                        <option value = "2001">2001</option>
                        <option value = "2002">2002</option>
                        <option value = "2003">2003</option>
                        <option value = "2004">2004</option>
                        <option value = "2005">2005</option>
                        <option value = "2006">2006</option>
                        <option value = "2007">2007</option>
                        <option value = "2008">2008</option>
                        <option value = "2009">2009</option>
                        <option value = "2010">2010</option>
                        <option value = "2011">2011</option>
                        <option value = "2012">2012</option>
                        <option value = "2013">2013</option>
                        <option value = "2014">2014</option>
                        <option value = "2015">2015</option>
                        <option value = "2016">2016</option>
                        <option value = "2017">2017</option>
                        <option value = "2018">2018</option>
                        <option value = "2019">2019</option>
                        <option value = "2020">2020</option>
                        <option value = "2021">2021</option>
                        <option value = "2022">2022</option>
                        <option value = "2023">2023</option>
                        <option value = "2024">2024</option>
                        <option value = "2025">2025</option>
                        <option value = "2026">2026</option>
                    </select>
                    <input type="submit" name="submit" value="View By Year" />
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
 


