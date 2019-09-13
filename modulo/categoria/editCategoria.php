<script>

$(document).ready(function(e) {

    $('#dataUpdate').on('show.bs.modal', function (event) {

        var button = $(event.relatedTarget); // Botón que activó el modal
        var name = button.data('name'); // Extraer la información de atributos de datos
        var id_categoria = button.data('idcat'); // Extraer la información de atributos de datos
        var detail = button.data('detail');

        var modal = $(this);
        modal.find('.modal-title').text('Editar Categoria: '+name+'');
        modal.find('.modal-body #name').val(name);
        modal.find('.modal-body #idCat').val(id_categoria);
        modal.find('.modal-body #detail').val(detail);

        'use strict';
        // Initialize the jQuery File Upload widget:
        $('#formUpdate').fileupload({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: '../../modulo/categoria/uploads/',
            disableImageResize: /Android(?!.*Chrome)|Opera/.test(window.navigator && navigator.userAgent),
            imageMaxWidth: 1200,
            //imageMaxHeight: 800,
            imageCrop: false, // Force cropped images
            //maxFileSize: 999,
            acceptFileTypes: /(\.|\/)(gif|jpe?g|png)$/i,
            limitMultiFileUploads: 1,
            maxNumberOfFiles: 1
        });

        $('#formUpdate').bind('fileuploadcompleted', function (e, data) {
            $.each(data.files, function (index, file) {
                //console.log('Added file: ' + file.name);
                saveImg('categoria', file.name, file.size);
                //loadImg('categoria', 'auxImg');
            });
        })

        $('#formUpdate').addClass('fileupload-processing');
        $.ajax({
            // Uncomment the following to send cross-domain cookies:
            //xhrFields: {withCredentials: true},
            url: $('#formUpdate').fileupload('option', 'url'),
            dataType: 'json',
            //async:false,
            context: $('#formUpdate')[0]
        }).always(function () {
            $(this).removeClass('fileupload-processing');
        }).done(function (result) {
            loadImages('categoria',id_categoria);
        });

    });

    $('#dataUpdate').on('hidden.bs.modal', function (e) {
        // do something...
        $('#formUpdate').get(0).reset();
        html = '';
        $('#loadImages tbody').html(html);
    });
});

</script>

<form id="formUpdate" action="javascript:updateForm('formUpdate','update.php')" class="form-horizontal" autocomplete="off" >
    <div class="modal fade" id="dataUpdate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel">Editar Categoria</h4>
                </div>
                <div class="modal-body">
                    <div id="datos_ajax_update"></div>

                    <div class="form-group">
                        <label for="fecha" class="control-label col-md-2">Fecha:</label>
                        <div class="col-md-4">
                            <input id="fecha" name="fecha" type="text" class="form-control" value="<?=$fecha;?> <?=$hora;?>" disabled="disabled" />
                        </div>
                        <input id="date" name="date" type="hidden" value="<?=$fecha;?> <?=$hora;?>" />
                        <input id="tabla" name="tabla" type="hidden" value="categoria">
                        <input id="idCat" name="idCat" type="hidden">
                    </div>
                    <div class="form-group">
                        <label for="name" class="control-label col-md-2">Nombre Categoria:</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Categoria" data-validation="required">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="detail" class="control-label col-md-2">Detalle:</label>
                        <div class="col-md-10">
                            <textarea class="form-control" id="detail" name="detail" data-validation="required" placeholder="Detalle" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-12">

                            <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                            <div class="row fileupload-buttonbar">
                                <div class="col-lg-7">
                                    <!-- The fileinput-button span is used to style the file input field as button -->
                                    <span class="btn btn-success btn-sm fileinput-button">
                                        <i class="fa fa-folder-open-o" aria-hidden="true"></i>
                                        <span>Examinar...</span>
                                        <input type="file" id="files" name="files[]">
                                    </span>
                                    <button type="submit" class="btn btn-primary btn-sm start">
                                        <i class="fa fa-upload"></i>
                                        <span>Iniciar Subida</span>
                                    </button>
                                    <button type="reset" class="btn btn-warning btn-sm cancel">
                                        <i class="fa fa-ban"></i>
                                        <span>Cancelar</span>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm delete">
                                        <i class="fa fa-trash-o"></i>
                                        <span>Borrar</span>
                                    </button>
                                    <input type="checkbox" class="toggle">
                                    <!-- The global file processing state -->
                                    <span class="fileupload-process"></span>
                                </div>
                                <!-- The global progress state -->
                                <div class="col-lg-5 fileupload-progress fade">
                                    <!-- The global progress bar -->
                                    <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100">
                                        <div class="progress-bar progress-bar-success" style="width:0%;"></div>
                                    </div>
                                    <!-- The extended global progress state -->
                                    <div class="progress-extended">&nbsp;</div>
                                </div>
                            </div>
                            <div class="file-preview">
                                <div class="file-drop-zone-title">
                                    Arrastre y suelte aquí los archivos …
                                </div>
                                <div class="file-drop-zone">
                                    <!-- The table listing the files available for upload/download -->
                                    <table id="loadImages" role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
                                </div>
                            </div>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="close" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-close" aria-hidden="true"></i>
                        <span>Cancelar</span>
                    </button>
                    <button type="submit" id="save" class="btn btn-success">
                        <i class="fa fa-check" aria-hidden="true"></i>
                        <span>Editar Categoria</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>