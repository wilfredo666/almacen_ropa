//obtener la ruta abosluta
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
host=getAbsolutePath();

/*modal formulario nuevo producto*/
function nuevoProducto(){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"producto/FormRegProducto.php",
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}
/*regitro de nuevo producto - accion*/
function RegProducto(){
    var formData = new FormData($("#form_producto")[0]);

    $.ajax({
        url:host+"producto/RegProducto.php",
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Producto registrado con exito!!!</center>");

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

/*modal eliminar producto*/
function MEliProducto(id){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"producto/F_EliProducto.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*eliminar producto*/
function EliProducto(id){
    var obj="";
    $.ajax({type:"POST",
            url:host+"producto/EliProducto.php?id="+id,
            data:obj,
            success:function(data)
            {
                $("#mensaje_cont_sm").html("<center class='alert alert-success' style='width:350px;'>Producto!!!</center>");
                /*$("#mensaje_cont_sm").html(data);*/

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

/*modal mostrar producto*/
function VerProducto(id){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"producto/VerProducto.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*Modal editar producto*/
function MEditProducto(id){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"producto/FormEditProducto.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*editar producto - funcion*/
function EditProducto(id){
    var formData = new FormData($("#form_edit_producto")[0]);

    $.ajax({
        url:host+"producto/ActProducto.php?id="+id,
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Producto actualizado con exito!!!</center>");


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

/*buscar producto*/
function BuscarProducto(){
    var txt_bus=$("#dat_producto").val();
    var obj={
        txt_bus:txt_bus  
    };
    $.ajax({
        url:host+"producto/lista_buscar_producto.php",
        type:"POST",
        data:obj,
        success:function(data){
            $("#res_bus_producto").html(data);
        }
    })
}

/*informacion del almacen seleccionado en "IngresoProducto" - "traspaso" */
function infoAlmacen(){
    var id_destino=document.getElementById('almacen').value;
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"producto/IngInfoAlmacen.php?id="+id_destino,
            data:obj,
            success:function(data){
                $("#info_almacen").html(data);
            }
        }
    )
}

/*informacion de la tienda seleccionado en "traspaso"*/
function infoTienda(){
    var id_tienda=document.getElementById('tienda').value;
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"tienda/InfoTienda.php?id="+id_tienda,
            data:obj,
            success:function(data){
                $("#info_tienda").html(data);
            }
        }
    )
}


/*registrar salida - funcion*/
function RegSalida(){
    var formData = new FormData($("#form_salida_producto")[0]);

    $.ajax({
        url:host+"producto/RegSalida.php",
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Salida del producto registrado!!!</center>");


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
        url:host+"producto/ConsultaSalida.php",
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

