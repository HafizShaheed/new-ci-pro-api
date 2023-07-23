<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users  extends CI_Controller{

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('users_model');
        $this->load->model('Password_reset_model');
        $this->load->library('email');
      
    } 

    public function signup(){
        

        $this->form_validation->set_rules('first_name', 'first name', 'trim|required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email|is_unique[users.email]');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_rules('passconf', 'confrim password', 'required|matches[password]');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == false) {

            $data['title'] = "Sign Up";
            $this->load->view('include/header', $data);
            $this->load->view('users/signup', $data);
            $this->load->view('include/footer', $data);
        }else{
         

            // echo '<pre>'; print_r($this->input->post());
            $userdata = array(
                'first_name' => $this->input->post('first_name', TRUE),
                'last_name' => $this->input->post('last_name', TRUE),
                'email' => $this->input->post('email', TRUE),
                'password' => md5($this->input->post('password', TRUE)),
                'active' => 1,
                'created_at' => date('Y-m-d H:i:s', time())
            );

            $this->users_model->insertUser($userdata);
            $this->session->set_flashdata('message', 'Register Successfully');

            redirect('users/login');
        }
    }

    public function login() {

        if ($this->session->userdata('authenticated')) {
            redirect('dashboard/index');
        }
        $this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
        $this->form_validation->set_rules('password', 'password', 'required');
        $this->form_validation->set_error_delimiters('<div class="error">', '</div>');

        if ($this->form_validation->run() == false) {

            $data['title'] = "Sign in";
            $this->load->view('include/header', $data);
            $this->load->view('users/login', $data);
            $this->load->view('include/footer', $data);
        }else{

            $email = $this->security->xss_clean($this->input->post('email'));
            $password = $this->security->xss_clean($this->input->post('password'));

            $user = $this->users_model->login($email, $password);

            if ($user) {
                $userdata = array(
                    'id' => $user->id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'authenticated' => TRUE,
                );

                $this->session->set_userdata($userdata);
                redirect('dashboard');
            }else {
                $this->session->set_flashdata('message', 'Invalid email or password');
                redirect('users/login');
            }
        }

    }

    public function logout() {
        $this->session->sess_destroy();
        redirect('users/login');
    }


    // ======================reset password========================= //

    public function forgot_password() {

        

        $data['title'] = "Forget Password";
        $this->load->view('include/header', $data);
        $this->load->view('users/forgot_password', $data);
        $this->load->view('include/footer', $data);
    }

    public function send_reset_link() {
        $email = $this->input->post('email');
    
        // Check if the email exists in the database (you should have a users table)
        // Replace 'users' with your users table name
        $user = $this->db->get_where('users', array('email' => $email))->row();
    
        if ($user) {
          // Generate a random token
          $token = bin2hex(random_bytes(32));
    
          // Insert the reset token and email into the password_resets table
          $reset_data = array(
            'email' => $email,
            'token' => $token
          );
          $reset_id = $this->Password_reset_model->insert_reset_token($reset_data);
    
          // Compose the reset link
          $reset_link = base_url('users/reset_password/' . $token);
    
          // Send the reset link via email using Mailtrap (configure your Mailtrap credentials in config/email.php)



          $this->load->library('MY_Email'); // Load the custom email library

          // Email configuration
          $config = Array(
              'protocol' => 'smtp',
              'smtp_host' => 'sandbox.smtp.mailtrap.io',
              'smtp_port' => 2525,
              'smtp_user' => 'd3fba78ae548df',
              'smtp_pass' => 'c3d4e8866e9d08',
              'charset' => 'utf-8', // Set the charset to utf-8, not 'html'
              'mailtype' => 'html', // Set the mailtype to 'html'
              'crlf' => "\r\n",
              'newline' => "\r\n",
          );
          
          $this->my_email->initialize($config); // Initialize the custom email library
          
          // Compose the email
          $this->my_email->from('shaheedkhan336@gmail.com', 'Your Name');
          $this->my_email->to($email);
          $this->my_email->subject('Password Reset Link');
          
          // Load the email template and set its content
          $email_content = $this->load->view('users/email_template_reset_password', compact('reset_link'), true);
          
          $this->my_email->html_message($email_content); // Set the HTML message
          
          // Set the plain-text version of the email (provide an alternative message)
    
          
          // Send the email
          if ($this->my_email->send()) {
              echo 'HTML email sent successfully.';
          } else {
              echo $this->my_email->print_debugger();
          }
          

        // ==============================================================

          // Show a success message to the user
          $this->session->set_flashdata('message', 'Password reset link has been sent to your email.');
          redirect('users/forgot_password');
        } else {
          // Show an error message to the user if the email is not found
          $this->session->set_flashdata('error', 'Email address not found.');
          redirect('users/forgot_password');
        }
    }

      public function reset_password($token) {
        // Check if the token exists in the database
        $reset_data = $this->Password_reset_model->find_token($token);
    
        if ($reset_data) {
          // Check if the token has expired (10 minutes in this case)
          $created_at = strtotime($reset_data->created_at);
          $current_time = time();
          $expiry_time = 10 * 60; // 10 minutes in seconds
    
          if ($current_time - $created_at <= $expiry_time) {
            $data['token'] = $token;
            
            $data['title'] = "Reset Password";
            $this->load->view('include/header', $data);
            $this->load->view('users/reset_password', $data);
            $this->load->view('include/footer', $data);
          } else {
            // Token has expired
            $this->session->set_flashdata('error', 'Password reset link has expired.');
            redirect('users/forgot_password');
          }
        } else {
          // Token not found in the database
          $this->session->set_flashdata('error', 'Invalid reset token.');
          redirect('users/forgot_password');
        }
      }

      public function update_password() {
    
        // Validation rules for the new password
        $this->form_validation->set_rules('password', 'New Password', 'required|min_length[8]');
        $this->form_validation->set_rules('confirm_password', 'Confirm New Password', 'required|matches[password]');
    
        $token = $this->input->post('token');
    
        if ($this->form_validation->run() === FALSE) {
          // Show error messages to the user if validation fails
          $data['title'] = "Reset Password";
          $this->load->view('include/header', $data);
          $this->load->view('users/reset_password',array('token' => $token, 'data' => $data) );
          $this->load->view('include/footer', $data);
    
        } else {
          // Update the user's password in the database
          $reset_data = $this->Password_reset_model->find_token($token);
    
          if ($reset_data) {
            // Check if the token has expired (10 minutes in this case)
            $created_at = strtotime($reset_data->created_at);
            $current_time = time();
            $expiry_time = 10 * 60; // 10 minutes in seconds
    
            if ($current_time - $created_at <= $expiry_time) {
              // Update the user's password in the users table (replace 'users' with your users table name)
              $this->db->where('email', $reset_data->email);
              $this->db->update('users', array('password' => md5($this->input->post('password'))));
    
              // Delete the reset token from the password_resets table
              $this->Password_reset_model->delete_token($reset_data->id);
    
              // Show a success message to the user
              $this->session->set_flashdata('message', 'Password has been reset successfully.');
              redirect('users/login'); // Redirect to your login page
            } else {
              // Token has expired
              $this->session->set_flashdata('error', 'Password reset link has expired.');
              redirect('users/forgot_password');
            }
          } else {
            // Token not found in the database
            $this->session->set_flashdata('error', 'Invalid reset token.');
            redirect('users/forgot_password');
          }
        }
      }
}