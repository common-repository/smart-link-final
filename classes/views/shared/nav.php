<?php
  global $prli_update;
  
  if($prli_update->pro_is_installed_and_authorized())
  {
    $support_link =<<<SUPPORT_LINK
&nbsp;|&nbsp;<a href="http://Smartlinkpro.com/user-manual">Pro Manual</a>&nbsp;|&nbsp;<a href="http://Smartlinkpro.com/forum">Pro Forums</a>
SUPPORT_LINK;
  }
  else
  {
    $support_link =<<<SUPPORT_LINK
&nbsp;|&nbsp;<a href="http://Smartlinkpro.com">Premium Support</a>
SUPPORT_LINK;
  }
    
?>
<p style="font-size: 15px; font-weight: bold; float: right; text-align: right; padding-top: 0px; padding-right: 10px;">Connect with Smart Link:&nbsp;&nbsp;<a href="http://twitter.com/blairwilli"><img src="<?php echo PRLI_URL; ?>/images/twitter_32.png" style="width: 24px; height: 24px;" /></a>&nbsp;<a href="http://www.facebook.com/pages/Smart-Link/283252860401"><img src="<?php echo PRLI_URL; ?>/images/facebook_32.png" style="width: 24px; height: 24px;" /></a><br/>Get Help:&nbsp;&nbsp;<a href="http://blairwilliams.com/xba" target="_blank">Tutorials (UPDATED!)</a><?php echo $support_link; ?>&nbsp;|&nbsp;<a href="http://blairwilliams.com/work">One on One</a></p>
