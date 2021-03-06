//obtener la ruta abosluta
function getAbsolutePath() {
    var loc = window.location;
    var pathName = loc.pathname.substring(0, loc.pathname.lastIndexOf('/') + 1);
    return loc.href.substring(0, loc.href.length - ((loc.pathname + loc.search + loc.hash).length - pathName.length));
}
host=getAbsolutePath();

/*modal-formulario nuevo usuario*/
function MnuevoUsuario(){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"usuario/FormRegUsuario.php",
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*funcion registrar usuario*/
function RegUsuario(){
    var formData = new FormData($("#form_usuario")[0]);
    var pass = document.getElementById('pass').value;
    var pass2 = document.getElementById('pass2').value;
    if(pass==pass2){
        $.ajax({
            url:host+"usuario/RegUsuario.php",
            type:"POST",
            data:formData,
            cache:false,
            contentType:false,
            processData:false,
            success:function(data)
            {
                $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Nuevo usuario registrado!!!</center>");

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
    }else{
        alert("Los datos en los campos de contraseña no coinciden!!");
    }

}

/*Ver usuario*/
function VerUsuario(id){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"usuario/verUsuario.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*Modal formulario editar usuario*/
function MEditUsuario(id){
    $('#modal_cont').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"usuario/FormEditUsuario.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario").html(data);
            }
        }
    )
}

/*Editar usuario - funcion*/
function EditUsuario(id){
    var formData = new FormData($("#form_edit_usuario")[0]);

    $.ajax({
        url:host+"usuario/EditUsuario.php?id="+id,
        type:"POST",
        data:formData,
        cache:false,
        contentType:false,
        processData:false,
        success:function(data)
        {
            $("#mensaje_cont").html("<center class='alert alert-success' style='width:350px;'>Usuario actualizado con exito!!!</center>");


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

/*modal eliminar usuario*/
function MEliUsuario(id){
    $('#modal_cont_sm').modal('show');
    var obj="";
    $.ajax(
        {
            type:"POST",
            url:host+"usuario/FormEliProducto.php?id="+id,
            data:obj,
            success:function(data){
                $("#formulario_sm").html(data);
            }
        }
    )
}

/*eliminar usuario - funcion*/
function EliUsuario(id){
        var obj="";
    $.ajax({type:"POST",
            url:host+"usuario/EliUsuario.php?id="+id,
            data:obj,
            success:function(data)
            {
                /*$("#mensaje_cont_sm").html("<center class='alert alert-success' style='width:350px;'>El usuario ha sido eliminado!!!</center>");*/
$("#mensaje_cont_sm").html(data);
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