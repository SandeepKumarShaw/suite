<?php
/*
  Plugin Name: Custom Registration
  Plugin URI: https://www.webskitters.com/
  Description: WordPress Front End User registration form.
  Version: 1.0
  Author: webskitters
  Author URI: https://www.webskitters.com/
*/
 class CustomRegistration{
 	private $username;
 	private $email;
 	private $password;
 	private $website;
 	private $first_name;
 	private $last_name;
 	private $nickname;
 	private $bio;

public function __construct(){
	add_shortcode('cus_registration', array($this, 'shortcode'));
	add_action('wp_enqueue_scripts', array($this, 'flat_ui_kit'));
}
public function flat_ui_kit(){
  wp_enqueue_style('demo-css', plugins_url('css/demo.css', __FILE__));
  wp_enqueue_style('demo-style2', plugins_url('css/style2.css', __FILE__));
  wp_enqueue_style('animate-custom', plugins_url('css/animate-custom.css', __FILE__));
}
public function validation($data){
$username=$data['user_login'];
$password=$data['user_pass'];
$email=$data['user_email'];
$website=$data['user_url'];
$first_name=$data['first_name'];
$last_name=$data['last_name'];
$nickname=$data['nickname'];
$bio=$data['description'];
       

$reg_errors = new WP_Error;
if ( empty( $username ) || empty( $password ) || empty( $email ) ) {
  $reg_errors->add('field', 'Required form field is missing');
}
if ( 4 > strlen( $username ) ) {
  $reg_errors->add( 'username_length', 'Username too short. At least 4 characters is required' );
}
if ( username_exists( $username ) ){
  $reg_errors->add('user_name', 'Sorry, that username already exists!');    
}
if ( ! validate_username( $username ) ) {
$reg_errors->add( 'username_invalid', 'Sorry, the username you entered is not valid' );
}
if ( 5 > strlen( $password ) ) {
    $reg_errors->add( 'password', 'Password length must be greater than 5' );
}
if ( !is_email( $email ) ) {
$reg_errors->add( 'email_invalid', 'Email is not valid' );
}
if ( email_exists( $email ) ) {
$reg_errors->add( 'email', 'Email Already in use' );
}
if ( ! empty( $website ) ) {
if ( ! filter_var( $website, FILTER_VALIDATE_URL ) ) {
    $reg_errors->add( 'website', 'Website is not a valid URL' );
}
}
if ( is_wp_error( $reg_errors ) ) { 
  foreach ( $reg_errors->get_error_messages() as $error ) {     
      echo '<div>';
      echo '<strong>ERROR</strong>:';
      echo $error . '<br/>';
      echo '</div>';                 
  }
}
   if ( 1 > count( $reg_errors->get_error_messages() ) ) {
        $user = wp_insert_user( $data );
        echo 'Registration complete.'; 
   }
  }
public function shortcode(){
   ob_start();

      if (isset($_POST['reg_submit'])) {	            
          $username = $_POST['usernamesignup'];
          $email = $_POST['emailsignup'];
          $password = $_POST['passwordsignup'];
          $website = $_POST['userwebsite'];
          $first_name = $_POST['userfname'];
          $last_name = $_POST['userlname'];
          $nickname = $_POST['usernname'];
          $bio = $_POST['about'];

          $data                = array();
          $data['user_login']  = $username;
          $data['user_email']  = $email;
          $data['user_pass']   = $password;
          $data['user_url']    = $website;
          $data['first_name']  = $first_name;
          $data['last_name']   = $last_name;
          $data['nickname']    = $nickname;
          $data['description'] = $bio;     
          
        
         $this->validation($data);	           
      }
      $this->registration_form();
      return ob_get_clean();
}

public function registration_form(){

?>

<div id="wrapper">
    <div id="cusregister" class="animate form">
      <form  action="" method="post" autocomplete="on"> 
          <h1> Sign up </h1> 
          <p> 
              <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
              <input id="usernamesignup" name="usernamesignup" type="text" placeholder="mysuperusername690" />
          </p>
          <p> 
                 <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                 <input id="emailsignup" name="emailsignup" type="text" placeholder="mysupermail@mail.com"/> 
             </p>
             <p> 
                 <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                 <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
             </p>
             <p> 
                 <label for="usernamesignup" class="uname" data-icon="u">Website</label>
                 <input id="usernamesignup" name="userwebsite" type="text" placeholder="www.example.com" />
             </p>
             <p> 
                 <label for="userfname" class="uname" data-icon="u">First Name</label>
                 <input id="userfname" name="userfname" type="text" placeholder="James" />
             </p>
             <p> 
                 <label for="userlname" class="uname" data-icon="u">Last Name</label>
                 <input id="userlname" name="userlname" type="text" placeholder="Anderson" />
             </p>
             <p> 
                 <label for="usernname" class="uname" data-icon="u">NickName</label>
                 <input id="usernname" name="usernname" type="text" placeholder="Jimmy" />
             </p>
             <p> 
                 <label for="about" class="uname" data-icon="u">About/Bio</label>
                 <input id="about" name="about" type="text" placeholder="About/Bio" />
             </p>                               
          <p class="signin button"> 
            <input type="submit" name="reg_submit" value="Sign up"/> 
          </p>                               
      </form>
  </div>
 </div> 
<?php
  }
} 
new CustomRegistration;