<?PHP
	class Jadwal_Krl extends CI_Controller
	{
		//Constructor
		
		public function __construct()
		{
			parent::__construct();
			
			//model
			$this->load->model('jadwal_krl_m');
		}
		
		//Index
		
		public function index()
		{
			$this->load->view('jadwal_krl_v');
		}
		
		public function insert_krl()
		{
			$this->jadwal_krl_m->set_id_krl($this->input->post('id_krl'));
			
			$query = $this->jadwal_krl_m->view_by_id_krl_tambah();
			
			if(! $query->num_rows())
			{
				$this->jadwal_krl_m->set_nama($this->input->post('nama'));
				$this->jadwal_krl_m->set_stasiun_awal($this->input->post('stasiun_awal'));
				$this->jadwal_krl_m->set_stasiun_akhir($this->input->post('stasiun_akhir'));
				
				$this->jadwal_krl_m->insert_krl();
				
				redirect(site_url().'jadwal_krl');
			}
			else
				redirect(site_url().'jadwal_krl/index/error_save');
		}
		
		public function insert_jadwal()
		{
			$this->jadwal_krl_m->set_stasiun($this->input->post('stasiun'));
			$this->jadwal_krl_m->set_jam($this->input->post('jam'));
			$this->jadwal_krl_m->set_id_krl($this->input->post('id_krl'));
			
			$this->jadwal_krl_m->insert_jadwal();
				
			redirect(site_url().'jadwal_krl');
		}
		
		public function delete_all()
		{
			$this->jadwal_krl_m->delete_all();
			
			redirect(site_url().'jadwal_krl');
		}
		
	}
?>