<?PHP
	class Sign_Up extends CI_Controller
	{
		//Constructor
		
		public function __construct()
		{
			parent::__construct();
			
			//model
			$this->load->model('pengguna_m');
		}
		
		//Index
		
		public function index()
		{
			$this->load->view('sign_up_v');
		}
		
		public function register()
		{
			if($this->input->post('password')!= $this->input->post('konfirmasi_password'))
				redirect(site_url().'sign_up/index/error_password');
			//else if(strtolower($this->input->post('captcha')) != strtolower($this->input->post('captcha_tmp')))
//					redirect(site_url().'sign_up/index/error_captcha');
			else
			{
				$this->pengguna_m->set_username($this->input->post('username'));
				
				$query = $this->pengguna_m->view_by_username();
				
				if($query->num_rows())
					redirect(site_url().'sign_up/index/error_username');
				else
				{
					$this->pengguna_m->set_password($this->input->post('password'));
					
					$this->pengguna_m->insert();
					
					redirect(site_url().'sign_in');
				}
			}
		}
	}
?>