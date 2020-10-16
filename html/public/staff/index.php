<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

    <hr />
	<div>
        <?php echo 'WWW_ROOT: ' . WWW_ROOT ?><br />
        <?php echo url_for('stylesheets/staff.css'); ?><br />
        <?php echo 'SHARED_PATH: ' . SHARED_PATH ?><br />
	</div>
    <hr />

	<div id="content">
		<div id="main-menu">
			<h2>Main Menu</h2>
			<ul>
				<li>
                <a href="<?php echo url_for('/staff/subjects/index.php'); ?>">Subjects</a>
				</li>
				<li>
                <a href="<?php echo url_for('/staff/pages/index.php'); ?>">Pages</a>
				</li>
			</ul>
		</div>
	</div>

<?php include(SHARED_PATH . '/footer.php'); ?>

