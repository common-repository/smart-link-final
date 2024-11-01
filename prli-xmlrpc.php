<?php
/**
 * Smart Link WordPress Plugin API export via XML-RPC
 *
 * The first 2 arguments to each of these methods are username and password.
 */

include_once(ABSPATH . '/wp-includes/class-IXR.php');

/**
 * Returns the API Version as a string.
 */
function prli_xmlrpc_api_version($args)
{
  $username = $args[0];
  $password = $args[1];

  if ( !get_option( 'enable_xmlrpc' ) )
    return new IXR_Error( 401, __( 'Sorry, XML-RPC Not enabled for this website' ) );

  if (!user_pass_ok($username, $password)) 
    return new IXR_Error( 401, __( 'Sorry, Login failed' ) );

  // make sure user is an admin
  $userdata = get_userdatabylogin( $username );
  if( !isset($userdata->user_level) or 
      (int)$userdata->user_level < 8 )
    return new IXR_Error( 401, __( 'Sorry, you must be an administrator to access this resource' ) );

  return prli_api_version();
}

/**
 * Get a Smart Link for a long, ugly URL.
 *
 * @param string $username Required, an admin user of this blog
 *
 * @param string $password Required, the password for this user
 *
 * @param string $target_url Required, it is the value of the Target URL you
 *                           want the Smart Link to redirect to
 * 
 * @param string $slug Optional, slug for the Smart Link (string that comes 
 *                     after the Smart Link's slash) if this value isn't set
 *                     then a random slug will be automatically generated.
 *
 * @param string $name Optional, name for the Smart Link. If this value isn't
 *                     set then the name will be the slug.
 *
 * @param string $description Optional, description for the Smart Link.
 *
 * @param integer $group_id Optional, the group that this link will be placed in.
 *                          If this value isn't set then the link will not be
 *                          placed in a group.
 *
 * @param boolean $link_track_me Optional, If true the link will be tracked,
 *                               if not set the default value (from the Smart
 *                               link option page) will be used
 *
 * @param boolean $link_nofollow Optional, If true the nofollow attribute will
 *                               be set for the link, if not set the default
 *                               value (from the Smart Link option page) will
 *                               be used
 *
 * @param string $link_redirect_type Optional, valid values include '307' or '301',
 *                                   if not set the default value (from the Smart
 *                                   link option page) will be used
 *
 * @return boolean / string The Full Smart Link if Successful and false for Failure.
 *                          This function will also set a global variable named 
 *                          $prli_Smart_slug which gives the slug of the link 
 *                          created if the link is successfully created -- it will
 *                          set a variable named $prli_error_messages if the link 
 *                          was not successfully created.
 */
function prli_xmlrpc_create_Smart_link( $args )
{
  $username = $args[0];
  $password = $args[1];

  if ( !get_option( 'enable_xmlrpc' ) )
    return new IXR_Error( 401, __( 'Sorry, XML-RPC Not enabled for this website' ) );

  if (!user_pass_ok($username, $password)) 
    return new IXR_Error( 401, __( 'Sorry, Login failed' ) );

  // make sure user is an admin
  $userdata = get_userdatabylogin( $username );
  if( !isset($userdata->user_level) or 
      (int)$userdata->user_level < 8 )
    return new IXR_Error( 401, __( 'Sorry, you must be an administrator to access this resource' ) );

  // Target URL Required
  if(!isset($args[2]))
    return new IXR_Error( 401, __( 'You must provide a target URL' ) );

  $target_url = $args[2];

  $slug             = (isset($args[3])?$args[3]:'');
  $name             = (isset($args[4])?$args[4]:'');
  $description      = (isset($args[5])?$args[5]:'');
  $group_id         = (isset($args[6])?$args[6]:'');
  $track_me         = (isset($args[7])?$args[7]:'');
  $nofollow         = (isset($args[8])?$args[8]:'');
  $redirect_type    = (isset($args[9])?$args[9]:'');
  $param_forwarding = (isset($args[10])?$args[10]:'off');
  $param_struct     = (isset($args[11])?$args[11]:'');
  
  if( $link = prli_create_Smart_link( $target_url, 
                                       $slug, 
                                       $name, 
                                       $description, 
                                       $group_id, 
                                       $track_me, 
                                       $nofollow, 
                                       $redirect_type,
                                       $param_forwarding,
                                       $param_struct ) )
    return $link;
  else
    return new IXR_Error( 401, __( 'There was an error creating your Smart Link' ) );
}

