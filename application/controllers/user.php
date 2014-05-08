<?php if (!defined('BASEPATH'))
{
	exit('No direct script access allowed');
}

class User extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('user_model');
	}

	//* Default controler
	public function index()
	{
		if ($this->session->userdata('logged_in'))
		{
			$this->welcome();
		}
		else
		{
			if ($this->session->userdata('invalid_login'))
			{
				$data['form_error_class'] = 'error';
				$this->session->unset_userdata(array('invalid_login' => ''));

			}
			else
			{
				$data['form_error_class'] = '';
			}
			$data['title'] = 'Home';
			$this->load->view('_header', $data);
			$this->load->view("registration.php", $data);
			$this->load->view('_footer', $data);
		}
	}
	//* Welcome after login
	public function welcome()
	{
		$data['title'] = 'Welcome';
		$this->load->view('_header', $data);
		$this->load->view('welcome.php', $data);
		$this->load->view('_footer', $data);
	}

	public function login()
	{
		$email = $this->input->post('email');
		$password = $this->input->post('pass');

		$result = $this->user_model->login($email, $password);
		if ($result)
		{
			$this->welcome();
		}
		else
		{
			$this->session->set_userdata(array('invalid_login' => 'Invalid login.'));
			$this->index();
		}
	}

	//* After successful registration
	public function registration_success()
	{
		$data['title'] = 'Thank You';
		$this->load->view('_header', $data);
		$this->load->view('registration_success.php', $data);
		$this->load->view('_footer', $data);
	}

	//*
	//* Validate registration data then register user
	//*
	//* @access public
	public function registration()
	{
		$this->load->library('form_validation');
		// field name, error message, validation rules
		$this->form_validation->set_rules('username', 'User Name', 'trim|required|min_length[6]|max_length[32]|is_unique[user.username]|xss_clean');
		$this->form_validation->set_rules('email', 'Your Email', 'trim|required|valid_email|is_unique[user.email]|xss_clean');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[6]|max_length[32]');
		$this->form_validation->set_rules('password_confirm', 'Password Confirmation', 'trim|required|matches[password]');

		if ($this->form_validation->run() == false)
		{
			$this->index();
		}
		else
		{
			$this->user_model->add_user($this->input->post('email'), $this->input->post('password'), $this->input->post('username'));
			$this->registration_success();
		}
	}

	//* Delete user via ajax
	//* @return json Return json response
	public function delete_user()
	{

		$user_id = $this->input->post('user_id');
		if ($user_id)
		{
			$this->user_model->delete_user($user_id);

			$response['success'] = true;
			$response['message'] = 'User ' . $user_id . ' deleted';
			$data['response'] = $response;
		}
		else
		{
			$response['success'] = false;
			$response['message'] = 'User id invalid';
			$data['response'] = $response;
		}
		$this->output->set_content_type('application/json')->set_output(json_encode($data['response']));


	}

	//*
	//* list all users in user table
	//*
	//* @access public
	public function members()
	{
		$data['title'] = 'Members';
		if ($this->session->userdata('logged_in'))
		{
			$this->load->library('table');

			$table_data = $this->user_model->get_users_table_data();

			$data['user_table'] = $this->table->generate($table_data);
			$this->load->view('_header', $data);
			$this->load->view('members.php', $data);
			$this->load->view('_footer', $data);
		}
		else
		{
			$this->load->view('_header', $data);
			$this->load->view('restricted.php', $data);
			$this->load->view('_footer', $data);
		}
	}

	//* Logout and redirect to default page
	public function logout()
	{
		$session_data = array(
			'user_id' => '',
			'user_name' => '',
			'user_email' => '',
			'logged_in' => false,
		);
		$this->session->unset_userdata($session_data);
		$this->session->sess_destroy();
		redirect('');
	}
}

/* End of file user.php */
/* Location: ./application/controllers/user.php */