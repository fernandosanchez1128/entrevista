$(document).ready(function() {
 // Setup - add a text input to each footer cell
       var i=0;
 $('#empleados tfoot th').each( function () {
     i++;
     if (i <=5){
     var title = $(this).text();
     $(this).html( '<input type="text" placeholder="'+title+'" style="width: 100%;" />' );}
 } );
 // DataTable
 var table = $('#empleados').DataTable()
 // Apply the search
 table.columns().every( function () {
     var that = this;
     $( 'input', this.footer() ).on( 'keyup change', function () {
         if ( that.search() !== this.value ) {
             that
                 .search( this.value )
                 .draw();
         }
     } );
 } );
} );


function desplegarForm ()
{
  console.log ("true")
  $('#botonModalEdicion').click();
  $('#myForm')[0].reset();

}

function desplegarUpdate ($id)
{
  console.log ($id);


  var req1 = $.get('http://192.168.1.65/sb-admin-laravel-5-master/public/usuario',{id:$id})
  $.when(req1)
  .done (function (user)
  {
    $("#id").val (user.id)
    $("#edit_cedula").val(user.cedula)
    $("#edit_nombre").val (user.nombre)
    $("#edit_apellidos").val (user.apellido)
    $("#edit_correo").val (user.correo)
    $("#edit_telefono").val (user.telefono)

  })

  $('#botonModalEdicion2').click();
}

var flag = true
// function validar_cedula ($input)
// {
//   var cedula = $input.value
//   var req1 = $.get('http://localhost/sb-admin-laravel-5-master/public/cedula',{cedula:cedula, b:""})
//   $.when(req1)
//     .done(function(data) {
//
//       if (data > 0)
//       {
//         flag = false
//         $input.validate ()
//         // var $group = $input.closest('.form-group')
//         // console.log ($group.className)
//         // $group.className += " has-error has-danger";
//
//
//       }
//       else {
//         {
//           flag = true
//
//         }
//       }
//       console.log (data)
//     })
//
// }


// function validateForm ()
// {
//   if (!flag)
//   {
//       $("#alerta").append (
//         '<div class="alert alert-danger alert-dismissable fade in">'+
//         ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>' +
//          '<button aria-hidden="true" data-dismiss="alert" class="close" type="button"></button>' +
//          '<i class="fa fa-check"></i> La cedula y el email deben ser unicos </div>'
//       )
//   }
//   return false
// }
