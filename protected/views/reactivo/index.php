<?php
    /*CONSULTA DE REACTIVOS INDEPENDIENTES*/
?>

<?php
    $cs = Yii::app()->clientScript;
    $cs->registerScriptFile(Yii::app()->baseUrl . '/js/DataTables-1.9.0/media/js/jquery.dataTables.js', CClientScript::POS_HEAD);
    $cs->registerScriptFile(Yii::app()->baseUrl . '/js/iniciar.js', CClientScript::POS_HEAD);
?>

<?php
    /*TITULO NAVEGADOR*/
    $this->pageTitle = CHtml::encode('EVAD | Reactivo independiente');
?>

<!--INICIO BUSCADORES INPUTS-->
<script type="text/javascript" charset="utf-8">   

/*Default class modification*/
$.extend( $.fn.dataTableExt.oStdClasses, {
                                        "sSortAsc": "header headerSortDown",
				"sSortDesc": "header headerSortUp",
				"sSortable": "header"
			} );
                        
/* API method to get paging information*/
$.fn.dataTableExt.oApi.fnPagingInfo = function ( oSettings )
{
	return {
		"iStart":         oSettings._iDisplayStart,
		"iEnd":           oSettings.fnDisplayEnd(),
		"iLength":        oSettings._iDisplayLength,
		"iTotal":         oSettings.fnRecordsTotal(),
		"iFilteredTotal": oSettings.fnRecordsDisplay(),
		"iPage":          Math.ceil( oSettings._iDisplayStart / oSettings._iDisplayLength ),
		"iTotalPages":    Math.ceil( oSettings.fnRecordsDisplay() / oSettings._iDisplayLength )
	};
}

/* Bootstrap style pagination control */
$.extend( $.fn.dataTableExt.oPagination, {
	"bootstrap": {
		"fnInit": function( oSettings, nPaging, fnDraw ) {
			var oLang = oSettings.oLanguage.oPaginate;
			var fnClickHandler = function ( e ) {
				e.preventDefault();
				if ( oSettings.oApi._fnPageChange(oSettings, e.data.action) ) {
					fnDraw( oSettings );
				}
			};

			$(nPaging).addClass('pagination').append(
				'<ul>'+
					'<li class="prev disabled"><a href="#">&larr; '+oLang.sPrevious+'</a></li>'+
					'<li class="next disabled"><a href="#">'+oLang.sNext+' &rarr; </a></li>'+
				'</ul>'
			);
			var els = $('a', nPaging);
			$(els[0]).bind( 'click.DT', { action: "previous" }, fnClickHandler );
			$(els[1]).bind( 'click.DT', { action: "next" }, fnClickHandler );
		},
		"fnUpdate": function ( oSettings, fnDraw ) {
			var iListLength = 5;
			var oPaging = oSettings.oInstance.fnPagingInfo();
			var an = oSettings.aanFeatures.p;
			var i, j, sClass, iStart, iEnd, iHalf=Math.floor(iListLength/2);

			if ( oPaging.iTotalPages < iListLength) {
				iStart = 1;
				iEnd = oPaging.iTotalPages;
			}
			else if ( oPaging.iPage <= iHalf ) {
				iStart = 1;
				iEnd = iListLength;
			} else if ( oPaging.iPage >= (oPaging.iTotalPages-iHalf) ) {
				iStart = oPaging.iTotalPages - iListLength + 1;
				iEnd = oPaging.iTotalPages;
			} else {
				iStart = oPaging.iPage - iHalf + 1;
				iEnd = iStart + iListLength - 1;
			}
			for ( i=0, iLen=an.length ; i<iLen ; i++ ) {
				// Remove the middle elements
				$('li:gt(0)', an[i]).filter(':not(:last)').remove();
				// Add the new list items and their event handlers
				for ( j=iStart ; j<=iEnd ; j++ ) {
					sClass = (j==oPaging.iPage+1) ? 'class="active"' : '';
					$('<li '+sClass+'><a href="#">'+j+'</a></li>')
						.insertBefore( $('li:last', an[i])[0] )
						.bind('click', function (e) {
							e.preventDefault();
							oSettings._iDisplayStart = (parseInt($('a', this).text(),10)-1) * oPaging.iLength;
							fnDraw( oSettings );
						} );
				}
				// Add / remove disabled classes from the static elements
				if ( oPaging.iPage === 0 ) {
					$('li:first', an[i]).addClass('disabled');
				} else {
					$('li:first', an[i]).removeClass('disabled');
				}
				if ( oPaging.iPage === oPaging.iTotalPages-1 || oPaging.iTotalPages === 0 ) {
					$('li:last', an[i]).addClass('disabled');
				} else {
					$('li:last', an[i]).removeClass('disabled');
				}
			}
		}
	}
} );

