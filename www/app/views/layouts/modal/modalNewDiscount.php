<?php
/**
 * Модальное окно для добавления нового дисконтника
 */
?>
<div class="modal fade" id="modalNewDiscount" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавление дисконта</h4>
            </div>

            <form role="form">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-credit-card"
                                                                   aria-hidden="true"></i></span>
                                <input type="text" id="number_card" class="form-control input-sm" placeholder="№ карты">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-percent" aria-hidden="true"></i></span>
                                <input type="tel" id="size_discount" class="form-control input-sm"
                                       placeholder="Размер скидки в %">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="insertDiscountNew" class="btn btn-success"><i class="fa fa-check"
                                                                                            aria-hidden="true"></i>
                        Добавить
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>