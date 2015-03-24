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
            </thead>
            <tbody style="border-collapse:separate">
                <tr class="success">
                    <td><label>Codigo</label></td>
                    <td>
                        {$service->getServiceType()->getCode()}-{$service->getResourceOrigin()->getCode()}-{$service->getCode()}-{$service->getDependence()->getCode()}
                    </td>
                </tr>
                <tr class="success">
                    <td><label>Designacion</label></td>
                    <td>{$service->getDesignation()}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <div class="row">
            <div class="span2 offset1"> 
                <a onClick='history.go(-1);' class="btn btn-info"><i class="icon-white icon-arrow-left"></i> Volver</a>        
            </div>
            <div class="span2">
                <button class="btn btn-warning" onclick="edit()">Editar</button>        
            </div>
            <div class="span2">
                <a href="{Router::url('/home/admin/service/delete/')}{$service->getId()}" class="btn btn-danger" 
                    onclick="return confirmation()">
                    Eliminar
                </a>        
            </div>
        </div>
    </div>

    <div id="form" style="visibility:hidden;display:none">
        <form action="{Router::url('/home/admin/service/edit/')}{$service->getId()}" method="POST" enctype="multipart/form-data">
            <table class="table table-condensed">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody style="border-collapse:separate">
                    <tr class="success">
                        <td><label>Codigo</label></td>
                        <td><input name="code" type="text" value="{$service->getCode()}" onkeypress="return isNumberKey(event)" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Descripcion</label></td>
                        <td><input name="description" type="text" value="{$dependence->getDescription()}" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Nota</label></td>
                        <td><input name="note" type="text" value="{$dependence->getNote()}" required></td>
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