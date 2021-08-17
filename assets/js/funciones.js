
let tblUsuarios, tblProveedores, tblContribuyentes, tblDepartamentos, tblUnidades,
tblPuestos, tblTipoapoyo, tblTipoingreso, tblEmpleados;
//---------------------------------I N I C I O-----------------------------------------------------

document.addEventListener("DOMContentLoaded", function(){

    tblUsuarios = $('#tblUsuarios').DataTable({
        ajax: {
            url: base_url + "Usuarios/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'idsuario'
            },
            {
                'data' : 'usuario'
            },  
            {
                'data' : 'nombre'
            },
            {
                'data' : 'estatus'
            },
            {
                'data' : 'acciones'
            }
        ]
    });
    //---- AQUI TERMINA LA TABLA DE USUARIOS

    tblProveedores = $('#tblProveedores').DataTable({
        ajax: {
            url: base_url + "Proveedores/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'idproveedor'
            },
            {
                'data' : 'nombre'
            },  
            {
                'data' : 'rfc'
            },  
            {
                'data' : 'telefono'
            },  
            {
                'data' : 'direccion'
            },
            {
                'data' : 'estatus'
            },
            {
                'data' : 'acciones'
            }
        ]
    });
    //---- AQUI TERMINA LA TABLA DE PROVEEDORES

    tblContribuyentes = $('#tblContribuyentes').DataTable({
        ajax: {
            url: base_url + "Contribuyentes/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'idcontribuyente'
            },
            {
                'data' : 'nombre'
            },  
            {
                'data' : 'rfc'
            },  
            {
                'data' : 'telefono'
            },  
            {
                'data' : 'domicilio'
            },
            {
                'data' : 'estatus'
            },
            {
                'data' : 'acciones'
            }
        ]
    });
    //---- AQUI TERMINA LA TABLA DE TIPO DE CONTRIBUYENTES

    tblDepartamentos = $('#tblDepartamentos').DataTable({
        ajax: {
            url: base_url + "Departamentos/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'iddepartamento'
            },
            {
                'data' : 'nombre'
            },
            {
                'data' : 'estatus'
            },
            {
                'data' : 'acciones'
            }
        ]
    });
    //---- AQUI TERMINA LA TABLA DE TIPO DE DEPARTAMENTOS

    tblUnidades = $('#tblUnidades').DataTable({
        ajax: {
            url: base_url + "Unidades/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'idunidad'
            },
            {
                'data' : 'nombre'
            },  
            {
                'data' : 'clave'
            },
            {
                'data' : 'descripcion'
            },
            {
                'data' : 'estatus'
            },
            {
                'data' : 'acciones'
            }
        ]
    });
    //---- AQUI TERMINA LA TABLA UNIDADES

    //-------------------------------------------------
     /*-----------------Puestos-------------------*/
     tblPuestos = $('#tblPuestos').DataTable({
        ajax: {
            url: base_url + "Puestos/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'idpuesto'
            },
            {
                'data' : 'nombre'
            },
            {
                'data' : 'estatus'
            },
            {
                'data' : 'acciones'
            }
        ]
    });
/*^^^^^^^^^^^^^^^^^Tipos de apoyo ^^^^^^^^^^^^^^^^^^*/
    tblTipoapoyo = $('#tblTipoapoyo').DataTable({
        ajax: {
            url: base_url + "Tipoapoyos/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'idtipoapoyo'
            },
            {
                'data' : 'nombre'
            },
            {
                'data' : 'estatus'
            },
            {
                'data' : 'acciones'
            }
        ]
    });

    /*^^^^^^^^^^^^^^^^^Tipos de ingreso ^^^^^^^^^^^^^^^^^^*/
    tblTipoingreso = $('#tblTipoingreso').DataTable({
        ajax: {
            url: base_url + "Tipoingresos/listar",
            dataSrc: ''
        },
        columns: [
            {
                'data' : 'idtipoingreso'
            },
            {
                'data' : 'nombre'
            },
            {
                'data' : 'estatus'
            },
            {
                'data' : 'acciones'
            }
        ]
    });
