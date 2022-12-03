
<?php $this->load->view('header.php'); ?>

        <!-- Main content -->
        <section class="content">
          	<div class="row">
            	<div class="col-xs-12">
              		<div class="box">
                		<div class="box-header">
                 			<button class="btn btn-success" onclick="add()"><i class="glyphicon glyphicon-plus"></i>Ajouter</button>
                  			<button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i>Actualiser</button>
                			        
                		</div>
                		<div class="box-body">
	                  		<table id="table" class="table table-bordered table-striped">
	                    		<thead>
			                      	<tr>
				                        <th>Entite</th>
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
	                  				<label class="control-label col-md-3">Entite</label>
	                    				<div class="col-md-9">
	                      					<input name="inputs[EntiteName]" placeholder="Entite" class="form-control" type="text" id="EntiteName">
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

<script src="<?php echo base_url() . 'assets/myjs/entite.js'?>"></script>