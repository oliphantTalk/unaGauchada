<?php  
	
	if(isset($_SESSION) && $_SESSION['admin'] == 1){ ?>

<header>
	  <nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header" style='height: 70px;''>
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="index.php">
	      	
	      	 <img alt="unaGauchada" src="http://localhost/unagauchada-2/unagauchada/img/icon_gauchada.png">
	      	 <p style='font-size: 10px;'>unaGauchada.com</p>

	      </a>
	    </div>

	    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	      <form class="navbar-form navbar-left">
	        <div class="form-group">
	          <input type="text" class="form-control" placeholder="Buscar..." name="publicacion">
	        </div>
	   
	        	 <select class="form-control" name="cat">
                				<option>Todas las categorias</option>
             	 </select>
	         
	        <button type="submit" class="btn btn-default" name="buscar">Buscar</button>
	      </form>
	      <ul class="nav navbar-nav navbar-right">
	  		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Administrador <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="publicarFavor.php">Ver listado de ganancias</a></li>
            <li><a href="comprarCredito.php">Ver ranking de usuarios</a></li>
            <li><a href="listarCategorias.php">Listar categorías</a></li>
            <li><a href="comprarCredito.php">Listar reputación</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="phpLogin/logout.php">Cerrar sesión</a></li>
          </ul>
        </li>
        <li><a href="verInformacion.php">Sobre Nosotros</a></li>	
	      </ul>
	     
	    </div>
	  </div>
	</nav> <!-- TERMINA NAVBAR -->
</header>

<?php } ?>