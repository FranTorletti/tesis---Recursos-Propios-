{extends file='layouts/base.tpl'}

{block name="title"}
{/block}

{block name="body"}
    <br>
    <label><h3>Panel Admin</h3></label>
    <hr class="featurette-divider">
    <div class="bnt-group">
        <a href="{Router::url('/home/admin/dependence')}" class="btn btn-lg btn-info" style="width: 158px">
            <span class="icon icon-info-sign"></span>
            <br>
            Dependencias
        </a>
        <a href="" class="btn btn-lg btn-info" style="width: 158px">
            <span class="icon icon-info-sign"></span>
            <br>
            Tipo de Actividades
        </a>
        <a href="" class="btn btn-lg btn-info" style="width: 158px">
            <span class="icon icon-info-sign"></span>
            <br>
            Origen de los recursos
        </a>
    </div>
    <br>
    <div class="bnt-group">
        <a href="" class="btn btn-lg btn-info" style="width: 158px">
            <span class="icon icon-info-sign"></span>
            <br>
            Usuarios
        </a>
        <a href="" class="btn btn-lg btn-info" style="width: 158px">
            <span class="icon icon-info-sign"></span>
            <br>
            Tipo de servicio</a>
        <a href="" class="btn btn-lg btn-info" style="width: 158px">
            <span class="icon icon-info-sign"></span>
            <br>
            Servicios</a>
    </div>
{/block}
