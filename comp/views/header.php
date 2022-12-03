
    <?php include_once('head.php'); ?>

    <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">
      <header class="main-header">
        <!-- Logo -->
        <a onclick="void()" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>G</b>APP</span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>G</b>APP</span>
        </a>

        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo site_url('assets/dist/img/user2-160x160.jpg'); ?>" class="user-image" alt="User Image">
                  <span class="hidden-xs">
                    
                    <?php if($this->session->userdata('OP_Nom')!='') echo $this->session->userdata('OP_Nom'); else echo 'Nom '?>
                    <?php if($this->session->userdata('OP_Prenom')!='') echo $this->session->userdata('OP_Prenom'); else echo 'Prénom'?>

                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    <img src="<?php echo site_url('assets/dist/img/user2-160x160.jpg'); ?>" class="img-circle" alt="User Image">
                    <p>Gestion</p>

                      <small style='color:white;'>
                        <?php
                          /*if($this->session->userdata('OP_Profil')==="user") echo "Administrateur";
                          else if($this->session->userdata('OP_Profil')==="ma") echo "" . "Silda Collecteurs - DSI";
                          else if($this->session->userdata('OP_Profil')==="position")  echo "" . "Silda Collecteurs - Direction provinciale - " . $this->session->userdata('OP_positionName');
                          else if($this->session->userdata('OP_Profil')==="region")  echo "" . "Silda Collecteurs - Direction Régionale - " . $this->session->userdata('OP_RegionName');*/
                        ?>
                      </small>

                    </p>
                  </li>

                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="<?php echo base_url()."profil/" ?>" class="btn btn-success btn-flat">Paramètres</a>
                    </div>
                    <div class="pull-right">
                      <a href="<?php echo site_url('login/logout/'); ?>" class="btn btn-success btn-flat">Déconnecter</a>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
              </li>
            </ul>
          </div>
        </nav>
    </header>

        <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?php echo site_url('assets/dist/img/user2-160x160.jpg');?>" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
              <p><?php if($this->session->userdata('OP_Nom')!='') echo $this->session->userdata('OP_Nom'); else echo 'NOM '?>
               <?php if($this->session->userdata('OP_Prenom')!='') echo $this->session->userdata('OP_Prenom'); else echo 'PRENOM'?></p>
              <a href="#"><i class="fa fa-circle text-success"></i> Connecté</a>
            </div>
          </div>
          <!-- search form -->
          <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
              <input type="text" name="q" class="form-control" placeholder="Search...">
              <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
              </span>
            </div>
          </form>

        <ul class="sidebar-menu" data-widget="tree">
			<li class="header">HEADER</li>
			<!-- Optionally, you can add icons to the links -->
			<?php //if( ($this->session->userdata('OP_Profil')) == "Admin" ) {?>
			<!--<li class="treeview">
				<a href="#"><i class="fa fa-link"></i> <span>Nomenclature</span>
					<span class="pull-right-container">
					<i class="fa fa-angle-left pull-right"></i>
					</span>
				</a>
			  
				<ul class="treeview-menu">
					<li><a href="<?php //echo site_url('famille');?>">Famille</a></li>
					<li><a href="<?php //echo site_url('service');?>">Famille</a></li>
					<li><a href="<?php //echo site_url('reference');?>">Reference</a></li>
				</ul>
			</li>-->
			<?php //} ?>
			
			
			<li class="active"><a href="<?php echo site_url('apps');?>"><i class="fa fa-link"></i> <span>Apps</span></a></li>
			<li class="active"><a href="<?php echo site_url('publishing');?>"><i class="fa fa-link"></i> <span>Publishing</span></a></li>
			
			<li class="active"><a href="<?php echo site_url('apps');?>"><i class="fa fa-link"></i> <span>Utilisateurs</span></a></li>
			<li class="active"><a href="<?php echo site_url('apps');?>"><i class="fa fa-link"></i> <span>Ad Accounts</span></a></li>
			<li class="active"><a href="<?php echo site_url('bloc');?>"><i class="fa fa-link"></i> <span>Json Files</span></a></li>
			<li class="active"><a href="<?php echo site_url('bloc');?>"><i class="fa fa-link"></i> <span>Content Files</span></a></li>
			<li class="active"><a href="<?php echo site_url('FileController');?>"><i class="fa fa-link"></i> <span>Files</span></a></li>
			<li class="active"><a href="<?php echo site_url('JFileController');?>"><i class="fa fa-link"></i> <span>JFiles</span></a></li>
			
			
			<!--<li class="active"><a href="<?php echo site_url('mouvement');?>"><i class="fa fa-link"></i> <span>Mouvement</span></a></li>-->
		</ul>
        </section>
      </aside>

      <div class="content-wrapper">
        <section class="content-header">
          <h1>
            <small>
               GAPPS
            </small>
          </h1>
          <!-- <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-sysdba"></i> Home</a></li>
            <li class="active"></li>
          </ol> -->
        </section>