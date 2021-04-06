//obtener la ruta abosluta
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
host=getAbsolutePath();

/*modal nuevo Cliente*/
function nuevoCliente(){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"clientes/FormRegCliente.php",
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*funcion registrar Cliente*/
function RegCliente(){
    var formData = new FormData($("#form_cliente")[0]);

    $.ajax({
        url:host+"clientes/RegCliente.php",
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Cliente registrado!!!</center>");

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

/*Ver Cliente*/
function VerCliente(id){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"Cliente/verCliente.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*Modal formulario editar producto*/
function MEditCliente(id){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"clientes/FormEditCliente.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*Editar Cliente - funcion*/
function EditCliente(id){
     var formData = new FormData($("#form_edit_cliente")[0]);

    $.ajax({
        url:host+"clientes/EditCliente.php?id="+id,
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Cliente actualizado con exito!!!</center>");
            

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

/*modal eliminar Cliente*/
function MEliCliente(id){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"clientes/FormEliCliente.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*eliminar Cliente - funcion*/
function EliCliente(id){
        var obj="";
    $.ajax({type:"POST",
            url:host+"clientes/EliCliente.php?id="+id,
            data:obj,
            success:function(data)
            {
                $("#mensaje_cont_sm").html("<center class='alert alert-success' style='width:350px;'>El cliente ha sido eliminado!!!</center>");

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

/*buscar Cliente*/
function BuscarCliente(){
        var txt_bus=$("#dat_cliente").val();
    var obj={
        txt_bus:txt_bus  
    };
    $.ajax({
        url:host+"clientes/lista_buscar_cliente.php",
        type:"POST",
        data:obj,
        success:function(data){
            $("#res_bus_cliente").html(data);
        }
    })
}