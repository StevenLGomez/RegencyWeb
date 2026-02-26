
<?php
    require_once ('../../../private/shared/property_select.php');
?>

    <!-- ************************************************************ -->
    <!-- Fee form sub-page                                            -->
    <!-- ************************************************************ -->

    <?php
        // Create a PropertySelector object
        $property_selector = new PropertySelector(); 
    ?>

    <hr />
    <a class="back-link" href="<?php echo url_for('/staff/fees/fee_index.php'); ?>">&laquo; Return to Menu</a>
    <hr />

    <div id="content">
        <div id=""regency-menu">

            <form action="" method="post">

                <table class="list">

                    <th>Enter Payment Information</th>
                    <!-- <th>input type="hidden" name="id" value="<?php echo htmlsc($fee['id']); ?>" </th> -->
                    <th></th>

                    <!-- Row for date of payment -->
                    <tr>
                        <td><b>Date of Payment</b></td>
                        <td><input type="text" placeholder="YYYY-MM-DD" name="dt" 
                            value="<?php echo htmlsc($fee['dt']); ?>" /></td>
                    </tr>
                
                    <!-- Row for payer last name -->
                    <tr>
                        <td><b>Received From</b></td>
                        <td><input type="text" placeholder="Payer Last Name" name="payee"
                            value="<?php echo htmlsc($fee['payee']); ?>" /></td>
                    </tr>
                
                    <!-- Row for lot/address of payee -->
                    <tr>
                    <td><label for="fk_lot_id"><b>Lot #</b></label></td>
                        <td>
                            <select id="fk_lot_id" name="fk_lot_id">
                                <?php $property_selector->select_by_address(); ?>
                            </select>
                        </td>
                    </tr>

                    <!-- Row for check number -->
                    <tr>
                        <td><b>Check #</b></td>
                        <td><input type="text" placeholder="Leave blank if cash payment" name="ck_no" 
                            value="<?php echo htmlsc($fee['ck_no']); ?>" /></td>
                    </tr>
                
                    <!-- Row for payment amount -->
                    <tr>
                        <td><b>Amount</b></td>
                        <td><input type="text" placeholder="$00.00" name="amount" 
                            value="<?php echo htmlsc($fee['amount']); ?>" /></td>
                    </tr>
                
                    <!-- Row for notes about this fee payment -->
                    <tr>
                        <td><b>Note</b></td>
                        <td><input type="text" placeholder="Cash Payment or TC Ref" name="note" 
                            value="<?php echo htmlsc($fee['note']); ?>" /></td>
                    </tr>

                </table>
                <br />

                <?php
                if($edit_existing_fee)
                {
                    echo '<input type="submit" name="apply_fee_changes_button" value="Apply Changes"/>';
                }
                if($create_new_fee)
                {
                    echo '<input type="submit" name="add_fee_complete_button" value="Add Fee"/>';
                }
                ?>

            </form>

        </div>
    </div>

