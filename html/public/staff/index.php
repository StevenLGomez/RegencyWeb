<?php require_once('../../private/initialize.php'); ?>

<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/header.php'); ?>

	<div>
	    <?php echo 'SHARED_PATH: ' . SHARED_PATH ?>
	</div>
	<div id="content">
		<div id="main-menu">
			<h2>Main Menu</h2>
			<ul>
				<li>
					<a href="<?php echo ''; /*url_for('/staff/subjects/index.php');*/ ?>">Subjects</a>
				</li>
				<li>
					<a href="<?php echo ''; /*url_for('/staff/pages/index.php');*/ ?>">Pages</a>
				</li>
			</ul>
		</div>
	</div>

<?php include(SHARED_PATH . '/footer.php'); ?>

