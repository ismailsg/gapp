
<?php $this->load->view('header.php'); ?>

      <section class="content">
        	<div class="row">
          	<div class="col-xs-12">
            		<div class="box">
              		<div class="box-header">
					
					<?php if( ($this->session->userdata('OP_Profil')) == "Admin" || ($this->session->userdata('OP_Profil')) == "Consult") { ?>
					
						<button class="btn btn-success" onclick="recherche()"><!--<i class="glyphicon glyphicon-search"></i>-->Recherche</button>
						
							<button class="btn btn-success" onclick="add()"
							<?php if( ($this->session->userdata('OP_Profil')) == "Consult" ) { ?> disabled <?php } ?>>
							<!--<i class="glyphicon glyphicon-plus"></i>-->Ajouter</button>
							<button class="btn btn-success"  onclick="report()" ></i>Excel</button>
							<button class="btn btn-success"  onclick="imprimer()" ></i>Imprimer</button>
						
						<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i></button>
              			<div class="col-md-4"> 
	                    <select class="form-control" id="cb_service" >
	                      <option value="0"> Filtrer par Service</option>
							<?php
								foreach ($service as $row) {
									echo "<option value='".$row->ServiceID."'>".$row->ServiceName."</option>";
								} 
							?>
	                    </select>
              			</div>
						<div class="col-md-4"> 
	                    <select class="form-control" id="cb_reference" >
	                      <option value="0">Filtrer par Reference</option>
						  <?php
								foreach ($reference as $row) {
									echo "<option value='".$row->ReferenceID."'>".$row->ReferenceName."</option>";
								} 
							?>
	                    </select>
              			</div>
						<div class="col-md-4"> 
	                    <select class="form-control" id="cb_famille" >
							<option value="0">Filtrer par Famille</option>
							<?php
								foreach ($famille as $row) {
									echo "<option value='".$row->FamilleID."'>".$row->FamilleName."</option>";
								} 
							?>
	                    </select>
              			</div>
					
					<?php }else{ ?>
						<button class="btn btn-success"  onclick="enExcel()" ></i>  Telecharger en Excel  </button>
					<?php } ?>
					
					
					
					
					
              		</div>
              		<div class="box-body">
                  		<table id="table_objet" class="table table-bordered table-striped">
                    		<thead>
		                      	<tr>
			                        <th>N d'inventaire</th>
									<th>Code Barre</th>
									<th>Desgination</th>
									<th>Date Inscr</th>
									<th>Etat</th>
									<!--<th>Valeur d'Aquisition</th>
									<th>Valeur Estimative</th>-->
									<th>Service</th>
									<th>Reference</th>
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
								<label class="control-label col-md-3">Code d'objet</label>
								<div class="col-md-9">
									<input name="inputs[ObjetCode]" placeholder="" class="form-control" type="text" id="ObjetCode" />
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Desgination</label>
								<div class="col-md-9">
									<textarea rows="2" cols="50" name="inputs[Desgination]" placeholder="" class="form-control" id="Desgination" >
									</textarea>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Code a barre</label>
								<div class="col-md-9">
									<input name="inputs[CodeBarre]" placeholder="" class="form-control" type="text" id="CodeBarre" />
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="control-label col-md-3">Etat</label>
								<div class="col-md-9">
									<input name="inputs[Etat]" placeholder="" class="form-control" type="text" id="Etat" />
									<span class="help-block"></span>
								</div>
							</div>
							
							<!--
							
							<div class="form-group">
								<label class="control-label col-md-3">Valeur Estimative</label>
								<div class="col-md-9">
									<input name="inputs[ValeurEstimative]" placeholder="" class="form-control" type="text" id="ValeurEstimative" />
									<span class="help-block"></span>
								</div>
							</div>
							
							<div class="form-group">
								<label class="control-label col-md-3">Valeur d'Aquisition</label>
								<div class="col-md-9">
									<input name="inputs[ValeurAquisition]" placeholder="" class="form-control" type="text" id="ValeurAquisition" />
									<span class="help-block"></span>
								</div>
							</div>
							
							-->
							
							<div class="form-group">
								<label class="control-label col-md-3">Date d'Inscription</label>
								<div class="col-md-9">
									<input type="date" name="DateInscr" placeholder="" class="form-control" id="DateInscr" data-date-format="yyyy-mm-dd"/>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group"> 
								<label class="control-label col-md-3">Service d'affectation</label>
									<div class="col-md-9"> 
									<select class="form-control" name="cb_service2" id="cb_service2">
										<option value="0">Select -- </option>
										<?php
											foreach ($service as $row) {
												echo "<option value='".$row->ServiceID."'>".$row->ServiceName."</option>";
											} 
										?>
									</select>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group"> 
								<label class="control-label col-md-3">Reference</label>
									<div class="col-md-9"> 
									<select class="form-control" name="cb_reference2" id="cb_reference2">
										<option value="0">Select -- </option>
										<?php
											foreach ($reference as $row) {
												echo "<option value='".$row->ReferenceID."'>".$row->ReferenceName."</option>";
											} 
										?>
									</select>
									<span class="help-block"></span>
								</div>
							</div>
							<div class="form-group"> 
								<label class="control-label col-md-3">Famille</label>
									<div class="col-md-9"> 
									<select class="form-control" name="cb_famille2" id="cb_famille2">
										<option value="0">Select -- </option>
										<?php
											foreach ($famille as $row) {
												echo "<option value='".$row->FamilleID."'>".$row->FamilleName."</option>";
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

<script src="<?php echo base_url() . 'assets/myjs/objet.js'?>"></script>