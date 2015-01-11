<?PHP
	$this->load->view('header_v');
?>

<div class="container">
	
	<?PHP
		if($this->uri->segment(3) == 'error_save')
		{
	?>
	
	<div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		Data gagal disimpan
	</div>
	
	<?PHP
		}
	?>
	
	<div class="panel panel-default">
        
    	<div class="panel-heading">
        	<div class="panel-heading">
            	<h3>Kriteria Pencarian</h3>
            </div>
            <div class="clearfix"></div>
        </div>
        <?PHP
			if($this->session->userdata('username') == '')
			{
		?>
        	<center><h4>Anda Harus Login</h4></center>
        <?PHP
			}
			else
			{
		?>
        		<form method="post" id="form_jadwal_krl">
                    <div class="form-group form-inline">
                        <div class="col-md-2">
                            <label>Relasi</label>
                        </div>
                        <select class="form-control" name="st_awal" id="st_awal">
                            <?PHP
                                $query = $this->jadwal_krl_m->view_by_stasiun_awal();
                                
                                foreach($query->result() as $row) :
                            ?>
                            
                            <option value="<?PHP echo $row->stasiun_awal; ?>"><?PHP echo $row->stasiun_awal; ?></option>
                            
                            <?PHP
                                endforeach;
                            ?>
                            
                        </select>
                        -
                        <select class="form-control" name="st_akhir" id="st_akhir">
                            <?PHP
                                $query = $this->jadwal_krl_m->view_by_stasiun_akhir();
                                
                                foreach($query->result() as $row) :
                            ?>
                            
                            <option value="<?PHP echo $row->stasiun_akhir; ?>"><?PHP echo $row->stasiun_akhir; ?></option>
                            
                            <?PHP
                                endforeach;
                            ?>
                            
                        </select>
                    </div>
                    <div class="form-group form-inline">
                        <div class="col-md-2">
                            <label>Kelas KRL</label>
                        </div>
                        <select class="form-control" name="nama" id="nama">
                            <?PHP
                                $query = $this->jadwal_krl_m->view_by_nama_krl();
                                
                                foreach($query->result() as $row) :
                            ?>
                            
                            <option value="<?PHP echo $row->nama; ?>"><?PHP echo $row->nama; ?></option>
                            
                            <?PHP
                                endforeach;
                            ?>
                            
                        </select>
                    </div>
                    <div class="form-group form-inline">
                        <div class="col-md-2">
                            <label>Nomor KA</label>
                        </div>
                        <select class="form-control" name="id_krl" id="id_krl">
                            <?PHP
                                $query = $this->jadwal_krl_m->view_by_id_krl();
                                
                                foreach($query->result() as $row) :
                            ?>
                            
                            <option value="<?PHP echo $row->id_krl; ?>"><?PHP echo $row->id_krl; ?></option>
                            
                            <?PHP
                                endforeach;
                            ?>
                            
                        </select>
                    </div>
                    <div class="form-group form-inline">
                        <div class="col-md-2">
                            <label>Stasiun Singgah</label>
                        </div>
                        <select class="form-control" name="stasiun" id="stasiun">
                            <?PHP
                                $query = $this->jadwal_krl_m->view_by_stasiun();
                                
                                foreach($query->result() as $row) :
                            ?>
                            
                            <option value="<?PHP echo $row->stasiun; ?>"><?PHP echo $row->stasiun; ?></option>
                            
                            <?PHP
                                endforeach;
                            ?>
                            
                        </select>
                    </div>
                </form>
                
                    <button type="submit" class="btn btn-success btn-sm" form="form_jadwal_krl">
                        <i class="glyphicon glyphicon-search"></i> Search
                    </button>
                    
                     <?PHP
						if($this->session->userdata('status') == 'admin')
						{
					?>
                    <div class="pull-right">
                    <button class="btn btn-primary btn-sm add_jadwal" title="Tambah" data-toggle="modal" data-target="#modal_tambah_jadwal">
                        <i class="glyphicon glyphicon-plus"></i> Tambah Jadwal
                    </button>
                    <button class="btn btn-primary btn-sm add_krl" title="Tambah" data-toggle="modal" data-target="#modal_tambah_krl">
                        <i class="glyphicon glyphicon-plus"></i> Tambah KRL
                    </button>
                    <button class="btn btn-danger btn-sm delete_all" title="Hapus Semua" data-toggle="modal" data-target="#modal_konfirmasi">
                        <i class="glyphicon glyphicon-trash"></i> Hapus Semua
                    </button>
                    </div>
                    <?PHP
						}
					?>
                    
                <br />
                <?PHP
	                if ($this->input->post('st_awal') =='' or $this->input->post('st_akhir') =='' or $this->input->post('nama') =='' or $this->input->post('stasiun') =='' ){
					}
					else
					{
				?>
                	
                	<table class="table table-responsive">
                        <thead>
                            <tr class="success">
                                <th>Nomor KA</th>
                                <th>Kelas KRL</th>
                                <th>Relasi</th>
                                <th>Stasiun Keberangkatan</th>
                                <th>Stasiun Persinggahan</th>
                                <th>Waktu Datang</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?PHP
								$query = $this->jadwal_krl_m->view_cari($this->input->post('st_awal'),$this->input->post('st_akhir'),$this->input->post('nama'),$this->input->post('id_krl'),$this->input->post('stasiun'));
											
											foreach($query->result() as $row) :
							?>
							
											<tr>
												<td><?PHP echo $row->id_krl; ?></td>
												<td><?PHP echo $row->nama; ?></td>
												<td><?PHP echo $row->stasiun_awal; ?>-<?PHP echo $row->stasiun_akhir; ?></td>
												<td><?PHP echo $row->stasiun_awal; ?></td>
												<td><?PHP echo $row->stasiun; ?></td>
												<td><?PHP echo $row->jam; ?></td>
											</tr>  
								
							<?PHP
											endforeach;
							?>
                        </tbody>
                    </table>
                <?PHP
					}
				?>
        <?PHP
			}
		?>
    </div>
