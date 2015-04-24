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
                <th></th>
                {foreach from=$responsibles item=r}
                    <th></th>
                {/foreach}
            </thead>
            <tbody style="border-collapse:separate">
                <tr class="success">
                    <td><label>Codigo</label></td>
                    <td>
                        {$service->getServiceType()->getCode()}-{$service->getResourceOrigin()->getCode()}-{$service->getCode()}-{$service->getDependence()->getCode()}
                    </td>
                </tr>
                <tr class="success">
                    <td><label>Nombre</label></td>
                    <td>{$service->getName()}</td>
                </tr>
                <tr class="success">
                    <td><label>Retencion de la Universidad</label></td>
                    <td>{$service->getUniRetention()}</td>
                </tr>
                <tr class="success">
                    <td><label>Retencion de la Facultad</label></td>
                    <td>{$service->getFacRetention()}</td>
                </tr>
                <tr class="success">
                    <td><label>Estado</label></td>
                    <td>{$service->getState()}</td>
                </tr>
                {assign var=index value=0}
                {foreach from=$responsibles item=r}
                    <tr class="success">
                        <td><label>Responsable ({$index})</label></td>
                        <td>{$r['name']}</td>
                    </tr>
                    {$index = $index +1}
                {/foreach}
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
                <thead id="itemsTHead">
                    <th></th>
                    <th></th>
                    <th></th>
                </thead>
                <tbody style="border-collapse:separate" id="itemsTable">
                    <tr class="success">
                        <td><label>Codigo</label></td>
                        <td><input name="code" type="text" value="{$service->getCode()}" onkeypress="return isNumberKey(event)" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Nombre</label></td>
                        <td><input name="name" value="{$service->getName()}" type="text" placeholder="Nombre" required></td>
                    </tr>
                    <tr class="success">
                        <td><label>Dependencia</label></td>
                        <td>
                            <select name="dependence" required>
                                {foreach from=$dependences item=d}
                                    <option {if $d->getCode() == $service->getDependence()->getCode()}
                                                selected="selected" 
                                            {/if} value="{$d->getCode()}">
                                        {$d->getCode()}
                                    </option>
                                {/foreach}
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Tipo de Servicio</label></td>
                        <td>
                            <select name="serviceType" required>
                                {foreach from=$serviceTypes item=st}
                                    <option {if $st->getCode() == $service->getServiceType()->getCode()}
                                                selected="selected" 
                                            {/if} value="{$st->getCode()}">
                                        {$st->getCode()}
                                    </option>
                                {/foreach}
                            </select>
                        </td>
                    </tr>
                    <tr class="success">
                        <td><label>Origen de los recursos</label></td>
                        <td>
                            <select name="resourceOrigin" required>
                                {foreach from=$resourceOrigins item=r}
                                    <option {if $r->getCode() == $service->getResourceOrigin()->getCode()}
                                                selected="selected" 
                                            {/if} value="{$r->getCode()}">
                                        {$r->getCode()}
                                    </option>
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
                    <a class="btn btn-primary" href="javascript:removeItem()">Quitar Responsable</a>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="span2 offset1">
                    <button type="botton" class="btn btn-info" onclick="noEdit()">
                        <i class="icon-white icon-arrow-left"></i> Volver
                    </button>     
                </div>
                <div class="span2">
                    <input type="submit" value="Actualizar" class="btn btn-success">        
                </div>
            </div>
        </form>
    </div>
    
    <script type="text/javascript">
        var items = parseInt("{$items}");
        function edit() {
            // visible html
            document.getElementById("form").style.visibility = "visible";
            document.getElementById("form").style.display = "initial";
            document.getElementById("table").style.visibility = "hidden";
            document.getElementById("table").style.display = "none";

            var responsibles = {$responsibles|json_encode};

            for (var i = 0; i < items ; i++) {
                createItem(i,responsibles[i]);
            };

        };

        function createItem(item,responsible){
            var th = document.createElement('th');
              var thead = document.getElementById("itemsTHead");
              thead.appendChild(th);

              var row = document.createElement('tr');
              
              row.setAttribute("id", "item"+(item)); 
              row.setAttribute("class", "success");
              row.innerHTML = newItem(item,responsible['id']);
              var container = document.getElementById("itemsTable");
              container.appendChild(row);
              //set selected
              option = document.getElementById(item+"-"+responsible['id'])
              option.setAttribute("selected","selected");

              //show button delete item
              document.getElementById('buttonDelete').style.display = 'block';
        };

        function noEdit() {
            document.getElementById("table").style.visibility = "visible";
            document.getElementById("table").style.display = "initial";
            
            
            document.getElementById("form").style.visibility = "hidden";
            document.getElementById("form").style.display = "none";
        };



        function newItem(item,id){
            result="";
            result+=
             "     <td><label>Responsable ("+item+")</label></td>" +
             "     <td >" +
             "          <select name=\"numItem[]\" required>" +
             "              {foreach from=$users item=u}"+
             "                  <option id=\""+item+"-{$u->getId()}\" value=\"{$u->getId()}\">{$u->getName()}</option>"+
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
              item.innerHTML = newItem(items);
              
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