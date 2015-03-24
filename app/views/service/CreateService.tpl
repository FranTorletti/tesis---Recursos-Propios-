{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div id="form">
        <form action="{Router::url('/home/admin/service/save')}" method="POST" enctype="multipart/form-data">
            <table class="table table-condensed">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody style="border-collapse:separate">
                    <tr class="success">
                        <td><label>Dependencia</label></td>
                        <td>
                            <select name="dependence" required>
                                {foreach from=$dependences item=d}
                                    <option value="{$d->getCode()}">{$d->getCode()}</option>
                                {/foreach}
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Tipo de Servicio</label></td>
                        <td>
                            <select name="serviceType" required>
                                {foreach from=$serviceTypes item=st}
                                    <option value="{$st->getCode()}">{$st->getCode()}</option>
                                {/foreach}
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Origen de los recursos</label></td>
                        <td>
                            <select name="resourceOrigin" required>
                                {foreach from=$resourceOrigins item=r}
                                    <option value="{$r->getCode()}">{$r->getCode()}</option>
                                {/foreach}
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Designacion</label></td>
                        <td><input name="designation" type="text" placeholder="designacion" required></td>
                    </tr>
                </tbody>
            </table>
            <div class="row">
                <div class="span2 offset1"> 
                    <a onClick='history.go(-1);' class="btn btn-info"><i class="icon-white icon-arrow-left"></i> Volver</a>        
                </div>
                <div class="span2">
                    <input type="submit" value="Crear" class="btn btn-success">
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript">
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
            }
    </script>
    
{/block}
