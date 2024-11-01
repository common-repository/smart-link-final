<?php
/*
Plugin Name: Smart Link 
Plugin URI: http://111waystomakemoney.com/smart-link/
Description:For using the plugin, read the <a href="http://111waystomakemoney.com/smart-link/" title="Smart Links">Smart Links Instruction Page</a> .Shrink, track and share any URL on the Internet from your WordPress website!
Version: 3.0.15.1
Author: rahul
Author URI: http://111waystomakemoney.com/
Copyright: 2009-2010, rahul, LLC

GNU General Public License, Free Software Foundation <http://creativecommons.org/licenses/GPL/2.0/>
This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation; either version 2 of the License, or
(at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 59 Temple Place, Suite 330, Boston, MA  02111-1307  USA
*/

require_once('prli-config.php');
require_once(PRLI_MODELS_PATH . '/models.inc.php');
require_once('prli-api.php'); // load api methods
require_once('prli-xmlrpc.php'); // load xml-rpc api methods

require_once(PRLI_PATH.'/prli-main.php');

// Provide Back End Hooks to the Pro version of Smart Link
if($prli_update->pro_is_installed_and_authorized())
  require_once(PRLI_PATH.'/pro/Smart-link-pro.php');

?>
