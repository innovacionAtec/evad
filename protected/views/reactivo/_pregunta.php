<div class="modal hide fade" id="pregunta<?php echo $key->id; ?>" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h3>Nombre de la Pregunta</h3>
    </div>
    <div class="modal-body">
        <div class="row" style="height:145px; overflow:auto; position:relative;margin-bottom: 3px;">
            <div class="span5">
                <?php echo  $key->planteamiento; ?>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <!--<a class="btn btn-primary" href="#">Save changes</a>-->
        <a data-dismiss="modal" class="btn" href="#">Cerrar</a>
    </div>
</div>