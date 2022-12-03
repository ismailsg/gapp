
		var save_method; //for save method string
		var table;
		var base_url = "http://192.168.167.240/gapp/";
		var ctr = 0;
		var str = '';
		var nbrLineInUpdate = 0;
		var AppID = 0;
		$(document).ready(function()
		{
			
			table = $("#table").DataTable({ 
			  "processing": true,
			  "serverSide": true,
			  "order": [],
			  "pagingType": "full_numbers",
			  "ajax": {
				"url": base_url+"content/ajax_list/0",
				"type": "POST"
			  },
			  "columnDefs": [
				{ 
				  "targets": [ -1 ],
				  "orderable": false,
				},
			  ],
			});
					
			
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
	
	
		function validate(id, setv)
		{
			$.ajax({
				url : base_url+"content/setValidate/"+setv+"/"+id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					table.ajax.url(base_url+"content/ajax_list/").load();
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
			$('.help-contentk').empty();
			$('#modal_form').modal('show');
			$('.modal-title').text('Ajouter');
		}
		  
		function add()
		{
			
			ctr++;
			$("#form").append('<div class="row" id="addit'+ctr+'">'+
				'<div class="form-group col-md-5">'+
					'<div class="col-md-12">'+
						'<input name="Title['+ctr+']" placeholder="Title" class="form-control" type="text" id="Title['+ctr+']">'+
						'<span class="help-contentk"></span>'+
					'</div>'+
				'</div>'+
				
				'<div class="form-group col-md-7">'+
					'<div class="col-md-12">'+
						'<input name="Details['+ctr+']" placeholder="Title" class="form-control" type="text" id="Details['+ctr+']">'+
						'<span class="help-contentk"></span>'+
					'</div>'+
				'</div>'+
			'</div>').html();
			
		}
		
		function add2(nbrInput)
		{
			
			ctr++;
			for (var i = 0; i < nbrInput; i++)
			{
				$("#form").append('<div class="row" id="addit'+ctr+'">'+
					'<div class="form-group col-md-5">'+
						'<div class="col-md-12">'+
							'<input name="Title['+ctr+']" placeholder="Title" class="form-control" type="text" id="Title['+ctr+']">'+
							'<span class="help-contentk"></span>'+
						'</div>'+
					'</div>'+
					
					'<div class="form-group col-md-7">'+
						'<div class="col-md-12">'+
							'<input name="Details['+ctr+']" placeholder="Title" class="form-control" type="text" id="Details['+ctr+']">'+
							'<span class="help-contentk"></span>'+
						'</div>'+
					'</div>'+
				'</div>').html();
			}
			
		}
			
		function edit(id)
		{
			//alert(id);
			for(i=1; i<=ctr; i++)
			{
				$("#addit"+i).remove();
			}
			ctr=0;
			save_method = 'update';
			$('#form')[0].reset();
			$('.help-contentk').empty();
			$('#modal_form').modal('show');
			$('.modal-title').text('Modifier');
			//alert($("#cb_reference").val());	
			$('#form')[0].reset(); // reset form on modals
			$('.form-group').removeClass('has-error'); // clear error class
			$('.help-contentk').empty(); // clear error string
			$.ajax({
				url : base_url+"content/ajax_edit/" + id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
					$("#cb_apps2").prop('disabled', true);
					nbrLineInUpdate = data['mulLine'].length;
					AppID = data['seulLine']['AppID'];
					$('[name="id"]').val(data['seulLine']['AppID']);
					$('[name="ContentFileName"]').val(data['seulLine']['ContentFileName']);
					$('[name="id2[0]"]').val(data['mulLine'][0].ContentID);
					$('[name="cb_apps2"]').val(data['seulLine']['AppID']);
					$('[name="Title[0]"]').val(data['mulLine'][0].Title);
					$('[name="Details[0]"]').val(data['mulLine'][0].Details);
					
					var i;
					if(data['mulLine'].length > 1)
					{
						//alert(element.prod_designation);
						//$.each(data['mulLine'], function(index, element) {
							for(i=1; i<data['mulLine'].length; i++){
								//alert(data['mulLine'][i].contentDetailsID);
								/*
								ctr++;
								$("#form").append('<div class="row" id="addit'+ctr+'">'+
									'<div class="form-group col-md-5">'+
										'<div class="col-md-12">'+
											'<input type="hidden" value="" id="id2['+i+']" name="id2['+i+']"/>'+
											'<input name="Title['+ctr+']" placeholder="Title" class="form-control" type="text" id="Title['+ctr+']">'+
											'<span class="help-contentk"></span>'+
										'</div>'+
									'</div>'+
									
									'<div class="form-group col-md-7">'+
										'<div class="col-md-12">'+
											'<input name="Details['+ctr+']" placeholder="Details" class="form-control" type="text" id="Details['+ctr+']">'+
											'<span class="help-contentk"></span>'+
										'</div>'+
									'</div>'+
								'</div>').html();
								*/
								$('[name="id2['+i+']"]').val(data['mulLine'][i].ContentID);
								$('[name="Title['+i+']"]').val(data['mulLine'][i].Title);
								$('[name="Details['+i+']"]').val(data['mulLine'][i].Details);
								
							}
						//});
					}
					
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
			//alert($('[name="ContentFileName"]').val());
			$('#btnSave').text('Sauvegarder...'); //change button text
			$('#btnSave').attr('disabled',true); //set button disable 
			var url;
			if(save_method == 'add')
			{
				url = base_url+"content/add/";
			} 
			else 
			{
				url = base_url+"content/ajax_update/"+nbrLineInUpdate+"/"+AppID;
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
		
		function _delete(id)
		{
			if(confirm('Are you sure delete this data?'))
			{
			  // ajax delete data to database
			  $.ajax({
				  url : base_url+"content/ajax_delete/"+id,
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