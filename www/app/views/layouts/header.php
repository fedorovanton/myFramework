<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Система управления флористического салона">
    <meta name="author" content="Fedorov Anton">

    <title>FloraCRM</title>

    <!-- Bootstrap Core CSS -->
    <link href="/app/templates/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/app/templates/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/app/templates/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/app/templates/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <link href="/app/templates/css/site.ver1.css" rel="stylesheet" type="text/css">

    <!-- jQuery UI css -->
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <!-- jQuery -->
    <script src="/app/templates/js/jquery.js"></script>

    <!-- jQuery UI javascript -->
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/app/templates/js/bootstrap.min.js"></script>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

<div id="wrapper">

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation" style="background-color: #1e6f00; height: 80px;">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="index.html">FloraCRM</a>
</div>

        <!-- Top Menu Items -->
        <?/*<ul class="nav navbar-right top-nav">

            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-envelope"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu message-dropdown">
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-preview">
                        <a href="#">
                            <div class="media">
                                    <span class="pull-left">
                                        <img class="media-object" src="http://placehold.it/50x50" alt="">
                                    </span>
                                <div class="media-body">
                                    <h5 class="media-heading"><strong>John Smith</strong>
                                    </h5>
                                    <p class="small text-muted"><i class="fa fa-clock-o"></i> Yesterday at 4:32 PM</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur...</p>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li class="message-footer">
                        <a href="#">Read All New Messages</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <b class="caret"></b></a>
                <ul class="dropdown-menu alert-dropdown">
                    <li>
                        <a href="#">Alert Name <span class="label label-default">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-primary">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-success">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-info">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-warning">Alert Badge</span></a>
                    </li>
                    <li>
                        <a href="#">Alert Name <span class="label label-danger">Alert Badge</span></a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#">View All</a>
                    </li>
                </ul>
            </li>
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> John Smith <b class="caret"></b></a>
                <ul class="dropdown-menu">
                    <li>
                        <a href="#"><i class="fa fa-fw fa-user"></i> Profile</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-envelope"></i> Inbox</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-gear"></i> Settings</a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a href="#"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                    </li>
                </ul>
            </li>
        </ul>*/?>
        <?php if(isset($sumPlanToday) > 0): ?>

            <div class="nav navbar-left top-nav" style="margin-left: 70px; color: #fff;">
                <table class="table table-condensed" style="height: 60px; margin-top: 5px;">
                    <tr>
                        <td style="border: 0; width: 200px;">
                            <small>
                            План на день: <?= (isset($sumPlanToday)) ? $sumPlanToday : 0 ?> руб. </br>
                            Факт на день: <?= (isset($sumOrdersToday)) ? $sumOrdersToday : 0 ?> руб.
                            </small>
                        </td>
                        <td style="border: 1px solid #fff; width: 150px; text-align: center;">
                            Осталось до плана:<br/>
                            <span class="lead"><?= (isset($sumNeedToday)) ? $sumNeedToday : 0 ?> руб.</span>
                        </td>
                    </tr>
                </table>
            </div>
            <?php if (date("Y-m-d H:i:s") < '2017-02-16 10:00:00'): ?>
                <div class="col-md-6">
                    <div class="alert alert-info alert-dismissable" style="height: 60px; margin-top: 5px; padding: 5px;">
                        <strong>Объявление!</strong> Введены остатки на 10.02.2017 согласно файлу. Остатки пересчитаны за каждый день по 15.02.2017. <strong>Объявление исчезнет 16.02 в 10:00.</strong>
                    </div>
                </div>
            <?php endif; ?>
        <?php endif;?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

<div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav side-nav" style="background-color: #f5f5f5; width: 200px; margin-top: 30px;">
        <li>
            <a href="order"><i class="fa fa-fw fa-tag"></i> Продажи</a>
        </li>
        <li>
            <a href="cashbox"><i class="fa fa-money" aria-hidden="true"></i> Касса</a>
        </li>
        <li>
            <a href="incoming"><i class="fa fa-plus-circle" aria-hidden="true"></i> Поступление</a>
        </li>
        <li>
            <a href="rest"><i class="fa fa-list-alt" aria-hidden="true"></i> Остатки</a>
        </li>
        <li>
            <a href="selectPrices"><i class="fa fa-rub" aria-hidden="true"></i> Цены</a>
        </li>
        <li>
            &nbsp;
        </li>
