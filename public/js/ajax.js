var sims = sims || {};
sims.drawTable = function(){
    $.ajax({
        url:'/api/dashboard/product/',
        method : 'GET',
        dataType : 'json',
        success : function(data){
            console.log(data);
            $('#sims').empty();
            $.each(data, function(index, value){
                $('#sims').append(
                    "<tr>"+
                    "<td>" + value.sim_id + "</td>" +
                    "<td>" + value.sim_name + "</td>" +
                    "<td>" + value.sim_price + "</td>" +
                    "<td>" + value.sim_image + "</td>" +
                    // "<td>" + value.productDescription + "</td>" +
                    // "<td>" + value.quantityInStock + "</td>" +
                    // "<td>" + value.buyPrice + "</td>" +
                    // "<td>" + value.MSRP + "</td>" +
                    // "<td>" + value.image + "</td>" +
                    "<td>" +
                    "<a href='javascript:;' onclick=sims.getDetail(" + value.sim_id + ")><i class='fa fa-edit'></i></a> " +
                    "<a href='javascript:;' onclick=sims.delete(" + value.sim_id + ")><i class='fa fa-trash'></i></a>" +
                    "</td>" +
                    "</tr>"
                );
            });
        }
    });
};
sims.save = function(){
    if($('#frmAddEditUser').valid()){
        var dataObj = {};
        if($('#Id').val() == 0){
            dataObj.productName = $('#productName').val();
            dataObj.productLineId = $('#productLineId').val();
            dataObj.productScale = $('#productScale').val();
            dataObj.productVendor = $('#productVendor').val();
            dataObj.productDescription = $('#productDescription').val();
            dataObj.quantityInStock = $('#quantityInStock').val();
            dataObj.buyPrice = $('#buyPrice').val();
            dataObj.MSRP = $('#MSRP').val();
            dataObj.image = $('#image').val();
            $.ajax({
                url: '/api/admin/sanpham/',
                method: 'POST',
                data: JSON.stringify(dataObj),
                dataType: 'json',
                contentType: 'application/json',
                success: function (data) {
                    $('#addEditModel').modal('hide');
                    product.drawTable();
                }
            });
        }else{
            dataObj.productName = $('#productName').val();
            dataObj.productLineId = $('#productLineId').val();
            dataObj.productScale = $('#productScale').val();
            dataObj.productVendor = $('#productVendor').val();
            dataObj.productDescription = $('#productDescription').val();
            dataObj.quantityInStock = $('#quantityInStock').val();
            dataObj.buyPrice = $('#buyPrice').val();
            dataObj.MSRP = $('#MSRP').val();
            dataObj.image = $('#image').val();
            dataObj.id = $('#Id').val();
            $.ajax({
                url: '/api/admin/sanpham/' + dataObj.id,
                method: 'PUT',
                data: JSON.stringify(dataObj),
                dataType: 'json',
                contentType: 'application/json',
                success: function (data) {
                    $('#addEditModel').modal('hide');
                    product.drawTable();
                }
            });
        }
    }
};

product.resetForm = function () {
    $('#productName').val();
    $('#productLineId').val();
    $('#productScale').val();
    $('#productVendor').val();
    $('#productDescription').val();
    $('#quantityInStock').val();
    $('#buyPrice').val();
    $('#MSRP').val();
    $('#image').val();
    $('#Id').val(0);
    $('#addEditModel').find('.modal-title').text('Create New User');
    $("#frmAddEditUser").validate().resetForm();
};

product.openAddEditUser = function(){
    product.resetForm();
    $('#addEditUser').modal('show');
};

product.getDetail = function (id) {
    product.resetForm();
    $.ajax({
        url: '/api/admin/sanpham/' + id,
        method: 'GET',
        dataType: 'json',
        contentType: 'application/json',
        success: function (data) {
            $('#productName').val(data.productName);
            $('#productLineId').val(data.productLineId);
            $('#productScale').val(data.productScale);
            $('#productVendor').val(data.productVendor);
            $('#productDescription').val(data.productDescription);
            $('#quantityInStock').val(data.quantityInStock);
            $('#buyPrice').val(data.buyPrice);
            $('#MSRP').val(data.MSRP);
            $('#image').val(data.image);
            $('#Id').val(data.id);
            $('#addEditUser').find('.modal-title').text('Update User');
            $('#addEditUser').modal('show');
        }
    });
};

product.delete = function (id) {
    bootbox.confirm({
        message: "Mày thật sự ko muốn bán nó nữa ?",
        buttons: {
            confirm: {
                label: 'Yessss',
                className: 'btn-success'
            },
            cancel: {
                label: 'No!!!',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    url: '/api/admin/sanpham/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function (data) {
                        product.drawTable();
                    }
                });
            }
        }
    });
};

product.init = function () {
    product.drawTable();
};

$(document).ready(function () {
    product.init();
});