/*-----------------empleados-------------------*/

tblEmpleados = $('#tblEmpleados').DataTable({
    ajax: {
        url: base_url + "Empleados/listar",
        dataSrc: ''
    },
    columns: [
        {
            'data' : 'idempleado'
        },
        {
            'data' : 'iddepartamento'
        },
        {
            'data' : 'idpuesto'
        },
        {
            'data' : 'nombre'
        },
        {
            'data' : 'apellidopaterno'
        },
        {
            'data' : 'apellidomaterno'
        },
        {
            'data' : 'rfc'
        },
        {
            'data' : 'curp'
        },
        {
            'data' : 'correo'
        },
        {
            'data' : 'telefono'
        },
        {
            'data' : 'estatus'
        },
        {
            'data' : 'acciones'
        }
    ]
});


})

//---------------------------------I N I C I O-----------------------------------------------------
//JAVA SCRIPT PARA USUARIOS
//funcion de Login


//Para abrir modal
function frmUsuario(){
    document.getElementById("title").innerHTML= "Nuevo Usuario";
    document.getElementById("btnAccion").innerHTML= "Registrar";
    document.getElementById("passwords").classList.remove("d-none");
    document.getElementById("frmUsuario").reset();
    $("#nuevo_usuario").modal("show");
    document.getElementById("idsuario").value ="";
}

//validar datos del modal
function registrarUser(e){

    e.preventDefault();
    const usuario = document.getElementById("usuario");
    const nombre = document.getElementById("nombre");
    const password = document.getElementById("password");
    const confirmar = document.getElementById("confirmar");

    if(usuario.value == "" || nombre.value=="" )
    {
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url= base_url + "Usuarios/registrar";
        const frm= document.getElementById("frmUsuario");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status ==200){
                const res = JSON.parse(this.responseText);
                if(res =="si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Usuario registrado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $("#nuevo_usuario").modal("hide");
                      tblUsuarios.ajax.reload();
                }else if (res =="modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Usuario modificado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $("#nuevo_usuario").modal("hide");
                      tblUsuarios.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
    

}

//para editar un registro
function btnEditarUser(idsuario)
{
    document.getElementById("title").innerHTML= "Actualizar usuario";
    document.getElementById("btnAccion").innerHTML= "Modificar";
    const url= base_url + "Usuarios/editar/"+idsuario;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
           const res = JSON.parse(this.responseText);
           document.getElementById("idsuario").value = res.idsuario;
           document.getElementById("usuario").value = res.usuario;
           document.getElementById("nombre").value = res.nombre;
           document.getElementById("passwords").classList.add("d-none");
           $("#nuevo_usuario").modal("show");
        }
    }
    
}

