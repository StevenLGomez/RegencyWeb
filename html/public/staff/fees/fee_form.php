
    <!-- ************************************************************ -->
    <!-- Fee form sub-page                                            -->
    <!-- ************************************************************ -->

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
                
                    <!-- Row for payee last name -->
                    <tr>
                        <td><b>Payee</b></td>
                        <td><input type="text" placeholder="Payees Last Name" name="payee"
                            value="<?php echo htmlsc($fee['payee']); ?>" /></td>
                    </tr>
                
                    <!-- Row for lot/address of payee -->
                    <tr>
                        <td><b>Lot/Address</b></td>
                        <td><input type="text" name="fk_lot_id" 
                            value="<?php echo htmlsc($fee['fk_lot_id']); ?>" /></td>
                    </tr>
                
                    <!-- Row for check number -->
                    <tr>
                        <td><b>Check #</b></td>
                        <td><input type="text" placeholder="Leave blank if cash payment" name="ck_no" 
                            value="<?php echo htmlsc($fee['ck_no']); ?>" /></td>
                    </tr>
                
                    <!-- Row for payment amount -->
                    <tr>
                        <td><b>Payment</b></td>
                        <td><input type="text" name="amount" 
                            value="<?php echo htmlsc($fee['amount']); ?>" /></td>
                    </tr>
                
                    <!-- Row for notes about this fee payment -->
                    <tr>
                        <td><b>Note</b></td>
                        <td><input type="text" name="note" 
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

