{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div id="form">
        <form action="{Router::url('/home/admin/transactionType/save')}" method="POST" enctype="multipart/form-data">
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
                            <select name="type" placeholder="Tipo de movimiento" required>
                                <option value="ingress" selected="selected">Ingreso</option>
                                <option value="egress">Egreso</option>
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Nombre</label></td>
                        <td><input name="name" type="text" placeholder="Nombre" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Descripcion</label></td>
                        <td><input name="description" type="text" placeholder="descripcion" required></td>
                    </tr>
                </tbody>
            </table>
            <input type="submit" value="Crear" class="btn btn-success">
        </form>
        <a onClick='history.go(-1);' class="btn btn-info"><i class="icon-white icon-arrow-left"></i> Volver</a>
    </div>
    
{/block}
