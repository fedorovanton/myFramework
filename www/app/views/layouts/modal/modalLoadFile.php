<?php
/**
 * Created by PhpStorm.
 * User: fedorovau
 * Date: 14.08.16
 * Time: 14:51
 */
?>
<div class="modal fade" id="modalLoadFile" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Прикрепление документа</h4>
            </div>

            <form role="form" enctype="multipart/form-data" action="<?= $linkRoute ?>LoadDocument" method="post">
                <!--<input type="hidden" name="cashbox_expenses_id" id="cashboxExpensesId" value="0">-->
                <input type="hidden" name="id" id="operat-id" value="0">
                <input type="hidden" name="payment_id" id="operat-payment-id" value="0">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="form-group">
                                <input type="file" name="documentFile">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <img src="" style="width: 400px;" id="doc-name" class="img-rounded">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success"><i class="fa fa-check" aria-hidden="true"></i>
                        Добавить
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>