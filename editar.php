  

<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Editar Cambio</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

  </head>
  <body>
    <?php
      
      $id = $_GET['id'];
      include('conexao.php');
      //$result=mysql_query("select * from cambio where id='$id'");
      // $dados=  mysql_fetch_array($result);

            $consulta = "SELECT id, dt_cambio,dt_dia_semana ,vl_cambio FROM cambio Where id='$id'" ;
            $teste = $conn->query($consulta) or die($conn->error);

            $dados = $teste->fetch_array();


    ?>
        
    <div class="container-fluid">
      <div class="row">
        <div id="menu" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 centro">
          <h4>Editar Câmbio</h4>
          <p><a href="Index.php">Voltar</a></p>
        </div><!-- end #menu -->
        <div id="conteudo" class="col-xs-12 col-sm-10 col-md-10 col-lg-10 ">
          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo">Editar Câmbio</div>
          </div>

          <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centro">


              <form role="form" method="POST" action="altera_imovel.php?id=<?php echo $id;?>" >

                <div class="form-group col-xs-12 col-sm-4 col-md-12 col-lg-2 esquerda">
                  <label for="data">Data</label>
                  <input type="text" class="form-control" id="" name="datahora"  value="<?php  echo date('d/m/Y ',  strtotime ($dados['dt_cambio'])); ?>" readonly />
                </div>
                <div class="form-group col-xs-12 col-sm-4 col-md-2 col-lg-2 esquerda">
                  <label for="Hora">Hora</label>
                  <input type="text" class="form-control" id="" name="hora"  value="<?php  echo date('h:i:s ',  strtotime ($dados['dt_cambio'])); ?>" readonly />
                </div>
                <div class="form-group col-xs-12 col-sm-4 col-md-2 col-lg-2 esquerda">
                  <label for="Hora">Dia da Semana</label>
                  <input type="text" class="form-control" id="" name="hora"  value="<?php  echo strftime ('%A',  strtotime  ($dados['dt_cambio'])); ?>" readonly />
                </div>

                <div class="form-group col-xs-12 col-sm-4 col-md-2 col-lg-2 esquerda">
                  <label for="dormitorios">Valor Câmbio</label>
                  <input type="text" class="form-control" id="dormitorios" name="txt_valorCambio" value="<?php echo $dados['vl_cambio']; ?>" required  />
                </div>
                <div class="form-group col-xs-12 col-sm-4 col-md-2 col-lg-2 esquerda" >
                  <button type="submit" class="btn btn-primary" id="btn_alterarimovel">Alterar</button>
                </div>
              

              </form>
              
            </div>
          </div>
        </div><!-- end #conteudo -->
      </div>
    </div>
              
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>