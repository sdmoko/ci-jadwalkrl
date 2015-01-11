<?PHP
	class Konten_M extends CI_Model
	{
		//Property
		private $konten;	
		
		//Method Mutator - Setter
		public function set_konten($value)
		{
			$this->konten = $value;
		}
		
		//Method Aksesor - Getter
		
		public function get_konten()
		{
			return $this->konten;
		}
	
		//method
		public function view()
		{
			$sql = "SELECT * FROM tbl_konten";
			
			return $this->db->query($sql);	
		}
		
		public function update()
		{
			$sql = "UPDATE tbl_konten SET konten='".$this->get_konten()."'";	
			
			$this->db->query($sql);
		}
	}