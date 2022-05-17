
    </div>
    <!-- ./wrapper -->
<!-- jQuery 3 -->
<script src="<?php echo base_url();?>assets/template/jquery/jquery.min.js"></script> 
<script src="<?php echo base_url();?>assets/template/jquery/moment.min.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-ui/jquery-ui.js"></script>
<!-- Highcharts -->
<script src="<?php echo base_url();?>assets/template/highcharts/highcharts.js"></script>
<script src="<?php echo base_url();?>assets/template/highcharts/exporting.js"></script>
<script src="<?php echo base_url();?>assets/template/jquery-print/jquery.print.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url();?>assets/template/bootstrap/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="<?php echo base_url();?>assets/template/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- DataTables -->
<script src="<?php echo base_url();?>assets/template/datatables.net/js/jquery.datatables.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables.net-bs/js/datatables.bootstrap.min.js"></script>
<!--- DATATABLES EXPORT  --->
<script src="<?php echo base_url();?>assets/template/datatables-export/js/datatables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.bootstrap.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.colvis.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.foundation.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/buttons.print.min.js"></script>
<script src="<?php echo base_url();?>assets/template/datatables-export/js/datatables.buttons.min.js"></script>
<!-- FastClick -->
<script src="<?php echo base_url();?>assets/template/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url();?>assets/template/dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url();?>assets/template/dist/js/demo.js"></script>
<script src="<?php echo base_url();?>assets/template/sweetalert2/sweetalert.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script src="<?php echo base_url();?>assets/template/alertifyjs/alertify.js"></script>
<script src="<?php echo base_url();?>assets/template/alertifyjs/alertify.min.js"></script>

