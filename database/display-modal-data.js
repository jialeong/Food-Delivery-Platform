$(document).ready(function () {
    /*  ------------ DISPLAY TABLE DATA START -------------    */
    fetch_data();
    var result = [];
    var img;
    var id;

    function fetch_data() {
        var action = "fetch";
        $.ajax({
            url: "display.php",
            type: "POST",
            data: {action: action},
            dataType: "json", //to parse string into JSON object,
            success: function (data) {

                // Find a <table> element
                var table = $('#itemList').DataTable();

                for (i = 0; data.length > i; i++) {
                    var row_data = '<tr id="item">'
                            + '<td><div class="photo">'
                            + '<img src= "assets/img/food-and-beverage/' + data[i].item_img + '" id="itemImage" alt="' + data[i].item_img + '"/></div></td>'
                            + '<td id="itemName">' + data[i].item_name + '</td>'
                            + '<td id="itemType">' + data[i].item_type + '</td>'
                            + '<td id="itemPr">' + data[i].item_pr + '</td>'
                            + '<td><button class="btn btn-primary btn-border btn-round select-item"'
                            + 'data-toggle="modal" data-target="#editItemForm" id="' + data[i].item_id + '">Edit</button></td>'
                            + '</tr>';

                    table.rows.add($(row_data)).draw();
                }

                // Get Data from table row
                $(".select-item").click(function () {
                    var $row = $(this).closest("tr"), // Finds the closest row <tr> 
                            $tds = $row.find("td");     // Finds all children <td> elements

                    id = this.id;
                    $.each($tds, function () {          // Visits every single <td> element
                        //console.log($(this).text());
                        result.push($(this).text());    // push data into array
                    });

                });

                /*  ------------ DISPLAY MODAL DATA START -------------    */
                /* modal and display data */
                $('#editItemForm').on('show.bs.modal', function (event) {
                    // reset form
                    $(this)
                            .find("input,textarea,select")
                            .val('')
                            .end()
                            .find("input[type=checkbox], input[type=radio]")
                            .prop("checked", "")
                            .end();

                    var button = $(event.relatedTarget);    // Button that triggered the modal
                    var modal = $(this);

                    /* show data in modal */
                    modal.find('#itemId').val(id);
                    modal.find('#itemName').val(result[1]);
                    modal.find('#itemType').val(result[2]);
                    modal.find('#itemPr').val(result[3]);

                    /* remove the array */
                    while (result.length > 0) {
                        result.pop();
                    }
                });
                /*  ------------ DISPLAY MODAL DATA END -------------    */
            }
        });
        /*  ------------ DISPLAY TABLE DATA END -------------    */
    }

    //unused function
    function clear_form() {
        var $t = $(this),
                target = $t[0].href || $t.data("target") || $t.parents('.modal') || [];

        $(target)
                .find("input,textarea,select")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
    }

    /* modal:editItemForm - btn delete event */
    $(document).on('click', "[name='delete']", function () {
        if (confirm("Are you sure you want to remove this menu from database?")) {
            return true;
        } else {
            return false;
        }
    });

    /* modal:editItemForm - btn update event */
    $(document).on('click', "[name='update']", function () {
        if (confirm("Please make sure all information is correct before update.\n\n\
Are you sure to update the menu?")) {
//            $.get('check-img-exist.php', {check: "check"}, function (result) {
//                alert(result);
//                if (result == 'exist') {
//                    alert("The image uploaded is already existed in the system\
// and may be used by other menu.\nIt is recommend to change to another image.");
//                    return false;
//                }
//
//            });
            return true;
        } else {
            return false;
        }
    });

    /* modal:addItemForm - display modal */
    $('#addItemForm').on('show.bs.modal', function () {
        $(this)
                .find("input,textarea,select")
                .val('')
                .end()
                .find("input[type=checkbox], input[type=radio]")
                .prop("checked", "")
                .end();
    });
});

