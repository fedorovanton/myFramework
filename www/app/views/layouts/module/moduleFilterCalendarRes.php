<?php
/**
 * Универсальный вывод результатов
 */
?>
<?php if (isset($_SESSION['filter_calendar'])): ?>
    <ol class="breadcrumb">
        <li class="active">
            <?=  date("d.m.Y", strtotime($_SESSION['filter_begin'])) ?>
            <?= ' - ' ?>
            <?=  date("d.m.Y", strtotime($_SESSION['filter_end'])) ?>
        </li>
    </ol>
<?php endif; ?>