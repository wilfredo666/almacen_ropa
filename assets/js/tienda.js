//obtener la ruta abosluta
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
host=getAbsolutePath();

/*modal formulario nueva tienda*/
function nuevaTienda(){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"tienda/FormRegTienda.php",
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*regitro de nueva tienda - accion*/
function RegTienda(){
    var formData = new FormData($("#form_tienda")[0]);

    $.ajax({
        url:host+"tienda/Regtienda.php",
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Tienda registrada con exito!!!</center>");

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

/*modal para eliminar tienda*/
function MEliTienda(id){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"tienda/FormEliTienda.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*eliminar tienda - accion*/
function EliTienda(id){
    var obj="";
    $.ajax({type:"POST",
            url:host+"tienda/EliTienda.php?id="+id,
            data:obj,
            success:function(data)
            {
                $("#mensaje_cont_sm").html("<center class='alert alert-success' style='width:350px;'>La tienda ha sido eliminada!!!</center>");

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

/*modal mostrar tienda*/
function Vertienda(id){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"tienda/Vertienda.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*Modal editar tienda*/
function MEditTienda(id){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"tienda/FormEditTienda.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*editar tienda - funcion*/
function EditTienda(id){
    var formData = new FormData($("#form_edit_tienda")[0]);

    $.ajax({
        url:host+"tienda/EditTienda.php?id="+id,
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Datos de tienda actualizados!!!</center>");


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

/*buscar tienda*/
function Buscartienda(){
    var txt_bus=$("#dat_tienda").val();
    var obj={
        txt_bus:txt_bus  
    };
    $.ajax({
        url:host+"tienda/lista_buscar_tienda.php",
        type:"POST",
        data:obj,
        success:function(data){
            $("#res_bus_tienda").html(data);
        }
    })
}

/*informacion del tienda seleccionado en "Ingresotienda"*/
function infotienda(){
    var id_tienda=document.getElementById('tienda').value;
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"tienda/IngInfotienda.php?id="+id_tienda,
            data:obj,
            success:function(data){
                $("#info_tienda").html(data);
            }
        }
    )
}

/*informacion del almacen o cliente (destino) seleccionado en "Salidatienda"*/
function infoDestino(){
    var id_destino=document.getElementById('cod_almacen').value;
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"tienda/SalInfoDestino.php?id="+id_destino,
            data:obj,
            success:function(data){
                $("#info_destino").html(data);
            }
        }
    )
}

/*registrar salida - funcion*/
function RegSalida(){
    var formData = new FormData($("#form_salida_tienda")[0]);

    $.ajax({
        url:host+"tienda/RegSalida.php",
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Salida del tienda registrado!!!</center>");


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
        url:host+"tienda/ConsultaSalida.php",
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

/* formulario para agregar inventario a tienda*/
function nuevoIngInventario(id_tienda){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"FormIngProTienda.php?id_tienda="+id_tienda,
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*registrar ingreso de inventario a tienda - funcion*/
function RegIngreso(id_tienda){
    var formData = new FormData($("#form_ingreso_producto")[0]);

    $.ajax({
        url:host+"RegIngProTienda.php?id_tienda="+id_tienda,
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Producto ingresado con exito!!!</center>");


            setTimeout(
                function(){
                    location.reload();
                },1000);

        }

    }
          )
}

/*informacion del producto escrito en "IngresoProductoTienda"*/
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