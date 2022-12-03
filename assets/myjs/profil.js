		
		
	var host = "http://"+window.location.hostname;
		var base_url = host+"/sqaformation/";
		
      $(document).ready(function(){

        //set input/textarea/select event when change value, remove class error and remove text help block 
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


        get_profil();

      });

      function get_profil()
      {
        //$('#form')[0].reset(); // reset form on modals
        $('.form-group').removeClass('has-error'); // clear error class
        $('.help-block').empty(); // clear error string
        //Ajax Load data from ajax
        $.ajax({
            url : base_url+"profil/get_profil",
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
              $.each(data, function(i, item){
                $("#NomPrenom").text(item.Prenom+" "+item.Nom);
                $('[name="inputs[Login]"]').val(item.Login);
                $('[name="inputs[Prenom]"]').val(item.Prenom);
                $('[name="inputs[Nom]"]').val(item.Nom);
                $('[name="Mdp"]').val('');
                $('[name="ConfirMdp"]').val('');
              });
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error get data from ajax');
            }
        });
      }

      function save()
      {
        $('#btnSave').text('Sauvegarder...');
          $('#btnSave').attr('disabled',true);
          var url;
          url = base_url+"profil/update_profil/";
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
					alert('Modifications enregistrer avec succée!');
                	window.location=base_url+'profil/'; 
              }
              else
              {
                for (var i = 0; i < data.inputerror.length; i++) 
                {
                  $('[id='+data.inputerror[i]).parent().parent().addClass('has-error');
                  $('[id='+data.inputerror[i]).next().text(data.error_string[i]);
                }
              }
              $('#btnSave').text('Enregistrer');
              $('#btnSave').attr('disabled',false); 
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
              alert('Error adding / update data');
              $('#btnSave').text('Enregistrer');
              $('#btnSave').attr('disabled',false);
            }
          });
      }