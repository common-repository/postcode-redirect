<?php

if ( !defined( 'ABSPATH' ) ) {
    header( 'HTTP/1.0 403 Forbidden' );
    exit;
}

?>

<style>
html{box-sizing:border-box}*,*:before,*:after{box-sizing:inherit}
html,body{font-family:Verdana,sans-serif;font-size:15px;line-height:1.5}html{overflow-x:hidden}
h1,h2,h5,h3 {text-align: center;}
h1{font-size:36px}h2{font-size:30px}h3{font-size:24px}h4{font-size:20px}h5{font-size:18px}h6{font-size:16px}
.pr-serif{font-family:serif}
h1,h2,h3,h4,h5,h6{font-family:"Segoe UI",Arial,sans-serif;font-weight:400;margin:10px 0}
.pr-col,.pr-half,.pr-third,.pr-twothird,.pr-threequarter,.pr-quarter{float:left;width:100%}
.pr-col.s1{width:8.33333%}.pr-col.s2{width:16.66666%}.pr-col.s3{width:24.99999%}.pr-col.s4{width:33.33333%}
.pr-col.s5{width:41.66666%}.pr-col.s6{width:49.99999%}.pr-col.s7{width:58.33333%}.pr-col.s8{width:66.66666%}
.pr-col.s9{width:74.99999%}.pr-col.s10{width:83.33333%}.pr-col.s11{width:91.66666%}.pr-col.s12{width:99.99999%}
@media (min-width:601px){.pr-col.m1{width:8.33333%}.pr-col.m2{width:16.66666%}.pr-col.m3,.pr-quarter{width:24.99999%}.pr-col.m4,.pr-third{width:33.33333%}
.pr-col.m5{width:41.66666%}.pr-col.m6,.pr-half{width:49.99999%}.pr-col.m7{width:58.33333%}.pr-col.m8,.pr-twothird{width:66.66666%}
textarea {resize: none;}
.w3-hoverable tbody tr:hover,.w3-ul.w3-hoverable li:hover{background-color:#ccc}.w3-centered tr th,.w3-centered tr td{text-align:center}
.w3-ul{list-style-type:none;padding:0;margin:0}.w3-ul li{padding:8px 16px;border-bottom:1px solid #ddd}.w3-ul li:last-child{border-bottom:none}
.w3-card-4,.w3-hover-shadow:hover{box-shadow:0 4px 10px 0 rgba(0,0,0,0.2),0 4px 20px 0 rgba(0,0,0,0.19)}
.w3-tooltip,.w3-display-container{position:relative}.w3-tooltip .w3-text{display:none}.w3-tooltip:hover 
.w3-display-container:hover .w3-display-hover{display:block}.w3-display-container:hover span.w3-display-hover{display:inline-block}.w3-display-hover{display:none}
.w3-display-right{position:absolute;top:50%;right:0%;transform:translate(0%,-50%)}
.w3-aqua,.w3-hover-aqua:hover{color:#000!important;background-color:#00ffff!important}
.w3-btn,.w3-button{border:none;display:inline-block;padding:8px 16px;vertical-align:middle;overflow:hidden;text-decoration:none;color:inherit;background-color:inherit;text-align:center;cursor:pointer;white-space:nowrap}
.w3-dropdown-hover.w3-mobile .w3-dropdown-content,.w3-dropdown-click.w3-mobile .w3-dropdown-content{position:relative}	
.w3-hide-small{display:none!important}.w3-mobile{display:block;width:100%!important}.w3-bar-item.w3-mobile,.w3-dropdown-hover.w3-mobile,.w3-dropdown-click.w3-mobile{text-align:center}
.w3-dropdown-hover.w3-mobile,.w3-dropdown-hover.w3-mobile .w3-btn,.w3-dropdown-hover.w3-mobile .w3-button,.w3-dropdown-click.w3-mobile,.w3-dropdown-click.w3-mobile .w3-btn,.w3-dropdown-click.w3-mobile .w3-button{width:100%}}
@media (max-width:768px){.w3-modal-content{width:500px}.w3-modal{padding-top:50px}}
@media (min-width:993px){.w3-modal-content{width:900px}.w3-hide-large{display:none!important}.w3-sidebar.w3-collapse{display:block!important}}
.w3-container,.w3-panel{padding:0.01em 16px}.w3-panel{margin-top:16px;margin-bottom:16px}
.w3-container:after,.w3-container:before,.w3-panel:after,.w3-panel:before,.w3-row:after,.w3-row:before,.w3-row-padding:after,.w3-row-padding:before,
.w3-cell-row:before,.w3-cell-row:after,.w3-clear:after,.w3-clear:before,.w3-bar:before,.w3-bar:after{content:"";display:table;clear:both}
</style>

<h1><?php 
esc_html_e( get_admin_page_title() );
?></h1>
  
  
  <form method="post" action="options.php">
  
<?php 
settings_fields( 'postcode_redirect_settings' );
?>

<div class="w3-row">
<div class="pr-third pr-container">

	<h5><label for="pr_ask">Ask The User To</label></h5>
	<h1><textarea name = "pr_ask" id = "pr_ask" rows = "2" cols = "40" maxlength = "120" ><?php 
esc_html_e( get_option( 'pr_ask' ) );
?></textarea></h1><h5>Enter Their Full Postcode</h5> </div>
  
 <div class="pr-third pr-container">
 
	<h5><label for="pr_use">Ask The User To Use</label></h5>
	<h1><textarea name="pr_use" id = "pr_use" rows="2" cols="40" maxlength="120" ><?php 
esc_html_e( get_option( 'pr_use' ) );
?></textarea></h1><h5>Correct Postcode Format</h5></div>


<div class="pr-third pr-container">
 
	<h5><label for="pr_uwrong">Message Saying Postcode</label></h5>
	<h1><textarea name="pr_wrong" id = "pr_wrong" rows="2" cols="40" maxlength="120" ><?php 
esc_html_e( get_option( 'pr_wrong' ) );
?></textarea></h1><h5>Is Not Correct Format</h5>
	</div></div>

<div class="pr-half pr-container">

	<h5>Message Asking User To Wait</h5>
	<h1><textarea name="pr_wait" id = "pr_wait" rows="2" cols="50" maxlength="100" ><?php 
esc_html_e( get_option( 'pr_wait' ) );
?></textarea></h1>
	<h5>While The Postcode Is Checked</h5>
	
</div>
 
 <div class="pr-half pr-container">
 
	<h5>Message Saying Postcode</h5>
	<h1><textarea name="pr_neg" id = "pr_neg" rows="2" cols="50" maxlength="100" ><?php 
esc_html_e( get_option( 'pr_neg' ) );
?></textarea></h1>
	<h5>Cannot Be Redirected</h5>

</div>


<div class="pr-half pr-container">

<h5>Redirect Website And Postcodes. Separate Each Entry With A Space</h5>
<h1><textarea name = "pr_postcodes1" id = "pr_postcodes1" rows = "3" cols = "70" maxlength = "" ><?php 
esc_html_e( get_option( 'pr_postcodes1' ) );
?></textarea></h1>

</div>

<div class="pr-half pr-container">

<h5>Redirect Website And Postcodes. Separate Each Entry With A Space</h5>
<h1><textarea name = "pr_postcodes2" id = "pr_postcodes2" rows = "3" cols = "70" maxlength = "" ><?php 
esc_html_e( get_option( 'pr_postcodes2' ) );
?></textarea></h1></div>


<?php 
?>


 <h2><input type="submit" value = "Save Settings"></h2>
 
  </form>
 
	<br>
	<h4>First and foremost, put the URL you want to redirect to, first in the text box.<br>
	Then put the outward postcode you want to associate with that URL next. You can put as many outward postcodes as you want in each text box.<br> 
	Separate each outward postcode with a space. If you do not implement a space,the plugin will not work.<br>
	The outward postcode is always two, three, or four characters in length.<br>
	In the example postcode "PR7 5DN" the outward postcode is "PR7".<br>
	Now, Put the shortcode [postcoderedirect] where you want on your webpage including sidebars.<br>
	Only put one instance of the shortcode on a webpage, although you can use multiple instances across your website.<br>
	Want to use your users postcode in your "please wait", "correct format" or your "cannot be redirected" messages.<br> 
	Insert "user input" where you want the postcode to appear, in the appropriate message.<br>
	Want to redirect a user not matching any of your zip codes, to a default URL.<br>
	Just put the URL only, in the "cannot be redirected" text box.<br>
	Want to use a Submit Button.<br> 
	Put a "dummy" Submit Button that does nothing, where you want on the page. Trust me, it will work.<br>
	If you have the unlimited version, put each redirect URL and associated postcodes, seperated with a space, on a line of their own.<br>
	The postcode check is activated when the user presses the enter key, the "dummy" submit button, or the postcode input box loses focus.<br>
	Be aware of webpage content movement when the Postcode Redirect is used and place the shortcode accordingly.<br>
	We recommend you put the Postcode Redirect in a sidebar or maybe a banner.<br>
	Want to add your own Css. Just open plugins/postcode-redirect/css/style.css in your favourite editor. Add your Css and save.<br></h4>
	<h3>We also have a Word document containing all 2981 UK outward postcodes available.<br>
	Just copy and paste.<br>
	Postcode Redirect has been incorporated into Zip Codes Re-Direct.<br>
Including all premium features.<br>	
	You can Download Zip Codes Re-Direct <a href="https://wordpress.org/plugins/zip-codes-redirect/">Here</a><br> 
	Or alternatively from <a href="https://checkout.freemius.com/mode/dialog/plugin/7791/plan/12788/">Here</a><br> 
	
	Postcode Redirect will be closed with the fullness of time.
	</h3>
	