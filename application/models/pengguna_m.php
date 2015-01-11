<?PHP
	class Pengguna_M extends CI_Model
	{
		//Property
		
		private $username;
		private $password;
		private $status;
		
		//Method Setter - Mutator
		
		public function set_username($value)
		{
			$this->username = $value;
		}
		
		public function set_password($value)
		{
			$this->password = $value;
		}
		
		public function set_status($value)
		{
			$this->status = $value;
		}
		
		//Method Getter - Aksesor
		
		public function get_username()
		{
			return $this->username;
		}
		
		public function get_password()
		{
			return $this->password;
		}
		
		public function get_status()
		{
			return $this->status;
		}
		
		//Method
		
		public function view_by_username_password()
		{
			$sql = "SELECT * FROM tbl_user 
					WHERE username='".$this->get_username()."' AND 
					password='".md5($this->get_password())."'";
			
			return $this->db->query($sql);
		}
		
		public function view_by_username()
		{
			$sql = "SELECT * FROM tbl_user
					WHERE username='".$this->get_username()."'";
			
			return $this->db->query($sql);
		}
		
		public function insert()
		{
			$sql = "INSERT into tbl_user (username,password,status) VALUES('".$this->get_username()."',
			'".md5($this->get_password())."',
			'pengguna')";
			
			$this->db->query($sql);
		}
	}