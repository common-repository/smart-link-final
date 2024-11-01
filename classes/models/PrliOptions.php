<?php
class PrliOptions
{
  var $prli_exclude_ips;
  var $whitelist_ips;
  var $filter_robots;
  var $Smartbar_image_url;
  var $Smartbar_background_image_url;
  var $Smartbar_color;
  var $Smartbar_text_color;
  var $Smartbar_link_color;
  var $Smartbar_hover_color;
  var $Smartbar_visited_color;
  var $Smartbar_show_title;
  var $Smartbar_show_description;
  var $Smartbar_show_share_links;
  var $Smartbar_show_target_url_link;
  var $Smartbar_title_limit;
  var $Smartbar_desc_limit;
  var $Smartbar_link_limit;

  var $link_redirect_type;
  var $link_prefix;
  var $link_track_me;
  var $link_nofollow;

  var $bookmarklet_auth;

  function PrliOptions()
  {
    $this->set_default_options();
  }

  function set_default_options()
  {
    // Must account for the Legacy Options
    $prli_exclude_ips  = 'prli_exclude_ips';
    $Smartbar_image_url  = 'prli_Smartbar_image_url';
    $Smartbar_background_image_url  = 'prli_Smartbar_background_image_url';
    $Smartbar_color  = 'prli_Smartbar_color';
    $Smartbar_text_color  = 'prli_Smartbar_text_color';
    $Smartbar_link_color  = 'prli_Smartbar_link_color';
    $Smartbar_hover_color  = 'prli_Smartbar_hover_color';
    $Smartbar_visited_color  = 'prli_Smartbar_visited_color';
    $Smartbar_show_title  = 'prli_Smartbar_show_title';
    $Smartbar_show_description  = 'prli_Smartbar_show_description';
    $Smartbar_show_share_links  = 'prli_Smartbar_show_share_links';
    $Smartbar_show_target_url_link  = 'prli_Smartbar_show_target_url_link';
    $Smartbar_title_limit = 'prli_Smartbar_title_limit';
    $Smartbar_desc_limit = 'prli_Smartbar_desc_limit';
    $Smartbar_link_limit = 'prli_Smartbar_link_limit';
    $link_show_Smartbar = 'prli_link_show_Smartbar';
    $link_ultra_cloak = 'prli_link_ultra_cloak';
    $link_track_me = 'prli_link_track_me';
    $link_prefix = 'prli_link_prefix';
    $link_track_as_pixel = 'prli_link_track_as_pixel';
    $link_nofollow = 'prli_link_nofollow';
    $link_redirect_type = 'prli_link_redirect_type';


    if(!isset($this->Smartbar_show_title)) {
      if($var = get_option( $Smartbar_show_title )) {
        $this->Smartbar_show_title = $var;
        delete_option( $Smartbar_show_title );
      }
      else
        $this->Smartbar_show_title = '1';
    }

    if(!isset($this->Smartbar_show_description)) {
      if($var = get_option( $Smartbar_show_description )) {
        $this->Smartbar_show_description = $var;
        delete_option( $Smartbar_show_description );
      }
      else
        $this->Smartbar_show_description = '1';
    }

    if(!isset($this->Smartbar_show_share_links)) {
      if($var = get_option( $Smartbar_show_share_links )) {
        $this->Smartbar_show_share_links = $var;
        delete_option( $Smartbar_show_share_links );
      }
      else
        $this->Smartbar_show_share_links = '1';
    }

    if(!isset($this->Smartbar_show_target_url_link)) {
      if($var = get_option( $Smartbar_show_target_url_link )) {
        $this->Smartbar_show_target_url_link = $var;
        delete_option( $Smartbar_show_target_url_link );
      }
      else
        $this->Smartbar_show_target_url_link = '1';
    }

    if(!isset($this->link_track_me)) {
      if($var = get_option( $link_track_me )) {
        $this->link_track_me = $var;
        delete_option( $link_track_me );
      }
      else
        $this->link_track_me = '1';
    }

    if(!isset($this->link_prefix))
        $this->link_prefix = 0;

    if(!isset($this->link_nofollow)) {
      if($var = get_option( $link_nofollow )) {
        $this->link_nofollow = $var;
        delete_option( $link_nofollow );
      }
      else
        $this->link_nofollow = '0';
    }

    if(!isset($this->link_redirect_type)) {
      if($var = get_option( $link_track_as_pixel )) {
        $this->link_redirect_type = 'pixel';
        delete_option( $link_show_Smartbar );
        delete_option( $link_ultra_cloak );
        delete_option( $link_track_as_pixel );
        delete_option( $link_redirect_type );
      }
      if($var = get_option( $link_show_Smartbar )) {
        $this->link_redirect_type = 'Smartbar';
        delete_option( $link_show_Smartbar );
        delete_option( $link_ultra_cloak );
        delete_option( $link_track_as_pixel );
        delete_option( $link_redirect_type );
      }
      if($var = get_option( $link_ultra_cloak )) {
        $this->link_redirect_type = 'cloak';
        delete_option( $link_show_Smartbar );
        delete_option( $link_ultra_cloak );
        delete_option( $link_track_as_pixel );
        delete_option( $link_redirect_type );
      }
      if($var = get_option( $link_redirect_type )) {
        $this->link_redirect_type = $var;
        delete_option( $link_show_Smartbar );
        delete_option( $link_ultra_cloak );
        delete_option( $link_track_as_pixel );
        delete_option( $link_redirect_type );
      }
      else
        $this->link_redirect_type = '307';
    }

    if(!isset($this->prli_exclude_ips))
    {
      if($var = get_option( $prli_exclude_ips )) {
        $this->prli_exclude_ips = $var;
        delete_option( $prli_exclude_ips );
      }
      else
        $this->prli_exclude_ips = '';
    }

    if(!isset($this->Smartbar_image_url))
    {
      if($var = get_option( $Smartbar_image_url )) {
        $this->Smartbar_image_url = $var;
        delete_option( $Smartbar_image_url );
      }
      else
        $this->Smartbar_image_url = PRLI_URL . '/images/Smart-link-48x48.png';
    }

    if(!isset($this->Smartbar_background_image_url))
    {
      if($var = get_option( $Smartbar_background_image_url )) {
        $this->Smartbar_background_image_url = $var;
        delete_option( $Smartbar_background_image_url );
      }
      else
        $this->Smartbar_background_image_url = PRLI_URL . '/images/bar_background.png';
    }

    if(!isset($this->Smartbar_color))
    {
      if($var = get_option( $Smartbar_color )) {
        $this->Smartbar_color = $var;
        delete_option( $Smartbar_color );
      }
      else
        $this->Smartbar_color = '';
    }

    if(!isset($this->Smartbar_text_color))
    {
      if($var = get_option( $Smartbar_text_color )) {
        $this->Smartbar_text_color = $var;
        delete_option( $Smartbar_text_color );
      }
      else
        $this->Smartbar_text_color = '000000';
    }

    if(!isset($this->Smartbar_link_color))
    {
      if($var = get_option( $Smartbar_link_color )) {
        $this->Smartbar_link_color = $var;
        delete_option( $Smartbar_link_color );
      }
      else
        $this->Smartbar_link_color = '0000ee';
    }

    if(!isset($this->Smartbar_hover_color))
    {
      if($var = get_option( $Smartbar_hover_color )) {
        $this->Smartbar_hover_color = $var;
        delete_option( $Smartbar_hover_color );
      }
      else
        $this->Smartbar_hover_color = 'ababab';
    }

    if(!isset($this->Smartbar_visited_color))
    {
      if($var = get_option( $Smartbar_visited_color )) {
        $this->Smartbar_visited_color = $var;
        delete_option( $Smartbar_visited_color );
      }
      else
        $this->Smartbar_visited_color = '551a8b';
    }

    if(!isset($this->Smartbar_title_limit))
    {
      if($var = get_option( $Smartbar_title_limit )) {
        $this->Smartbar_title_limit = $var;
        delete_option( $Smartbar_title_limit );
      }
      else
        $this->Smartbar_title_limit = '25';
    }

    if(!isset($this->Smartbar_desc_limit))
    {
      if($var = get_option( $Smartbar_desc_limit )) {
        $this->Smartbar_desc_limit = $var;
        delete_option( $Smartbar_desc_limit );
      }
      else
        $this->Smartbar_desc_limit = '30';
    }

    if(!isset($this->Smartbar_link_limit))
    {
      if($var = get_option( $Smartbar_link_limit )) {
        $this->Smartbar_link_limit = $var;
        delete_option( $Smartbar_link_limit );
      }
      else
        $this->Smartbar_link_limit = '30';
    }

    if(!isset($this->bookmarklet_auth))
        $this->bookmarklet_auth = md5(get_option('auth_salt') . time());

    if(!isset($this->whitelist_ips))
      $this->whitelist_ips = '';

    if(!isset($this->filter_robots))
      $this->filter_robots = 0;
  }
}
?>
