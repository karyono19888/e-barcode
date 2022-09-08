<?php
class M_auth extends CI_Model
{

	public function __construct()
	{
        parent::__construct();
	}

	function register($username,$password,$nama)
	{
		$data_user = array(
			'username'=>$username,
			'password'=>password_hash($password,PASSWORD_DEFAULT),
			'nama'    =>$nama
		);
		$this->db->insert('tb_user',$data_user);
	}

    public function Login($username, $password)
    {
        $user = $this->db->get_where('a_user', array('a_user_username' => $username))->row_array();
        if ($user) {
            if ($user['a_user_active'] == "Aktif") {
                if (password_verify($password, $user['a_user_password'])) {
                    $data = [
                        'id'        => $user['a_user_id'],
                        'username'  => $user['a_user_username'],
                        'nama'      => $user['a_user_name'],
                        'level'     => $user['a_user_level'],
                        'is_login'  => TRUE,
                    ];
                    $this->session->set_userdata($data);
                    $this->session->set_flashdata('success', 'Login Berhasil...');
                    redirect('Dashboard');
                } else {
                    $this->session->set_flashdata('error', 'Password Salah!');
                    redirect('Login');
                }
            } else {
                $this->session->set_flashdata('error', 'Username sudah tidak aktif');
                redirect('Login');
            }
        } else {
            $this->session->set_flashdata('error', 'Username tidak terdaftar');
            redirect('Login');
        }
    }

    function cek_login()
    {
        if(empty($this->session->userdata('is_login')))
        {
            $this->session->set_flashdata('error', 'Your login is expired');
			redirect('login');
		}
    }

}
?>