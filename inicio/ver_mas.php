<?php   
include '../scripts/conexion.php';
include 'estrellas.php';
$clave = htmlentities($_GET['clave']);
$sel = $con->prepare("SELECT * FROM inventario WHERE clave = ?");
$sel->execute(array($clave));
    if ($f = $sel->fetch()) { 
    }
  
 ?>

<?php include '../assets/header.php'; ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" ></script>
<body class="bg-light">

  <div class="container" style="margin-top: 1%; margin-bottom: 1%;" >

    <div class="card text-white bg-secondary">
        <div class="card-header"><h4 class="card-title"><?php echo $f['producto'] ?></h4></div>
        <div class="card-body">
          <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-6">
              <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="../basic-clothes/admin/<?php echo $f['foto'] ?>" width="100%" height="70%">
                  </div>
                  <?php 
                  $sel_img = $con->prepare("SELECT ruta FROM imagenes WHERE clave_producto = ?");
                  $sel_img->execute(array($clave));
                      while ($f_img = $sel_img->fetch()) { 
                   ?>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="../basic-clothes/admin/<?php echo $f_img['ruta'] ?>" width="100%" height="70%">
                  </div>
                  <?php }
                  $sel_img = null;
                   ?>
                </div>
                  <a class="carousel-control-prev" href="#carouselExampleControls" rol="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#carouselExampleControls" rol="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                  </a>
              </div>
            </div> 
             <div class="col-sm-12 col-md-6 col-lg-6">
                <h3><?php echo "$". number_format($f['precio'], 2) ?></h3>
                <input type="hidden" id="clave_producto" value="<?php echo $clave ?>">
                <input type="hidden" id="producto" value="<?php echo $f['producto'] ?>">
                <input type="hidden" id="foto" value="<?php echo $f['foto'] ?>">
                <input type="hidden" id="descripcion" value="<?php echo $f['descripcion'] ?>">
                <input type="hidden" id="precio" value="<?php echo $f['precio'] ?>">
                <div class="form-group">
                  <input type="number" requred id="cantidad" class="form-control" placeholder="Cantidad"  max="<?php echo $f['cantidad'] ?>"  >
                </div>
                <button id="agregar_carrito" class="btn btn-primary" >Agregar al carrito</button>
                <div class="res_carrito" ></div>
                <p class="text-justify" ><?php echo $f['descripcion'] ?></p>
            </div> 
          </div>
          <div class="row" style="margin-top: 1%;">
            <div class="col-1">
              <img src="<?php echo $_SESSION['foto_user'] ?>" width="50" height="50" class="rounded-circle">
            </div>
            <div class="col-11">
                <input type="hidden" id="user" value="<?php echo $_SESSION['name'] ?>">
                <input type="hidden" id="clave_user" value="<?php echo $_SESSION['clave_user'] ?>">
                <input type="hidden" id="foto_user" value="<?php echo $_SESSION['foto_user'] ?>">
                <input type="hidden" id="clave" value="<?php echo $clave ?>">
                <input type="hidden" id="fecha" value="<?php echo date('Y-m-d') ?>">
                <input type="text" id="comentario" class="form-control" placeholder="Comentario">
            </div>
          </div>
          <div class="row">
            <div class="col-1"></div>
            <div class="col-3 text-left">
              <a href="#"><i class="text-warning fa fa-star-o" id="1"></i></a>
              <a href="#"><i class="text-warning fa fa-star-o" id="2"></i></a>
              <a href="#"><i class="text-warning fa fa-star-o" id="3"></i></a>
              <a href="#"><i class="text-warning fa fa-star-o" id="4"></i></a>
              <a href="#"><i class="text-warning fa fa-star-o" id="5"></i></a>
              <input type="hidden" id="rating" value="0">
            </div>
            <div class="col-8 text-right">
              <button class="btn btn-light" id="cancelar">Cancelar</button>
              <button class="btn btn-primary" id="calificar">Enviar</button>
            </div>
          </div>
          <div id="datos">
           <?php 
            $suma = 0;
            $sel_promedio = $con->prepare("SELECT rating FROM rating WHERE clave_producto = ?");
            $sel_promedio->execute(array($clave));
            $row_promedio = $sel_promedio->rowCount();
               while ($f_promedio = $sel_promedio->fetch()) { 
                 $suma = $suma + $f_promedio['rating'];
               }

               if ($row_promedio > 0) {
                 $promedio = $suma / $row_promedio;
               }else{
                 $promedio = 0;
               }
               $sel_promedio = null;

               $promedio= number_format($promedio);
               //echo "<script>console.log(".$promedio.")</script>";
                              
           ?>
  <div class="row">
    <div class="col">
      <h3>Promedio: <?php echo estrellas($promedio) ?> </h3>
    </div>
  </div>
  <?php 
  $sel_rating = $con->prepare("SELECT * FROM rating WHERE clave_producto = ?");
  $sel_rating->execute(array($clave));
      while ($f_rating = $sel_rating->fetch()) { 
   ?>
  
  <div class="row contenido">
    <div class="col-1"><img src="<?php echo $f_rating['foto'] ?>" width="50" height="50" class="rounded-circle"></div>
    <div class="col-11">
      <div class="row">
        <div class="col-10 text-left">
          <p class="font-weight-bold"><?php echo $f_rating['usuario'] ?>
            <span><?php echo estrellas($f_rating['rating']) ?></span>
          </p>
        </div>
        <div class="col-2">
          <p><?php echo $f_rating['fecha'] ?></p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <p><?php echo $f_rating['comentario'] ?></p>
        </div>
      </div>
    </div>
  </div>

 <?php 
 }

  $sel = null;
  $ins = null;
  $con = null;

  ?>
          </div>
        </div>
      </div>  


   </div>




<script src="../js/bootstrap.min.js" ></script>
<script src="../js/bootbox.min.js" ></script>
<script src="../js/calificaciones.js" ></script>
</body>
</html>