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
                    <td><label>Codigo</label></td>
                    <td>{$dependence->getCode()}</td>
                </tr>
                <tr class="success">
                    <td><label>Descripcion</label></td>
                    <td>{$dependence->getDescription()}</td>
                </tr>
                <tr class="success">
                    <td><label>Nota</label></td>
                    <td>{$dependence->getNote()}</td>
                </tr>
            </tbody>
        </table>
        <br>
        <button class="btn btn-warning" onclick="edit()">Editar</button>
        <a href="#" class="btn btn-danger">Eliminar</a>
        <a onClick='history.go(-1);' class="btn btn-info"><i class="icon-white icon-arrow-left"></i> Volver</a>
    </div>
    <div id="form" style="visibility:hidden;display:none">
        <form action="{Router::url('/home/admin/dependence/edit/')}{$dependence->getId()}" method="POST" enctype="multipart/form-data">
            <table class="table table-condensed">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody style="border-collapse:separate">
                    <tr class="success">
                        <td><label>Codigo</label></td>
                        <td><input name="code" type="text" value="{$dependence->getCode()}"></td>
                    </tr>
                    <tr class="success">
                        <td><label>Descripcion</label></td>
                        <td><input name="description" type="text" value="{$dependence->getDescription()}"></td>
                    </tr>
                    <tr class="success">
                        <td><label>Nota</label></td>
                        <td><input name="note" type="text" value="{$dependence->getNote()}"></td>
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
    </script>
    
{/block}