/*TABLE INITIALISATION*/

    var asInitVals = new Array();
    $(document).ready(function() {
        /*
         * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
         * the footer
         */
        $("tfoot input").each( function (i) {
            asInitVals[i] = this.value;
        } );
        $("tfoot input").focus( function () {
            if ( this.className == "input-mini" )
            {
                this.className = "input-mini";//respetar ancho de input
                this.value = "";
            }
        } );
        $("tfoot input").blur( function (i) {
            if ( this.value == "" )
            {
                this.className = "input-mini";
                this.value = asInitVals[$("tfoot input").index(this)];
            }
        } );
        var oTable = $('#tabla_inicio').dataTable( {
            /*"sPaginationType": "full_numbers",*/
            "aoColumns": [
		{ "sType": "numeric" },
                null,
                null,
                null,
                null,
                null
            ],
	    "sDom": "<'row'<'span6'l><'span6'f>r>t<'row'<'span6'i><'span6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sSearch": "Buscar en todas las columnas:"
            },
            "bStateSave": true,
            "fnInitComplete": function() {
                var oSettings = $('#tabla_inicio').dataTable().fnSettings();
                for ( var i=0 ; i<oSettings.aoPreSearchCols.length ; i++ ){
                    if(oSettings.aoPreSearchCols[i].sSearch.length>0){
                        $("tfoot input")[i].value = oSettings.aoPreSearchCols[i].sSearch;
                        $("tfoot input")[i].className = "input-mini";//respetar ancho de input
                    }
                }
            }
        } );
        $("tfoot input").keyup( function () {
            /* Filter on the column (the index) of this element */
            oTable.fnFilter( this.value, $("tfoot input").index(this) );
        } );    
    } );
</script>

<!--FIN BUSCADORES INPUTS-->

<?php
    /*BREADCRUMBS*/
?>
<div class="row">
    <div class="span5">
        <ul class="breadcrumb">
            <li>
                <a href="<?php echo CController::createUrl('site/index'); ?>">Inicio</a> <span class="divider">/</span>
            </li>
            <li class="active">Reactivos independientes</li>
        </ul>
    </div>
</div>

<?php
    /*TITULO*/
?>
<div class="row"style="margin-bottom:15px;">
    <div class="span5">
        <h1>Reactivos independientes</h1>
    </div>
    <div class="span4">
        <script type="text/javascript">
            $(function(){ $(".btn")
                .popover({
                    offset: 5,
                    placement: 'right'
                });
            });
        </script>
        <a href="<?php echo CController::createUrl('create'); ?>" class="btn btn-inverse" data-content="Permite crear reactivo independiente" rel="popover" data-original-title="Ayuda"><!--13abr12_Cirenia-->
            <i class="icon-plus-sign icon-white"></i> Crear reactivo independiente
        </a>
        <a href="<?php echo CController::createUrl('indexPadre'); ?>" class="btn btn-inverse" data-content="Permite ver los reactivos padres" rel="popover" data-original-title="Ayuda">
            <i class="icon-search icon-white"></i> Ver padres
        </a>
    </div>
</div>



<?php
    /*if(!empty($actividades)) {//valida q haya una o mas actividades*/
    /*INICIA TABLA*/
