<?php
/**
 * Модуль для календарного фильтра
 */
?>

<form action="<?= $linkRoute ?>" method="post">
    <div class="btn-group col-sm-12">
        <button type="submit" name="today"
                class="btn btn-default <?php if (!isset($_POST['begin']) && !isset($_POST['SearchOrderWeek']) && ($_SESSION['filter_check'] == 'today')) {
                    echo 'active';
                } ?>">Сегодня
        </button>
        <button type="submit" name="SearchOrderWeek"
                class="btn btn-default <?php if (isset($_POST['SearchOrderWeek']) || ($_SESSION['filter_check'] == 'week')) {
                    echo 'active';
                } ?>">Неделя
        </button>
        <button type="button" class="btn btn-default <?php if (isset($_POST['begin']) && !isset($_POST['end']) || ($_SESSION['filter_check'] == 'day')) {
            echo 'active';
        } ?>" data-toggle="modal" data-target="#modalSelectOneDay">Дата
        </button>
        <button type="button" class="btn btn-default <?php if (isset($_POST['begin']) && isset($_POST['end']) || ($_SESSION['filter_check'] == 'period')) {
            echo 'active';
        } ?>" data-toggle="modal" data-target="#modalSelectPeriod">Период
        </button>
    </div>
</form>

<!-- Форма модального окна для #modalSelectOneDay -->
<?php include_once __DIR__ . '/../modal/modalSelectOneDay.php'; ?>
<!-- / Форма модального окна для #modalSelectOneDay -->

<!-- Формка модального окна для #modalSelectPeriod -->
<?php include_once __DIR__ . '/../modal/modalSelectPeriod.php'; ?>
<!-- / Формка модального окна для #modalSelectPeriod -->