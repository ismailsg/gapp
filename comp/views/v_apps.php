
<?php $this->load->view('header.php'); ?>

        <!-- Main content -->
        <section class="content">
          	<div class="row">
            	<div class="col-xs-12">
              		<div class="box">
                		<div class="box-header">
                 			<button class="btn btn-success" onclick="addRow()"><i class="glyphicon glyphicon-plus"></i>Nouvelle app</button>
                  			<button class="btn btn-success" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>Actualiser</button>
                			        
                		</div>
                		<div class="box-body">
	                  		<table id="table" class="table table-bordered table-striped">
	                    		<thead>
			                      	<tr>
										<th>AppName</th>
										<th>AppNumber</th>
										<th>AppType</th>
										<th>DateCreation</th>
										<th>JsonFileName</th>
										<th>JsonFileURL</th>
										<th>RessourcesLink</th>
										<th>MetaDataLink</th>
										<th>ContentLink</th>
										<th>JsonContentLink</th>
				                        <th style="width:125px;">Action</th>
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
	                  				<label class="control-label col-md-3">AppName</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[AppName]" placeholder="AppName" class="form-control" type="text" id="AppName">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								
								<div class="form-group">
	                  				<label class="control-label col-md-3">AppNumber</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[AppNumber]" placeholder="AppNumber" class="form-control" type="text" id="AppNumber">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								
								<div class="form-group">
	                  				<label class="control-label col-md-3">AppType</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[AppType]" placeholder="AppType" class="form-control" type="text" id="AppType">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								
								<div class="form-group"> 
									<label class="control-label col-md-3">DateCreation</label>
									<div class="col-md-9"> 
										<input type="date" name="DateCreation" placeholder="" class="form-control" id="DateCreation" data-date-format="yyyy-mm-dd"/>
									</div>
								</div>
								
								<div class="form-group">
	                  				<label class="control-label col-md-3">JsonFileName</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[JsonFileName]" placeholder="JsonFileName" class="form-control" type="text" id="JsonFileName">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								
								<div class="form-group">
	                  				<label class="control-label col-md-3">JsonFileURL</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[JsonFileURL]" placeholder="JsonFileURL" class="form-control" type="text" id="JsonFileURL">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								
								<div class="form-group">
	                  				<label class="control-label col-md-3">RessourcesLink</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[RessourcesLink]" placeholder="RessourcesLink" class="form-control" type="text" id="RessourcesLink">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">MetaDataLink</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[MetaDataLink]" placeholder="MetaDataLink" class="form-control" type="text" id="MetaDataLink">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">ContentLink</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[ContentLink]" placeholder="ContentLink" class="form-control" type="text" id="ContentLink">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">JsonContentLink</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[JsonContentLink]" placeholder="JsonContentLink" class="form-control" type="text" id="JsonContentLink">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<!--
								<div class="form-group"> 
									<label class="control-label col-md-3">Type</label>
									<div class="col-md-9"> 
										<select class="form-control" name="cb_type" id="cb_type">
											<option value="Formation interne">Formation interne</option>
											<option value="Formation externe">Formation externe</option>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								-->
								
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

<script src="<?php echo base_url() . 'assets/myjs/apps.js'?>"></script>