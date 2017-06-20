<?php include_once __DIR__ . '/../layouts/header.php'; ?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-md-9">
                    <h1 class="page-header">
                        Финансы - Контрагенты
                    </h1>
                </div>
                <div class="col-md-3">
                    <h1 class="page-header">
                        <button type="button" class="btn btn-success" data-toggle="modal"
                                data-target="#modalNewContractors"><i class="fa fa-plus" aria-hidden="true"></i> Новый
                            контрагент
                        </button>
                    </h1>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <p>

                    <div class="btn-toolbar" role="toolbar">

                        <!-- Форма модального окна для #modalNewContractors -->
                        <?php include_once __DIR__ . '/../layouts/modal/modalNewContractors.php'; ?>
                        <!-- / Формка модального окна для #modalNewContractors -->

                        <!-- Форма модального окна для #modalUpdateContractors -->
                        <?php include_once __DIR__ . '/../layouts/modal/modalUpdateContractors.php'; ?>
                        <!-- / Формка модального окна для #modalUpdateContractors -->

                    </div>
                    </p>
                </div>
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped" id="tableForInsertData">
                            <thead>
                            <tr>
                                <th>Название</th>
                                <th>Телефон</th>
                                <th>Контактное лицо</th>
                                <th>Комментарий</th>
                                <th>&nbsp;</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (isset($contractors)): ?>
                                <?php foreach ($contractors as $item): ?>
                                    <tr>
                                        <td><?= $item->name ?></td>
                                        <td><?= $item->tel ?></td>
                                        <td><?= $item->fio ?></td>
                                        <td><?= $item->comment ?></td>
                                        <td>
                                            <?/*<button
                                                type="button"
                                                class="btn btn-sm btn-block btn-default"
                                                data-toggle="modal"
                                                data-target="#modalUpdateContractors"
                                                data-update-id="<?= $item->id ?>"
                                                data-update-name="<?= $item->name ?>"
                                                data-update-tel="<?= $item->tel ?>"
                                                data-update-fio="<?= $item->fio ?>"
                                                data-update-email="<?= $item->email ?>"
                                                data-update-address="<?= $item->address ?>"
                                                data-update-comment="<?= $item->comment ?>"
                                                id="editContractorInModal">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>*/?>
                                            <button
                                                type="button"
                                                class="btn btn-sm btn-block btn-default"
                                                data-toggle="modal"
                                                data-target="#modalUpdateContractors"
                                                data-id="<?= $item->id ?>"
                                                id="editContractorInModal">
                                                <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                            </button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">
                                        <?= $message ?>
                                    </td>
                                </tr>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

<?php include_once __DIR__ . '/../layouts/footer.php'; ?>