<?php
/*******************************
  THEME OPTIONS PAGE
********************************/

add_action('admin_menu', 'meatfree_theme_page');
function meatfree_theme_page ()
{
	if ( count($_POST) > 0 && isset($_POST['meatfree_settings']) )
	{
		$options = array ('biz_name','street','street2','city','state','zip','phone','fax','email','mailing_street','mailing_street2','mailing_city','mailing_state','mailing_zip','linkedin_link','twitter_user','google_link','facebook_link','flickr_link','youtube_link','landing_link','sharethis_link');
		
		foreach ( $options as $opt )
		{
			delete_option ( 'meatfree_'.$opt, $_POST[$opt] );
			add_option ( 'meatfree_'.$opt, $_POST[$opt] );	
		}			
		 
	}
	add_submenu_page('options-general.php',__('Settings'), __('Theme Options'), 'administrator', 'meatfree-options', 'meatfree_settings');
}
function meatfree_settings()
{
$states = array('ALABAMA'=>"AL",
'ALASKA'=>"AK",
'AMERICAN SAMOA'=>"AS",
'ARIZONA'=>"AZ",
'ARKANSAS'=>"AR",
'CALIFORNIA'=>"CA",
'COLORADO'=>"CO",
'CONNECTICUT'=>"CT",
'DELAWARE'=>"DE",
'DISTRICT OF COLUMBIA'=>"DC",
"FEDERATED STATES OF MICRONESIA"=>"FM",
'FLORIDA'=>"FL",
'GEORGIA'=>"GA",
'GUAM' => "GU",
'HAWAII'=>"HI",
'IDAHO'=>"ID",
'ILLINOIS'=>"IL",
'INDIANA'=>"IN",
'IOWA'=>"IA",
'KANSAS'=>"KS",
'KENTUCKY'=>"KY",
'LOUISIANA'=>"LA",
'MAINE'=>"ME",
'MARSHALL ISLANDS'=>"MH",
'MARYLAND'=>"MD",
'MASSACHUSETTS'=>"MA",
'MICHIGAN'=>"MI",
'MINNESOTA'=>"MN",
'MISSISSIPPI'=>"MS",
'MISSOURI'=>"MO",
'MONTANA'=>"MT",
'NEBRASKA'=>"NE",
'NEVADA'=>"NV",
'NEW HAMPSHIRE'=>"NH",
'NEW JERSEY'=>"NJ",
'NEW MEXICO'=>"NM",
'NEW YORK'=>"NY",
'NORTH CAROLINA'=>"NC",
'NORTH DAKOTA'=>"ND",
"NORTHERN MARIANA ISLANDS"=>"MP",
'OHIO'=>"OH",
'OKLAHOMA'=>"OK",
'OREGON'=>"OR",
"PALAU"=>"PW",
'PENNSYLVANIA'=>"PA",
'RHODE ISLAND'=>"RI",
'SOUTH CAROLINA'=>"SC",
'SOUTH DAKOTA'=>"SD",
'TENNESSEE'=>"TN",
'TEXAS'=>"TX",
'UTAH'=>"UT",
'VERMONT'=>"VT",
'VIRGIN ISLANDS' => "VI",
'VIRGINIA'=>"VA",
'WASHINGTON'=>"WA",
'WEST VIRGINIA'=>"WV",
'WISCONSIN'=>"WI",
'WYOMING'=>"WY");
	?>
<div class="wrap">
	<h2>Theme Options</h2>
	
<form method="post" action="">
	<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Location Information</strong></legend>
		<table class="form-table">
		<tr valign="top">
			<th scope="row"><label for="biz_name">Business Name:</label></th>
			<td>
				<input name="biz_name" type="text" id="biz_name" value="<?php echo get_option('meatfree_biz_name'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="street">Street Address:</label></th>
			<td>
				<input name="street" type="text" id="street" value="<?php echo get_option('meatfree_street'); ?>" class="regular-text" /><br />
				<input name="street2" type="text" id="street2" value="<?php echo get_option('meatfree_street2'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="city">City:</label></th>
			<td>
				<input name="city" type="text" id="city" value="<?php echo get_option('meatfree_city'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="state">State:</label></th>
			<td>
				<select name="state" id="state" class="regular-text" />
					<option>Select</option>
					<?php foreach($states AS $state => $st){ ?>
						<option value="<?php print $st; ?>"<?php print get_option('meatfree_state')==$st?' SELECTED':'';?>><?php print ucwords(strtolower($state)); ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="zip">Zip:</label></th>
			<td>
				<input name="zip" type="text" id="zip" value="<?php echo get_option('meatfree_zip'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="phone">Phone:</label></th>
			<td>
				<input name="phone" type="text" id="phone" value="<?php echo get_option('meatfree_phone'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="fax">Fax:</label></th>
			<td>
				<input name="fax" type="text" id="fax" value="<?php echo get_option('meatfree_fax'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="email">Email:</label></th>
			<td>
				<input name="email" type="text" id="email" value="<?php echo get_option('meatfree_email'); ?>" class="regular-text" />
			</td>
		</tr>
        </table>
        </fieldset>
        <fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Mailing Information</strong></legend>
		<table class="form-table">
		<tr valign="top">
			<th scope="row"><label for="mailing_street">Street Address:</label></th>
			<td>
				<input name="mailing_street" type="text" id="mailing_street" value="<?php echo get_option('meatfree_mailing_street'); ?>" class="regular-text" /><br />
				<input name="mailing_street2" type="text" id="mailing_street2" value="<?php echo get_option('meatfree_mailing_street2'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="mailing_city">City:</label></th>
			<td>
				<input name="mailing_city" type="text" id="mailing_city" value="<?php echo get_option('meatfree_mailing_city'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="mailing_state">State:</label></th>
			<td>
				<select name="mailing_state" id="mailing_state" class="regular-text" />
					<option>Select</option>
					<?php foreach($states AS $state => $st){ ?>
						<option value="<?php print $st; ?>"<?php print get_option('meatfree_mailing_state')==$st?' SELECTED':'';?>><?php print ucwords(strtolower($state)); ?></option>
					<?php } ?>
				</select>
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="mailing_zip">Zip:</label></th>
			<td>
				<input name="mailing_zip" type="text" id="zip" value="<?php echo get_option('meatfree_mailing_zip'); ?>" class="regular-text" />
			</td>
		</tr>
        </table>
        </fieldset>
	<fieldset style="border:1px solid #ddd; padding-bottom:20px; margin-top:20px;">
	<legend style="margin-left:5px; padding:0 5px; color:#2481C6;text-transform:uppercase;"><strong>Social Links</strong></legend>
		<table class="form-table">

        <tr valign="top">
			<th scope="row"><label for="google_link">Google+ link</label></th>
			<td>
				<input name="google_link" type="text" id="google_link" value="<?php echo get_option('meatfree_google_link'); ?>" class="regular-text" />
			</td>
		</tr>

        <tr valign="top">
			<th scope="row"><label for="facebook_link">Facebook link</label></th>
			<td>
				<input name="facebook_link" type="text" id="facebook_link" value="<?php echo get_option('meatfree_facebook_link'); ?>" class="regular-text" />
			</td>
		</tr>
		<tr valign="top">
			<th scope="row"><label for="twitter_user">Twitter Username</label></th>
			<td>
				<input name="twitter_user" type="text" id="twitter_user" value="<?php echo get_option('meatfree_twitter_user'); ?>" class="regular-text" />
			</td>
		</tr>
        <tr valign="top">
			<th scope="row"><label for="linkedin_link">LinkedIn link</label></th>
			<td>
				<input name="linkedin_link" type="text" id="linkedin_link" value="<?php echo get_option('meatfree_linkedin_link'); ?>" class="regular-text" />
			</td>
		</tr>        <tr valign="top">
			<th scope="row"><label for="flickr_link">Flickr link</label></th>
			<td>
				<input name="flickr_link" type="text" id="flickr_link" value="<?php echo get_option('meatfree_flickr_link'); ?>" class="regular-text" />
			</td>
		</tr>
        <tr valign="top">
			<th scope="row"><label for="youtube_link">YouTube link</label></th>
			<td>
				<input name="youtube_link" type="text" id="youtube_link" value="<?php echo get_option('meatfree_youtube_link'); ?>" class="regular-text" />
			</td>
		</tr>
        <tr valign="top">
			<th scope="row"><label for="sharethis_link">ShareThis link</label></th>
			<td>
				<input name="sharethis_link" type="text" id="sharethis_link" value="<?php echo get_option('meatfree_sharethis_link'); ?>" class="regular-text" />
			</td>
		</tr>
        </table>
        </fieldset>
		<p class="submit">
		<input type="submit" name="Submit" class="button-primary" value="Save Changes" />
		<input type="hidden" name="meatfree_settings" value="save" style="display:none;" />
		</p>
</form>
</div>
<?php }

//contact information
function meatfree_get_bizname(){
	$ret .= (get_option('meatfree_biz_name')!='')?get_option('meatfree_biz_name'):get_bloginfo('name');
	return $ret;
}
function meatfree_get_address(){
	if((get_option('meatfree_street')!='') || (get_option('meatfree_city')!='') || (get_option('meatfree_state')!='') || (get_option('meatfree_zip')!='')) {
		$ret = '<address>';
			$ret .= (get_option('meatfree_street')!='')?get_option('meatfree_street').' ':'';
			$ret .= (get_option('meatfree_street2')!='')?get_option('meatfree_street2').' ':'';
			$ret .= (get_option('meatfree_city')!='')?get_option('meatfree_city').', ':'';
			$ret .= (get_option('meatfree_state')!='')?get_option('meatfree_state').' ':'';
			$ret .= (get_option('meatfree_zip')!='')?get_option('meatfree_zip').' ':'';
		$ret .= '</address>';
		return $ret;
		} else {
			return false;
		} 
}
function meatfree_get_digits(){
		if((get_option('meatfree_phone')!='') || (get_option('meatfree_fax')!='')) {
		$ret .= '<address>';
			$ret .= (get_option('meatfree_phone')!='')?'Phone: '.get_option('meatfree_phone').' ':'';
			$ret .= (get_option('meatfree_fax')!='')?'Fax: '.get_option('meatfree_fax').' ':'';
		$ret .= '</address>';
		return $ret;
		} else {
			return false;
		} 
}
//create copyright message
function meatfree_copyright($address = TRUE){
	$ret .= 'Copyright &copy;'.date('Y').' ';
	$ret .= meatfree_get_bizname();
	if($address){
		$ret .= meatfree_get_address();
		$ret .= meatfree_get_digits();
	}
	print $ret;
}