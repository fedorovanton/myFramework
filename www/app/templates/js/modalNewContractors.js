/**
 * Created by fedorovau on 10.10.16.
 */
$(function () {
    /**
     * Добавить Контрагента
     */
    $(document).on("click", "#insertContractorsNew", function () {

        //создаем объект данных
        var objDataForms = {
            name: $('#contractors_name').val(),
            fio: $('#contractors_fio').val(),
            tel: $('#contractors_tel').val(),
            email: $('#contractors_email').val(),
            address: $('#contractors_address').val(),
            comment: $('#contractors_comment').val(),
            flag_supplier: $("#contractors_flag_supplier").prop("checked"),
            flag_sales_channel: $("#contractors_flag_sales_channel").prop("checked")
        };

        var jsonDataForms = JSON.stringify(objDataForms);

        $.ajax({
            type: 'POST',
            url: 'contractorsNew',
            data: 'jsonDataForms=' + jsonDataForms,
            success: function (resultJSON) {
                var resultObj = JSON.parse(resultJSON);

                // добавляем строчку в выпадающий список контрагентов и позиционируемся на ней
                $('#contractorsList').append($("<option value=" + resultObj.id + ">" + resultObj.name + "</option>"));
                $('#contractorsList :last').attr('selected', 'selected');

                // добавляем строчку в таблицу на странице Контрагенты
                $("<tr><td>" + resultObj.name +
                "</td><td>" + resultObj.tel +
                "</td><td>" + resultObj.fio +
                "</td><td>" + resultObj.comment +
                "</td></tr>").insertAfter($("#tableForInsertData tr:last"));

                // скрываем модальное окно добавления поставщика
                $('#modalNewContractors').modal('hide');
            }
        });

        // очистка полей
        $("#contractors_name").val("");
        $("#contractors_fio").val("");
        $("#contractors_tel").val("");
        $("#contractors_email").val("");
        $("#contractors_address").val("");
        $("#contractors_comment").val("");

    });
});