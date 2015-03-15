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
        <a onClick='history.go(-1);' class="btn btn-info"><i class="icon-white icon-arrow-left"></i> Volver</a>
    </div>
{/block}