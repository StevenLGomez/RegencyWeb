
    <!-- ************************************************************ -->
    <!-- Fee form sub-page                                            -->
    <!-- ************************************************************ -->

    <hr />
    <a class="back-link" href="<?php echo url_for('/staff/fees/fee_index.php'); ?>">&laquo; Return to Menu</a>
    <hr />

    <div id="content">
        <div id=""regency-menu">

            <table class="list">

                <th>Enter Payment Information</th>
                <th></th>

                <!-- Row for date of payment -->
                <tr>
                    <td><b>Date of Payment</b></td>
                    <td><input type="text" placeholder="YYYY-MM-DD" name="dt" value="<?php echo htmlsc(''); ?>" /></td>
                </tr>
            
                <!-- Row for payee last name -->
                <tr>
                    <td><b>Payee</b></td>
                    <td><input type="text" placeholder="Payees Last Name" name="payee" value="<?php echo htmlsc(''); ?>" /></td>
                </tr>
            
                <!-- Row for lot/address of payee -->
                <tr>
                    <td><b>Lot/Address</b></td>
                    <td><input type="text" name="fk_lot_id" value="<?php echo htmlsc(''); ?>" /></td>
                </tr>
            
                <!-- Row for check number -->
                <tr>
                    <td><b>Check #</b></td>
                    <td><input type="text" placeholder="Leave blank if cash payment" name="ck_no" value="<?php echo htmlsc(''); ?>" /></td>
                </tr>
            
                <!-- Row for payment amount -->
                <tr>
                    <td><b>Payment</b></td>
                    <td><input type="text" name="amount" value="<?php echo htmlsc(''); ?>" /></td>
                </tr>
            
                <!-- Row for notes about this fee payment -->
                <tr>
                    <td><b>Note</b></td>
                    <td><input type="text" name="note" value="<?php echo htmlsc(''); ?>" /></td>
                </tr>

            </table>

        </div>
    </div>

