
<?php $this->load->view('header.php'); ?>

        <!-- Main content -->
        <section class="content">
          	<div class="row">
            	<div class="col-xs-12">
              		<div class="box">
                		<div class="box-header">
                			<div class="form-group">
                				<!--<button class="btn btn-default" onclick="afficher()"><i class="fa fa-table"></i> Afficher</button>-->
	                 			<button class="btn btn-success" onclick="add1()"><i class="glyphicon glyphicon-plus"></i>Nouveau Content File</button>
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
											<th>AppName</th>
											<th>ContentFileName</th>
											<th>ContentFileURL</th>
											<th>Title</th>
											<th>Details</th>
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
            		<h5 class="modal-ContentAppKey">Ajouter</h5>
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
	                      					<input name="ContentFileName" placeholder="ContentFileName" class="form-control" type="text" id="ContentFileName">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>
								
	               				<div class="row"> <!-- adAppId -->
									<div class="form-group col-md-5">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[0]" name="id2[0]"/>
											<input name="Title[0]" placeholder="Title" value="" class="form-control" type="text" id="Title[0]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-7">
										<div class="col-md-12">
											<TEXTAREA  rows=2 cols=40 name="Details[0]" placeholder="Details" class="form-control" type="text" id="Details[0]"></TEXTAREA>
											<span class="help-block"></span>
										</div>
									</div>

								</div>
								
								<div class="row"> <!-- appName -->
									<div class="form-group col-md-5">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[1]" name="id2[1]"/>
											<input name="Title[1]" placeholder="Title" value="" class="form-control" type="text" id="Title[1]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-7">
										<div class="col-md-12">
											<TEXTAREA  rows=2 cols=40 name="Details[1]" placeholder="Details" class="form-control" type="text" id="Details[1]"></TEXTAREA>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								
								<div class="row"> <!-- startApp -->
									<div class="form-group col-md-5">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[2]" name="id2[2]"/>
											<input name="Title[2]" placeholder="Title" value="" class="form-control" type="text" id="Title[2]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-7">
										<div class="col-md-12">
											<TEXTAREA  rows=2 cols=40 name="Details[2]" placeholder="Details" class="form-control" type="text" id="Details[2]"></TEXTAREA>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								
								<div class="row"> <!-- adCounter -->
									<div class="form-group col-md-5">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[3]" name="id2[3]"/>
											<input name="Title[3]" placeholder="Title" value="" class="form-control" type="text" id="Title[3]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-7">
										<div class="col-md-12">
											<TEXTAREA  rows=2 cols=40 name="Details[3]" placeholder="Details" class="form-control" type="text" id="Details[3]"></TEXTAREA>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								
								<div class="row"> <!-- storeName -->
									<div class="form-group col-md-5">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[4]" name="id2[4]"/>
											<input name="Title[4]" placeholder="Title" value="" class="form-control" type="text" id="Title[4]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-7">
										<div class="col-md-12">
											<TEXTAREA  rows=2 cols=40 name="Details[4]" placeholder="Details" class="form-control" type="text" id="Details[4]"></TEXTAREA>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								
								<div class="row"> <!-- packageName -->
									<div class="form-group col-md-5">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[5]" name="id2[5]"/>
											<input name="Title[5]" placeholder="Title" value="" class="form-control" type="text" id="Title[5]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-7">
										<div class="col-md-12">
											<TEXTAREA  rows=2 cols=40 name="Details[5]" placeholder="Details" class="form-control" type="text" id="Details[5]"></TEXTAREA>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								
								<div class="row"> <!-- bannerFB_1 -->
									<div class="form-group col-md-5">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[6]" name="id2[6]"/>
											<input name="Title[6]" placeholder="Title" value="" class="form-control" type="text" id="Title[6]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-7">
										<div class="col-md-12">
											<TEXTAREA  rows=2 cols=40 name="Details[6]" placeholder="Details" class="form-control" type="text" id="Details[6]"></TEXTAREA>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								
								<div class="row"> <!-- bannerFB_2 -->
									<div class="form-group col-md-5">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[7]" name="id2[7]"/>
											<input name="Title[7]" placeholder="Title" value="" class="form-control" type="text" id="Title[7]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-7">
										<div class="col-md-12">
											<TEXTAREA  rows=2 cols=40 name="Details[7]" placeholder="Details" class="form-control" type="text" id="Details[7]"></TEXTAREA>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								
								<div class="row"> <!-- bannerFB_3 -->
									<div class="form-group col-md-5">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[8]" name="id2[8]"/>
											<input name="Title[8]" placeholder="Title" value="" class="form-control" type="text" id="Title[8]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-7">
										<div class="col-md-12">
											<TEXTAREA  rows=2 cols=40 name="Details[8]" placeholder="Details" class="form-control" type="text" id="Details[8]"></TEXTAREA>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								
								<div class="row"> <!-- nativeFB_1 -->
									<div class="form-group col-md-5">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[9]" name="id2[9]"/>
											<input name="Title[9]" placeholder="Title" value="" class="form-control" type="text" id="Title[9]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-7">
										<div class="col-md-12">
											<TEXTAREA  rows=2 cols=40 name="Details[9]" placeholder="Details" class="form-control" type="text" id="Details[9]"></TEXTAREA>
											<span class="help-block"></span>
										</div>
									</div>
								</div>
								

												
	              			</div>
	          		</form>
        		</div>
				
	        	<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
	        		<!-- <button type="button" class="btn btn-default" id="btnAdd" onclick="add()" class="btn btn-primary">Ajouter</button> -->
	          		<button type="button" class="btn btn-default" id="btnSave" onclick="save()" class="btn btn-primary">Enregistrer</button>
	          		
	        	</div>
				
      		</div>
			
    	</div>
		
	</div>

<style>

</style>

<?php $this->load->view('footer.php'); ?>

<script src="<?php echo base_url() . 'assets/myjs/content.js'?>"></script>