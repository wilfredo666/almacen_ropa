//obtener la ruta abosluta
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
var host=getAbsolutePath();/*devuleve la ruta de donde se ejecuta el boton*/

/*modal formulario nuevo Almacen*/
function nuevoAlmacen(){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"almacen/FormRegAlmacen.php",
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*regitro de nuevo Almacen - accion*/
function RegAlmacen(){
    var formData = new FormData($("#form_almacen")[0]);

    $.ajax({
        url:host+"almacen/RegAlmacen.php",
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Almacen registrado con exito!!!</center>");

            setTimeout(
                function(){
                    $('#modal_cont').modal('hide');
                },1000);

            setTimeout(
                function(){
                    location.reload();
                },1000);
        }

    }
          )

}

/*modal formulario eliminar Almacen*/
function MEliAlmacen(id){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"almacen/FormEliAlmacen.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*eliminar Almacen - accion*/
function EliAlmacen(id){
    var obj="";
    $.ajax({type:"POST",
            url:host+"almacen/EliAlmacen.php?id="+id,
            data:obj,
            success:function(data)
            {
                $("#mensaje_cont_sm").html("<center class='alert alert-success' style='width:350px;'>El Almacen ha sido eliminado!!!</center>");

                setTimeout(
                    function(){
                        $('#modal_cont_sm').modal('hide');
                    },1000);

                setTimeout(
                    function(){
                        location.reload();
                    },1000);
            }

           }
          )
}

/*Modal editar Almacen*/
function MEditAlmacen(id){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"almacen/FormEditAlmacen.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*editar Almacen - funcion*/
function EditAlmacen(id){
    var formData = new FormData($("#form_edit_almacen")[0]);

    $.ajax({
        url:host+"almacen/EditAlmacen.php?id="+id,
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Almacen actualizado con exito!!!</center>");


            setTimeout(
                function(){
                    $('#modal_cont').modal('hide');
                },1000);

            setTimeout(
                function(){
                    location.reload();
                },1000);
        }

    }
          )
}

/*buscar registro de ingreso en "ListaIngresos.php" - funcion*/
function BuscarIngreso(id_almacen){
    var txt_bus=$("#txt_bus_ingreso").val();
    var obj={
        txt_bus:txt_bus  
    };
    $.ajax({
        url:host+"lista_buscar_registro.php?id_almacen="+id_almacen,
        type:"POST",
        data:obj,
        success:function(data){
            $("#res_bus_ingreso").html(data);
        }
    })
}

/*informacion del Almacen seleccionado en "IngresoAlmacen"*/
function infoAlmacen(){
    var id_Almacen=document.getElementById('Almacen').value;
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"almacen/IngInfoAlmacen.php?id="+id_Almacen,
            data:obj,
            success:function(data){
                $("#info_Almacen").html(data);
            }
        }
    )
}

/*informacion del almacen o cliente (destino) seleccionado en "SalidaAlmacen"*/
function infoDestino(){
    var id_destino=document.getElementById('cod_almacen').value;
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"almacen/SalInfoDestino.php?id="+id_destino,
            data:obj,
            success:function(data){
                $("#info_destino").html(data);
            }
        }
    )
}

/*registrar ingreso de inventario de "IngresoProductoAlmacen" - funcion*/
function RegIngreso(id){
    var formData = new FormData($("#form_ingreso_producto")[0]);

    $.ajax({
        url:host+"RegIngresoProAlmacen.php?id="+id,
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Inventario ingresado con exito!!!</center>");


            setTimeout(
                function(){
                    location.reload();
                },1000);
            document.getElementById('cantidad_pro').value="";
        }

    }
          )
}

/*registrar salida - funcion*/
function RegSalida(){
    var formData = new FormData($("#form_salida_Almacen")[0]);

    $.ajax({
        url:host+"Almacen/RegSalida.php",
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Salida del Almacen registrado!!!</center>");


            setTimeout(
                function(){
                    location.reload();
                },1000);
            document.getElementById('cod_almacen').value="";
            document.getElementById('cantidad_pro').value="";
        }

    }
          )
}

/*calcular el costo total - en formulario salida*/
function CostoTotal(){
    var cantidad=document.getElementById('cantidad_pro').value;
    var costoUnitario=document.getElementById('costo_pro').value;
    var total=parseFloat(cantidad)*parseFloat(costoUnitario);
    document.getElementById('costo_tot_pro').value=total.toFixed(2);

}

