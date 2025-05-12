var dataTable;
$(document).ready(function () {
    loadDataTable();

    // Set focus on product name field
    $("#ProductName").first().focus();

    // Custom validation settings
    setTimeout(function () {
        $("#newProMas").validate().settings.onkeyup = false;
        $("#newProMas").validate().settings.onfocusout = function (element) {
            this.element(element);
        };
    }, 0);

    // Handle subgroup change to get group information
    $("#SubGroupID").change(function () {
        var selectedSubGroupId = $(this).val(); // Get the selected SubGroup ID
        console.log("Selected SubGroup ID:", selectedSubGroupId); // Debugging log

        $.ajax({
            url: "/subgroup/get-group", // Use the correct route URL
            type: "GET",
            data: { subgroup_id: selectedSubGroupId }, // Pass the selected SubGroup ID
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') // CSRF token for security
            },
            success: function (data) {
                console.log("Response Data:", data); // Debugging log
                // Update the Group input field if the group name is not undefined
                if (data && data.group_name !== undefined) {
                    $("#GroupName").val(data.group_name); // Set the GroupName field with the returned value
                } else {
                    console.warn("Group name is undefined in the response.");
                }
            },
            error: function (error) {
                console.error('Error fetching Group data: ', error);
            }
        });
    });

    // Handle row click event for details display
    $('#proMaster tbody').on('click', 'tr', function () {
        // Remove the 'selected' class from all other rows
        dataTable.$('tr.selected').removeClass('selected');

        // Add the 'selected' class to the clicked row
        $(this).addClass('selected');

        // Get data of the selected row
        var rowData = dataTable.row(this).data();
        console.log(rowData['ProductName']);
        $('#proName').text(rowData['ProductName']);
        $('#gName').text(rowData['GroupName']);
        $('#sGName').text(rowData['SubGroupName']);
        $('#creDate').text(rowData['CreatedDate']);
        $('#modDate').text(rowData['ModifiedDate']);
    });
});

function loadDataTable() {
    dataTable = $('#proMaster').DataTable({
        "ajax": {
            url: '/productmaster/get-all',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        },
        "paging": true,
        "select": true,
        "lengthChange": true,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
        "columns": [
            { data: 'ProductName' },
            { data: 'GroupID', visible: false },
            { data: 'SubGroupName' },
            { data: 'IsActive', visible: false },
            { data: 'CreatedDate', visible: false },
            { data: 'CreatedBy', visible: false },
            { data: 'ModifiedDate', visible: false },
            { data: 'ModifiedBy', visible: false },
            {
                data: 'ID',
                render: function (data, type, row) {
                    var btns = "<div>";
                    if (row.can_edit) {
                        btns += "<a href='/productmaster/" + row.ID + "/edit' class='btn btn-sm btn-success mx-2'><i class='bi bi-pen'></i> Edit</a>";
                    }
                    if (row.can_delete) {
                        btns += "<a href='javascript:void(0);' onClick=\"Delete('" + row.ID + "')\" class='btn btn-sm btn-danger mx-2'><i class='bi bi-trash'></i> Delete</a>";
                    }
                    btns += "</div>";
                    return btns;
                }
            }
        ],
        order: [[4, 'desc']] // Order by created date descending
    });
}

function Delete(id) {
    Swal.fire({
        title: "Delete",
        text: "Are you sure about deleting this?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Yes, delete it!"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/productmaster/' + id,
                type: "DELETE",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.success) {
                        dataTable.ajax.reload();
                        $('#proName').text('');
                        $('#gName').text('');
                        $('#sGName').text('');
                        $('#creDate').text('');
                        $('#modDate').text('');
                        
                        Swal.fire({
                            title: "Deleted!",
                            text: data.message,
                            icon: "success"
                        });
                    } else {
                        Swal.fire({
                            title: "Status",
                            text: data.message, // This will show the specific reason for failure
                            icon: "error"
                        });
                    }
                }
            });
        }
    });
}
