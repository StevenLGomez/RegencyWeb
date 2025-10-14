
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
                <b>.csv</b> (Comma Separated Variables) file.
            </li>
            <li>
                Confirm that the .csv file created above can be opened using a Spreadsheet program
                such as LibreOffice Calc or Microsoft Excel.
            </li>
        </ol>
        </fieldset>
    </p>

    <p>
        <fieldset>
        <b>After having created the .csv file</b> as described above, 
        proceed with creating a new data source for the mail merge.  
        <b>The instructions below apply to using LibreOffice Calc & Write</b>.
        </fieldset>
    </p>

    <p>
        <fieldset>
        If data sources from previous years exist, deregister (remove) them using
        the following steps.
        <ol type="1">
            <li>
                Open the <em>Data Sources Window</em> by selecting <b>View > Data Sources</b> from the Menu bar.
            </li>
            <li>
                In the left pane of the <em>Data source explorer</em>, right click a data source.
            </li>
            <li>
                Select <b>Registered databases</b> from the context menu.
            </li>
            <li>
                In the <em>Registered databases</em> dialog which opens, select the data source to be removed.
            </li>
            <li>
                Click <b>Delete</b>, then click <b>Yes</b> in the confirmation box which opens.
            </li>
            <li>
                Repeat as needed to remove all previous databases.
            </li>
            <li>
                Click <b>OK</b> to close the <em>Registered databases</em> dialog.
            </li>
        </ol>
        </fieldset>
    </p>

    <p>
        <fieldset>
        Create and register the current data source using the .csv file created above.
        <ol type="1">
            <li>
                From within the <b>LibreOffice Start Center</b>, choose <b>File > Wizards > Address Data Source</b>.
            </li>
            <li>
                In the <em>Address Book Data Source Wizard</em> select <b>Other external data source</b>, 
                then click <b>Next</b>.
            </li>
            <li>
                On the next page of the Wizard, click the <b>Settings</b> button.  In the <em>Database type:</em>
                pull down list, select <b>Spreadsheet</b>.
            </li>
            <li>
                In the next dialog, click <b>Browse</b> and navigate to and select the .csv file created 
                previously.  After selecting the file, click on <b>Test Connection</b>; a success message
                should be displayed.  
            </li>
            <li>
                Click on <b>Finish</b>.
            </li>
            <li>
                On the following page, click <b>Next</b>.  Because this is a spreadsheet, <em>do not</em>
                click on <b>Field Assignment</b>.
            </li>
            <li>
                On the <b>Data Source Title</b> page, deselect <b>Embed this address book....</b>.  Make sure 
                <b>Make this address book....</b> is selected, and enter a name such as YYYY-RegencyEstatesDb 
                in the <em>Address book name</em> field.
            </li>
            <li>
                Click on <b>Finish</b>.
            </li>
        </ol>
        </fieldset>
    </p>

    <p>
        <fieldset>
        After having edited MailMergemaster.odt as needed for the current year, create the mail merge letters.
        <ol type="1">
            <li>
                With the master document open, select <b>Tools > Mail Merge Wizard</b> from the menu bar.
            </li>
            <li>
                Select <b>Use the current document</b>, then click <b>Next</b>.
            </li>
            <li>
                For <em>Select document type</em>, select <b>Letter</b>, then click <b>Next</b>.
            </li>
            <li>
                In the <em>Insert address block</em> dialog, click on <b>Select Address List...</b>, 
                select the database created previously, then click on <b>Finish</b>.
            </li>
            <li>
                It is then necessary to reassign all data fields in the document with the associated
                data fields in the database by double clicking on each data field, then selecting the
                appropriate field from the database dialog.
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

