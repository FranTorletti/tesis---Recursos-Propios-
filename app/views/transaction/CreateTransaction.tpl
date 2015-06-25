{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div id="form">
        <form action="{Router::url('/home/admin/transaction/save/')}{$service}" method="POST" enctype="multipart/form-data">
            <table class="table table-condensed">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody style="border-collapse:separate">
                    <tr class="success">
                        <td><label>Tipo de movimiento:</label></td>
                        <td>
                            <select name="type" id="type" placeholder="Tipo de movimiento"required onchange="TransactionClass(this)">
                                <option value="ingress" selected="selected">Ingreso</option>
                                <option value="egress">Egreso</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Clase de movimiento</label></td>
                        <td>
                            <select name="classIngress" id="classIngress" placeholder="Clase de movimiento" required>
                                {foreach from=$income item=i}
                                    <option value="{$i->getName()}">{$i->getName()}</option>
                                {/foreach}
                            </select>
                            <select name="classEgress" id="classEgress" placeholder="Clase de movimiento" required 
                                style="visibility:hidden;display:none">
                                {foreach from=$expenses item=e}
                                    <option value="{$e->getName()}">{$e->getName()}</option>
                                {/foreach}
                            </select>
                        </td>
                    </tr>

                    <tr class="success">
                        <td><label>Codigo</label></td>
                        <td>
                            <input name="code" type="text" placeholder="Codigo" required>
                        </td>
                    </tr>

                    <tr class="success">
                        <td><label>Descripcion</label></td>
                        <td>
                            <input name="description" type="text" placeholder="Descripcion" required>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Monto</label></td>
                        <td>
                            <input name="amount" type="text" placeholder="$" required>
                        </td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Crear" class="btn btn-success">
        </form>
        <a onClick='history.go(-1);' class="btn btn-info"><i class="icon-white icon-arrow-left"></i> Volver</a>
    </div>

    <script type="text/javascript">
        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        function TransactionClass(type) {
            if (type.value == 'ingress') {
                document.getElementById("classIngress").style.visibility = "visible";
                document.getElementById("classIngress").style.display = "initial";
        
                document.getElementById("classEgress").style.visibility = "hidden";
                document.getElementById("classEgress").style.display = "none";
            } else{
                document.getElementById("classEgress").style.visibility = "visible";
                document.getElementById("classEgress").style.display = "initial";
        
                document.getElementById("classIngress").style.visibility = "hidden";
                document.getElementById("classIngress").style.display = "none";
            };
        };
    </script>
    
{/block}