?>

            <table id="tabla_inicio" cellpadding="0" cellspacing="0" border="0" class="table" style="margin-top:10px">
                <thead>
                    <tr>
                        <th>Id reactivo</th>
                        <th>Base</th>
                        <th>Nivel cognitivo</th>
                        <th>Estado</th>
                        <th>Elaborador</th>
                        <th>Fecha modificación</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th class="centered"><input class="input-mini" type="text" value="Id reactivo"/></th>
                        <th class="centered"><input class="input-mini" type="text" value="Base"/></th>
                        <th class="centered"><input class="input-mini" type="text" value="Nivel cognitivo"/></th>
                        <th class="centered"><input class="input-mini" type="text" value="Estado"/></th>
                        <th class="centered"><input class="input-mini" type="text" value="Elaborador"/></th>
                        <th class="centered"><input class="input-mini" type="text" value="Fecha modificación"/></th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php
                        foreach ($reactivos as $key) {
                            /*print_d ($key->id);
                            die;*/
                    ?>
                            <tr>
                                <td>
                                    <!--13abr12_Cirenia-->
                                    <script type="text/javascript">
                                        $(function(){ $(".icon")
                                            .popover({
                                                offset: 5,
                                                placement: 'right'
                                            });
                                        });
                                    </script>
                                    <?php echo CHtml::encode($key->id) . " "; ?>
                                    <a href="<?php echo CController::createUrl('view', array('id'=>$key->id)); ?>" class="icon" data-content="Permite ver detalle del elemento" rel="popover" data-original-title="Info">
                                        <i class="icon-search"></i>
                                    </a>
                                    <?php /*echo CHtml::link(CHtml::encode($key->id), array('view', 'id'=>$key->id));*/ ?>
                                </td>
                                <td>
                                    <div style="max-height:100px; max-width:500px; overflow:auto; position:relative;"><?php echo $key->planteamiento; ?></div>
                                </td>
                                <td>
                                    <?php echo CHtml::encode($nivelcognitivo[$key->id_nivel_cognitivo]); ?>
                                </td>
                                <td>
                                    <?php echo CHtml::encode($estado[$key->id_estado]); ?>
                                </td>
                                <td>
                                    <?php $usuario= Usuario::model()->findByPk($key->usuario_creador); ?>
                                    <?php echo CHtml::encode($usuario->nombres . ' ' . $usuario->apellido_paterno . ' ' . $usuario->apellido_materno); ?>
                                </td>
                                <td>
                                    <?php
                                        $fecha_edicion = date("d-m-Y", $key->fecha_edicion);
                                        echo CHtml::encode($fecha_edicion); ?>
                                </td>
                            </tr>
                    <?php } ?>
                </tbody>
            </table>

<?php /*foreach($reactivos as $key){ ?>

<div class="modal hide fade" id="reactivo<?php echo $key->id; ?>" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h3>Reactivo independiente # <?php echo $key->id; ?></h3>
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


<?php
    $respuesta = Respuesta::model()->find('id_reactivo=:id_reactivo AND correcta=:correcta', array(
            ':id_reactivo' => $key->id,
            'correcta' => true,
        ));
?>
<div class="modal hide fade" id="respuesta<?php echo $key->id; ?>" style="display: none;">
    <div class="modal-header">
        <a data-dismiss="modal" class="close">×</a>
        <h3>Respuesta correcta de reactivo independiente # <?php echo $key->id; ?></h3>
    </div>
    <div class="modal-body">
        <div class="row" style="height:145px; overflow:auto; position:relative;margin-bottom: 3px;">
            <div class="span5">
                <?php echo  $respuesta->argumento; ?>
            </div>

        </div>
    </div>
    <div class="modal-footer">
        <!--<a class="btn btn-primary" href="#">Save changes</a>-->
        <a data-dismiss="modal" class="btn" href="#">Cerrar</a>
    </div>
</div>

<?php }*/ ?>
