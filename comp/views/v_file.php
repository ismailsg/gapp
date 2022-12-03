
<?php $this->load->view('header.php'); ?>

        <!-- Main content -->
        <section class="content">
          	<div class="row">
            	<div class="col-xs-12">
              		<div class="box">
                		<div class="box-header">
                			<div class="form-group">
                				<!--<button class="btn btn-default" onclick="afficher()"><i class="fa fa-table"></i> Afficher</button>-->
	                 			<button class="btn btn-success" onclick="add1()"><i class="glyphicon glyphicon-plus"></i>Nouveau JSON File</button>
								<!--<button class="btn btn-default" onclick="edit_Vents()"><i class="glyphicon glyphicon-pencil"></i>Modifier</button>-->
								<!--<button class="btn btn-default" onclick="Imprimer()"><i class="glyphicon glyphicon-print"></i>Imprimer</button>-->
	                 			<button class="btn btn-success" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>Actualiser</button>
								<div class="col-md-2">
		                      		<select class="form-control" id="cb_apps" >
										<option value="0"> Select app </option>
										<?php
											foreach ($apps as $row){
												echo "<option value='" . $row->AppID . "'>" . $row->AppName . "</option>";
											} 
										?>
									</select>
		               			</div>
							</div>
							<div class="box-body">
								<table id="table" class="table table-bordered table-striped">
									<thead>
										<tr>
											
											<th>File Name</th>
											<th>App Name</th>										  
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
											
									</tbody>
									<tfoot>
										<tr>
											<!-- <th> ?? </th>
											<th style="width:125px;">Action</th> -->
										</tr>
									</tfoot>
								</table>
							</div>
                	</div>
                </div>
            </div>
        </section>
    </div> <!-- content wrapper-->


    <div class="modal fade" id="modal_form" role="dialog">
    	<div class="modal-dialog">
      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            		<h5 class="modal-title">Ajouter</h5>
        		</div>
        		<div class="modal-body form">
	          		<form action="#" id="form" class="form-horizontal">
	            		<input type="hidden" value="" name="id"/> 
	              			<div class="form-body">
	               				
								<div class="form-group">
	                  				<!--label class="control-label col-md-3">Service</label>-->
	                    				<div class="col-md-12">
	                      					<select class="form-control" name="cb_apps2" id="cb_apps2" >
												<option value="0"> Select app</option>
												<?php
													foreach ($apps as $row)
													{
														echo "<option value='" . $row->AppID . "'>" . $row->AppName . "</option>";
													} 
												?>
											</select>
											<span class="help-block"></span>
	                    				</div>
	               				</div>
								
								<div class="form-group">
	                    				<div class="col-md-12">
	                      					<input name="FileName" placeholder="File Name" class="form-control" type="text" id="FileName">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>

	               				<!--<hr WIDTH="75%" SIZE="10" ALIGN="center">-->
	               				<div class="row" id="ligne0"> <!-- adAppId -->
	               				   
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<textarea name="Content"  rows="8" cols="92" id="BlocName[0]"></textarea>
											<span class="help-block"></span>
										</div>
									</div>													
	              			     </div>
							</div>
	          		</form>
        		</div>
				
	        	<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
	        		
	                <button type="button" class="btn btn-default" id="btnSave" onclick="save()" class="btn btn-primary">Enregistrer</button>
	          		
	        	</div>
				
      		</div>
			
    	</div>
		
	</div>

<style>

.button_add {
    /*background-color: Transparent;
    background-repeat:no-repeat;
    border: none;
    cursor:pointer;
    overflow: hidden;
    outline:none;*/
	margin-top: 4px;
}
.unstyled-button {
  border: none;
  padding: 0;
  background: none;
  margin-top:10px;
}
.unstyled-button:focus { outline: none; }

</style>
<?php $this->load->view('footer.php'); ?>

<script src="<?php echo base_url() . 'assets/myjs/file.js'?>"></script>