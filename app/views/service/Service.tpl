{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div class="row">
        <div class="span9">
            <label>
                <h3 style="margin: 10px 20px;">Servicios</h3>
            </label>
        </div>
        <div class="span3">
            <br>
            <a class="btn btn-info" href="{Router::url('/home/admin/service/create')}">Crear Servicio</a>
        </div>
    </div>

    <hr class="featurette-divider">
    {if $services}
        <table class="table table-condensed">
            <thead>
                <th><center>Codigo</center></th>
                <th><center>Nombre</center></th>
                <th><center>Accion</center></th>
            </thead>
            <tbody>
                {foreach from=$services item=service}
                    <tr class="success">
                        <td>
                            <a href="{Router::url('/home/admin/service/view/')}{$service->getId()}" style="text-decoration:none">
                                <center>
                                    {$service->getServiceType()->getCode()}-{$service->getResourceOrigin()->getCode()}-{$service->getCode()}-{$service->getDependence()->getCode()}
                                </center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/service/view/')}{$service->getId()}" style="text-decoration:none">
                                <center>{$service->getName()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/service/view/')}{$service->getId()}"style="text-decoration:none">
                            </a>
                        </td>
                    </tr>
                    
                {/foreach}
            </tbody>
        </table>
    {else}
        <br>
        <label><h4> No hay Servicios </h4></label>
    {/if}
    
{/block}
