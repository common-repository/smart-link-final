<div class="wrap">
<div id="icon-options-general" class="icon32"><br /></div>
<h2 id="prli_title">Smart Link: Pro Account Information</h2>
<h1 style="text-align: left">For Instructions Visit:<a href="http://111waystomakemoney.com/smart-link/" target="_blank">Plugin Page</a></h1>
<?php $this_uri = preg_replace('#&.*?$#', '', str_replace( '%7E', '~', $_SERVER['REQUEST_URI'])); ?>
<h3>Smart Link Pro Account Information</h3>
<?php if($prli_update->pro_is_installed_and_authorized()) { ?>
  <p><a href="http://Smartlinkpro.com/user-manual">User Manual</a></p>
<?php } ?>
<?php echo $prli_update->pro_cred_form(); ?>
<?php if($prli_update->pro_is_installed_and_authorized()) { ?>
  <div><p><strong>Smart Link Pro is Installed</strong></p><p><a href="<?php echo $this_uri; ?>&action=pro-uninstall" onclick="return confirm('Are you sure you want to Un-Install Smart Link Pro? This will delete your pro username & password from your local database, remove all the pro software but will leave all your data intact incase you want to reinstall sometime :) ...');" title="Downgrade to Smart Link Standard" >Downgrade to Smart Link Standard</a></p><br/><p><strong>Edit/Update Your Profile:</strong><br/><span class="description">Use your account username and password to log in to your Account and Affiliate Control Panel</span></p><p><a href="http://Smartlinkpro.com/amember/member.php">Account</a>&nbsp;|&nbsp;<a href="http://Smartlinkpro.com/amember/aff_member.php">Affiliate Control Panel</a></div>
  
<?php } else { ?>
  <p><strong>Ready to take your marketing efforts to the next level?</strong><br/>
  <a href="http://Smartlinkpro.com">Smart Link Pro</a> will help you automate, share, test and get more clicks &amp; conversions from your Smart Links!<br/><br/><a href="http://Smartlinkpro.com">Learn More &raquo;</a></p>
<?php } ?>

</div>