<!--        <li>-->
<!--            <a href="addFirstRest"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Начальные остатки</a>-->
<!--        </li>-->
        <?/*<li>
            <a href="rest"><i class="fa fa-home" aria-hidden="true"></i> Склад</a>
            <ul class="nav nav-pills nav-stacked">
                <li>
                    <a href="incoming"><i class="fa fa-plus-circle" aria-hidden="true"></i> Поступление</a>
                </li>
                <li>
                    <a href="cancellation"><i class="fa fa-minus-circle" aria-hidden="true"></i> Списание</a>
                </li>
                <li>
                    <a href="rest"><i class="fa fa-list-alt" aria-hidden="true"></i> Остатки</a>
                </li>
                <li>
                    <a href="selectPrices"><i class="fa fa-rub" aria-hidden="true"></i> Цены</a>
                </li>
                <li>
                    <a href="supplier"><i class="fa fa-truck" aria-hidden="true"></i> Поставщики</a>
                </li>
                <li>
                    <a href="salesChannel"><i class="fa fa-male" aria-hidden="true"></i> Заказчики</a>
                </li>
            </ul>
        </li>*/?>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#menuDown0"><i class="fa fa-fw fa-home"></i>
                Склад <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="menuDown0" class="collapse">
<!--                <li>-->
<!--                    <a href="incoming"><i class="fa fa-plus-circle" aria-hidden="true"></i> Поступление</a>-->
<!--                </li>-->
                <li>
                    <a href="cancellation"><i class="fa fa-minus-circle" aria-hidden="true"></i> Списание</a>
                </li>
<!--                <li>-->
<!--                    <a href="selectPrices"><i class="fa fa-rub" aria-hidden="true"></i> Цены</a>-->
<!--                </li>-->
                <li>
                    <a href="supplier"><i class="fa fa-truck" aria-hidden="true"></i> Поставщики</a>
                </li>
                <li>
                    <a href="salesChannel"><i class="fa fa-male" aria-hidden="true"></i> Заказчики</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#menuDown1"><i class="fa fa-fw fa-truck"></i>
                Доставка <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="menuDown1" class="collapse">
                <li>
                    <a href="couriers"><i class="fa fa-car" aria-hidden="true"></i> Курьеры</a>
                </li>
                <li>
                    <a href="costDelivery"><i class="fa fa-rub" aria-hidden="true"></i> Стоимость</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#menuDown2"><i class="fa fa-money" aria-hidden="true"></i> Финансы <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="menuDown2" class="collapse">
<!--                <li>-->
<!--                    <a href="cashboxExpenses"><i class="fa fa-money" aria-hidden="true"></i> Касса - расходы</a>-->
<!--                </li>-->
                <li>
                    <a href="bankAccountIncome"><i class="fa fa-plus-square-o" aria-hidden="true"></i> Р/с - поступление</a>
                </li>
                <li>
                    <a href="bankAccountOutcome"><i class="fa fa-minus-square-o" aria-hidden="true"></i> Р/с -
                        расходы</a>
                </li>
                <li>
                    <a href="contractors"><i class="fa fa-users" aria-hidden="true"></i> Контрагенты</a>
                </li>
                <li>
                    <a href="typesExpenses"><i class="fa fa-list" aria-hidden="true"></i> Виды расходов</a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" data-toggle="collapse" data-target="#menuDown3"><i class="fa fa-fw fa-bar-chart"></i>
                Отчеты <i class="fa fa-fw fa-caret-down"></i></a>
            <ul id="menuDown3" class="collapse">
                <li>
                    <a href="analiz_prodazh"><i class="fa fa-line-chart" aria-hidden="true"></i> Анализ продаж</a>
                </li>
                <li>
                    <a href="analiz_rashodov"><i class="fa fa-pie-chart" aria-hidden="true"></i> Анализ расходов</a>
                </li>
                <li>
                    <a href="akty_sverok"><i class="fa fa-object-ungroup" aria-hidden="true"></i> Акт-сверки</a>
                </li>
                <li>
                    <a href="marzhinalnost_tovara"><i class="fa fa-signal" aria-hidden="true"></i> Маржинальность товара</a>
                </li>
                <li>
                    <a href="dvizheniye_tsvetka"><i class="fa fa-retweet" aria-hidden="true"></i> Движение цветка</a>
                </li>
                <li>
                    <a href="otchet_po_prodazham"><i class="fa fa-bar-chart" aria-hidden="true"></i> Отчет по продажам</a>
                </li>
            </ul>
        </li>
        <?/*
        <li>
            <a href="bootstrap-elements.html"><i class="fa fa-fw fa-calendar"></i> Ведомость</a>
        </li>
        <li>
            <a href="bootstrap-grid.html"><i class="fa fa-fw fa-briefcase"></i> Баланс</a>
        </li>
        */?>
        <li>
            <a href="plan_prodazh"><i class="fa fa-tasks" aria-hidden="true"></i> Планы продаж</a>
        </li>
        <!--<li>
            <img src="/app/templates/images/floracrm-logo.png" style="width: 150px; margin: 10px 10px;">
        </li>-->
    </ul>
</div>
<!-- /.navbar-collapse -->
</nav>