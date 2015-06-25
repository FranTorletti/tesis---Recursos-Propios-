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
    {if $transactions}
        <table class="table table-condensed">
            <thead>
                <th><center>Tipo</center></th>
                <th><center>Fecha</center></th>
                <th><center>Codigo</center></th>
                <th><center>Descripcion</center></th>
                <th><center>Monto</center></th>
                <th><center>Ret. UNRC</center></th>
                <th><center>Ret Fac.</center></th>
                <th><center>Usuario</center></th>
                
            </thead>
            <tbody>
                {foreach from=$transactions item=transaction}
                    <tr class="success">
                        <td>
                            <center>
                                {if $transaction->getType() == "ingress"}
                                    Ingreso
                                {else}
                                    Egreso
                                {/if}
                            </center>
                        </td>
                        <td>
                            <center>{$transaction->getTransactionType()}</center>
                        </td>
                        <td>
                            <center>{$transaction->getDate()->format('d-m-Y')}</center>
                        </td>
                        <td>
                            <center>{$transaction->getCode()}</center>
                        </td>
                        <td>
                            <center>{$transaction->getDescription()}</center>
                        </td>
                        <td>
                            <center>{$transaction->getAmount()}</center>
                        </td>
                        <td>
                            <center>{$transaction->getUniRetention()}</center>
                        </td>
                        <td>
                            <center>{$transaction->getFacRetention()}</center>
                        </td>
                        <td>
                            <center>{$transaction->getUser()->getName()} {$transaction->getUser()->getSurname()}</center>
                        </td>
                    </tr>
                    
                {/foreach}
            </tbody>
        </table>
    {else}
        <br>
        <label><h4> No hay Transacciones </h4></label>
    {/if}
    
{/block}
