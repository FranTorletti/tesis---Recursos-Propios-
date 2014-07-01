{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div id="form">
        <form action="{Router::url('/home/admin/user/save')}" method="POST" enctype="multipart/form-data">
            <table class="table table-condensed">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody style="border-collapse:separate">
                    <tr class="success">
                        <td><label>Nombre</label></td>
                        <td>
                            <input name="name" type="text" placeholder="nombre" required>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Apellido</label></td>
                        <td>
                            <input name="surname" type="text" placeholder="apellido" required>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Tipo de Documento</label></td>
                        <td>
                            <select name="documentType" placeholder="apellido" required>
                                <option value="DNI" selected="selected">DNI</option>
                                <option value="DU">DU</option>
                                <option value="CI">CI</option>
                                <option value="LE">LE</option>
                                <option value="LC">LC</option>
                                <option value="CI-PFA">CI-PFA</option>
                                <option value="PASAPORTE">PASAPORTE</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Documento</label></td>
                        <td><input name="document" type="text" placeholder="documento" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Email</label></td>
                        <td><input type="email" name="email" placeholder="email" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Contraseña</label></td>
                        <td><input type="password" name="password" placeholder="contraseña" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Tipo de Usuario</label></td>
                        <td>
                            <select name="type" placeholder="tipo de usuario" required>
                                <option value="DNI" selected="selected">Usuario Común</option>
                                <option value="DU">Administrador</option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Crear" class="btn btn-success">
        </form>
        <a onClick='history.go(-1);' class="btn btn-info"><i class="icon-white icon-arrow-left"></i> Volver</a>
    </div>

    <script type="text/javascript">
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }
    </script>
    
{/block}
