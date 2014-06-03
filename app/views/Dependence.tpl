{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <label><h3>Dependencias</h3></label>
    <hr class="featurette-divider">
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
    
{/block}
