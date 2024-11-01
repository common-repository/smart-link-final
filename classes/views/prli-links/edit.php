<div class="wrap">
<h2><img src="<?php echo PRLI_URL.'/images/Smart-link-med.png'; ?>"/>&nbsp;Smart Link: Edit Link</h2>
<h1 style="text-align: left">For Instructions Visit:<a href="http://111waystomakemoney.com/smart-link/" target="_blank">Plugin Page</a></h1>
<?php
  require(PRLI_VIEWS_PATH.'/shared/errors.php');
?>

<form name="form1" method="post" action="?page=<?php echo PRLI_PLUGIN_NAME ?>/prli-links.php">
<input type="hidden" name="action" value="update">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<?php wp_nonce_field('update-options'); ?>

<?php
  require(PRLI_VIEWS_PATH.'/prli-links/form.php');
?>

<p class="submit">
<input type="submit" name="Submit" value="Update" />&nbsp;or&nbsp;<a href="?page=<?php echo PRLI_PLUGIN_NAME ?>/prli-links.php">Cancel</a>
</p>

</form>
</div>
