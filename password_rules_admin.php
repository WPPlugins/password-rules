<?php 

function checkbox($option) {
$val = get_option($option); 
echo "<input type='checkbox' name='$option' id='$option' value='checked' "; 
if ($val == "checked") {echo "checked='checked' ";} 
echo '/>';
}

?>

<div class="wrap">
    <?php screen_icon( 'options-general' ); ?>
    <h2><?php _e('Password Rules settings','password_rules'); ?></h2>
	
	<form name="password_rules_form" method="post" action="options.php">  
	<?php settings_fields( 'password_rules' ); ?>
		<table class="form-table">
			<tbody>
				<tr valign="middle">
					<th scope="row"><label for="min_len"><?php _e('Minimum password length','password_rules'); ?></label></th>
					<td>
						<select name="min_len" id="min_len">
							<?php 
							$min_len = get_option('min_len');
							for ($i=0; $i<17; $i++) { ?>
							<option <?php if ($min_len==$i) {echo 'selected="selected"';}  ?>><?php echo $i; ?></option>
							<?php } ?>
						</select>
						<?php _e('Leave at "0" for no password length limit.','password_rules'); ?>
					</td>
				</tr>
				<tr valign="middle">
					<th scope="row"><?php _e('Letter character required','password_rules'); ?></th>
					<td>
					<?php 
						$require_letter = get_option('require_letter');						
					?>
					
						<input type="radio" name="require_letter" value="no_letter" id="no_letter" <?php if ($require_letter == 'no_letter' or $require_letter == '') {echo 'checked="checked"';} ?> /><label for="require_lowercase_uppercase"><?php _e('No letter required','password_rules'); ?></label><br />
						<input type="radio" name="require_letter" value="any_letter" id="any_letter" <?php if ($require_letter == 'any_letter') {echo 'checked="checked"';} ?> /><label for="require_lowercase_uppercase"><?php _e('At least one letter','password_rules'); ?></label><br />
						<input type="radio" name="require_letter" value="lower_upper" id="lower_upper" <?php if ($require_letter == 'lower_upper') {echo 'checked="checked"';} ?> /><label for="require_lowercase_uppercase"><?php _e('At least one lowercase letter and one uppercase letter','password_rules'); ?></label><br />
					</td>
				</tr>
				<tr valign="middle">
					<th scope="row"><label for="require_digit"><?php _e('Require at least one digit','password_rules'); ?></label></th>
					<td>
						<?php checkbox('require_digit'); ?>
					</td>
				</tr>
				<tr valign="middle">
					<th scope="row"><label for="require_punctuation"><?php _e('Require punctuation symbole','password_rules'); ?></label></th>
					<td>
						<?php checkbox('require_punctuation'); ?>
						<?php _e('Require at least one of the following characters','password_rules'); ?>:
						<em>` ! " ? $ % ^ & * ( ) _ - + = { [ } ] : ; @ ' ~ # | &lt; , &gt; . /</em>
					</td>
				</tr>
			</tbody>
		</table>
		
		<p class="submit">
			<input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
		</p>
	</form>

</div>