/* consular reporte - funcion */
function consultar(){
    var formData = new FormData($("#form_consulta")[0]);

    $.ajax({
        url:host+"Almacen/ConsultaSalida.php",
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#resp_consulta").html(data);

        }

    }
          )
}

/*informacion del producto escrito en "IngresoProductoAlmacen"*/
function infoProducto(){
    var txt_bus=$("#producto").val();
    var obj={txt_bus:txt_bus};
    $.ajax(
        {
            type:"POST",
            url:host+"IngInfoProducto.php",
            data:obj,
            success:function(data){
                $("#info_producto").html(data);
            }
        }
    )
}

/*modal para registro de nuevo ingreso a almacen*/
function nuevoIngreso(id_almacen){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"IngresoProductoAlmacen.php?id_almacen="+id_almacen,
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*modal - formulario para eliminar ingreso*/
function FormEliIngreso(id_ingreso){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"FormEliIngreso.php?id_ingreso="+id_ingreso,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*Eliminar registro de ingreso - funcion*/
function EliIngreso(id_ingreso){
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"EliIngreso.php?id_ingreso="+id_ingreso,
            data:obj,
            success:function(data)
            {
                $("#mensaje_cont_sm").html("<center class='alert alert-success' style='width:350px;'>Ingreso eliminado!!!</center>");
                setTimeout(
                    function(){
                        location.reload();
                    },1000);
            }
        }
    )
}

/*modal - formulario eliminar Traspaso*/
function FormEliTraspaso(id_traspaso){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"FormEliTraspaso.php?id_traspaso="+id_traspaso,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*Eliminar registro de traspaso a otro almacen - funcion*/
function EliTraspaso(id_traspaso){
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"EliTraspaso.php?id_traspaso="+id_traspaso,
            data:obj,
            success:function(data)
            {
                $("#mensaje_cont_sm").html("<center class='alert alert-success' style='width:350px;'>Traspaso eliminado!!!</center>");
                setTimeout(
                    function(){
                        location.reload();
                    },1000);
            }
        }
    )
}

/*modal para registro de nuevo traspaso a almacen*/
function nuevoTraspaso(id_almacen){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"FormRegTrasAlmacen.php?id_almacen="+id_almacen,
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*informacion de los producto que el almacen contiene para modal "formRegTrasAlmacen" - "formRegTrasTeinda" */
function infoProductoTraspaso(id_almacen){
    var txt_bus=$("#producto").val();
    var obj={txt_bus:txt_bus};
    $.ajax(
        {
            type:"POST",
            url:host+"infoProductoTraspaso.php?id_almacen="+id_almacen,
            data:obj,
            success:function(data){
                $("#info_producto").html(data);
            }
        }
    )
}

/*busqueda de producto en "TraspasoAlmacen"*/
function buscarTraspaso(id_almacen){
    var txt_bus=$("#txt_bus_traspaso").val();
    var obj={txt_bus:txt_bus};
    $.ajax(
        {
            type:"POST",
            url:host+"infoBuscarTraspaso.php?id_almacen="+id_almacen,
            data:obj,
            success:function(data){
                $("#res_bus_traspaso").html(data);
            }
        }
    )
}

/*registro de nuevo traspaso a otro almacen - accion*/
function RegTraspaso(id_almacen){
    var formData = new FormData($("#form_traspaso_almacen")[0]);

    $.ajax({
        url:host+"RegTraspasoAlmacen.php?id_almacen="+id_almacen,
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Traspaso registrado!!!</center>");

            setTimeout(
                function(){
                    location.reload();
                },1000);
        }

    }
          )

}

/*modal para registro de nuevo traspaso a tienda*/
function nuevoTraspasoTienda(id_almacen){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"FormRegTrasTienda.php?id_almacen="+id_almacen,
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*registro de nuevo traspaso a tienda - accion*/
function RegTraspasoTienda(id_almacen){
    var formData = new FormData($("#form_traspaso_tienda")[0]);

    $.ajax({
        url:host+"RegTraspasoTienda.php?id_almacen="+id_almacen,
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Traspaso registrado!!!</center>");

            setTimeout(
                function(){
                    location.reload();
                },1000);
        }

    }
          )
}

/* vista detallada de producto - modal */
function VerProducto(producto,id_almacen){
    $('#modal_fs').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"VistaDetalladaPro.php?producto="+producto+"&id_almacen="+id_almacen,
            data:obj,
            success:function(data){
                $("#formulario_fs").html(data);
            }
        }
    )
}