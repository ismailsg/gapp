
		var save_method; //for save method string
        var table;
	    var host = "http://"+window.location.hostname;
		var base_url = host+"/gapp/";
		
		//var base_url = "http://weconnectvalue.com/gapp/";
		
		var ctr = 28;
		var str = '';
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
				"url": base_url+"JFileController/ajax_list/0",
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
				url : base_url+"JFileController/edit/" + id,
				type: "POST",
				dataType: "JSON",
				success: function(data)
				{
                    $("#cb_apps2").prop('disabled', true);				
					$('[name="id"]').val(data.JFileID);
					$('[name="JFileName"]').val(data.JFileName);
					$('[name="Content"]').val(data.Content);
					
					
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
			//alert($('[name="JFileName"]').val());
			$('#btnSave').text('Sauvegarder...'); //change button text
			$('#btnSave').attr('disabled',true); //set button disable 
			var url;
			if(save_method == 'add')
			{
				url = base_url+"JFileController/add/";
			} 
			else 
			{
				url = base_url+"JFileController/ajax_update/";
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
              url : base_url+"JFileController/ajax_delete/"+id, // +"/"+file
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
		
		
		
		
		