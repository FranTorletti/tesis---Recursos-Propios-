{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div class="row">
        <div class="span9">
            <label>
                <h3 style="margin: 10px 20px;">Tipos de Transacciones</h3>
            </label>
        </div>
        <div class="span3">
            <br>
            <a class="btn btn-info" href="{Router::url('/home/admin/transactionType/create')}">Crear Tipo de Transaccion</a>
        </div>
    </div>

    <hr class="featurette-divider">
    {if $transactionTypes}
        <table class="table table-condensed">
            <thead>
                <th><center>Tipo</center></th>
                <th><center>Nombre</center></th>
                <th><center>Descripcion</center></th>
            </thead>
            <tbody>
                {foreach from=$transactionTypes item=transactionType}
                    <tr class="success">
                        <td>
                            <a href="{Router::url('/home/admin/transactionType/view/')}{$transactionType->getId()}" style="text-decoration:none">
                                <center>
                                    {if $transactionType->getType() == "ingress"}
                                        Ingreso
                                    {else}
                                        Egreso
                                    {/if}
                                </center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/transactionType/view/')}{$transactionType->getId()}" style="text-decoration:none">
                                <center>{$transactionType->getName()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/transactionType/view/')}{$transactionType->getId()}" style="text-decoration:none">
                                <center>{$transactionType->getDescription()}</center>
                            </a>
                        </td>
                    </tr>
                    
                {/foreach}
            </tbody>
        </table>
    {else}
        <br>
        <label><h4> No hay Tipo de Transaccion </h4></label>
    {/if}
    
{/block}
