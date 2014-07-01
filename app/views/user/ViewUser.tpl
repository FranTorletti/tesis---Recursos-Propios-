{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div id="table">
        <table class="table table-condensed">
            <thead>
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
                    <td>{$user->getName()}</td>
                </tr>
                <tr class="success">
                    <td><label>Apellido</label></td>
                    <td>{$user->getSurname()}</td>
                </tr>
                <tr class="success">
                    <td><label>Tipo de Doc.</label></td>
                    <td>{$user->getDocumentType()}</td>
                </tr>
                <tr class="success">
                    <td><label>Documento</label></td>
                    <td>{$user->getDocument()}</td>
                </tr>
                <tr class="success">
                    <td><label>Email</label></td>
                    <td>{$user->getEmail()}</td>
                </tr>
                <tr class="success">
                    <td><label>Tipo de usuario</label></td>
                    <td>{$user->getType()}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <button class="btn btn-warning" onclick="edit()">Editar</button>
        <a href="#" class="btn btn-danger">Eliminar</a>
        <a onClick='history.go(-1);' class="btn btn-info"><i class="icon-white icon-arrow-left"></i> Volver</a>
    </div>
    <div id="form" style="visibility:hidden;display:none">
        <form action="{Router::url('/home/admin/user/edit/')}{$user->getId()}" method="POST" enctype="multipart/form-data">
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
                            <input name="name" type="text" placeholder="nombre" value="{$user->getName()}" required>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Apellido</label></td>
                        <td>
                            <input name="surname" type="text" placeholder="apellido" value="{$user->getSurname()}" required>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Tipo de Documento</label></td>
                        <td>
                            <select name="documentType" required>
                                <option value="DNI" {if $user->getDocumentType() == "DNI"} selected="selected" {/if}>
                                    DNI
                                </option>
                                <option value="DU" {if $user->getDocumentType() == "DU"} selected="selected" {/if}>
                                    DU
                                </option>
                                <option value="CI" {if $user->getDocumentType() == "CI"} selected="selected" {/if}>
                                    CI
                                </option>
                                <option value="LE" {if $user->getDocumentType() == "LE"} selected="selected" {/if}>
                                    LE
                                </option>
                                <option value="LC" {if $user->getDocumentType() == "LC"} selected="selected" {/if}>
                                    LC
                                </option>
                                <option value="CI-PFA" {if $user->getDocumentType() == "CI-PFA"} 
                                                            selected="selected" {/if}>
                                    CI-PFA
                                </option>
                                <option value="PASAPORTE"{if $user->getDocumentType() == "PASAPORTE"}
                                                            selected="selected"{/if}>
                                    PASAPORTE
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Documento</label></td>
                        <td>
                            <input name="document" type="text" placeholder="documento" value="{$user->getDocument()}" required>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Email</label></td>
                        <td>
                            <input type="email" name="email" placeholder="email" value="{$user->getEmail()}" required>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Contraseña</label></td>
                        <td>
                            <input type="password" name="password" placeholder="contraseña" value="{$user->getpassword()}" required>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Tipo de Usuario</label></td>
                        <td>
                            <select name="type" placeholder="tipo de usuario" required>
                                <option value="usuario" {if $user->getType() == "usuario"} selected="selected" {/if}>
                                    Usuario Común
                                </option>
                                <option value="administrador" {if $user->getType() == "administrador"} 
                                                                    selected="selected" {/if}>
                                    Administrador
                                </option>
                            </select>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Actualizar" class="btn btn-success">
        </form>
        <button type="botton" class="btn btn-info" onclick="noEdit()"><i class="icon-white icon-arrow-left"></i> Volver</button>
    </div>

    <script type="text/javascript">
        function edit() {
            document.getElementById("form").style.visibility = "visible";
            document.getElementById("form").style.display = "initial";
            
            
            document.getElementById("table").style.visibility = "hidden";
            document.getElementById("table").style.display = "none";
        };

        function noEdit() {
            document.getElementById("table").style.visibility = "visible";
            document.getElementById("table").style.display = "initial";
            
            
            document.getElementById("form").style.visibility = "hidden";
            document.getElementById("form").style.display = "none";
        };
    </script>
    
{/block}