<script>
$(document).ready(function () {
        var base_url= "<?php echo base_url();?>";

        var year = (new Date).getFullYear();

        datagrafico(base_url,year);

        $("#year").on("change",function(){
            yearselect = $(this).val();
            datagrafico(base_url,yearselect);
        });

        
        $(document).on("click", ".btn-delete", function(e){
         e.preventDefault();
            url = $(this).attr("href");
            swal({
                  title: "Está seguro?",
                  text: "El registro se procedera a desactivar!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Si, desactivar!',
                  cancelButtonText: "No, cancelar!",
                  confirmButtonClass: "btn-danger",
                  confirmButton: 'btn btn-primary',
                  cancelButton: 'btn btn-danger',
                  buttonsStyling: false,
                  closeOnConfirm: true,
                  closeOnCancel: true,
                },
                function(isConfirm){
                    if(isConfirm){
                        $.ajax({
                            url: url,
                            type: "POST",
                            success: function(resp){
                                window.location.href = base_url + resp;
                                swal("Desactivado!", "Su registro ha sido desactivado!", "success");
                            }
                        });
                        } else {  
                          swal("Cancelado" , "Su registro sigue manteniendose activo en el sistema! :)" , "error" );  
                        }
            });
        });

        $(document).on("click", ".btn-activar", function(e){
         e.preventDefault();
            url = $(this).attr("href");
            swal({
                  title: "Está seguro?",
                  text: "El registro se procedera a activar!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: '#DD6B55',
                  confirmButtonText: 'Si, activar!',
                  cancelButtonText: "No, cancelar!",
                  confirmButtonClass: "btn-danger",
                  confirmButton: 'btn btn-primary',
                  cancelButton: 'btn btn-danger',
                  buttonsStyling: false,
                  closeOnConfirm: true,
                  closeOnCancel: true,
                },
                function(isConfirm){
                    if(isConfirm){
                        $.ajax({
                            url: url,
                            type: "POST",
                            success: function(resp){
                                window.location.href = base_url + resp;
                                swal("Activado!", "Su registro fue activado!", "success");
                            }
                        });
                        } else {  
                          swal("Cancelado" , "Su registro sigue manteniendose desactivado en el sistema! :)" , "error" );  
                        }
            });
        });
    
    

        // MODALES REPORTADAS
        $(document).on("click",".btn-view-asignar",function(){
            valor_id = $(this).val();
            $.ajax({
                url: base_url + "mantenimiento/reportadas/view",
                type:"POST",
                dataType:"html",
                data:{id_solicitud:valor_id},
                success:function(data){
                    $("#modal-default .modal-body").html(data);
                    btn_reasignar(base_url);
                }
            });
        });

        $(document).on("click",".btn-view-rcierre",function(){
            valor_id = $(this).val();
            $.ajax({
                url: base_url + "mantenimiento/reportadas/view2",
                type:"POST",
                dataType:"html",
                data:{id_solicitud:valor_id},
                success:function(data){
                    $("#modal-rcierre .modal-body").html(data);
                    btn_rcierre(base_url);
                }
            });
        });
    
    //MODALES - ASIGNADAS
        $(document).on("click",".btn-view-adiagnostico",function(){
            id_asignacion = $(this).attr('id_asignacion');
            id_solicitud = $(this).attr('id_solicitud');
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
            }
            $.ajax({
                url: base_url + "mantenimiento/asignadas/view",
                type:"POST",
                dataType:"html",
                data:parametros,
                success:function(data){
                    $("#modal-adiagnostico .modal-body").html(data);
                    btn_adiagnostico(base_url);
                }
            });
        });

        $(document).on("click",".btn-view-atecnico",function(){
            id_asignacion = $(this).attr('id_asignacion');
            id_solicitud = $(this).attr('id_solicitud');
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
            }
            $.ajax({
                url: base_url + "mantenimiento/asignadas/view2",
                type:"POST",
                dataType:"html",
                data:parametros,
                success:function(data){
                    $("#modal-atecnico .modal-body").html(data);
                    btn_atecnico(base_url);
                }
            });
        });

        $(document).on("click",".btn-view-acierre",function(){
            id_asignacion = $(this).attr('id_asignacion');
            id_solicitud = $(this).attr('id_solicitud');
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
            }
            $.ajax({
                url: base_url + "mantenimiento/asignadas/view3",
                type:"POST",
                dataType:"html",
                data:parametros,
                success:function(data){
                    $("#modal-acierre .modal-body").html(data);
                    btn_acierre(base_url);
                }
            });
        });

        //MODALES - DIAGNOSTICO
        $(document).on("click",".btn-view-dresolver",function(){
            id_asignacion = $(this).attr('id_asignacion');
            id_solicitud = $(this).attr('id_solicitud');
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
            }
            $.ajax({
                url: base_url + "mantenimiento/diagnosticadas/view",
                type:"POST",
                dataType:"html",
                data:parametros,
                success:function(data){
                    $("#modal-dresolver .modal-body").html(data);
                    btn_dresolver(base_url);
                }
            });
        });

        $(document).on("click",".btn-view-deditar",function(){
            id_asignacion = $(this).attr('id_asignacion');
            id_solicitud = $(this).attr('id_solicitud');
            id_diagnostico = $(this).attr('id_diagnostico');

            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
                id_diagnostico:id_diagnostico,
            }
            $.ajax({
                url: base_url + "mantenimiento/diagnosticadas/view2",
                type:"POST",
                dataType:"html",
                data:parametros,
                success:function(data){
                    $("#modal-deditar .modal-body").html(data);
                    btn_deditar(base_url);
                }
            });
        });

        $(document).on("click",".btn-view-dcierre",function(){
            id_asignacion = $(this).attr('id_asignacion');
            id_solicitud = $(this).attr('id_solicitud');
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
            }
            $.ajax({
                url: base_url + "mantenimiento/diagnosticadas/view3",
                type:"POST",
                dataType:"html",
                data:parametros,
                success:function(data){
                    $("#modal-dcierre .modal-body").html(data);
                    btn_dcierre(base_url);
                }
            });
        });

         //MODALES - RESOLUTIVO
         $(document).on("click",".btn-view-rdetalles",function(){
            id_asignacion = $(this).attr('id_asignacion');
            id_solicitud = $(this).attr('id_solicitud');
            id_resolutivo = $(this).attr('id_resolutivo');
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
                id_resolutivo:id_resolutivo,
            }
            $.ajax({
                url: base_url + "mantenimiento/resueltas/view",
                type:"POST",
                dataType:"html",
                data:parametros,
                success:function(data){
                    $("#modal-rdetalles .modal-body").html(data);
                }
            });
        });

        $(document).on("click",".btn-view-reditar",function(){
            id_asignacion = $(this).attr('id_asignacion');
            id_solicitud = $(this).attr('id_solicitud');
            id_resolutivo = $(this).attr('id_resolutivo');

            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
                id_resolutivo:id_resolutivo,
            }
            $.ajax({
                url: base_url + "mantenimiento/resueltas/view2",
                type:"POST",
                dataType:"html",
                data:parametros,
                success:function(data){
                    $("#modal-reditar .modal-body").html(data);
                    btn_reditar(base_url);
                }
            });
        });

        $(document).on("click",".btn-view-recierre",function(){
            id_asignacion = $(this).attr('id_asignacion');
            id_solicitud = $(this).attr('id_solicitud');
            id_resolutivo = $(this).attr('id_resolutivo');
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
                id_resolutivo:id_resolutivo,
            }
            $.ajax({
                url: base_url + "mantenimiento/resueltas/view3",
                type:"POST",
                dataType:"html",
                data:parametros,
                success:function(data){
                    $("#modal-recierre .modal-body").html(data);
                    btn_recierre(base_url);
                }
            });
        });

        //MODALES - CERRADAS
        $(document).on("click",".btn-view-cdetalle",function(){
            id_solicitud = $(this).attr('id_solicitud');
            parametros={
                id_solicitud:id_solicitud,
            }
            $.ajax({
                url: base_url + "mantenimiento/cerradas/view",
                type:"POST",
                dataType:"html",
                data:parametros,
                success:function(data){
                    $("#modal-cdetalle .modal-body").html(data);
                }
            });
        });


        $('#example1').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados en su busqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });

        $('.example1').DataTable({
            "language": {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados en su busqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });

         $('#example50').DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false,
            "searching": false,
            "ordering": false,
            "info":     false
        });

         $('#example60').DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false,
            "searching": false,
            "ordering": false,
            "info":     false
        });

         $('#example70').DataTable({
            "scrollY": "200px",
            "scrollCollapse": true,
            "paging": false,
            "searching": false,
            "ordering": false,
            "info":     false
        });


        $('#example5').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: "Reporte de Reservaciones",
                    text: '<i class="fa fa-file-excel-o" ><span style="font-family:verdana;"> Exportar Excel</span></i>',
                    className: 'btn btn-success',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6 ,7 ,8,9]
                    }
                },
                {
                    extend: 'pdfHtml5',
                    title: "Reporte de Reservaciones",
                    text: '<i class="fa fa-file-pdf-o"><span style="font-family:verdana;"> Exportar PDF</span></i>',
                    className: 'btn btn-danger',
                    orientation: 'landscape',
                    pageSize: 'LEGAL',
                    exportOptions: {
                    columns: [ 0, 1, 2, 3, 4, 5, 6 ,7 ,8,9]
                    }
                    
                }
            ],
            language: {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados en su busqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });

        $('#psoporte').DataTable( {
            "searching": false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: "Reporte de Porcentaje de soportes atendidos dentro de las 24 horas",
                    text: '<i class="fa fa-file-excel-o"><span style="font-family:verdana;"> Exportar Excel</span></i>',
                    className: 'btn btn-success btn-sm',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
            ],
            language: {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados en su busqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });

        $('#natendidas24').DataTable( {
            "searching": false,
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: "Reporte de número de atenciones por tipo de soporte",
                    text: '<i class="fa fa-file-excel-o"><span style="font-family:verdana;"> Exportar Excel</span></i>',
                    className: 'btn btn-success btn-sm',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3]
                    }
                },
            ],
            language: {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados en su busqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });
        
        $('#example6').DataTable( {
            dom: 'Bfrtip',
            buttons: [
                {
                    extend: 'excelHtml5',
                    title: "Reporte de Solicitudes Atendidas",
                    text: '<i class="fa fa-file-excel-o"><span style="font-family:verdana;"> Exportar Excel</span></i>',
                    className: 'btn btn-success btn-sm',
                    exportOptions: {
                        columns: [ 0, 1, 2, 3, 4, 5, 6 ,7 ,8, 9]
                    }
                },
            ],
            language: {
                "lengthMenu": "Mostrar _MENU_ registros por pagina",
                "zeroRecords": "No se encontraron resultados en su busqueda",
                "searchPlaceholder": "Buscar registros",
                "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
                "infoEmpty": "No existen registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "search": "Buscar:",
                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
            }
        });

        $('.sidebar-menu').tree();
        
});

    var btn_reasignar = function (base_url) {
        $('body').off('click', '#mrasignar');
        $('body').on('click', '#mrasignar', function (e) {  
            var id_solicitud = $('#id_solicitud').val();
                var id_tecnico = $('#id_tecnico').val();
                parametros={
                    id_solicitud:id_solicitud,
                    id_tecnico:id_tecnico 
                };
                $.ajax({
                    url: base_url + "mantenimiento/reportadas/rasignar",
                    type:"POST",
                    dataType:"json",
                    data:parametros,
                    beforeSend: function () {
                    $("#mrasignar").attr('disabled', true);
                    },
                    success:function(data){     
                        if(data.estado==false){
                            $("#mrasignar").attr('disabled', false); 
                            alertify.error(data.error);
                        }else{
                            alertify.success(data.success);
                            $('#modal-default').modal('hide');
                            //$("#mrasignar").attr('disabled', false); 
                            location.href=data.url;
                        }
                    }
                }); 
        
        
        });
    }    

    var btn_rcierre=function(base_url){
        $('body').off('click', '#mrcierre');
        $('body').on('click', '#mrcierre', function (e) {  
                var id_solicitud = $('#id_solicitud').val();
                var sl_observacion = $('#sl_observacion').val();
                parametros={
                    id_solicitud:id_solicitud,
                    sl_observacion:sl_observacion 
                };
                $.ajax({
                    url: base_url + "mantenimiento/reportadas/rcierre",
                    type:"POST",
                    dataType:"json",
                    data:parametros,
                    beforeSend: function () {
                    $("#mrasignar").attr('disabled', true);
                    },
                    success:function(data){                
                        if(data.estado==false){
                            $("#mrasignar").attr('disabled', false); 
                            alertify.error(data.error);
                        }else{
                            alertify.success(data.success);
                            $('#modal-rcierre').modal('hide');
                            location.href=data.url;
                        } 
                    }
                });       
        });
    }

    //BOTONES ASIGNADAS
    var btn_adiagnostico=function(base_url){
        $('body').off('click', '#btnadiagnostico');
        $('body').on('click', '#btnadiagnostico', function (e) { 
            var id_asignacion = $('#id_asignacion').val();
            var id_solicitud = $('#id_solicitud').val();
            var dg_descripcion = $('#dg_descripcion').val();
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
                dg_descripcion:dg_descripcion 
            };
            $.ajax({
                url: base_url + "mantenimiento/asignadas/adiagnosticar",
                type:"POST",
                dataType:"json",
                data:parametros,
                beforeSend: function () {
                $("#btnadiagnostico").attr('disabled', true);
                },
                success:function(data){                
                    if(data.estado==false){
                        $("#btnadiagnostico").attr('disabled', true);
                        alertify.error(data.error);
                    }else{
                        alertify.success(data.success);
                        $('#modal-adiagnostico').modal('hide');
                        location.href=data.url;
                    }
                }
            });       
        }); 
    }

    var btn_atecnico=function(base_url){
        $('body').off('click', '#btnatecnico');
        $('body').on('click', '#btnatecnico', function (e) { 
            var id_solicitud = $("#idsolicitud").val();
            var id_asignacion = $('#id_asignacion').val();
            var id_tecnico = $('#id_tecnico').val();
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
                id_tecnico:id_tecnico 
            };
            $.ajax({
                url: base_url + "mantenimiento/asignadas/artecnico",
                type:"POST",
                dataType:"json",
                data:parametros,
                beforeSend: function () {
                $("#btnatecnico").attr('disabled', true);
                },
                success:function(data){                
                    if(data.estado==false){
                        $("#btnatecnico").attr('disabled', false);
                        alertify.error(data.error);
                    }else{
                        alertify.success(data.success);
                        $('#modal-atecnico').modal('hide');
                        location.href=data.url;
                    }
                }
            });       
        }); 
    }

    var btn_acierre=function(base_url){
        $('body').off('click', '#btnacierre');
        $('body').on('click', '#btnacierre', function (e) { 
            var id_solicitud = $('#id_solicitud').val();
            var sl_observacion = $('#sl_observacion').val();
            parametros={
                id_solicitud:id_solicitud,
                sl_observacion:sl_observacion 
            };
            $.ajax({
                url: base_url + "mantenimiento/asignadas/acierre",
                type:"POST",
                dataType:"json",
                data:parametros,
                beforeSend: function () {
                $("#btnacierre").attr('disabled', true);
                },
                success:function(data){                
                    if(data.estado==false){
                        $("#btnacierre").attr('disabled', false);
                        alertify.error(data.error);
                    }else{
                        alertify.success(data.success);
                        $('#modal-acierre').modal('hide');
                        location.href=data.url;
                    }
                }
            });       
        });
    }

     //BOTONES DIAGNOSTICO
     var btn_dresolver=function(base_url){
        $('body').off('click', '#btndresolver');
        $('body').on('click', '#btndresolver', function (e) { 
            var id_asignacion = $('#id_asignacion').val();
            var id_solicitud = $('#id_solicitud').val();
            var rs_descripcion = $('#rs_descripcion').val();

            var tipos_soporte_id_tipo_soporte = $('#tipos_soporte_id_tipo_soporte').val();

            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
                rs_descripcion:rs_descripcion,
                tipos_soporte_id_tipo_soporte:tipos_soporte_id_tipo_soporte,
            };
            $.ajax({
                url: base_url + "mantenimiento/diagnosticadas/dresolver",
                type:"POST",
                dataType:"json",
                data:parametros,
                beforeSend: function () {
                $("#btndresolver").attr('disabled', true);
                },
                success:function(data){                
                    if(data.estado==false){
                        $("#btndresolver").attr('disabled', false);
                        alertify.error(data.error);
                    }else{
                        alertify.success(data.success);
                        $('#modal-dresolver').modal('hide');
                        location.href=data.url;
                    }
                }
            });       
        }); 
    }

    var btn_deditar=function(base_url){
        $('body').off('click', '#btndeditar');
        $('body').on('click', '#btndeditar', function (e) { 
            var id_asignacion = $('#id_asignacion').val();
            var id_solicitud = $('#id_solicitud').val();
            var id_diagnostico = $('#id_diagnostico').val();
            var dg_descripcion = $('#dg_descripcion').val();
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
                id_diagnostico:id_diagnostico,
                dg_descripcion:dg_descripcion, 
            };
            $.ajax({
                url: base_url + "mantenimiento/diagnosticadas/deditar",
                type:"POST",
                dataType:"json",
                data:parametros,
                beforeSend: function () {
                $("#btndeditar").attr('disabled', true);
                },
                success:function(data){                
                    if(data.estado==false){
                        $("#btndeditar").attr('disabled', false);
                        alertify.error(data.error);
                    }else{
                        alertify.success(data.success);
                        $('#modal-deditar').modal('hide');
                        location.href=data.url;
                    }
                }
            });       
        }); 
    }

    var btn_dcierre=function(base_url){
        $('body').off('click', '#btndcierre');
        $('body').on('click', '#btndcierre', function (e) {
            var id_solicitud = $('#id_solicitud').val();
            var sl_observacion = $('#sl_observacion').val();
            parametros={
                id_solicitud:id_solicitud,
                sl_observacion:sl_observacion 
            };
            $.ajax({
                url: base_url + "mantenimiento/diagnosticadas/dcierre",
                type:"POST",
                dataType:"json",
                data:parametros,
                beforeSend: function () {
                $("#btndcierre").attr('disabled', true);
                },
                success:function(data){                
                    if(data.estado==false){
                        $("#btndcierre").attr('disabled', false);
                        alertify.error(data.error);
                    }else{
                        alertify.success(data.success);
                        $('#modal-dcierre').modal('hide');
                        location.href=data.url;
                    }
                }
            });       
        });
    }


    //BOTONES RESOLUTIVO
    var btn_reditar=function(base_url){
        $('body').off('click', '#btnreditar');
        $('body').on('click', '#btnreditar', function (e) {
            var id_asignacion = $('#id_asignacion').val();
            var id_solicitud = $('#id_solicitud').val();
            var id_resolutivo = $('#id_resolutivo').val();
            var rs_descripcion = $('#rs_descripcion').val();
            parametros={
                id_asignacion:id_asignacion,
                id_solicitud:id_solicitud,
                id_resolutivo:id_resolutivo,
                rs_descripcion:rs_descripcion, 
            };
            $.ajax({
                url: base_url + "mantenimiento/resueltas/reditar",
                type:"POST",
                dataType:"json",
                data:parametros,
                beforeSend: function () {
                $("#btnreditar").attr('disabled', true);
                },
                success:function(data){                
                    if(data.estado==false){
                        $("#btnreditar").attr('disabled', false);
                        alertify.error(data.error);
                    }else{
                        alertify.success(data.success);
                        $('#modal-reditar').modal('hide');
                        location.href=data.url;
                    }
                }
            });       
        }); 
    }

    var btn_recierre=function(base_url){
        $('body').off('click', '#btnrecierre');
        $('body').on('click', '#btnrecierre', function (e) {
            var id_solicitud = $('#id_solicitud').val();
            var sl_observacion = $('#sl_observacion').val();
            
            var ts_nombre = $('#ts_nombre').val();
            var sl_descripcion = $('#sl_descripcion').val();
            var sl_fecha_proceso = $('#sl_fecha_proceso').val();
            var cantidad = $('#cantidad').val();
            var rs_fecha_resolutivo = $('#rs_fecha_resolutivo').val();

            var tc_dni = $('#tc_dni').val();


            parametros={
                id_solicitud:id_solicitud,
                sl_observacion:sl_observacion,
                ts_nombre:ts_nombre,
                sl_descripcion:sl_descripcion,
                sl_fecha_proceso:sl_fecha_proceso,
                cantidad:cantidad,
                rs_fecha_resolutivo:rs_fecha_resolutivo,
                tc_dni:tc_dni,
            };


            $.ajax({
                url: base_url + "mantenimiento/resueltas/recierre",
                type:"POST",
                dataType:"json",
                data:parametros,
                beforeSend: function () {
                $("#btnrecierre").attr('disabled', true);
                },
                success:function(data){                
                    if(data.estado==false){
                        $("#btnrecierre").attr('disabled', false);
                        alertify.error(data.error);
                    }else{
                        alertify.success(data.success);
                        $('#modal-recierre').modal('hide');
                        location.href=data.url;
                    }
                }
            });       
        });
    }

    function soloNumeros(e)
    {
    	var key = window.Event ? e.which : e.keyCode
    	return ((key >= 48 && key <= 57) || (key==8))
    }

    function soloNumeros(e)
    {
    	var key = window.Event ? e.which : e.keyCode
    	return ((key >= 48 && key <= 57) || (key==8))
    }


    function soloLetras(e){
           key = e.keyCode || e.which;
           tecla = String.fromCharCode(key).toLowerCase();
           letras = " áéíóúabcdefghijklmnñopqrstuvwxyz-";
           especiales = "8-37-39-46";

           tecla_especial = false
           for(var i in especiales){
                if(key == especiales[i]){
                    tecla_especial = true;
                    break;
                }
            }
            if(letras.indexOf(tecla)==-1 && !tecla_especial){
                return false;
            }
        }

// TRAER DATA
function datagrafico(base_url,year){
    namesMonth= ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Setiembre","Octubre","Noviembre","Diciembre"];
    $.ajax({
        url: base_url + "reportes/graficos/getData",
        type:"POST",
        data:{year: year},
        dataType:"json",
        success:function(data){
            var meses = new Array();
            var montos = new Array();
            $.each(data,function(key, value){
                meses.push(namesMonth[value.mes - 1]);
                valor = Number(value.monto);
                montos.push(valor);
            });
            graficar(meses,montos,year);
        }
    });
}



// MESES -AÑOS 
function graficar(meses,montos,year){
    Highcharts.chart('grafico', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Solicitudes Atendidas'
    },
    subtitle: {
        text: 'Año:' + year
    },
    xAxis: {
        categories: meses,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Registros Acumulados'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:12px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">Atendidas: </td>' +
            '<td style="padding:0"><b>{point.y:.0f}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        },
        series:{
            dataLabels:{
                enabled:true,
                formatter:function(){
                   return Highcharts.numberFormat(this.y,0);
                }

            }
        }
    },
    series: [{
        name: 'Meses',
        data: montos

    }]
});
}


</script>
</body>
</html>
