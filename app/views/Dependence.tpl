{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div class="row">
        <div class="span9">
            <label>
                <h3 style="margin: 10px 20px;">Dependencias</h3>
            </label>
        </div>
        <div class="span3">
            <br>
            <a class="btn btn-info" href="{Router::url('/home/admin/dependence/create')}">Crear Dependencia</a>
        </div>
    </div>

    <hr class="featurette-divider">
    {if $dependences}
        <table class="table table-condensed">
            <thead>
                <th><center>Codigo</center></th>
                <th><center>Descripcion</center></th>
                <th><center>Nota</center></th>
            </thead>
            <tbody>
                {foreach from=$dependences item=dependence}
                    <tr class="success">
                        <td>
                            <a href="{Router::url('/home/admin/dependence/view/')}{$dependence->getId()}" style="text-decoration:none">
                                <center>{$dependence->getCode()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/dependence/view/')}{$dependence->getId()}" style="text-decoration:none">
                                <center>{$dependence->getDescription()}</center>
                            </a>
                        </td>
                        <td>
                            <a href="{Router::url('/home/admin/dependence/view/')}{$dependence->getId()}" style="text-decoration:none">
                                <center>{$dependence->getNote()}</center>
                            </a>
                        </td>
                    </tr>
                    
                {/foreach}
            </tbody>
        </table>
    {else}
        <br>
        <label><h4> No hay Dependencias </h4></label>
    {/if}
    
{/block}
