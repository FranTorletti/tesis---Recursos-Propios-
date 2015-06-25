{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div id="table">
        <table class="table table-condensed">
            <thead>
                <th></th>
                <th></th>
                <th></th>
            </thead>
            <tbody style="border-collapse:separate">
                <tr class="success">
                    <td><label>Tipo</label></td>
                    <td>
                        {if $transactionType->getType() == "ingress"}
                            Ingreso
                        {else}
                            Egreso
                        {/if}
                    </td>
                </tr>
                <tr class="success">
                    <td><label>Nombre</label></td>
                    <td>{$transactionType->getName()}</td>
                </tr>
                <tr class="success">
                    <td><label>Descripcion</label></td>
                    <td>{$transactionType->getDescription()}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <button class="btn btn-warning" onclick="edit()">Editar</button>
        <a href="{Router::url('/home/admin/transactionType/delete/')}{$transactionType->getId()}" class="btn btn-danger" 
            onclick="return confirmation()">
            Eliminar
        </a>
        <a onClick='history.go(-1);' class="btn btn-info"><i class="icon-white icon-arrow-left"></i> Volver</a>
    </div>
    <div id="form" style="visibility:hidden;display:none">
        <form action="{Router::url('/home/admin/transactionType/edit/')}{$transactionType->getId()}" method="POST" enctype="multipart/form-data">
            <table class="table table-condensed">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody style="border-collapse:separate">
                    <tr class="success">
                        <td><label>Tipo</label></td>
                        <td>
                            <select name="type" required>
                                <option value="ingress" {if $transactionType->getType() == "ingress"} 
                                                            selected="selected" 
                                                        {/if}>
                                    Ingreso
                                </option>
                                <option value="egress" {if $transactionType->getType() == "egress"} 
                                                            selected="selected" 
                                                        {/if}>
                                    Egreso
                                </option>
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Nombre</label></td>
                        <td><input name="name" type="text" value="{$transactionType->getName()}" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Descripcion</label></td>
                        <td><input name="description" type="text" value="{$transactionType->getDescription()}" required></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Actualizar" class="btn btn-success">
        </form>
        <button type="botton" class="btn btn-info" onclick="noEdit()"><i class="icon-white icon-arrow-left"></i> Volver</button>
    </div>

    <script type="text/javascript">
        function edit() {
            document.getElementById("form").style.visibility = "visible";
            document.getElementById("form").style.display = "initial";
            
            
            document.getElementById("table").style.visibility = "hidden";
            document.getElementById("table").style.display = "none";
        };

        function noEdit() {
            document.getElementById("table").style.visibility = "visible";
            document.getElementById("table").style.display = "initial";
            
            
            document.getElementById("form").style.visibility = "hidden";
            document.getElementById("form").style.display = "none";
        };

        function isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        }

        function confirmation(){
            if (confirm('¿Estas seguro de eliminar?'))
                return true;
            else
                return false;
        }
        
    </script>
    
{/block}
