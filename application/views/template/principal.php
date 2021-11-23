<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="UTF-8">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

<?php

		if(isset($css)) for ($i=0;$i<count($css);$i++) {
				echo "\n\t<link rel='stylesheet' type='text/css' href='".base_url().$css[$i]."' />\n";
			}
?>

<title>Agencia ezoom - Teste Backend</title>
</head>


<body>
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
          </ul>
        </div>
      </nav>
      <div class="main-sidebar sidebar-style-2">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=site_url('administrador')?>"> <img alt="image" src="assets/img/logo.png" class="header-logo" /> <span
                class="logo-name">Teste</span>
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="index.html" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="book"></i><span>Projetos</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=site_url('projetos/cadastrar')?>">Cadastrar</a></li>
                <li><a class="nav-link" href="<?=site_url('projetos/gerenciar')?>">Gerenciar</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="users"></i><span>Equipe</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="">Cadastrar</a></li>
                <li><a class="nav-link" href="">Gerenciar</a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i data-feather="user-check"></i><span>Profissional</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="">Cadastrar</a></li>
                <li><a class="nav-link" href="">Gerenciar</a></li>
              </ul>
            </li>
            
          </ul>
        </aside>
      </div>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <!-- add content here -->
          </div>
        </section>
        
            
                            
                            <?php //------------------------------------------------------- CONTEÃšDO ---------------------------------------------------------// ?>

                            <?php
                            echo("\n\n");
                            $this->load->view($paginaInterna);
                            echo("\n\n");
                            ?>
                        
                        <?php //------------------------------------------------------- RODAPE ---------------------------------------------------------// ?>
    </div>
      <footer class="main-footer">
        <div class="footer-left">
          <a href="">Teste Backend</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  
  <?
    if(isset($js))for ($i=0;$i<count($js);$i++) {
        echo "\n\t<script type='text/javascript' src='".base_url().$js[$i]."'></script>\n";
    }
  ?>

</body>

</html>