function prli_xmlrpc_update_Smart_link( $args )
{
  $username = $args[0];
  $password = $args[1];

  if ( !get_option( 'enable_xmlrpc' ) )
    return new IXR_Error( 401, __( 'Sorry, XML-RPC Not enabled for this website' ) );

  if (!user_pass_ok($username, $password)) 
    return new IXR_Error( 401, __( 'Sorry, Login failed' ) );

  // make sure user is an admin
  $userdata = get_userdatabylogin( $username );
  if( !isset($userdata->user_level) or 
      (int)$userdata->user_level < 8 )
    return new IXR_Error( 401, __( 'Sorry, you must be an administrator to access this resource' ) );

  // Target URL Required
  if(!isset($args[2]))
    return new IXR_Error( 401, __( 'You must provide the id of the link you want to update' ) );

  $id               = $args[2];
  $target_url       = (isset($args[3])?$args[3]:'');
  $slug             = (isset($args[4])?$args[4]:'');
  $name             = (isset($args[5])?$args[5]:'');
  $description      = (isset($args[6])?$args[6]:'');
  $group_id         = (isset($args[7])?$args[7]:'');
  $track_me         = (isset($args[8])?$args[8]:'');
  $nofollow         = (isset($args[9])?$args[9]:'');
  $redirect_type    = (isset($args[10])?$args[10]:'');
  $param_forwarding = (isset($args[11])?$args[11]:'');
  $param_struct     = (isset($args[12])?$args[12]:'');
  
  if( $link = prli_update_Smart_link( $id, 
                                       $target_url, 
                                       $slug, 
                                       $name, 
                                       $description, 
                                       $group_id, 
                                       $track_me, 
                                       $nofollow, 
                                       $redirect_type,
                                       $param_forwarding,
                                       $param_struct ) )
    return $link;
  else
    return new IXR_Error( 401, __( 'There was an error creating your Smart Link' ) );
}

/**
 * Get all the Smart Link groups in an array suitable for creating a select box.
 *
 * @return bool (false if failure) | array A numerical array of associative arrays 
 *                                         containing all the data about the Smart
 *                                         link groups.
 */
function prli_xmlrpc_get_all_groups($args)
{
  $username = $args[0];
  $password = $args[1];

  if ( !get_option( 'enable_xmlrpc' ) )
    return new IXR_Error( 401, __( 'Sorry, XML-RPC Not enabled for this website' ) );

  if (!user_pass_ok($username, $password)) 
    return new IXR_Error( 401, __( 'Sorry, Login failed' ) );

  // make sure user is an admin
  $userdata = get_userdatabylogin( $username );
  if( !isset($userdata->user_level) or 
      (int)$userdata->user_level < 8 )
    return new IXR_Error( 401, __( 'Sorry, you must be an administrator to access this resource' ) );

  if( $groups = prli_get_all_groups())
    return $groups;
  else
    return new IXR_Error( 401, __( 'There was an error fetching the Smart Link Groups' ) );
}

/**
 * Get all the Smart Links in an array suitable for creating a select box.
 *
 * @return bool (false if failure) | array A numerical array of associative arrays
 *                                         containing all the data about the Smart
 *                                         links.
 */
