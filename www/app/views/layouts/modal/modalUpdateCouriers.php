<div class="modal fade" id="modalUpdateCouriers" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Редактирование курьера</h4>
            </div>

            <form role="form" method="post" action="<?= $linkRoute ?>Update">
                <input type="hidden" name="couriers_id" id="update_couriers_id" value="0">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" name="fio" id="update_fio" class="form-control input-sm"
                                       placeholder="ФИО">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <input type="tel" name="tel" id="update_tel" class="form-control input-sm"
                                       placeholder="Телефон">
                            </div>
                        </div>
                        <p>&nbsp;</p>

                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                <input type="text" name="comment" id="update_comment" class="form-control input-sm"
                                       placeholder="Комментарий">
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