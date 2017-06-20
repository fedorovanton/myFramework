<div class="modal fade" id="modalViewIncoming" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Просмотр поступления</h4>
            </div>
            <div class="modal-body">

                <div class="row">
                    <div class="col-xs-4">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-calendar" aria-hidden="true"></i></span>
                            <input type="date" name="incoming_date" class="form-control input-sm" readonly>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-truck" aria-hidden="true"></i></span>
                            <input type="text" name="contractor_name" class="form-control input-sm" readonly>
                        </div>
                    </div>

                    <div class="col-xs-4">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-file-o" aria-hidden="true"></i></span>
                            <input type="text" name="doc_number" class="form-control input-sm" readonly>
                        </div>
                    </div>
                </div>

                <br/>

                <div class="row">
                    <div class="col-xs-12">
                        <table class="table table-bordered" id="tableIncomingLinePositions">
                            <!-- сюда будут выводиться записи -->
                        </table>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xs-4 col-xs-offset-8">
                        <div class="input-group input-group-sm">
                            <span class="input-group-addon"><i class="fa fa-rub" aria-hidden="true"></i></span>
                            <input type="text" name="incoming_sum" class="form-control input-sm" readonly>
                        </div>
                    </div>
                </div>

                <br/>
            </div>
        </div>
    </div>
</div>