function prli_xmlrpc_get_all_links($args)
{
  $username = $args[0];
  $password = $args[1];

  if ( !get_option( 'enable_xmlrpc' ) )
    return new IXR_Error( 401, __( 'Sorry, XML-RPC Not enabled for this website' ) );

  if (!user_pass_ok($username, $password)) 
    return new IXR_Error( 401, __( 'Sorry, Login failed' ) );

  // make sure user is an admin
  $userdata = get_userdatabylogin( $username );
  if( !isset($userdata->user_level) or 
      (int)$userdata->user_level < 8 )
    return new IXR_Error( 401, __( 'Sorry, you must be an administrator to access this resource' ) );

  if( $links = prli_get_all_links())
    return $links;
  else
    return new IXR_Error( 401, __( 'There was an error fetching the Smart Links' ) );
}
                             
/**
 * Gets a specific link from a slug and returns info about it in an array
 *
 * @return bool (false if failure) | array An associative array with all the
 *                                         data about the given Smart Link.
 */
function prli_xmlrpc_get_link_from_slug($args)
{
  $username = $args[0];
  $password = $args[1];

  if ( !get_option( 'enable_xmlrpc' ) )
    return new IXR_Error( 401, __( 'Sorry, XML-RPC Not enabled for this website' ) );

  if (!user_pass_ok($username, $password)) 
    return new IXR_Error( 401, __( 'Sorry, Login failed' ) );

  // make sure user is an admin
  $userdata = get_userdatabylogin( $username );
  if( !isset($userdata->user_level) or 
      (int)$userdata->user_level < 8 )
    return new IXR_Error( 401, __( 'Sorry, you must be an administrator to access this resource' ) );

  if(!isset($args[2]))
    return new IXR_Error( 401, __( 'Sorry, you must provide a slug to lookup' ) );

  $slug = $args[2];

  if( $link = prli_get_link_from_slug($slug) )
    return $link;
  else
    return new IXR_Error( 401, __( 'There was an error fetching your Smart Link' ) );
}
                             
/**
 * Gets a specific link from an id and returns info about it in an array
 *
 * @return bool (false if failure) | array An associative array with all the
 *                                         data about the given Smart Link.
 */
function prli_xmlrpc_get_link($args)
{
  $username = $args[0];
  $password = $args[1];

  if ( !get_option( 'enable_xmlrpc' ) )
    return new IXR_Error( 401, __( 'Sorry, XML-RPC Not enabled for this website' ) );

  if (!user_pass_ok($username, $password)) 
    return new IXR_Error( 401, __( 'Sorry, Login failed' ) );

  // make sure user is an admin
  $userdata = get_userdatabylogin( $username );
  if( !isset($userdata->user_level) or 
      (int)$userdata->user_level < 8 )
    return new IXR_Error( 401, __( 'Sorry, you must be an administrator to access this resource' ) );

  if(!isset($args[2]))
    return new IXR_Error( 401, __( 'Sorry, you must provide an id to lookup' ) );

  $id = $args[2];

  if( $link = prli_get_link($id) )
    return $link;
  else
    return new IXR_Error( 401, __( 'There was an error fetching your Smart Link' ) );
}                             

/**
 * Gets the full Smart Link URL from a link id
 *
 * @return bool (false if failure) | string containing the Smart Link url
 */
function prli_xmlrpc_get_Smart_link_url($args)
{
  $username = $args[0];
  $password = $args[1];

  if ( !get_option( 'enable_xmlrpc' ) )
    return new IXR_Error( 401, __( 'Sorry, XML-RPC Not enabled for this website' ) );

  if (!user_pass_ok($username, $password)) 
    return new IXR_Error( 401, __( 'Sorry, Login failed' ) );

  // make sure user is an admin
  $userdata = get_userdatabylogin( $username );
  if( !isset($userdata->user_level) or 
      (int)$userdata->user_level < 8 )
    return new IXR_Error( 401, __( 'Sorry, you must be an administrator to access this resource' ) );

  if(!isset($args[2]))
    return new IXR_Error( 401, __( 'Sorry, you must provide an id to lookup' ) );

  $id = $args[2];

  if( $url = prli_get_Smart_link_url($id) )
    return $url;
  else
    return new IXR_Error( 401, __( 'There was an error fetching your Smart Link URL' ) );
}
?>
