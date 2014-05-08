<?php if (!defined('BASEPATH'))
{
	exit('No direct script access allowed');
}

class User_model extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
	}

	//*
	//* Login user and create session data
	//*
	//* @param string $email User email address
	//* @param string $password User password non-crypted
	//* @return bool
	//* @access public
	public function login($email, $password)
	{

		$this->db->where("email", $email);
		// $this->db->where("password", $password);

		$query = $this->db->get("user");
		if ($query->num_rows() > 0)
		{
			foreach ($query->result() as $rows)
			{
				//add all data to session
				$session_data = array(
					'user_id' => $rows->id,
					'user_name' => $rows->username,
					'user_email' => $rows->email,
					'logged_in' => TRUE,
				);
			}
			if (crypt($password, $rows->password) == $rows->password)
			{
				$this->session->set_userdata($session_data);

				$this->db->where(array('id' => $rows->id));
				$this->db->update('user', array('last_login' => date('Y-m-d H:i:s')));

				return true;
			}
			else
			{
				return false;
			}
		}
		return false;
	}

	//*
	//* Add user and create password hash
	//*
	//* @param string $email User email address
	//* @param string $password User password non-crypted
	//* @access public
	public function add_user($email, $password, $username)
	{

		$blowfish_salt = bin2hex(openssl_random_pseudo_bytes(22));

		// 2a is the bcrypt algorithm selector, see http://php.net/crypt
		// 12 is the workload factor (around 300ms on my Core i7 machine), see http://php.net/crypt
		$hash = crypt($password, "$2a$12$" . $blowfish_salt);
		$now = date("Y-m-d H:i:s");
		$data = array(
			'username' => $username,
			'email' => $email,
			'password' => $hash,
			'created' => $now,
			'modified' => $now
		);
		$this->db->insert('user', $data);
	}

	public function delete_user($user_id)
	{
		$this->db->where(array('id' => $user_id));
		$this->db->delete('user');
	}

	//*
	//* Get user table data to use with HTML Table Class
	//*
	//* @return array|false Array of user data or false
	//* @access public
	public function get_users_table_data()
	{
		$query = $this->db->get("user");
		if ($query->num_rows() > 0)
		{
			$fields_data = array();
			foreach ($query->list_fields() as $field)
			{
				if ($field != 'password' && $field != 'modified')
				{
					$fields_data[] = $field;
				}
			}
			$fields_data[] = 'Delete';

			$user_data = array();
			$user_data[] = $fields_data;
			foreach ($query->result() as $row)
			{
				unset($row->password);
				unset($row->modified);
				$row->delete = '<a class="delete" data-id="' . $row->id . '">X</a>';
				$user_data[] = (array)$row;
			}

			return $user_data;
		}
		else
		{
			return false;
		}
	}


}

/* End of file user.php */
/* Location: ./application/models/user_model.php */