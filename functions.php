
add_action( 'show_user_profile', 'yoursite_extra_user_profile_fields' );
add_action( 'edit_user_profile', 'yoursite_extra_user_profile_fields' );
function yoursite_extra_user_profile_fields( $user ) {
?>
  <h3><?php _e("Extra profile information", "blank"); ?></h3>
  <table class="form-table">
    <tr>
      <th><label for="company"><?php _e("Username"); ?></label></th>
      <td>
        <input type="text" name="pippin_user_login" id="pippin_user_login" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'pippin_user_login', $user->ID ) ); ?>" /><br />
    </td>
    </tr>   
    <tr>
      <th><label for="job"><?php _e("Email"); ?></label></th>
      <td>
        <input type="text" name="pippin_user_email" id="pippin_user_email" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'pippin_user_email', $user->ID ) ); ?>" /><br />
    </td>
    </tr>    
    <tr>
      <th><label for="country"><?php _e("First Name"); ?></label></th>
      <td>
        <input type="text" name="pippin_user_first" id="pippin_user_first" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'pippin_user_first', $user->ID ) ); ?>" /><br />
    </td>
    </tr>
    <tr>
      <th><label for="city"><?php _e("Last Name"); ?></label></th>
      <td>
        <input type="text" name="pippin_user_last" id="pippin_user_last" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'pippin_user_last', $user->ID ) ); ?>" /><br />
    </td>
    </tr>    
      <tr>
      <th><label for="city"><?php _e("Instagram link"); ?></label></th>
      <td>
        <input type="text" name="pippin_user_instagram" id="pippin_user_instagram" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'pippin_user_instagram', $user->ID ) ); ?>" /><br />
    </td>
    </tr>  
      <tr>
      <th><label for="city"><?php _e("Facebook link"); ?></label></th>
      <td>
        <input type="text" name="pippin_user_facebook" id="pippin_user_facebook" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'pippin_user_facebook', $user->ID ) ); ?>" /><br />
    </td>
    </tr>  
      <tr>
      <th><label for="city"><?php _e("Select Role"); ?></label></th>
      <td>
        <input type="text" name="pippin_user_role" id="pippin_user_role" class="regular-text" 
            value="<?php echo esc_attr( get_the_author_meta( 'pippin_user_role', $user->ID ) ); ?>" /><br />
    </td>
    </tr>  
    
  </table>
<?php
}
