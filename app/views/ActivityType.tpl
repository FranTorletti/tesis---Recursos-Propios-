{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <label><h3>Tipo de Actividad</h3></label>
    <hr class="featurette-divider">
    {if $activityTypes}
        <table class="table table-condensed">
            <thead>
                <th><center>Codigo</center></th>
                <th><center>Descripcion</center></th>
                <th><center>Nota</center></th>
            </thead>
            <tbody>
                {foreach from=$activityTypes item=activityType}
                    <tr class="success">
                        <td>
                            <a href="{Router::url('/home/admin/dependence/view/')}{$activityType->getId()}" style="text-decoration:none">
                                <center>{$activityType->getCode()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/activityType/view/')}{$activityType->getId()}" style="text-decoration:none">
                                <center>{$activityType->getDescription()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/activityType/view/')}{$activityType->getId()}" style="text-decoration:none">
                                <center>{$activityType->getNote()}</center>
                            </a>
                        </td>
                    </tr>
                    
                {/foreach}
            </tbody>
        </table>
    {else}
        <br>
        <label><h4> No hay Tipo de Actividad</h4></label>
    {/if}

    
{/block}
