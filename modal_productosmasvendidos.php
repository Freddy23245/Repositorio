<!-- Modal -->
        <div class="modal fade" id="agregarnuevosdatosmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Productos más vendidos</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

        <?php 
       $fila=ProductoControlador::productos_mas_vendidos();
        $i = 1;
?>

    <table>
      <thead>
          <th>Ranking</th>
          <th>Nombre</th>
          <th>Cantidad</th>
      </thead>
      <tfoot>
          <th>Ranking</th>
          <th>Nombre</th>
          <th>Cantidad</th>
      </tfoot>
      <tbody > <?php 
       foreach ($fila as $p) { ?>
          
          <tr>
              <td><?php echo $i?></td>
              <td><?php echo $p["nombre"] ?></td>
              <td><?php echo $p["cantidad"] ?></td>
          </tr>
          <?php $i++;
        }
        ?>

          </tbody>
    </table>


                           
        <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
       </div>
