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
 	//form propertier

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

 /*   public function validation(){
 
        if (empty($this->username) || empty($this->password) || empty($this->email)) {
            return new WP_Error('field', 'Required form field is missing');
        }
 
        if (strlen($this->username) < 4) {
            return new WP_Error('username_length', 'Username too short. At least 4 characters is required');
        }
 
        if (strlen($this->password) < 5) {
            return new WP_Error('password', 'Password length must be greater than 5');
        }
 
        if (!is_email($this->email)) {
            return new WP_Error('email_invalid', 'Email is not valid');
        }
 
        if (email_exists($this->email)) {
            return new WP_Error('email', 'Email Already in use');
        }
 
        if (!empty($website)) {
            if (!filter_var($this->website, FILTER_VALIDATE_URL)) {
                return new WP_Error('website', 'Website is not a valid URL');
            }
        }
 
        $details = array('Username' => $this->username,
            'First Name' => $this->first_name,
            'Last Name' => $this->last_name,
            'Nickname' => $this->nickname,
            'bio' => $this->bio
        );
 
        foreach ($details as $field => $detail) {
            if (!validate_username($detail)) {
                return new WP_Error('name_invalid', 'Sorry, the "' . $field . '" you entered is not valid');
            }
        }
 
    }*/
    public function registration($data){
 
	    $userdata = array(
	        'user_login' => esc_attr($this->username),
	        'user_email' => esc_attr($this->email),
	        'user_pass' => esc_attr($this->password),
	        'user_url' => esc_attr($this->website),
	        'first_name' => esc_attr($this->first_name),
	        'last_name' => esc_attr($this->last_name),
	        'nickname' => esc_attr($this->nickname),
	        'description' => esc_attr($this->bio),
	    );

     


	 
	    /*if (is_wp_error($this->validation())) {
	        echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
	        echo '<strong>' . $this->validation()->get_error_message() . '</strong>';
	        echo '</div>';
	    } else {*/
	        $register_user = wp_insert_user($userdata);
	        if (!is_wp_error($register_user)) {
	 
	            echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
	            echo '<strong>Registration complete. Goto <a href="' . wp_login_url() . '">login page</a></strong>';
	            echo '</div>';
	        } else {
	            echo '<div style="margin-bottom: 6px" class="btn btn-block btn-lg btn-danger">';
	            echo '<strong>' . $register_user->get_error_message() . '</strong>';
	            echo '</div>';
	        }
	    //}
	 
	}
	public function shortcode(){
	     ob_start();
	 
	        if (isset($_POST['reg_submit'])) {
	            $username = $_POST['usernamesignup'];

	            $this->email = $_POST['emailsignup'];
	            $this->password = $_POST['passwordsignup'];
	            $this->website = $_POST['userwebsite'];
	            $this->first_name = $_POST['userfname'];
	            $this->last_name = $_POST['userlname'];
	            $this->nickname = $_POST['usernname'];
	            $this->bio = $_POST['about'];

              $data = array();
              $data['user_login'] = $_POST['emailsignup'];
	             var_dump($data);
            
	            //$this->validation();
	           // $this->registration();
	        }
	        $this->registration_form();
	        return ob_get_clean();
	}

    public function registration_form(){?>
         <div id="wrapper">
                          <div id="cusregister" class="animate form">
                            <form  action="" autocomplete="on"> 
                                <h1> Sign up </h1> 
                                <p> 
                                    <label for="usernamesignup" class="uname" data-icon="u">Your username</label>
                                    <input id="usernamesignup" name="usernamesignup" required="required" type="text" placeholder="mysuperusername690" />
                                </p>
                                <!-- <p> 
                                       <label for="emailsignup" class="youmail" data-icon="e" > Your email</label>
                                       <input id="emailsignup" name="emailsignup" required="required" type="email" placeholder="mysupermail@mail.com"/> 
                                   </p>
                                   <p> 
                                       <label for="passwordsignup" class="youpasswd" data-icon="p">Your password </label>
                                       <input id="passwordsignup" name="passwordsignup" required="required" type="password" placeholder="eg. X8df!90EO"/>
                                   </p>
                                   <p> 
                                       <label for="usernamesignup" class="uname" data-icon="u">Website</label>
                                       <input id="usernamesignup" name="userwebsite" required="required" type="text" placeholder="www.example.com" />
                                   </p>
                                   <p> 
                                       <label for="userfname" class="uname" data-icon="u">First Name</label>
                                       <input id="userfname" name="userfname" required="required" type="text" placeholder="James" />
                                   </p>
                                   <p> 
                                       <label for="userlname" class="uname" data-icon="u">Last Name</label>
                                       <input id="userlname" name="userlname" required="required" type="text" placeholder="Anderson" />
                                   </p>
                                   <p> 
                                       <label for="usernname" class="uname" data-icon="u">NickName</label>
                                       <input id="usernname" name="usernname" required="required" type="text" placeholder="Jimmy" />
                                   </p>
                                   <p> 
                                       <label for="about" class="uname" data-icon="u">About/Bio</label>
                                       <input id="about" name="about" required="required" type="text" placeholder="About/Bio" />
                                   </p>                              -->   
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