//para eliminar
function btnEliminarUser(idsuario){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El usuario no se eliminara de forma permanente, solo cambiará el estado de inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Usuarios/eliminar/"+idsuario;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Usuario eliminado con éxito.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

function btnReingresarUser(idsuario){
    Swal.fire({
        title: 'Esta seguro de Reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Usuarios/reingresar/"+idsuario;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Usuario reingresado con éxito.',
                            'success'
                        )
                        tblUsuarios.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}
//---------------------------------F I N-----------------------------------------------------

//---------------------------------I N I C I O-----------------------------------------------------
//JAVA SCRIPT PARA PROVEEDORES
//Para abrir modal
function frmProveedor(){
    document.getElementById("title").innerHTML= "Nuevo Proveedor";
    document.getElementById("btnAccion").innerHTML= "Registrar";
    document.getElementById("frmProveedor").reset();
    $("#nuevo_proveedor").modal("show");
    document.getElementById("idproveedor").value ="";
}

//validar datos del modal
function registrarPro(e){

    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const rfc = document.getElementById("rfc");
    const telefono = document.getElementById("telefono");
    const direccion = document.getElementById("direccion");

    if(nombre.value == "" || rfc.value=="" || telefono.value == "" || direccion.value == "")
    {
        Swal.fire({
            position: 'center', 
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url= base_url + "Proveedores/registrar";
        const frm= document.getElementById("frmProveedor");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status ==200){
                const res = JSON.parse(this.responseText);
                if(res =="si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Proveedor registrado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $("#nuevo_proveedor").modal("hide");
                      tblProveedores.ajax.reload();
                }else if (res =="modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Proveedor modificado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $("#nuevo_proveedor").modal("hide");
                      tblProveedores.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
    

}

//para editar un registro
function btnEditarPro(idproveedor)
{
    document.getElementById("title").innerHTML= "Actualizar Proveedor";
    document.getElementById("btnAccion").innerHTML= "Modificar";
    const url= base_url + "Proveedores/editar/"+idproveedor;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
           const res = JSON.parse(this.responseText);
           document.getElementById("idproveedor").value = res.idproveedor;
           document.getElementById("nombre").value = res.nombre;
           document.getElementById("rfc").value = res.rfc;
           document.getElementById("telefono").value = res.telefono;
           document.getElementById("direccion").value = res.direccion;
           $("#nuevo_proveedor").modal("show");
        }
    }
    
}

//para eliminar
function btnEliminarPro(idproveedor){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El usuario no se eliminara de forma permanente, solo cambiará el estado de inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Proveedores/eliminar/"+idproveedor;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Proveedor eliminado con éxito.',
                            'success'
                        )
                        tblProveedores.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

function btnReingresarPro(idproveedor){
    Swal.fire({
        title: 'Esta seguro de Reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Proveedores/reingresar/"+idproveedor;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Proveedor reingresado con éxito.',
                            'success'
                        )
                        tblProveedores.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}
//---------------------------------F I N-----------------------------------------------------


//---------------------------------I N I C I O-----------------------------------------------------
//JAVA SCRIPT PARA TIPOS DE APOYO

//---------------------------------F I N---------------------------------------------------------

//---------------------------------I N I C I O-----------------------------------------------------
//JAVA SCRIPT PARA CONTRIBUYENTES
//Para abrir modal
function frmContribuyente(){
    document.getElementById("title").innerHTML= "Nuevo Contribuyente";
    document.getElementById("btnAccion").innerHTML= "Registrar";
    document.getElementById("frmContribuyente").reset();
    $("#nuevo_contribuyente").modal("show");
    document.getElementById("idcontribuyente").value ="";
}

//validar datos del modal
function registrarCon(e){

    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const rfc = document.getElementById("rfc");
    const telefono = document.getElementById("telefono");
    const domicilio = document.getElementById("domicilio");

    if(nombre.value == "" || rfc.value=="" || telefono.value == "" || domicilio.value == "")
    {
        Swal.fire({
            position: 'center', 
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url= base_url + "Contribuyentes/registrar";
        const frm= document.getElementById("frmContribuyente");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status ==200){
                const res = JSON.parse(this.responseText);
                if(res =="si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Contribuyente registrado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $("#nuevo_contribuyente").modal("hide");
                      tblContribuyentes.ajax.reload();
                }else if (res =="modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Contribuyente modificado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $("#nuevo_contribuyente").modal("hide");
                      tblContribuyentes.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
    

}

//para editar un registro
function btnEditarCon(idcontribuyente)
{
    document.getElementById("title").innerHTML= "Actualizar Contribuyente";
    document.getElementById("btnAccion").innerHTML= "Modificar";
    const url= base_url + "Contribuyentes/editar/"+idcontribuyente;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
           const res = JSON.parse(this.responseText);
           document.getElementById("idcontribuyente").value = res.idcontribuyente;
           document.getElementById("nombre").value = res.nombre;
           document.getElementById("rfc").value = res.rfc;
           document.getElementById("telefono").value = res.telefono;
           document.getElementById("domicilio").value = res.domicilio;
           $("#nuevo_contribuyente").modal("show");
        }
    }
    
}

//para eliminar
function btnEliminarCon(idcontribuyente){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El Contribuyente no se eliminara de forma permanente, solo cambiará el estado de inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Contribuyentes/eliminar/"+idcontribuyente;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Contribuyente eliminado con éxito.',
                            'success'
                        )
                        tblContribuyentes.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

function btnReingresarCon(idcontribuyente){
    Swal.fire({
        title: 'Esta seguro de Reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Contribuyentes/reingresar/"+idcontribuyente;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Contribuyente reingresado con éxito.',
                            'success'
                        )
                        tblContribuyentes.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}
//---------------------------------F I N---------------------------------------------------------


//---------------------------------I N I C I O-----------------------------------------------------
//JAVA SCRIPT PARA DEPARTAMENTOS
//Para abrir modal
function frmDepartamento(){
    document.getElementById("title").innerHTML= "Nuevo Departamento";
    document.getElementById("btnAccion").innerHTML= "Registrar";
    document.getElementById("frmDepartamento").reset();
    $("#nuevo_departamento").modal("show");
    document.getElementById("iddepartamento").value ="";
}

//validar datos del modal
function registrarDep(e){

    e.preventDefault();
    const nombre = document.getElementById("nombre");

    if(nombre.value == "")
    {
        Swal.fire({
            position: 'center', 
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url= base_url + "Departamentos/registrar";
        const frm= document.getElementById("frmDepartamento");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status ==200){
                const res = JSON.parse(this.responseText);
                if(res =="si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Departamento registrado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $("#nuevo_departamento").modal("hide");
                      tblDepartamentos.ajax.reload();
                }else if (res =="modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Departamento modificado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $("#nuevo_departamento").modal("hide");
                      tblDepartamentos.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
    

}

//para editar un registro
function btnEditarDep(iddepartamento)
{
    document.getElementById("title").innerHTML= "Actualizar Departamento";
    document.getElementById("btnAccion").innerHTML= "Modificar";
    const url= base_url + "Departamentos/editar/"+iddepartamento;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
           const res = JSON.parse(this.responseText);
           document.getElementById("iddepartamento").value = res.iddepartamento;
           document.getElementById("nombre").value = res.nombre;
           $("#nuevo_departamento").modal("show");
        }
    }
    
}

//para eliminar
function btnEliminarDep(iddepartamento){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El Departamento no se eliminara de forma permanente, solo cambiará el estado de inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Departamentos/eliminar/"+iddepartamento;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Departamento eliminado con éxito.',
                            'success'
                        )
                        tblDepartamentos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

function btnReingresarDep(iddepartamento){
    Swal.fire({
        title: 'Esta seguro de Reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Departamentos/reingresar/"+iddepartamento;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Departamento reingresado con éxito.',
                            'success'
                        )
                        tblDepartamentos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}
//---------------------------------F I N---------------------------------------------------------

//---------------------------------I N I C I O-----------------------------------------------------
//JAVA SCRIPT PARA UNIDADES DE MEDIDA
//Para abrir modal
function frmUnidad(){
    document.getElementById("title").innerHTML= "Nueva unidad de medida";
    document.getElementById("btnAccion").innerHTML= "Registrar";
    document.getElementById("frmUnidad").reset();
    $("#nuevo_unidad").modal("show");
    document.getElementById("idunidad").value ="";
}

//validar datos del modal
function registrarUni(e){

    e.preventDefault();
    const nombre = document.getElementById("nombre");
    const clave = document.getElementById("clave");
    const descripcion = document.getElementById("descripcion");

    if(nombre.value == "" || clave.value=="" || descripcion.value == "")
    {
        Swal.fire({
            position: 'center', 
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url= base_url + "Unidades/registrar";
        const frm= document.getElementById("frmUnidad");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status ==200){
                const res = JSON.parse(this.responseText);
                if(res =="si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Unidad de medida registrado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $("#nuevo_unidad").modal("hide");
                      tblUnidades.ajax.reload();
                }else if (res =="modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Unidad de medida modificado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $("#nuevo_unidad").modal("hide");
                      tblUnidades.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
    

}

//para editar un registro
function btnEditarUni(idunidad)
{
    document.getElementById("title").innerHTML= "Actualizar Unidad de medida";
    document.getElementById("btnAccion").innerHTML= "Modificar";
    const url= base_url + "Unidades/editar/"+idunidad;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
           const res = JSON.parse(this.responseText);
           document.getElementById("idunidad").value = res.idunidad;
           document.getElementById("nombre").value = res.nombre;
           document.getElementById("clave").value = res.clave;
           document.getElementById("descripcion").value = res.descripcion;
           $("#nuevo_unidad").modal("show");
        }
    }
    
}

//para eliminar
function btnEliminarUni(idunidad){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "La unidad de medida no se eliminara de forma permanente, solo cambiará el estado de inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Unidades/eliminar/"+idunidad;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Unidad de medida eliminado con éxito.',
                            'success'
                        )
                        tblUnidades.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

function btnReingresarUni(idunidad){
    Swal.fire({
        title: 'Esta seguro de Reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Unidades/reingresar/"+idunidad;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Unidad de Medida reingresado con éxito.',
                            'success'
                        )
                        tblUnidades.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}
//---------------------------------F I N---------------------------------------------------------

//---------------------------------I N I C I O-----------------------------------------------------
//---------------------------------I N I C I O-----------------------------------------------------
//JAVA SCRIPT PARA PUESTOS

//Para abrir modal
function frmPuesto(){
    document.getElementById("title").innerHTML= "Nuevo Puesto";
    document.getElementById("btnAccion").innerHTML= "Registrar";
    document.getElementById("frmPuesto").reset();
    $("#nuevo_puesto").modal("show");
    document.getElementById("idpuesto").value ="";
}

//validar datos del modal
function registrarPuesto(e){

    e.preventDefault();
    const nombre = document.getElementById("nombre");

    if(nombre.value == "")
    {
        Swal.fire({
            position: 'center', 
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url= base_url + "Puestos/registrar";
        const frm= document.getElementById("frmPuesto");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status ==200){
                const res = JSON.parse(this.responseText);
                if(res =="si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Puesto registrado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $("#nuevo_puesto").modal("hide");
                      tblPuestos.ajax.reload();
                }else if (res =="modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Puesto modificado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $("#nuevo_puesto").modal("hide");
                      tblPuestos.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
    

}

//para editar un registro
function btnEditarPuesto(idpuesto)
{
    document.getElementById("title").innerHTML= "Actualizar Puesto";
    document.getElementById("btnAccion").innerHTML= "Modificar";
    const url= base_url + "Puestos/editar/"+idpuesto;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
           const res = JSON.parse(this.responseText);
           document.getElementById("idpuesto").value = res.idpuesto;
           document.getElementById("nombre").value = res.nombre;
           $("#nuevo_puesto").modal("show");
        }
    }
    
}

//para eliminar
function btnEliminarPuesto(idpuesto){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El puesto no se eliminara de forma permanente, solo cambiará el estado de inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Puestos/eliminar/"+idpuesto;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Puesto eliminado con éxito.',
                            'success'
                        )
                        tblPuestos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

function btnReingresarPuesto(idpuesto){
    Swal.fire({
        title: 'Esta seguro de Reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Puestos/reingresar/"+idpuesto;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Puesto reingresado con éxito.',
                            'success'
                        )
                        tblPuestos.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

//---------------------------------I N I C I O-----------------------------------------------------
//JAVA SCRIPT PARA Tipos de apoyo

//Para abrir modal
function frmTipoapoyo(){
    document.getElementById("title").innerHTML= "Nuevo Tipo de apoyo";
    document.getElementById("btnAccion").innerHTML= "Registrar";
    document.getElementById("frmTipoapoyo").reset();
    $("#nuevo_tipoapoyo").modal("show");
    document.getElementById("idtipoapoyo").value ="";
}

//validar datos del modal
function registrarTipoapoyo(e){

    e.preventDefault();
    const nombre = document.getElementById("nombre");

    if(nombre.value == "")
    {
        Swal.fire({
            position: 'center', 
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url= base_url + "Tipoapoyos/registrar";
        const frm= document.getElementById("frmTipoapoyo");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status ==200){
                const res = JSON.parse(this.responseText);
                if(res =="si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Tipo de apoyo registrado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $("#nuevo_tipoapoyo").modal("hide");
                      tblTipoapoyo.ajax.reload();
                }else if (res =="modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Tipo apoyo modificado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $("#nuevo_tipoapoyo").modal("hide");
                      tblTipoapoyo.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
    

}

//para editar un registro
function btnEditarTipoapoyo(idtipoapoyo)
{
    document.getElementById("title").innerHTML= "Actualizar Tipo de apoyo";
    document.getElementById("btnAccion").innerHTML= "Modificar";
    const url= base_url + "Tipoapoyos/editar/"+idtipoapoyo;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
           const res = JSON.parse(this.responseText);
           document.getElementById("idtipoapoyo").value = res.idtipoapoyo;
           document.getElementById("nombre").value = res.nombre;
           $("#nuevo_tipoapoyo").modal("show");
        }
    }
    
}

//para eliminar
function btnEliminarTipoapoyo(idtipoapoyo){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El Tipo de apoyo no se eliminara de forma permanente, solo cambiará el estado de inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Tipoapoyos/eliminar/"+idtipoapoyo;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Tipo de apoyo eliminado con éxito.',
                            'success'
                        )
                        tblTipoapoyo.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

function btnReingresarTipoapoyo(idtipoapoyo){
    Swal.fire({
        title: 'Esta seguro de Reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Tipoapoyos/reingresar/"+idtipoapoyo;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Tipo de apoyo reingresado con éxito.',
                            'success'
                        )
                        tblTipoapoyo.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

//---------------------------------I N I C I O-----------------------------------------------------
//JAVA SCRIPT PARA Tipos de ingresos

//Para abrir modal
function frmTipoingreso(){
    document.getElementById("title").innerHTML= "Nuevo Tipo de ingreso";
    document.getElementById("btnAccion").innerHTML= "Registrar";
    document.getElementById("frmTipoingreso").reset();
    $("#nuevo_tipoingreso").modal("show");
    document.getElementById("idtipoingreso").value ="";
}

//validar datos del modal
function registrarTipoingreso(e){

    e.preventDefault();
    const nombre = document.getElementById("nombre");

    if(nombre.value == "")
    {
        Swal.fire({
            position: 'center', 
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url= base_url + "Tipoingresos/registrar";
        const frm= document.getElementById("frmTipoingreso");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status ==200){
                const res = JSON.parse(this.responseText);
                if(res =="si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Tipo de ingreso registrado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $("#nuevo_tipoingreso").modal("hide");
                      tblTipoingreso.ajax.reload();
                }else if (res =="modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Tipo de ingreso modificado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $("#nuevo_tipoingreso").modal("hide");
                      tblTipoingreso.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
    

}

//para editar un registro
function btnEditarTipoapoyo(idtipoingreso)
{
    document.getElementById("title").innerHTML= "Actualizar Tipo de Ingreso";
    document.getElementById("btnAccion").innerHTML= "Modificar";
    const url= base_url + "Tipoingresos/editar/"+idtipoingreso;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
           const res = JSON.parse(this.responseText);
           document.getElementById("idtipoingreso").value = res.idtipoingreso;
           document.getElementById("nombre").value = res.nombre;
           $("#nuevo_tipoingreso").modal("show");
        }
    }
    
}

//para eliminar
function btnEliminarTipoingreso(idtipoingreso){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El Tipo de ingreso no se eliminara de forma permanente, solo cambiará el estado de inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Tipoingresos/eliminar/"+idtipoingreso;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Tipo de ingreso eliminado con éxito.',
                            'success'
                        )
                        tblTipoingreso.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

function btnReingresarTipoingreso(idtipoingreso){
    Swal.fire({
        title: 'Esta seguro de Reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Tipoingresos/reingresar/"+idtipoingreso;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Tipo de ingresos reingresado con éxito.',
                            'success'
                        )
                        tblTipoingreso.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

//---------------------------------I N I C I O-----------------------------------------------------
//JAVA SCRIPT PARA Empleados

//Para abrir modal
function frmEmpleado(){
    document.getElementById("title").innerHTML= "Nuevo Empleado";
    document.getElementById("btnAccion").innerHTML= "Registrar";
    document.getElementById("frmEmpleado").reset();
    $("#nuevo_empleado").modal("show");
    document.getElementById("idempleado").value ="";
}

//validar datos del modal
function registrarEmpleado(e){

    e.preventDefault();
    const rfc = document.getElementById("rfc");

    if(rfc.value == "")
    {
        Swal.fire({
            position: 'center', 
            icon: 'error',
            title: 'Todos los campos son obligatorios',
            showConfirmButton: false,
            timer: 2000
          })
    }else{
        const url= base_url + "Empleados/registrar";
        const frm= document.getElementById("frmEmpleado");
        const http = new XMLHttpRequest();
        http.open("POST", url, true);
        http.send(new FormData(frm));
        http.onreadystatechange = function(){
            if (this.readyState == 4 && this.status ==200){
                const res = JSON.parse(this.responseText);
                if(res =="si"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Empleado registrado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      frm.reset();
                      $("#nuevo_empleado").modal("hide");
                      tblEmpleados.ajax.reload();
                }else if (res =="modificado"){
                    Swal.fire({
                        position: 'center',
                        icon: 'success',
                        title: 'Empleado modificado con exito',
                        showConfirmButton: false,
                        timer: 2000
                      })
                      $("#nuevo_empleado").modal("hide");
                      tblEmpleados.ajax.reload();
                }else{
                    Swal.fire({
                        position: 'center',
                        icon: 'error',
                        title: res,
                        showConfirmButton: false,
                        timer: 2000
                    })
                }
            }
        }
    }
    

}

//para editar un registro
function btnEditarEmpleado(idempleado)
{
    document.getElementById("title").innerHTML= "Actualizar Empleado";
    document.getElementById("btnAccion").innerHTML= "Modificar";
    const url= base_url + "Empleados/editar/"+idempleado;
    const http = new XMLHttpRequest();
    http.open("GET", url, true);
    http.send();
    http.onreadystatechange = function(){
        if (this.readyState == 4 && this.status ==200){
           const res = JSON.parse(this.responseText);
           document.getElementById("idempleado").value = res.idempleado;
           document.getElementById("nombre").value = res.nombre;
           $("#nuevo_empleado").modal("show");
        }
    }
    
}

//para eliminar
function btnEliminarPuesto(idpuesto){
    Swal.fire({
        title: 'Esta seguro de eliminar?',
        text: "El empleado no se eliminara de forma permanente, solo cambiará el estado de inactivo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Empleados/eliminar/"+idempleado;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Puesto eliminado con éxito.',
                            'success'
                        )
                        tblEmpleados.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}

function btnReingresarEmpleado(idempleado){
    Swal.fire({
        title: 'Esta seguro de Reingresar?',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si!',
        cancelButtonText: 'No'
      }).then((result) => {
        if (result.isConfirmed) {
            const url= base_url + "Empleados/reingresar/"+idempleado;
            const http = new XMLHttpRequest();
            http.open("GET", url, true);
            http.send();
            http.onreadystatechange = function(){
                if (this.readyState == 4 && this.status ==200){
                    const res= JSON.parse(this.responseText);
                    if(res == "ok"){
                        Swal.fire(
                            'Mensaje!',
                            'Empleado reingresado con éxito.',
                            'success'
                        )
                        tblEmpleados.ajax.reload();
                    }else{
                        Swal.fire(
                            'Mensaje!',
                            res,
                            'error'
                        )
                    }
                }   
            }
       
        }
    })
}