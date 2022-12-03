
<?php $this->load->view('header.php'); ?>

        <!-- Main content -->
        <section class="content">
          	<div class="row">
            	<div class="col-xs-12">
              		<div class="box">
                		<div class="box-header">
                 			<button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i>Ajouter</button>
                  			<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>Actualiser</button>
                			<div class="col-md-2"> 
							
								<select class="form-control" id="cb_apps" >
								  <option value="0"> Select app </option>
								  <?php
										foreach ($apps as $row) {
											echo "<option value='".$row->AppID."'>".$row->AppNumber."</option>";
										} 
									?>
								</select>
								
							</div>        
                		</div>
                		<div class="box-body">
	                  		<table id="table" class="table table-bordered table-striped">
	                    		<thead>
			                      	<tr>
										<!--</th>AppNumber</th>-->
										 <th>PublisherName</th>
										 <th>StoreLink</th>
										 <th>StoreID</th>
										 <th>PackageName</th>
										 <th>Status</th>
										 <th>AdAccount</th>
										 <th>MakeOrder</th>
										 <th>Published</th>
										 <th>Price</th>
										 <th>OrderStatus</th>
										 <th>UnsignedApk</th>
										 <th>KeyApk</th>
										 <th>SignedApk</th>
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
									<label class="control-label col-md-3">Apps</label>
									<div class="col-md-9"> 
										<select class="form-control" name="cb_apps2" id="cb_apps2">
											 <option value="0">Select app </option> 
											<?php
												foreach ($apps as $row) 
												{
													echo "<option value='" . $row->AppID . "'>" . $row->AppNumber .  "</option>";
												} 
											?>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">PublisherName</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[PublisherName]" placeholder="PublisherName" class="form-control" type="text" id="PublisherName">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">StoreLink</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[StoreLink]" placeholder="StoreLink" class="form-control" type="text" id="StoreLink">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">StoreID</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[StoreID]" placeholder="StoreID" class="form-control" type="text" id="StoreID">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">PackageName</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[PackageName]" placeholder="PackageName" class="form-control" type="text" id="PackageName">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">Status</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[Status]" placeholder="Status" class="form-control" type="text" id="Status">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">AdAccount</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[AdAccount]" placeholder="AdAccount" class="form-control" type="text" id="AdAccount">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group"> 
									<label class="control-label col-md-3">MakeOrder</label>
									<div class="col-md-9"> 
										<input type="date" name="MakeOrder" placeholder="" class="form-control" id="MakeOrder" data-date-format="yyyy-mm-dd"/>
									</div>
								</div>
								<div class="form-group"> 
									<label class="control-label col-md-3">Published</label>
									<div class="col-md-9"> 
										<input type="date" name="Published" placeholder="" class="form-control" id="Published" data-date-format="yyyy-mm-dd"/>
									</div>
								</div>
								<div class="form-group"> 
									<label class="control-label col-md-3">Terminated</label>
									<div class="col-md-9"> 
										<input type="date" name="Terminated" placeholder="" class="form-control" id="Terminated" data-date-format="yyyy-mm-dd"/>
									</div>
								</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">Price</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[Price]" placeholder="Price" class="form-control" type="number" id="Price">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">OrderStatus</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[OrderStatus]" placeholder="OrderStatus" class="form-control" type="text" id="OrderStatus">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">OrderStatus</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[OrderStatus]" placeholder="OrderStatus" class="form-control" type="text" id="OrderStatus">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">UnsignedApk</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[UnsignedApk]" placeholder="UnsignedApk" class="form-control" type="text" id="UnsignedApk">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">KeyApk</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[KeyApk]" placeholder="KeyApk" class="form-control" type="text" id="KeyApk">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">SignedApk</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[SignedApk]" placeholder="SignedApk" class="form-control" type="text" id="SignedApk">
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
	
	<div class="modal fade" id="modal_form_1" role="dialog">
    	<div class="modal-dialog">
      		<div class="modal-content">
        		<div class="modal-header">
          			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            		<h5 class="modal-title">Ajouter</h5>
        		</div>
        		<div class="modal-body form">
	          		<form action="#" id="form_1" class="form-horizontal">
	            		<input type="hidden" value="" name="id"/> 
	              			<div class="form-body">
							
								<div class="form-group">
									<label class="control-label col-md-3">Apps</label>
									<div class="col-md-9"> 
										<select class="form-control" name="cb_apps3" id="cb_apps3">
											 <option value="0">Select app </option> 
											<?php
												foreach ($apps as $row) 
												{
													echo "<option value='" . $row->AppID . "'>" . $row->AppNumber .  "</option>";
												} 
											?>
										</select>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="form-group">
	                  				<label class="control-label col-md-3">UnsignedApk</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[UnsignedApk]" placeholder="UnsignedApk" class="form-control" type="text" id="UnsignedApk">
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

<script src="<?php echo base_url() . 'assets/myjs/publishing.js'?>"></script>