</div>
<div class="modal fade" id="modal_tambah_krl">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Form KRL</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_tambah_krl">
                	<div class="form-group">
                    	<label>Nomor KA</label>
                        <input type="text" class="form-control" name="id_krl" id="id_krl" placeholder="Nomor KA" required>
						<input type="hidden" name="id_krl_tmp" id="id_krl_tmp">
                    </div>
                    <div class="form-group">
                    	<label>Kelas KRL</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Kelas KRL" required>
                    </div>
                    <div class="form-group">
                    	<label>Relasi</label>
                        <input type="text" class="form-control" name="stasiun_awal" id="stasiun_awal" placeholder="Stasiun Awal" required><br />
                        <input type="text" class="form-control" name="stasiun_akhir" id="stasiun_akhir" placeholder="Stasiun Akhir" required>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_tambah_krl" id="save_krl">
                	Simpan
                </button>
				<button class="btn btn-primary btn-sm" type="submit" form="form_tambah_krl" id="update_krl">
                	Perbaharui
                </button>
            	<button class="btn btn-default btn-sm" data-dismiss="modal">
                	Batal
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_tambah_jadwal">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Form Jadwal KRL</h4>
            </div>
            <div class="modal-body">
            	<form method="post" id="form_tambah_jadwal">
                	<div class="form-group">
                    	<label>Stasiun</label>
                        <input type="text" class="form-control" name="stasiun" id="stasiun" placeholder="Stasiun" required>
                    </div>
                    <div class="form-group">
                    	<label>Jam</label>
                        <input type="text" class="form-control" name="jam" id="jam" placeholder="Jam Datang" required>
                    </div>
                    <div class="form-group">
                        <label>Nomor KA</label>
                        <select class="form-control" name="id_krl" id="id_krl">
                            <?PHP
                                $query = $this->jadwal_krl_m->view_by_id_krl();
                                
                                foreach($query->result() as $row) :
                            ?>
                            
                            <option value="<?PHP echo $row->id_krl; ?>"><?PHP echo $row->id_krl; ?></option>
                            
                            <?PHP
                                endforeach;
                            ?>
                            
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" type="submit" form="form_tambah_jadwal" id="save_jadwal">
                	Simpan
                </button>
				<button class="btn btn-primary btn-sm" type="submit" form="form_tambah_jadwal" id="update_jadwal">
                	Perbaharui
                </button>
            	<button class="btn btn-default btn-sm" data-dismiss="modal">
                	Batal
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modal_konfirmasi">
	<div class="modal-dialog">
    	<div class="modal-content">
        	<div class="modal-header">
            	<button class="close" data-dismiss="modal">
                	&times;
                </button>
            	<h4 class="modal-title">Konfirmasi</h4>
            </div>
            <div class="modal-body">
            	<p id="confirm_str">Apakah Anda yakin akan menghapus data ?</p>
            </div>
            <div class="modal-footer">
            	<button class="btn btn-primary btn-sm" id="delete_all">
                	Ok
                </button>
				<button class="btn btn-primary btn-sm" id="delete">
                	Ok
                </button>
            	<button class="btn btn-default btn-sm" data-dismiss="modal">
                	Batal
                </button>
            </div>
        </div>
    </div>
</div>

<?PHP
	$this->load->view('footer_v');
?>

<script type="text/javascript">
	$(document).ready(function() {
		$('.add_jadwal').click(function() {
			$('#stasiun').val('');
			$('#jam').val('');
			$('#id_krl').val('');
						
			$('#save_jadwal').show();
			$('#update_jadwal').hide();
			
			$('#form_tambah_jadwal').attr('action', '<?PHP echo site_url(); ?>jadwal_krl/insert_jadwal');
		});
		
		$('.add_krl').click(function() {
			$('#id_krl').val('');
			$('#nama').val('');
			$('#stasiun_awal').val('');
			$('#stasiun_akhir').val('');
			
			$('#id_krl').attr('disabled', false);
			
			$('#save_krl').show();
			$('#update_krl').hide();
			
			$('#form_tambah_krl').attr('action', '<?PHP echo site_url(); ?>jadwal_krl/insert_krl');
		});
		
		$('.delete_all').click(function() {
			$('#confirm_str').html('Apakah Anda yakin akan menghapus semua data ?');
			
			$('#delete').hide();
			$('#delete_all').show();
		});
		
		$('#delete_all').click(function() {
			window.location = '<?PHP echo site_url(); ?>jadwal_krl/delete_all';
		});
		
		$('.table').dataTable();
	});
</script>