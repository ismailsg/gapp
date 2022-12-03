
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
											<th>AppName</th>
											<th>JsonFileName</th>
											<th>JsonFileURL</th>
										    <th>BlocName</th>
											<th>BlocValue</th>
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
	                      					<input name="JsonFileName" placeholder="JsonFileName" class="form-control" type="text" id="JsonFileName">
	                        				<span class="help-block"></span>
	                    				</div>
	               				</div>

	               				<!--<hr WIDTH="75%" SIZE="10" ALIGN="center">-->
	               				<div class="row" id="ligne0"> <!-- adAppId -->
	               				    <input type="hidden" value="-1" id="id2[0]" name="id2[0]"/>
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input name="BlocName[0]" placeholder="adAppId" value="adAppId" class="form-control" type="text" id="BlocName[0]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[0]" placeholder="adAppId" class="form-control" type="text" id="BlocValue[0]">
											<span class="help-block"></span>
										</div>
									</div>	
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc(0)" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>		
								</div>
								
								<div class="row" id="ligne0"> <!-- appName -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[1]" name="id2[1]"/>
											<input name="BlocName[1]" placeholder="appName" value="appName" class="form-control" type="text" id="BlocName[1]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[1]" placeholder="appName" class="form-control" type="text" id="BlocValue[1]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- startApp -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[2]" name="id2[2]"/>
											<input name="BlocName[2]" placeholder="startApp" value="startApp" class="form-control" type="text" id="BlocName[2]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[2]" placeholder="startApp " class="form-control" type="text" id="BlocValue[2]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- adCounter -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[3]" name="id2[3]"/>
											<input name="BlocName[3]" placeholder="adCounter" value="adCounter" class="form-control" type="text" id="BlocName[3]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[3]" placeholder="adCounter" class="form-control" type="text" id="BlocValue[3]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- storeName -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[4]" name="id2[4]"/>
											<input name="BlocName[4]" placeholder="storeName" value="storeName" class="form-control" type="text" id="BlocName[4]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[4]" placeholder="storeName" class="form-control" type="text" id="BlocValue[4]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- packageName -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[5]" name="id2[5]"/>
											<input name="BlocName[5]" placeholder="packageName" value="packageName" class="form-control" type="text" id="BlocName[5]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[5]" placeholder="packageName" class="form-control" type="text" id="BlocValue[5]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- packageNameNextApp -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[24]" name="id2[24]"/>
											<input name="BlocName[24]" placeholder="packageNameNextApp" value="packageNameNextApp" class="form-control" type="text" id="BlocName[24]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[24]" placeholder="packageNameNextApp" value="com.facebook.katana" class="form-control" type="text" id="BlocValue[24]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- linkCPA -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[25]" name="id2[25]"/>
											<input name="BlocName[25]" placeholder="linkCPA" value="linkCPA" class="form-control" type="text" id="BlocName[25]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[25]" placeholder="Link..." value="https://www.bigappboi.com" class="form-control" type="text" id="BlocValue[25]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- isCPAactive -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[26]" name="id2[26]"/>
											<input name="BlocName[26]" placeholder="isCPAactive" value="isCPAactive" class="form-control" type="text" id="BlocName[26]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[26]" placeholder="True False" value="false" class="form-control" type="text" id="BlocValue[26]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- titleCPA -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[27]" name="id2[27]"/>
											<input name="BlocName[27]" placeholder="titleCPA..." value="titleCPA" class="form-control" type="text" id="BlocName[27]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[27]" placeholder="Get All Premium Features JSON" value="Get All Premium Features JSON" class="form-control" type="text" id="BlocValue[27]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- messageCPA -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[28]" name="id2[28]"/>
											<input name="BlocName[28]" placeholder="messageCPA" value="messageCPA" class="form-control" type="text" id="BlocName[28]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[28]" placeholder="Unlocking will allow you to get all premium features for FREE JSON" value="Unlocking will allow you to get all premium features for FREE JSON" class="form-control" type="text" id="BlocValue[28]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- bannerFB_1 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[6]" name="id2[6]"/>
											<input name="BlocName[6]" placeholder="BlocName" value="bannerFB_1" class="form-control" type="text" id="BlocName[6]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[6]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[6]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- bannerFB_2 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[7]" name="id2[7]"/>
											<input name="BlocName[7]" placeholder="BlocName" value="bannerFB_2" class="form-control" type="text" id="BlocName[7]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[7]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[7]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- bannerFB_3 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[8]" name="id2[8]"/>
											<input name="BlocName[8]" placeholder="BlocName" value="bannerFB_3" class="form-control" type="text" id="BlocName[8]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[8]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[8]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- nativeFB_1 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[9]" name="id2[9]"/>
											<input name="BlocName[9]" placeholder="BlocName" value="nativeFB_1" class="form-control" type="text" id="BlocName[9]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[9]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[9]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- nativeFB_2 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[10]" name="id2[10]"/>
											<input name="BlocName[10]" placeholder="BlocName" value="nativeFB_2" class="form-control" type="text" id="BlocName[10]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[10]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[10]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- nativeFB_3 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[11]" name="id2[11]"/>
											<input name="BlocName[11]" placeholder="BlocName" value="nativeFB_3" class="form-control" type="text" id="BlocName[11]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[11]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[11]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- interstitialFB_1 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[12]" name="id2[12]"/>
											<input name="BlocName[12]" placeholder="BlocName" value="interstitialFB_1" class="form-control" type="text" id="BlocName[12]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[12]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[12]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- interstitialFB_2 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[13]" name="id2[13]"/>
											<input name="BlocName[13]" placeholder="BlocName" value="interstitialFB_2" class="form-control" type="text" id="BlocName[13]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[13]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[13]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- interstitialFB_3 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[14]" name="id2[14]"/>
											<input name="BlocName[14]" placeholder="BlocName" value="interstitialFB_3" class="form-control" type="text" id="BlocName[14]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[14]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[14]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- bannerAd_1 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[15]" name="id2[15]"/>
											<input name="BlocName[15]" placeholder="BlocName" value="bannerAd_1" class="form-control" type="text" id="BlocName[15]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[15]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[15]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- bannerAd_2 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[16]" name="id2[16]"/>
											<input name="BlocName[16]" placeholder="BlocName" value="bannerAd_2" class="form-control" type="text" id="BlocName[16]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[16]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[16]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- bannerAd_3 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[17]" name="id2[17]"/>
											<input name="BlocName[17]" placeholder="BlocName" value="bannerAd_3" class="form-control" type="text" id="BlocName[17]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[17]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[17]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- nativeAd_1 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[18]" name="id2[18]"/>
											<input name="BlocName[18]" placeholder="BlocName" value="nativeAd_1" class="form-control" type="text" id="BlocName[18]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[18]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[18]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- nativeAd_2 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[19]" name="id2[19]"/>
											<input name="BlocName[19]" placeholder="BlocName" value="nativeAd_2" class="form-control" type="text" id="BlocName[19]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[19]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[19]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- nativeAd_3 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[20]" name="id2[20]"/>
											<input name="BlocName[20]" placeholder="BlocName" value="nativeAd_3" class="form-control" type="text" id="BlocName[20]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[20]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[20]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- interstitialAd_1 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[21]" name="id2[21]"/>
											<input name="BlocName[21]" placeholder="BlocName" value="interstitialAd_1" class="form-control" type="text" id="BlocName[21]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[21]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[21]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- interstitialAd_2 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[22]" name="id2[22]"/>
											<input name="BlocName[22]" placeholder="BlocName" value="interstitialAd_2" class="form-control" type="text" id="BlocName[22]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[22]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[22]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
								</div>
								
								<div class="row" id="ligne0"> <!-- interstitialAd_3 -->
									<div class="form-group col-md-3">
										<div class="col-md-12">
											<input type="hidden" value="" id="id2[23]" name="id2[23]"/>
											<input name="BlocName[23]" placeholder="BlocName" value="interstitialAd_3" class="form-control" type="text" id="BlocName[23]">
											<span class="help-block"></span>
										</div>
									</div>
									<div class="form-group col-md-8">
										<div class="col-md-12">
											<input name="BlocValue[23]" placeholder="BlocValue" class="form-control" type="text" id="BlocValue[23]">
											<span class="help-block"></span>
										</div>
									</div>
									<!--
									<div class="form-group col-md-1">
										<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >
									    <i class="glyphicon glyphicon-trash"></i></button>
									</div>
									-->
								</div>
												
	              			</div>
	          		</form>
        		</div>
				
	        	<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
	        		<button type="button" class="btn btn-default" id="btnAdd" onclick="add()" class="btn btn-primary">Ajouter</button> 
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

<script src="<?php echo base_url() . 'assets/myjs/bloc.js'?>"></script>