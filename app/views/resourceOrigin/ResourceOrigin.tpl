{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div class="row">
        <div class="span9">
            <label>
                <h3 style="margin: 10px 20px;">Origen de los recursos</h3>
            </label>
        </div>
        <div class="span3">
            <br>
            <a class="btn btn-info" href="{Router::url('/home/admin/resourceOrigin/create')}">
                Crear Origen de los recursos
            </a>
        </div>
    </div>
    <hr class="featurette-divider">
    {if $resourceOrigins}
        <table class="table table-condensed">
            <thead>
                <th><center>Codigo</center></th>
                <th><center>Descripcion</center></th>
                <th><center>Nota</center></th>
            </thead>
            <tbody>
                {foreach from=$resourceOrigins item=resourceOrigin}
                    <tr class="success">
                        <td>
                            <a href="{Router::url('/home/admin/resourceOrigin/view/')}{$resourceOrigin->getId()}" style="text-decoration:none">
                                <center>{$resourceOrigin->getCode()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/resourceOrigin/view/')}{$resourceOrigin->getId()}" style="text-decoration:none">
                                <center>{$resourceOrigin->getDescription()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/resourceOrigin/view/')}{$resourceOrigin->getId()}" style="text-decoration:none">
                                <center>{$resourceOrigin->getNote()}</center>
                            </a>
                        </td>
                    </tr>
                    
                {/foreach}
            </tbody>
        </table>
    {else}
        <br>
        <label><h4> No hay Origen de los recursos</h4></label>
    {/if}

    
{/block}
