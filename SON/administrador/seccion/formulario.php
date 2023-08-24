<?php include("../template/cabecera.php");?>
<?php
    
    $tempo= $_SESSION['temporadasTotalesSeri'];  
    $accion=  $_SESSION['accion'];
?>
                        <br><br>
                        <center>
                        <form action="resultado.php" method="post">    
                                        <?php 
                                       
                                        for ($i=0; $i < $tempo; $i++) { ?>
                                        <div class = "form-group">
                                            <label for="sonidoSeri">Capitulos Temporada <?php echo $i;?> :</label>
                                            <input type="text"   name="<?php echo $i;?>"  >
                                        </div>
                                        <br>
                                        <?php  } ?>
                                        <br>
                                        <button class="btn btn-warning"type="submit" name="accion" value="<?php echo $accion; ?>" >Agregar</button>
                            </form>

                            </center>
<?php include("../template/pie.php");?>