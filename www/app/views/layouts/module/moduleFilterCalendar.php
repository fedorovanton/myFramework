<?php
/**
 * Универсальный календарный фильтр
 */
?>
<form action="<?= (isset($linkRoute)) ? $linkRoute : '' ?>" method="post">
    <div class="btn-group">
        <button type="submit" name="filterToday" class="btn btn-default <?= ($_SESSION['filter_calendar'] == 'filterToday') ? 'active' : '' ?>">Сегодня</button>
        <?php if (isset($filterWeekFuture)): ?>
            <button type="submit" name="filterWeekFuture" class="btn btn-default <?= ($_SESSION['filter_calendar'] == 'filterWeekFuture') ? 'active' : '' ?>">Неделя+</button>
        <?php else: ?>
            <button type="submit" name="filterWeekPast" class="btn btn-default <?= ($_SESSION['filter_calendar'] == 'filterWeekPast') ? 'active' : '' ?>">Неделя-</button>
        <?php endif; ?>
        <button type="button" class="btn btn-default <?= ($_SESSION['filter_calendar'] == 'filterOneDay') ? 'active' : '' ?>" data-toggle="modal" data-target="#modalSelectOneDay">Дата</button>
        <button type="button" class="btn btn-default <?= ($_SESSION['filter_calendar'] == 'filterPeriod') ? 'active' : '' ?>" data-toggle="modal" data-target="#modalSelectPeriod">Период</button>
    </div>
</form>

<!-- Форма модального окна для #modalSelectOneDay -->
<?php include_once __DIR__ . '/../modal/modalSelectOneDay.php'; ?>
<!-- / Форма модального окна для #modalSelectOneDay -->

<!-- Формка модального окна для #modalSelectPeriod -->
<?php include_once __DIR__ . '/../modal/modalSelectPeriod.php'; ?>
<!-- / Формка модального окна для #modalSelectPeriod -->