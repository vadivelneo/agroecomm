<?php ob_start();
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signin extends MY_Controller {

	public function __construct()
	{
		  parent::__construct();

		  $this->load->model('homemodule');
		  $this->load->library('session');
		  $this->load->helper('security');
		
		$sessionData = $this->session->userdata('userlogin');
		 
		 if(!empty($sessionData))
		 {
			 redirect('home');
		 }
	}
	
	public function index()
	{
		$this->login();
	}

	public function login()
	{
		$this->title = "Login";
		$this->keywords = "Login";
		$this->load->view("pages/login");
		//$this->_render('pages/login');
	}

	public function userlogin()
	{
		$username = $this->security->xss_clean($this->input->post("username"));
		$password = $this->security->xss_clean(md5($this->input->post("password")));

		$ip_address= $this->homemodule->get_client_ip();
		$date=date("Y-m-d H:i:s");

		$verifyusername=$this->homemodule->verifylogin($username,$password);

		if($verifyusername==1)
		{
			$user=$this->homemodule->getuserdetail($username,$password);
			
			$data=array(
				"login_histroy_ip"=> $ip_address,
				"login_histroy_signin_time" => $date
			);
			$insert_ip=$this->homemodule->insert_ip_details($data);
			
			$sessionArr = array(
				'user_id' => $user->user_id,
				'user_code' => $user->user_name,
				'user_type' => $user->user_type,
				'user_first_name' => $user->user_first_name,
				'company_id' => $user->user_company_id,
				'group_id' => $user->user_group_id,
				'logo' => $user->company_logo,
				'officerUserId' => $user->user_code,
				'company_tax' => $user->company_tax,
				'company_vat' => $user->company_vat_display,
				'company_cst' => $user->company_cst_display,
				'company_gst' => $user->company_gst_display,
				'company_service' => $user->company_service_display,
				'company_excise' => $user->company_excise_display,
			);
			
			$this->session->set_userdata('userlogin',$sessionArr);
			if($user->user_id == 1)
			{
			redirect('home/home_list');
			}
			else
			{
				redirect('home/user_dashboard');
			}
		}
		else{
			$this->session->set_flashdata('message','Please enter valid Username and Password ');
			redirect('signin/login');
		}

	}

	public function forgotpassword()
	{	
		//echo 'hi';exit;
	   $this->_render('pages/login');

	   if(isset($_POST['send']))
	 {
	 	$username=$this->input->post('emailId'); 
	 	//echo "$username";
	 	$validuser=$this->homemodule->chkvaliduser($username);
	 	//echo $validuser; exit;

	 	if($validuser==1)
		{
		 $length = 15;
		 $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		 $randomString = '';

		
		 for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, strlen($characters) - 1)];
		 }
		//echo $randomString; exit;
		 $this->homemodule->strpwdstring($username, $randomString);

		 $this->data['user'] = $this->homemodule->getrstpwddetails($username);
		 
		 $to = $this->data['user']->user_email;
		 
		 $message = $this->load->view('pages/mailtemplate/forgotpasswordmail', $this->data, true);

		// print_r($this->data['user']);exit;
		
		$this->load->library('email');

		$config=array(
			'charset'=>'utf-8',
			'wordwrap'=> TRUE,
			'mailtype' => 'html'
		);

		$this->email->initialize($config);

		$this->email->from('info@agroreforming.com', 'Agroreforming Team');
		$this->email->to($to); 

		$this->email->subject('Agroreforming- Reset Password');
		$this->email->message($message);    

		$this->email->send();
			
		$this->session->set_flashdata('message', 'Password Send Successfully ');
			
	    }
	    else
			{
				$this->session->set_flashdata('message', 'Please Enter Vaild Email');
				
			}
	 }

    }
	
	public function resetpassword($userId, $resetStr)
	{

		
		$user = $this->homemodule->checkUserForResetPwd($userId, $resetStr);
		
		
		if($user == '1')
		{
			if(isset($_POST['resetpwd']))
			{	
				$newpassword = ($this->input->post('newpassword'));
				$confirmpassword = ($this->input->post('confirmpassword'));
				
				$data = array(
					'user_pwd' => md5($newpassword),
					'user_reset_pwd' => NULL
				);

				print_r($data); exit;
				
				$this->homemodule->ChangePassword($userId, $data);
				$this->session->set_flashdata('message', 'Password Reset Successfully');
				redirect('signin/login');
			}
			else
			{
				$this->title = "Reset Password";
				$this->keywords = "Reset Password";
			
				$this->_render('pages/resetpassword');
			}
		}
		else
		{
			redirect('signin/login');
		}
	}

	
	
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */