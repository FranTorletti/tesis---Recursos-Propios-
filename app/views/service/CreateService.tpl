{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <div id="form">
        <form action="{Router::url('/home/admin/service/save')}" method="POST" enctype="multipart/form-data">
            <table class="table table-condensed">
                <thead id="itemsTHead">
                    <th></th>
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody style="border-collapse:separate" id="itemsTable" name="itemsTable">
                    <tr class="success">
                        <td><label>Nombre</label></td>
                        <td><input name="name" type="text" placeholder="Nombre" required></td>
                    </tr>
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
                </tbody>
            </table>
            <div class="row">
                <div class="span3 offset1">
                    <a class="btn btn-primary" href="javascript:addItem()">Agregar Responsable</a>        
                </div>
                <div class="span3" id="buttonDelete" style="display:none">
                    <button class="btn btn-primary" onClick="removeItem()">
                        Quitar Responsable
                    </button>
                </div>
            </div>
            <br>
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
        var items = 0;

        function newItem(){
            result="";
            result+=
             "     <td><label>Responsable ("+items+")</label></td>" +
             "     <td >" +
             "          <select name=\"numItem[]\" id=\"numItem[]\" required>" +
             "              {foreach from=$users item=u}"+
             "                  <option value=\"{$u->getId()}\">{$u->getName()}</option>"+
             "              {/foreach}"+
             "          </select>"+
             "     </td>"
            ;

            return result;
        }

        function addItem(){
              items = items + 1;

              var th = document.createElement('th');
              var thead = document.getElementById("itemsTHead");
              thead.appendChild(th);

              var item = document.createElement('tr');
              
              item.setAttribute("id", "item"+(items)); 
              item.setAttribute("class", "success");
              item.innerHTML = newItem();
              
              var container = document.getElementById("itemsTable");
              container.appendChild(item);

              //show button delete item
              document.getElementById('buttonDelete').style.display = 'block';
        }

        function removeItem(){
            var remove = document.getElementById("item" + items);
            var container = document.getElementById("itemsTable");
            container.removeChild(remove);
            items = items - 1;
            //hide button delete item
            if (items == 0) {
                document.getElementById('buttonDelete').style.display = 'none ';       
            };
        }
    </script>
    
{/block}
