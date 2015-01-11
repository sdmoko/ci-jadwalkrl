<?PHP
	class Jadwal_Krl_M extends CI_Model
	{
		//Property
		private $id_krl;	
		private $nama;
		private $stasiun_awal;
		private $stasiun_akhir;
		private $id_jadwal;
		private $stasiun;
		private $jam;
				
		//Method Mutator - Setter
		public function set_id_krl($value)
		{
			$this->id_krl = $value;
		}
		
		public function set_nama($value)
		{
			$this->nama = $value;
		}
		
		public function set_stasiun_awal($value)
		{
			$this->stasiun_awal = $value;
		}
		
		public function set_stasiun_akhir($value)
		{
			$this->stasiun_akhir = $value;
		}
		
		public function set_id_jadwal($value)
		{
			$this->id_jadwal = $value;
		}
		
		public function set_stasiun($value)
		{
			$this->stasiun = $value;
		}
		
		public function set_jam($value)
		{
			$this->jam = $value;
		}
		
		//Method Aksesor - Getter
		
		public function get_id_krl()
		{
			return $this->id_krl;
		}
		
		public function get_nama()
		{
			return $this->nama;
		}
		
		public function get_stasiun_awal()
		{
			return $this->stasiun_awal;
		}
		
		public function get_stasiun_akhir()
		{
			return $this->stasiun_akhir;
		}
		
		public function get_id_jadwal()
		{
			return $this->id_jadwal;
		}
		
		public function get_stasiun()
		{
			return $this->stasiun;
		}
		
		public function get_jam()
		{
			return $this->jam;
		}
	
		//method
		public function view()
		{
			$sql = "SELECT DISTINCT j.id_jadwal, j.stasiun, j.jam, j.id_krl, k.nama, k.stasiun_awal, k.stasiun_akhir FROM tbl_jadwal as j, tbl_krl as k";
			
			return $this->db->query($sql);	
		}
		
		public function view_by_stasiun_awal()
		{
			$sql = "SELECT DISTINCT k.stasiun_awal FROM tbl_krl as k";
			
			return $this->db->query($sql);	
		}
		
		public function view_by_stasiun_akhir()
		{
			$sql = "SELECT DISTINCT k.stasiun_akhir FROM tbl_krl as k";
			
			return $this->db->query($sql);	
		}
		
		public function view_by_nama_krl()
		{
			$sql = "SELECT DISTINCT k.nama FROM tbl_krl as k";
			
			return $this->db->query($sql);	
		}
		
		public function view_by_id_krl()
		{
			$sql = "SELECT DISTINCT k.id_krl FROM tbl_krl as k";
			
			return $this->db->query($sql);	
		}
		
		public function view_by_id_krl_tambah()
		{
			$sql = "SELECT DISTINCT k.id_krl FROM tbl_krl as k where id_krl = ".$this->get_id_krl();
			
			return $this->db->query($sql);	
		}
		
		public function view_by_stasiun()
		{
			$sql = "SELECT DISTINCT j.stasiun FROM tbl_jadwal as j";
			
			return $this->db->query($sql);	
		}
		
		public function view_cari($st_awal,$st_akhir,$nama,$id_krl,$stasiun)
		{
			$sql = "SELECT DISTINCT j.id_jadwal, j.stasiun, j.jam, j.id_krl, k.nama, k.stasiun_awal, k.stasiun_akhir FROM tbl_jadwal as j, tbl_krl as k where k.stasiun_awal = '".$st_awal."' and k.stasiun_akhir = '".$st_akhir."' and k.nama = '".$nama."' and k.id_krl = ".$id_krl." and j.stasiun = '".$stasiun."'";
			
			return $this->db->query($sql);	
		}
		
		public function view_cari_all_krl($st_awal,$st_akhir,$nama,$stasiun)
		{
			$sql = "SELECT DISTINCT j.id_jadwal, j.stasiun, j.jam, j.id_krl, k.nama, k.stasiun_awal, k.stasiun_akhir FROM tbl_jadwal as j, tbl_krl as k where k.stasiun_awal = '".$st_awal."' and k.stasiun_akhir = '".$st_akhir."' and k.nama = '".$nama."' and j.stasiun = '".$stasiun."'";
			
			return $this->db->query($sql);	
		}
		
		public function update()
		{
			$sql = "UPDATE tbl_konten SET konten='".$this->get_konten()."'";	
			
			$this->db->query($sql);
		}
		
		public function insert_krl()
		{
			$sql = "INSERT INTO tbl_krl 
					(id_krl, 
					nama,
					stasiun_awal,
					stasiun_akhir) 
					VALUES(".$this->get_id_krl().", 
					'".$this->get_nama()."', 
					'".$this->get_stasiun_awal()."', 
					'".$this->get_stasiun_akhir()."')";
			
			$this->db->query($sql);
		}
		
		public function insert_jadwal()
		{
			$sql = "INSERT INTO tbl_jadwal 
					(stasiun,
					jam,
					id_krl) 
					VALUES('".$this->get_stasiun()."', 
					'".$this->get_jam()."', 
					".$this->get_id_krl().")";
			
			$this->db->query($sql);
		}
		
		public function delete_all()
		{
			$sql = "TRUNCATE TABLE tbl_krl";
			
			$this->db->query($sql);
			
			$sql2 = "TRUNCATE TABLE tbl_jadwal";
			
			$this->db->query($sql2);
		}
	}