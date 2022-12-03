
      var save_method; //for save method string
      var table;
	  var host = "http://"+window.location.hostname;
	  var base_url = host+"/gapp/";

      $(document).ready(function(){

        table = $("#table").DataTable({ 
          "processing": true,
          "serverSide": true,
          "order": [],
          "pagingType": "full_numbers",
          "ajax": {
            "url": base_url+"publishing/ajax_list",
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
	  
	  /*
		$("#cb_apps").change(function() {
			//alert('recherche');
			var val = $("#cb_apps").val();
			table.ajax.url(base_url+"publishing/ajax_list/"+val+"/EntiteKey").load();
		});
	*/
	
      function add()
      {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal('show');
        $('.modal-title').text('Ajouter');
      }
	  
	  function add1()
      {
        save_method = 'add';
        $('#form_1')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form_1').modal('show');
        $('.modal-title').text('Ajouter');
      }
	  
	  /*
	  function add1()
      {
        url = base_url+"planing/add1/";
		$.ajax({
            url : url,
            type: "POST",
            data: dataser,
            dataType: "JSON",
            success: function(data)
            {
              if(data.status)
              {
                $('#modal_form').modal('hide');
                reload_table();
              }
              else
              {
                alert('Error!'); 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error adding / update data'); 
            }
          });
      }
	  */
	
      function _edit(id)
      {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : base_url+"publishing/edit/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
              $('[name="id"]').val(data.PublishingID);
              $('[name="inputs[PublisherName]"]').val(data.PublisherName);
			  $('[name="inputs[StoreLink]"]').val(data.StoreLink);
			  $('[name="inputs[StoreID]"]').val(data.StoreID);
			  $('[name="inputs[PackageName]"]').val(data.PackageName);
			  $('[name="Status"]').val(data.Status);
			  $('[name="AdAccount"]').val(data.AdAccount);
			  $('[name="MakeOrder"]').val(data.MakeOrder);
			  $('[name="Published"]').val(data.Published);
			  $('[name="Terminated"]').val(data.Terminated);
			  $('[name="Price"]').val(data.Price);
			  $('[name="OrderStatus"]').val(data.OrderStatus);
			  $('[name="UnsignedApk"]').val(data.UnsignedApk);
			  $('[name="KeyApk"]').val(data.KeyApk);
			  $('[name="SignedApk"]').val(data.SignedApk);
			  $('[name="cb_apps2"]').val(data.FkApp);
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
          $('#btnSave').text('Sauvegarder...'); //change button text
          $('#btnSave').attr('disabled',true); //set button disable 
          var url;
          //alert($("#cb_apps2").val());
          if(save_method == 'add')
          {
            url = base_url+"publishing/add/";
          } 
          else 
          {
            url = base_url+"publishing/ajax_update/";
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
                $('#modal_form').modal('hide');
                reload_table();
              }
              else
              {
				 alert('package déja exist');
				/*
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                  $('[id='+data.inputerror[i]).parent().parent().addClass('has-error');
                  $('[id='+data.inputerror[i]).next().text(data.error_string[i]);
                }
				*/
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
              url : base_url+"publishing/ajax_delete/"+id,
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