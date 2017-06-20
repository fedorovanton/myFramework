<div class="modal fade" id="modalNewContractors" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Добавление контрагента</h4>
            </div>

            <form role="form">

                <div class="modal-body">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-truck" aria-hidden="true"></i></span>
                                <input type="text" id="contractors_name" class="form-control input-sm" placeholder="Название">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-user" aria-hidden="true"></i></span>
                                <input type="text" id="contractors_fio" class="form-control input-sm" placeholder="ФИО контактного лица">
                            </div>
                        </div>
                        <p>&nbsp;</p>

                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-phone" aria-hidden="true"></i></span>
                                <input type="tel" id="contractors_tel" class="form-control input-sm" placeholder="Телефон">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-envelope-o" aria-hidden="true"></i></span>
                                <input type="email" id="contractors_email" class="form-control input-sm" placeholder="E-mail">
                            </div>
                        </div>
                        <p>&nbsp;</p>

                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                <input type="text" id="contractors_address" class="form-control input-sm" placeholder="Адрес">
                            </div>
                        </div>
                        <p>&nbsp;</p>

                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <span class="input-group-addon"><i class="fa fa-pencil" aria-hidden="true"></i></span>
                                <input type="text" id="contractors_comment" class="form-control input-sm" placeholder="Комментарий">
                            </div>
                        </div>

                        <div class="col-xs-12">
                            <div class="input-group input-group-sm">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="contractors_flag_supplier" value="1">Поставщик
                                    </label>
                                </div>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="contractors_flag_sales_channel" value="1">Канал продаж
                                    </label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" id="insertContractorsNew" class="btn btn-success"><i class="fa fa-check"
                                                                                               aria-hidden="true"></i>
                        Добавить
                    </button>
                </div>

            </form>

        </div>
    </div>
</div>