<?php if ( ! defined( 'ABSPATH' ) ) {header( 'HTTP/1.0 403 Forbidden' ); exit; }?>
<p><div  class = "postcodetext" ><?php esc_html_e(get_option('pr_ask'));?></div></p>
<label for = "redirect"></label>
<form name="redirect"  onSubmit="postcoderedirect_ajax();return false;" id = "formpress">  
<input type="text" id = "textpress" maxlength="8" size="11" placeholder="Eg: PR7 5DN" value = "" name="redirector" title="Input 5 To 8 Digits In UK Postcode Format" onfocusout ="postcoderedirect_ajax()"></form>
<p><div  class = "postcodetext" id="postredirectshow"><?php esc_html_e(get_option('pr_use'));?></div></p>