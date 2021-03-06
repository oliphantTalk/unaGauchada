<?php  
	
	if(isset($_SESSION['loggedin'])){ ?>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset = "utf-8">

    <script>
    $(document).ready(function(){

        $("#botonBuscar").on('click',function(e){
            e.preventDefault();
           var selectCategoria = ($('#select_categoria').val());
            var selectCiudad = ($('#select_ciudad').val());
           var datoCampo = ($('#campoBuscar').val());

           var data = {'selectCategoria': selectCategoria, 'selectCiudad': selectCiudad, 'datoCampo': datoCampo};

            $.ajax({
                url: 'procesarBusqueda.php',
                type: 'POST',
                data: data,
                //necesario para subir archivos via ajax
                cache: false,
                dataType: 'html',

                success: function(data){
                    location.href = "resultadosBusqueda.php";

                },
                error: function(){
                    alert("malllll");
                }

            });

        });
    });

    </script>
</head>
        <?php
            $categorias = datosCategoria();
            $ciudades = datos_localidad();

        ?>
<header>
	  <nav class="navbar navbar-inverse">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header" style='height: 70px;'>
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
	      <form class="navbar-form navbar-left" >
	        <div class="form-group">
	          <input type="text" class="form-control" id="campoBuscar" placeholder="Titulo..." name="campoBuscar"  >

	        </div>

              <select class="form-control" id="select_categoria" name="select_categoria" >

                  <option value="todasCategorias">Categoria</option>
                  <?php
                    foreach($categorias as $elem){ ?>
                         <option value=" <?php echo $elem->idCategoria ?>"><?php  echo $elem->nombre ?> </option>
                  <?php  }
                  ?>

              </select>
              <select class="form-control" id="select_ciudad" name="select_ciudad" >

                  <option value="todasCiudades">Ciudad</option>
                  <?php
                  foreach($ciudades as $elem){ ?>
                      <option value=" <?php echo $elem->idCiudad ?>"><?php  echo $elem->nombre ?> </option> <?php
                  }
                  ?>
              </select>

              <button type="button" class="btn btn-default" id="botonBuscar" name="botonBuscar">Buscar</button>
          </form>

	      <ul class="nav navbar-nav navbar-right">
          
	      	<li><a href="main.php"><?php echo $_SESSION['username'];?></a></li>
	  		<li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Mi cuenta <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="publicarFavor.php">Publicar favor</a></li>
            <li><a href="comprarCredito.php">Comprar crédito</a></li>
            <li><a href="miPerfil.php">Ver Perfil</a> </li>
            <li><a href="editarPerfil.php">Editar Perfil</a> </li>
              <li><a href="misFavores.php">Ver mis favores</a> </li>
            <li role="separator" class="divider"></li>
            <li><a href="phpLogin/logout.php">Cerrar sesión</a></li>
          </ul>
        </li>
        	<p class="navbar-text">Créditos: <?php echo cantCredito($_SESSION['idUsuario'])['cantCredito'];?> </p>
          <li><a href="VerInformacion.php">Sobre Nosotros</a></li>
	      </ul>
	     
	    </div>
	  </div>
	</nav> <!-- TERMINA NAVBAR -->
</header>
<?php } ?>