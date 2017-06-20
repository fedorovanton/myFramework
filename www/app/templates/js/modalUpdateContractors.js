/**
 * Created by fedorovau on 10.10.16.
 */
/*
$(function () {
    // Раздел Контрагенты. Перенос полей на форму для редактирвоания
    $(document).on("click", "#editContractorInModal", function () {
        $("#update_contractors_id").val(parseInt($(this).data('update-id')));
        $("#update_contractors_name").val($(this).data('update-name'));
        $("#update_contractors_fio").val($(this).data('update-fio'));
        $("#update_contractors_tel").val($(this).data('update-tel'));
        $("#update_contractors_email").val($(this).data('update-email'));
        $("#update_contractors_address").val($(this).data('update-address'));
        $("#update_contractors_comment").val($(this).data('update-comment'));
    });
});
*/
$(function () {
    $(document).on("click", "#editContractorInModal", function () {
        //создаем объект данных
        var objDataForms = {
            id: $(this).data("id")
        };

        var jsonDataForms = JSON.stringify(objDataForms);

        $.ajax({
            type: 'POST',
            url: 'contractorsOne',
            data: 'jsonDataForms=' + jsonDataForms,
            success: function (resultJSON) {
                var resultObj = JSON.parse(resultJSON);
                $("#update_contractors_id").val(resultObj.id);
                $("#update_contractors_name").val(resultObj.name);
                $("#update_contractors_fio").val(resultObj.fio);
                $("#update_contractors_tel").val(resultObj.tel);
                $("#update_contractors_email").val(resultObj.email);
                $("#update_contractors_address").val(resultObj.address);
                $("#update_contractors_comment").val(resultObj.comment);
                if (resultObj.flag_supplier == 1) {
                    $( "#update_flag_supplier" ).prop( "checked", true );
                } else {
                    $( "#update_flag_supplier" ).prop( "checked", false );
                }
                if (resultObj.flag_sales_channel == 1) {
                    $( "#update_flag_sales_channel" ).prop( "checked", true );
                } else {
                    $( "#update_flag_sales_channel" ).prop( "checked", false );
                }
            }
        });
    });
});