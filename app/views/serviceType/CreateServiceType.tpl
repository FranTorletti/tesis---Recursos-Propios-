{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div id="form">
        <form action="{Router::url('/home/admin/serviceType/save')}" method="POST" enctype="multipart/form-data">
            <table class="table table-condensed">
                <thead>
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody style="border-collapse:separate">
                    <tr class="success">
                        <td><label>Codigo</label></td>
                        <td><input name="code" type="text" placeholder="codigo" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Descripcion</label></td>
                        <td><input name="description" type="text" placeholder="descripcion" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Retencion Facultad</label></td>
                        <td><input name="facRetention" type="text" placeholder="retencion de la facultad" onkeypress="return isNumberKey(event)" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Retencion UNRC</label></td>
                        <td><input name="uniRetention" type="text" placeholder="retencion de la UNRC" onkeypress="return isNumberKey(event)" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Nota</label></td>
                        <td><input name="note" type="text" placeholder="descripcion" required></td>
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
            if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
            }
    </script>
    
{/block}
