
      var save_method; //for save method string
      var table;
	  var host = "http://"+window.location.hostname;
	  var base_url = host+"/gapp/";

      $(document).ready(function(){

        table = $("#table").DataTable({ 
		  "scrollX": true, 
          "processing": true,
          "serverSide": true,
          "order": [],
          "pagingType": "full_numbers",
          "ajax": {
            "url": base_url+"/apps/ajax_list",
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
	  
	  
     function addRow() {
        var empTab = document.getElementById('table');
       var arrHead = ['AppNumber', 'AppName', 'AppType', 'DateCreation','JsonFileName','JsonFileURL','RessourcesLink','MetaDataLink','ContentLink','JsonContentLink','Action']; 
        var rowCnt = 1//empTab.rows.length;    // get the number of rows.
        var tr = empTab.insertRow(rowCnt); // table row.
        tr = empTab.insertRow(rowCnt);

        for (var c = 0; c < arrHead.length; c++) {
            var td = document.createElement('td');          // TABLE DEFINITION.
            td = tr.insertCell(c);

            
                // the 2nd, 3rd and 4th column, will have textbox.
                
			 if (c == arrHead.length - 1) {   // if its the first column of the table.
                // add a button control.
                var button = document.createElement('input');
                var button2 = document.createElement('input');
                // set the attributes.
                button.setAttribute('type', 'button');
				button.setAttribute('class', 'btn btn-sm btn-danger');
                button.setAttribute('value', 'Remove');
				button2.setAttribute('type', 'button');
				button2.setAttribute('class', 'btn btn-sm btn-warning');
                button2.setAttribute('value', 'Add');
          
                // add button's "onclick" event.
                button.setAttribute('onclick', 'removeRow(this)');
				button2.setAttribute('onclick','addrowtodb()')

                td.append(button,' ',button2);
				//td.appendChild(button2);
				
            } 
else {
			var ele = document.createElement('input');
				if(c==3)
				{ele.setAttribute('type', 'date');
				ele.style.width = "120px"; }  
				else 
                {ele.setAttribute('type', 'text');
			    ele.style.width = "100%";}
				
				ele.setAttribute('value', '');

                td.appendChild(ele);
            
        } }
    } 
	 function removeRow(oButton) {
        var empTab = document.getElementById('table');
        empTab.deleteRow(oButton.parentNode.parentNode.rowIndex); // buttton -> td -> tr
    }
	function addrowtodb()
      {      var myTab = document.getElementById('table');
	         var data1 = new Array(); 
	         for (var c = 0; c < myTab.rows[1].cells.length - 1; c++) {
			 var element = myTab.rows.item(1).cells[c].childNodes[0].value; 
             data1.push(element);			 }
			 
		 $.ajax({
            url : base_url+"apps/addRow/",
            type: "POST",
            data: {
				data: data1,
			},
            
            success: function(data)
            {
              reload_table();
            }
		 })
	  }
      
	  function add()
      {
        save_method = 'add';
        $('#form')[0].reset();
        $('.form-group').removeClass('has-error');
        $('.help-block').empty();
        $('#modal_form').modal('show');
        $('.modal-title').text('Ajouter');
      }
	  
	  
	  function listenForDoubleClick(element) 
	  {
		element.contentEditable = true;
		 setTimeout(function() {
			if (document.activeElement !== element) {
			  element.contentEditable = false;
			}
		  }, 300);
	 }

     
	//fin de la fonction 

      function _edit(id)
      {
        save_method = 'update';
        $('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string

        //Ajax Load data from ajax
        $.ajax({
            url : base_url+"apps/edit/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
              $('[name="id"]').val(data.AppID);
              $('[name="inputs[AppName]"]').val(data.AppName);
			  $('[name="inputs[AppNumber]"]').val(data.AppNumber);
			  $('[name="inputs[AppType]"]').val(data.AppType);
			  $('[name="DateCreation"]').val(data.DateCreation);
			  $('[name="inputs[RessourcesLink]"]').val(data.RessourcesLink);
			  $('[name="inputs[MetaDataLink]"]').val(data.MetaDataLink);
			  $('[name="inputs[ContentLink]"]').val(data.ContentLink);
			  $('[name="inputs[JsonContentLink]"]').val(data.JsonContentLink);
			  $('[name="inputs[JsonFileName]"]').val(data.JsonFileName);
			  $('[name="inputs[JsonFileURL]"]').val(data.JsonFileURL);
			  //$('[name="cb_type"]').val(data.TypeTheme);
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
	  function updatevalue(id,column,element)
	 {
		  $.ajax({
			url: base_url+"/apps/editline" ,
            type: "post",
            data: {
				value: element.innerText,
				column: column,
				id: id,
				},
				success: function(data){
					
				//alert("Modification réussie !")	
				 
					
				}
 			});
	}

      function save()
      {
        if($("#cb_pays").val()!=='1'){
			/*
			  var gurl = "https://play.google.com/store/apps/details?id="+$("#PackageName").val();
			  //var gurl = "https://play.google.com/";
			  alert(gurl);
			  
			  var isValid = isValidURL("http://www.wix.com");
				alert(isValid);
			*/
		  //var exists = urlExists(gurl);
          $('#btnSave').text('Sauvegarder...'); //change button text
          $('#btnSave').attr('disabled',true); //set button disable 
          var url;
          //var gapp = $("#gapp").val();
          if(save_method == 'add')
          {
            url = base_url+"apps/add/";
          } 
          else 
          {
            url = base_url+"apps/ajax_update/";
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
      }

      function _delete(id)
      {
        if(confirm('Are you sure delete this data?'))
        {
          // ajax delete data to database
          $.ajax({
              url : base_url+"apps/ajax_delete/"+id, // +"/"+file
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
	  
	  function urlExists(urlx)
	  {
		  alert(urlx);
		  $.ajax({
			  url: urlx, 
			  success: function(data, textStatus) {
                  alert('URL is good');
            }, 
			error: function(jqXHR, textStatus, errorThrown) 
			{
                  alert('URL is bad');
            }
		});
	  }
	  
	function UrlExists(url, cb) 
	{
		alert('X');
		jQuery.ajax({
			url: url,
			dataType: 'text',
			type: 'GET',
			complete: function (xhr) {
				if (typeof cb === 'function')
					cb.apply(this, [xhr.status]);
			}
		});
	}
	
	function isValidURL(url)
	{
		var encodedURL = encodeURIComponent(url);
		var isValid = false;

		$.ajax({
		  url: "http://query.yahooapis.com/v1/public/yql?q=select%20*%20from%20html%20where%20url%3D%22" + encodedURL + "%22&format=json",
		  type: "get",
		  async: false,
		  dataType: "json",
		  success: function(data) {
			isValid = 'TRUE';//data.query.results != null;
		  },
		  error: function(){
			isValid = 'FALSE';
		  }
		});

		return isValid;
  }