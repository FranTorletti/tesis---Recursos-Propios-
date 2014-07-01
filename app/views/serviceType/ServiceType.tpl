{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div class="row">
        <div class="span9">
            <label>
                <h3 style="margin: 10px 20px;">Tipos de Servicios</h3>
            </label>
        </div>
        <div class="span3">
            <br>
            <a class="btn btn-info" href="{Router::url('/home/admin/serviceType/create')}">Crear Tipo de Servicio</a>
        </div>
    </div>

    <hr class="featurette-divider">
    {if $serviceTypes}
        <table class="table table-condensed">
            <thead>
                <th><center>Codigo</center></th>
                <th><center>Descripcion</center></th>
                <th><center>Retencion Facultad</center></th>
                <th><center>Retencion UNRC</center></th>
                <th><center>Nota</center></th>
            </thead>
            <tbody>
                {foreach from=$serviceTypes item=serviceType}
                    <tr class="success">
                        <td>
                            <a href="{Router::url('/home/admin/serviceType/view/')}{$serviceType->getId()}" style="text-decoration:none">
                                <center>{$serviceType->getCode()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/serviceType/view/')}{$serviceType->getId()}" style="text-decoration:none">
                                <center>{$serviceType->getDescription()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/serviceType/view/')}{$serviceType->getId()}" style="text-decoration:none">
                                <center>{$serviceType->getFacRetention()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/serviceType/view/')}{$serviceType->getId()}" style="text-decoration:none">
                                <center>{$serviceType->getUniRetention()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/serviceType/view/')}{$serviceType->getId()}" style="text-decoration:none">
                                <center>{$serviceType->getNote()}</center>
                            </a>
                        </td>
                    </tr>
                    
                {/foreach}
            </tbody>
        </table>
    {else}
        <br>
        <label><h4> No hay Tipo de Servicio </h4></label>
    {/if}
    
{/block}
