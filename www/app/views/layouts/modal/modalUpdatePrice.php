<?php
/**
 * Модальное окно для редактирования цены
 */
?>
<div class="modal fade" id="modalUpdatePrice" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Редактирование цены</h4>
            </div>

            <form role="form" method="post" action="pricesUpdate">
                <input type="hidden" name="nomenclature_id" id="pricesUpdate_NomId" value="0">
                <input type="hidden" name="contractors_id" id="pricesUpdate_ContractorsId" value="0">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-rub" aria-hidden="true"></i></span>
                                <input type="text" name="price" id="pricesUpdate_Val" class="form-control input-sm"
                                       value="0">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                        Сохранить
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>