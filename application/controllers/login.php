<?php

class Login extends CI_Controller {
	
	public function index() {
		$this->load->view('login_view');
	}
	
	public function validate_credentials() {
		$this->load->model('membership_model');
		$query = $this->membership_model->validate();
		
		if($query) {//als true gereturnd wordt moet sessie gecreerd worden met de informatie uit de array $data
			$data = array(
				'usern' => $this->input->post('usern'),
				'is_logged_in' => true
			);
			
			//$this->session->set_userdata($data);	//set_userdata voegt gegevens toe aan een sessie
			redirect('brainstormList');
			echo '<script type="text/javascript"> window.alert("Success!") </script>';
		}
		else {
			//redirect('http://www.ajweb.be/brainstorm/index.php');
			echo '<script type="text/javascript"> window.alert("Oops! That login is incorrect. Please try again!") </script>';
		}
		
	}
	
	public function logout() {
		$this->session->sess_destroy();
		redirect('login');
	}
}

?>
