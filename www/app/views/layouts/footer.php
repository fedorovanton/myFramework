</div>
<!-- /#wrapper -->

<!-- My user scripts -->
<!--<script src="/app/templates/js/formsProcessing.js"></script>-->
<!--<script src="/app/templates/js/insertAjaxInDb.js"></script>-->
<!--<script src="/app/templates/js/updateAjaxInDb.js"></script>-->

<!-- Morris Charts JavaScript -->
<!--<script src="/app/templates/js/plugins/morris/raphael.min.js"></script>-->
<!--<script src="/app/templates/js/plugins/morris/morris.min.js"></script>-->
<!--<script src="/app/templates/js/plugins/morris/morris-data.js"></script>-->

<?= isset($javascript) ? $javascript : ''; // вывести все подключенные скрипты ?>
</body>

</html>
<?php
    // вывод любого alert() после редиректа страницы
    if(isset($_SESSION['alert'])) {
        echo $_SESSION['alert'];
        unset($_SESSION['alert']);
    }
?>