
		var save_method; //for save method string
        var table;
	    var host = "http://"+window.location.hostname;
		var base_url = host+"/gapp/";
		
		//var base_url = "http://weconnectvalue.com/gapp/";
		
		var ctr = 28;
		var str = '';
		var nbrLineInUpdate = 0;
		var AppID = 0;
		$(document).ready(function()
		{
			
			table = $("#table").DataTable({
              "scrollY": 200,
              "scrollX": true, 			  
			  "processing": true,
			  "serverSide": true,
			  "order": [],
			  "pagingType": "full_numbers",
			  "ajax": {
				"url": base_url+"bloc/ajax_list/0",
				"type": "POST"
			  },
			  "columnDefs": [
				{ 
				  "targets": [ -1 ],
				  "orderable": false,
				},
			  ],
			});
			
			
			/*
			$.ajax({
				url : base_url+"bloc/getProdByRef/",
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					$.each(data, function(index, element) {
						//alert(element.prod_designation);
						str+= '<option value="'+ element.BlocName + '">' + element.prod_designation + ' - ' + element.BlocName + '</option>';
					});
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});

			$("#vent_prix , #vent_qte").change(function()
			{
				$vent_prixHT =$("#vent_prix").val();
				$vent_qte=$("#vent_qte").val();
				$("#montant_ttc").val($vent_prixHT * $vent_qte);

			});
			*/
			
			
			$("input").change(function(){
			  $(this).parent().parent().removeClass('has-error');
			  $(this).next().empty();
			});
			$("textarea").change(function(){
			  $(this).parent().parent().removeClass('has-error');
			  $(this).next().empty();
			});
			$("select").change(function(){
			  $(this).parent().parent().removeClass('has-error');
			  $(this).next().empty();
			});			
		});
	
		function toJsonFile(id)
		{
			window.location= base_url+'jsonfile/index/'+id;
		}
		
		function validate(id, setv)
		{
			$.ajax({
				url : base_url+"bloc/setValidate/"+setv+"/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					table.ajax.url(base_url+"bloc/ajax_list/").load();
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});
		}
		
		function add1()
		{
			$("#cb_apps2").prop('disabled', false);
			for(i=1; i<=ctr; i++){
				$("#addit"+i).remove();
			}
			ctr=0;
			save_method = 'add';
			$('#form')[0].reset();
			$('.help-block').empty();
			$('#modal_form').modal('show');
			$('.modal-title').text('Ajouter');
		}
		  
		function bloc(id)
		{
			window.open(base_url+'bloc/imprimer/'+id, '_blank');
		}
		
		function add()
		{
			
			ctr++;
			$("#form").append('<div class="row" id="addit'+ctr+'">'+
				'<div class="form-group col-md-3">'+
					'<div class="col-md-12">'+
						'<input name="BlocName['+ctr+']" placeholder="BlocName" class="form-control" type="text" id="BlocName['+ctr+']">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				
				'<div class="form-group col-md-8">'+
					'<div class="col-md-12">'+
						'<input name="BlocValue['+ctr+']" placeholder="BlocName" class="form-control" type="text" id="BlocValue['+ctr+']">'+
						'<span class="help-block"></span>'+
					'</div>'+
				'</div>'+
				'<div class="form-group col-md-1">'+
					'<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >'+
					'<i class="glyphicon glyphicon-trash"></i></button>'+
				'</div>'+
			'</div>').html();
			
		}
		
		function afficher()
		{
			var ref = $("#cb_reference").val();
			var service = $("#cb_service").val();
			var produit = $("#cb_produit").val();
			var periodDateDebut = $("#periodDateDebut").val();
			var periodDateFin = $("#periodDateFin").val();
	
			//pour eviter inverssement des periodes
			if (periodDateDebut>periodDateFin) 
			{
				var tmp=periodDateDebut;
				periodDateDebut=periodDateFin;
				periodDateFin=tmp;
				$("#periodDateDebut").val(periodDateDebut);
				$("#periodDateFin").val(periodDateFin);
			}
			//alert("date debut : "+periodDateDebut+" -------- date fin : "+ periodDateFin);
			if (ref==0 && periodDateDebut==0 && periodDateFin==0) {
				table.ajax.url(base_url+"bloc/ajax_list/0").load();
			}else{
				table.ajax.url(base_url+"bloc/ajax_list/"+ref).load();
			}
		}

		function add_prod_tolist()
		{
			alert('');
		}
		
		function edit(id)
		{
			//alert('x');
			for(i=1; i<=ctr; i++)
			{
				$("#addit"+i).remove();
			}
			ctr=0;
			save_method = 'update';
			$('#form')[0].reset();
			$('.help-block').empty();
			$('#modal_form').modal('show');
			$('.modal-title').text('Modifier');
			//alert($("#cb_reference").val());	
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-block').empty(); // clear error string
			$.ajax({
				url : base_url+"bloc/ajax_edit/" + id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					$("#cb_apps2").prop('disabled', true);
					alert(data['mulLine'].length);
					nbrLineInUpdate = data['mulLine'].length;
					AppID = data['seulLine']['AppID'];
					$('[name="id"]').val(data['seulLine']['AppID']);
					$('[name="JsonFileName"]').val(data['seulLine']['JsonFileName']);
					$('[name="cb_apps2"]').val(data['seulLine']['AppID']);
					$('[name="id2[0]"]').val(data['mulLine'][0].BlocID);
					$('[name="BlocName[0]"]').val(data['mulLine'][0].BlocName);
					$('[name="BlocValue[0]"]').val(data['mulLine'][0].BlocValue);
					var i;
					for(i=1; i<=nbrLineInUpdate; i++)
					{
				        //alert(data['mulLine'][i].BlocValue);
				        $('[name="id2['+i+']"]').val(data['mulLine'][i].BlocID);
						$('[name="BlocName['+i+']"]').val(data['mulLine'][i].BlocName);
						$('[name="BlocValue['+i+']"]').val(data['mulLine'][i].BlocValue);
				    }
				    /*
					if(data['mulLine'].length > 29)
					{
						//alert(element.prod_designation);
						//$.each(data['mulLine'], function(index, element) {
						    
							for(i=29; i<data['mulLine'].length - 29; i++){
								//alert(data['mulLine'][i].blocDetailsID);
								ctr++;
								
								$("#form").append('<div class="row" id="addit'+ctr+'">'+
									'<div class="form-group col-md-3">'+
										'<div class="col-md-12">'+
											'<input type="hidden" value="" id="id2['+i+']" name="id2['+i+']"/>'+
											'<input name="BlocName['+ctr+']" placeholder="BlocName" class="form-control" type="text" id="BlocName['+ctr+']">'+
											'<span class="help-block"></span>'+
										'</div>'+
									'</div>'+	
									'<div class="form-group col-md-8">'+
										'<div class="col-md-12">'+
											'<input name="BlocValue['+ctr+']" placeholder="BlocValue" class="form-control" type="text" id="BlocValue['+ctr+']">'+
											'<span class="help-block"></span>'+
										'</div>'+
									'</div>'+
									'<div class="form-group col-md-1">'+
										'<button class="btn btn-default col-md-12 unstyled-button" onclick="deleteBloc()" >'+
										'<i class="glyphicon glyphicon-trash"></i></button>'+
									'</div>'+
								'</div>').html();
								
								$('[name="id2['+i+']"]').val(data['mulLine'][i].BlocID);
								$('[name="BlocName['+i+']"]').val(data['mulLine'][i].BlocName);
								$('[name="BlocValue['+i+']"]').val(data['mulLine'][i].BlocValue);
								
							}
						//});
					}
					*/
					$('#modal_form').modal('show'); // show bootstrap modal when complete loaded
					$('.modal-title').text('Modifier'); // Set title to Bootstrap modal title
					
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error get data from ajax');
				}
			});
			
		}

		function reload_table()
		{
			table.ajax.reload(null,false); //reload datatable ajax 
		}

		function save()
		{
			//alert($('[name="JsonFileName"]').val());
			$('#btnSave').text('Sauvegarder...'); //change button text
			$('#btnSave').attr('disabled',true); //set button disable 
			var url;
			if(save_method == 'add')
			{
				url = base_url+"bloc/add/";
			} 
			else 
			{
				url = base_url+"bloc/ajax_update/"+nbrLineInUpdate+"/"+AppID;
				//save_method = 'add';
			}
			var dataser = $('#form').serialize();
			$.ajax({
				url : url,
				type: "POST",
				data: dataser,
				dataType: "JSON",
				success: function(data)
				{
					if(data.status)
					{
						reload_table();  
						$('#modal_form').modal('hide');
					}
					else
					{
						for (var i = 0; i < data.inputerror.length; i++) 
						{
							$('[id='+data.inputerror[i]).parent().parent().addClass('has-error');
							$('[id='+data.inputerror[i]).next().text(data.error_string[i]);
						}
					}
					$('#btnSave').text('Enregistrer'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
					alert('Error adding / update data');
					$('#btnSave').text('Enregistrer'); //change button text
					$('#btnSave').attr('disabled',false); //set button enable 
				}
			});
		}
				
		/*
		function add()
		{
			  $('#btnAdd').text('Sauvegarder...'); //change button text
			  $('#btnAdd').attr('disabled',true); //set button disable 
			  var url;
			  //var Aalf = $("#Aalf").val();
			  if(save_method == 'add')
			  {
				url = base_url+"bloc/add/";
			  } 
			  else 
			  {
				url = base_url+"bloc/ajax_update";
				save_method = 'add';
			  }
			  var dataser = $('#form').serialize();
			  $.ajax({
				url : url,
				type: "POST",
				data: dataser,
				dataType: "JSON",
				success: function(data)
				{
				  if(data.status)
				  {
					$('[name="inputs[vent_qte]"]').val('');
					$('[name="inputs[vent_prix]"]').val('');
					$('[name="inputs[vent_TVA]"]').val('');
					$('[name="inputs[montant_ht]"]').val('');
					$('[name="inputs[montant_tva]"]').val('');
					$('[name="inputs[montant_ttc]"]').val('');
					$('[name="BlocName"]').val(0);

					reload_table();
				  }
				  else
				  {
					for (var i = 0; i < data.inputerror.length; i++) 
					{
					  $('[id='+data.inputerror[i]).parent().parent().addClass('has-error');
					  $('[id='+data.inputerror[i]).next().text(data.error_string[i]);
					}
				  }
				  $('#btnAdd').text("Ajouter");
				  $('#btnSave').text('Enregistrer'); //change button text
				  $('#btnSave').attr('disabled',false); //set button enable 
				  $('#btnAdd').attr('disabled',false); //set button enable
				},
				error: function (jqXHR, textStatus, errorThrown)
				{
				  alert('Error adding / update data');
				  $('#btnAdd').text("Ajouter");
				  $('#btnSave').text('Enregistrer'); //change button text
				  $('#btnSave').attr('disabled',false); //set button enable 
				  $('#btnAdd').attr('disabled',false); //set button enable
				}
			  });
		}
		*/
		
		function _delete(id)
		{
			if(confirm('Are you sure delete this data?'))
			{
			  // ajax delete data to database
			  $.ajax({
				  url : base_url+"bloc/ajax_delete/"+id,
				  type: "POST",
				  dataType: "JSON",
				  success: function(data)
				  {
					  //if success reload ajax table
					  $('#modal_form').modal('hide');
					  reload_table();
				  },
				  error: function (jqXHR, textStatus, errorThrown)
				  {
					  alert('Error deleting data');
				  }
			  });
			}
		}
		
		function deleteBloc(id)
		{
		    //alert('x');
		    var blocid = $('[name="id2['+id+']"]').val();
			//$('#ligne'+id).remove();
			//$('#modal_form').modal('hide');
			/*
			if(confirm('Are you sure delete this bloc?'))
			{*/			
                $.ajax({
					url : base_url+"bloc/ajax_delete/"+blocid,
					type: "POST",
					dataType: "JSON",
					success: function(data)
					{
						//alert("m="+$('[name="id2[0]"]').val());
						//if success reload ajax table
						//$('#ligne'+id).remove();
						//$('#modal_form').modal('hide');
						reload_table();
					},
					error: function (jqXHR, textStatus, errorThrown)
					{
						alert('Error deleting data');
					}
				});			  
			//}			
		}