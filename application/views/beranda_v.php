<?PHP
	$this->load->view('header_v');
?>
        
    <div class="container">
        <div class="carousel slide" data-ride="carousel">
        	<div class="carousel-inner">
            	<div class="item active">
                	<img src="<?PHP echo base_url(); ?>assets/img/banner1.jpg">
                    <div class="carousel-caption">
                    	<h3>InfoKRL</h3>
                        <p>Info Terkini Jadwal KRL</p>
                    </div>
                </div>
            	<div class="item">
                	<img src="<?PHP echo base_url(); ?>assets/img/banner2.jpg">
                </div>
            </div>
            
            <ol class="carousel-indicators">
                <li data-target=".carousel" data-slide-to="0" 
                    class="active"></li>
                <li data-target=".carousel" data-slide-to="1"></li>
            </ol>
            
            <a class="left carousel-control" href=".carousel" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left"></span>
            </a>
            <a class="right carousel-control" href=".carousel" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
        </div>
        
        <?PHP
			$row = $this->konten_m->view()->row();
			
			if($this->session->userdata('status')=='pengguna' or $this->session->userdata('username')=='')
				echo $row->konten;
			elseif($this->session->userdata('status')=='admin')
			{
		?>
        <br />
        <form method="post" action="<?PHP echo site_url(); ?>beranda/update">
            <textarea class="ckeditor" name="konten" id="konten"><?PHP echo $row->konten; ?></textarea>
        </form>
        <?PHP
			}
		?>
        <br />
    </div>        

<?PHP
	$this->load->view('footer_v');
?>

<script type="text/javascript">
	$(document).ready(function(e) {
		$('.carousel').carousel();
    });
</script>
