
<?php $this->load->view('header.php'); ?>

      <section class="content">
        	<div class="row">
          	<div class="col-xs-12">
            		<div class="box">
					
              		<div class="box-header">
						<!--<button class="btn btn-success" onclick="recherche()">Recherche</button>-->
						
						<button class="btn btn-success" onclick="add()"
						<?php if( ($this->session->userdata('OP_Profil')) == "Consult" ) { ?> disabled <?php } ?>>
						<!--<i class="glyphicon glyphicon-plus"></i>-->Ajouter</button>
						<!--<button class="btn btn-success"  onclick="report()" ></i>Excel</button>-->
						<button class="btn btn-success"  onclick="imprimer()" ></i>Imprimer</button>
						
						<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
        
						<div class="col-md-4"> 
							<select class="form-control" id="cb_bureau" >
								<option value="0">Selectionner un bureau</option>
								<?php
									foreach ($bureaux as $row) {
										echo "<option value='".$row->BureauID."'>".$row->Libelle."</option>";
									} 
								?>
							</select>
              			</div>

              		</div>
              		<div class="box-body">
                  		<table id="table_iig" class="table table-bordered table-striped">
                    		<thead>
		                      	<tr>
			                        <th>Bureau</th>
									<th>N° d'inventaire</th>
									<th>L'objet</th>
			                        <th style="width:125px;">Action</th>
		                      	</tr>
                    		</thead>
                    		<tbody>
                      		</tbody>
		                    <tfoot>
		                      	<tr>
		                      	</tr>
		                    </tfoot>
                  		</table>
              		</div>
              	</div>
              </div>
          </div>
      </section>
  </div>

    <div class="modal fade" id="modal_form" role="dialog">
    	<div class="modal-dialog">
      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          				<span aria-hidden="true"><img src="<?php echo site_url('assets/myimg/modal_close.png')?>"</span>
          			</button>
            			<h5 class="modal-title">Ajouter</h5>
        		</div>
        		<div class="modal-body form">
	          		<form action="#" id="form" class="form-horizontal">
	            		<input type="hidden" value="" name="id"/> 
						<div class="form-body">
							<div class="form-group"> 
								<label class="control-label col-md-3">Bureau</label>
									<div class="col-md-9"> 
									<select class="form-control" name="cb_bureau2" id="cb_bureau2">
										<option value="0">Select -- </option>
										<?php
											foreach ($bureaux as $row) {
												echo "<option value='".$row->BureauID."'>".$row->Libelle."</option>";
											} 
										?>
									</select>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group"> 
								<label class="control-label col-md-3">L'objet</label>
									<div class="col-md-9"> 
									<select class="form-control" name="cb_objet2" id="cb_objet2">
										<option value="0">Select -- </option>
										<?php
											foreach ($n_inventaire as $row) {
												echo "<option value='".$row->ObjetID."'>"/*.$row->FamilleName."-".*/.$row->ObjetCode."</option>";
											}
										?>
									</select>
									<span class="help-block"></span>
								</div>
							</div>	
						</div>
	          		</form>
        		</div>
	        	<div class="modal-footer">
	          		<button type="button" class="btn btn-warning" id="btnSave" onclick="save()" class="btn btn-primary">Enregistrer</button>
	          		<button type="button" class="btn btn-danger" data-dismiss="modal">Annuler</button>
	        	</div>
      		</div>
    	</div>
  </div>


<?php $this->load->view('footer.php'); ?>

<script src="<?php echo base_url() . 'assets/myjs/iig.js'?>"></script>