<?php
 
  include("conexao.php");
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Empresa de Cambio</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <script src="../../assets/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
    
  <body>
    <div id="topo" class="container-fluid">
      <div class="row">
        <div id="logo" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 centro">
          <img id = "logo" src="dollar-icon.png" />
        </div>
      </div>
    </div><!-- end #top -->

    <div class="container-fluid">
      <div class="row">
        <div id="menu" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 centro">
          <h4>Menu</h4>
          <p><a href="Index.php">Início</a></p>
          
        </div><!-- end #menu -->
        <div id="conteudo" class="col-xs-12 col-sm-10 col-md-10 col-lg-10 ">

      
          <!-- Consulta pelo Campo  -->

          <?php
              
            $input_consulta = $_GET['input_consulta'];
            $input_consulta = date("d/m/Y" , strtotime($input_consulta)) ;

            $consulta2 = "SELECT dt_cambio, dt_dia_semana, vl_cambio FROM cambio WHERE DATE_FORMAT(dt_cambio, '%d/%m/%Y') = '$input_consulta'";
            $teste2 = $conn->query($consulta2) or die($conn->error);
           ?>
       
          <div class="row">
            <FIELDSET>
               <legend>Consulta</legend>
               <form role="form" method="GET" action="#">
                  <div class="form-group col-xs-12 col-sm-4 col-md-12 col-lg-3 esquerda">
                    <label for="data">Pesquisa Por Data</label>
                    <input type="date" class="form-control" id="" name="input_consulta" />
                    <button type="submit" class="btn btn-primary">Consultar</button>
                  </div>
              </form>

              <table id="tabela_imoveis1" class="table table-condensed table-striped">
              <thead>
              <tr>
                <th>Data</th>
                <th>Hora</th>
                <th>Dia</th>
                <th>Valor</th>
                
              </tr>
            </thead>
      
            <?php while($linha1 = $teste2->fetch_array()) { ?>

              <tr>
                
                <td><?php echo date("d/m/Y", strtotime($linha1["dt_cambio"])); ?></td> 
                <td><?php echo date ("h:i:s", strtotime($linha1["dt_cambio"])); ?></td>   
                <td><?php echo strftime( '%A',  strtotime ($linha1["dt_cambio"])); ?></td> 
                <td><?php echo $linha1["vl_cambio"]; ?></td>
               
              </tr>
            <?php } ?>

          </table>
  
            </FIELDSET>
          </div>

          <div class="row">
            <div class="form-group col-xs-12 col-sm-4 col-md-12 col-lg-3 esquerda">
               <a href="Importacao2.php"> <button type="button" class="btn btn-success">Importar</button> </a>
            </div>
            <form role="form" method="POST" action="Exportarexcel.php">
              <div class="form-group col-xs-12 col-sm-4 col-md-12 col-lg-3 esquerda">
                <button type="submit" class="btn btn-success" name="export_excel">Exportar p/ .Xls</button> 
              </div>
            </form>
          </div>
       
        <!-- Consulta de toda Base Interna -->
          <?php
            $consulta = "SELECT id, dt_cambio, vl_cambio FROM cambio
            ORDER by id" ;
            $teste = $conn->query($consulta) or die($conn->error);
            
            //echo Date("d/m/y", strtotime("dt_cambio"));
          ?> 
          
          
          
          <table id="tabela_imoveis1" class="table table-condensed table-striped">
            <thead>
              <tr>
                <th>Codigo</th>
                <th>Data</th>
                <th>Hora</th>
                <th>valor</th>
                
              </tr>
            </thead>
      
            <?php while($linha = $teste->fetch_array()) { ?>

              <tr>
                <td><?php echo $linha["id"] ?></td>
                <td><?php echo date("d/m/Y", strtotime($linha["dt_cambio"])); ?></td> 
                <td><?php echo date ("h:i:s", strtotime($linha["dt_cambio"])); ?></td> 
                <td><?php echo $linha["vl_cambio"] ?></td> 
                
                 <td><a href=editar.php?id=<?php echo $linha['id'];?>> Editar</a></td>
                <td><a href=decisaoExcluir.php?id=<?php echo $linha['id'];?>> Excluir</a></td>  
              </tr>
            <?php } ?>

          </table>
          
         
        </div><!-- end #conteudo -->
      </div>
    </div>

    <?php 
      mysqli_close($conn);
    ?>
                      
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>
  </body>
</html>