{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div class="row">
        <div class="span9">
            <label>
                <h3 style="margin: 10px 20px;">Usuarios</h3>
            </label>
        </div>
        <div class="span3">
            <br>
            <a class="btn btn-info" href="{Router::url('/home/admin/user/create')}">Crear Usuario</a>
        </div>
    </div>

    <hr class="featurette-divider">
    {if $users}
        <table class="table table-condensed">
            <thead>
                <th><center>Nombre</center></th>
                <th><center>Apellido</center></th>
                <th><center>Tipo de Doc.</center></th>
                <th><center>Documento</center></th>
                <th><center>Email</center></th>
                <th><center>Tipo de usuario</center></th>
            </thead>
            <tbody>
                {foreach from=$users item=user}
                    <tr class="success">
                        <td>
                            <a href="{Router::url('/home/admin/user/view/')}{$user->getId()}"style="text-decoration:none">
                                <center>{$user->getName()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/user/view/')}{$user->getId()}"style="text-decoration:none">
                                <center>{$user->getSurname()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/user/view/')}{$user->getId()}"style="text-decoration:none">
                                <center>{$user->getDocumentType()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/user/view/')}{$user->getId()}"style="text-decoration:none">
                                <center>{$user->getDocument()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/user/view/')}{$user->getId()}"style="text-decoration:none">
                                <center>{$user->getEmail()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/user/view/')}{$user->getId()}"style="text-decoration:none">
                                <center>{$user->getType()}</center>
                            </a>
                        </td>
                    </tr>
                    
                {/foreach}
            </tbody>
        </table>
    {else}
        <br>
        <label><h4> No hay Usuarios </h4></label>
    {/if}
    
{/block}
