
<?php require_once('../../../private/initialize.php'); ?>
<?php require_once('../../../private/owner_functions.php'); ?>

<?php $page_title = 'Mail Merge'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <p>
        <fieldset>
        <b>Prior to attempting</b> to create mail merge letters, you must first perform the following tasks:
        <ol type="1">
            <li>
                On the Assessment page, check to see if the current year's assessment amount has been entered.  
                If not, enter the correct amount for the year before proceeding.
            </li>
            <li>
                Ensure that any backlog of assessment payments have been entered, as well as deposited.
            </li>
            <li>
                Visit the Mail Merge page (this page), and as indicated, copy all text
                between the line <b>starting with VVV</b> and the line <b>starting with ^^^</b>.  
                Paste the copied text into a file on your local system making sure to save it as a 
                <b>.csv</b> file.
            </li>
            <li>
                Confirm that the .csv file created above can be opened using a Spreadsheet program
                such as LibreOffice Calc or Microsoft Excel.
            </li>
            <li>

            </li>
            <li>

            </li>
            <li>

            </li>
        </ol>
        </fieldset>
    </p>


    <p>
        <fieldset>
        <b>After having created the .csv file</b> as described above, 
        proceed with creating a the data source needed for the mail merge.  
        <b>The instructions below apply to using LibreOffice Calc & Write</b>.
        <ol type="1">
            <li>

            </li>
            <li>

            </li>
            <li>

            </li>
            <li>

            </li>
            <li>

            </li>
            <li>

            </li>
            <li>

            </li>
        </ol>
        </fieldset>
    </p>









    <div id="content">
        <div id="regency-menu">
            <h2>Mail Merge CSV Report</h2>

            <?php generate_mail_merge_csv(); ?>

        </div>
    </div>

<?php include(SHARED_PATH . '/footer.php'); ?>

