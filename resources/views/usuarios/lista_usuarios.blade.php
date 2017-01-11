@extends ('layouts.dashboard')
@section('page_heading','Usuarios')

@section('section')
<div class="col-sm-12">
<div class="row">
    <div class="col-lg-12">
      <div class="panel panel-default">
        <div class="panel-heading">
                                  <h3> <small>Información de los usuarios...</small></h3>
                                  <div class="container-fluid" align="right">
                                      <a onclick="desplegarForm()" class="btn btn-info" data-toggle="tooltip" title="Nuevo usuario">
                                          <span class="fa fa-plus-circle"></span></a>
                                  </div>

      </div>
         <div class="dataTable_wrapper table-responsive">
             <table class="table table-striped table-bordered table-hover" id="empleados">
                 <col width="15%">
                 <col width="15%">
                 <col width="15%">
                 <col width="15%">
                 <col width="15%">
                 <col width="15%">
                 <thead>
                     <tr>
                         <th>Nombres</th>
                         <th>Apellidos</th>
                         <th>Cedula</th>
                         <th>Correo</th>
                         <th>Telefono</th>
                         <th>Editar</th>
                     </tr>
                 </thead>
                 <tfoot>
                 <tr>
                   <th>Nombres</th>
                   <th>Apellidos</th>
                   <th>Cedula</th>
                   <th>Correo</th>
                   <th>Telefono</th>
                   <th></th>

                 </tr>
                 </tfoot>
                 <tbody>
                   @foreach($usuarios as $usuario)
                   <tr>
                     <td>
                       {{$usuario->nombre}}
                     </td>
                     <td>
                       {{$usuario->apellido}}
                     </td>
                     <td>
                       {{$usuario->cedula}}
                     </td>
                     <td>
                         {{$usuario->correo}}
                     </td>
                     <td>
                         {{$usuario->telefono}}
                     </td>
                     <td>
                       <button   onclick="desplegarUpdate('{{$usuario->id}}')"  class="btn btn-xs btn-info dim"><i class="fa fa-check-square-o"></i> Editar</button></a>
                     </td>
                   </tr>
                   @endforeach
                 </tbody>
               </table>
             </div>
           </div>

        <!-- <div> -->
          <button type="button" id="botonModalEdicion" data-toggle="modal" data-target="#crearUsuario"
          style="display:none;"></button>
          <div class="modal inmodal" id="crearUsuario" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog">
                 <div class="modal-content animated fadeIn">
                   <div class="modal-header" >
                     <div id = "alerta"> </div>
                     <button type="button" class="close" data-dismiss="modal"><span
                             aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                     </button>
                     <i class="fa fa-users modal-icon"></i>
                     <h4 class="modal-title">Crear usuario</h4>
                     <small class="font-bold">Por favor llene los campos solicitados
                        dé clic en guardar cambios cuando haya terminado, de lo
                         contrario de clic en cancelar.
                     </small>
                  </div>
                  <div class="modal-body">

                    <form data-toggle="validator" role="form" id = "myForm" name="myForm"
                    action ="crear_usuario" method="get" onsubmit="return validateForm()">

                    <div class="form-group">
                      <label for="inputName" class="control-label">Cedula</label>
                      <input type="number" class="form-control" id="cedula"
                      data-remote-error = "la cedula ya se encuentra registrada en la base de datos"
                      data-required-error="Por favor complete el campo. Solo caracteres numéricos"
                      name = "cedula"  data-remote="cedula" required>
                      <div class="help-block with-errors"></div>
                    </div>

                      <div class="form-group">
                        <label for="inputName" class="control-label">Nombres</label>
                        <input type="text" class="form-control" id="nombre" name = "nombre" required>
                      </div>

                      <div class="form-group">
                        <label for="inputName" class="control-label">Apellidos</label>
                        <input type="text" class="form-control" id="apellidos" name = "apellidos" required>
                      </div>


                      <div class="form-group">
                        <label for="inputEmail" class="control-label">Correo</label>
                        <input type="email" class="form-control" id="email" placeholder="Email" name = "correo"
                         data-remote-error = "El correo ya se encuentra registrada en la base de datos"
                          data-remote="correo" required>
                        <div class="help-block with-errors"></div>
                      </div>

                      <div class="form-group">
                        <label for="inputName" class="control-label">Telefono</label>
                        <input type="number" class="form-control" id="telefono" name = "telefono"
                        data-error="Por favor complete el campo. Solo caracteres numéricos" required>
                        <div class="help-block with-errors"></div>
                      </div>
                      <div class="modal-footer">
                            <button type="button" class="btn btn-white"
                                    href="/empleados" data-dismiss="modal">Cancelar
                            </button>
                            <button type="submit" class="btn btn-primary">Guardar cambios
                            </button>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
        </div>
      <!-- </div> -->

      <!--  edicion de los usuarios-->
      <button type="button" id="botonModalEdicion2" data-toggle="modal" data-target="#editarUsuario"
      style="display:none;"></button>
      <div class="modal inmodal" id="editarUsuario" tabindex="-1" role="dialog" aria-hidden="true">
          <div class="modal-dialog">
             <div class="modal-content animated fadeIn">
               <div class="modal-header" >
                 <div id = "alerta"> </div>
                 <button type="button" class="close" data-dismiss="modal"><span
                         aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                 </button>
                 <i class="fa fa-users modal-icon"></i>
                 <h4 class="modal-title">Edición usuario</h4>
                 <small class="font-bold">Por favor modifique los campos deseados y
                    dé clic en guardar cambios cuando haya terminado, de lo
                     contrario de clic en cancelar.
                 </small>
              </div>
              <div class="modal-body">

                <form data-toggle="validator" role="form" id = "edicion" name="edicion"
                action ="actualizar_usuario" method="get" onsubmit="return validateForm()">

                  <div style = "display: None">
                    <input id = "id" name="id">
                  </div>
                  <div class="form-group">
                    <label for="inputName" class="control-label">Cedula</label>
                    <input type="number" class="form-control" id="edit_cedula" name="edit_cedula" disabled required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="control-label">Nombres</label>
                    <input type="text" class="form-control" id="edit_nombre" name = "edit_nombre" required>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="control-label">Apellidos</label>
                    <input type="text" class="form-control" id="edit_apellidos" name = "edit_apellidos" required>
                  </div>

                  <div class="form-group">
                    <label for="inputEmail" class="control-label">Correo</label>
                    <input type="email" class="form-control" id="edit_correo" placeholder="Email" name = "edit_correo"
                     data-remote-error = "El correo ya se encuentra registrada en la base de datos"
                      data-remote="correo" required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="inputName" class="control-label">Telefono</label>
                    <input type="number" class="form-control" id="edit_telefono" name = "edit_telefono"
                    data-error="el telefono  no debe contener letras" required>
                    <div class="help-block with-errors"></div>
                  </div>
                  <div class="modal-footer">
                        <button type="button" class="btn btn-white"
                                href="/empleados" data-dismiss="modal">Cancelar
                        </button>
                        <button type="submit" class="btn btn-primary">Guardar cambios
                        </button>
                  </div>
                </form>
              </div>
            </div>
        </div>
    </div>

             <!-- end -->
          </div>

    </div>
</div>
</div>

<script src="../resources/js/usuarios.js" type="text/javascript"></script>

@stop
