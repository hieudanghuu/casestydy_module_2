var post = post || {};
post.drawTable = function(){
    $.ajax({
        url:'/api/dashboard/post',
        method : 'GET',
        dataType : 'json',
        success : function(data){
            // console.log(data);
            $('#postTable').empty();
            $.each(data, function(index, value){
                $('#postTable').append(
                    "<tr>"+
                    "<td>" + index + "</td>" +
                    "<td>" + value.post_title + "</td>" +
                    // "<td>" + value.content + "</td>" +
                    "<td>" + " <img style='width: 100px ; height: auto' src='/minishop/images/"+value.image+"'/>" +  "</td>" +
                    "<td>" + value.post_category_id + "</td>" +
                    "<td>" +
                    "<a href='javascript:;' onclick=post.getDetail(" + value.id + ")><i class='fa fa-edit'></i></a> " +
                    "<a href='javascript:;' onclick=post.delete(" + value.id + ")><i class='fa fa-trash'></i></a>" +
                    "</td>" +
                    "</tr>"
                );
            });
        }
    });
};
post.save = function(){
    if($('#frmAddEdit').valid()){
        var dataObj = {};
        if($('#Id').val() == 0){
            dataObj.post_title = $('#post_title').val();
            dataObj.content = $('#content').val();
            dataObj.image = $('#image').val();
            dataObj.post_category_id = $('#post_category_id').val();
            // console.log(dataObj)
            $.ajax({
                url: '/api/dashboard/post',
                method: 'POST',
                data: JSON.stringify(dataObj),
                dataType: 'json',
                contentType: 'application/json',
                success: function (data) {
                    $('#addEditUser').modal('hide');
                    $('#frmAddEdit')[0].reset();
                    post.drawTable();
                }
            });
        }else{
            dataObj.post_title = $('#post_title').val();
            dataObj.content = $('#content').val();
            dataObj.image = $('#image').val();
            dataObj.post_category_id = $('#post_category_id').val();
            dataObj.id = $('#Id').val();
            $.ajax({
                url: '/api/dashboard/post/' + dataObj.id,
                method: 'PUT',
                data: JSON.stringify(dataObj),
                dataType: 'json',
                contentType: 'application/json',
                success: function (data) {
                    $('#addEditUser').modal('hide');
                    post.drawTable();
                }
            });
        }
    }
};

post.resetForm = function () {
    $('#post_title').val();
    $('#content').val();
    $('#image').val();
    $('#post_category_id').val();
    $('#Id').val(0);
    $('#addEditModel').find('.modal-title').text('Create New User');
    $("#frmAddEdit").validate().resetForm();
};

post.openAddEditUser = function(){
    post.resetForm();
    $('#addEditUser').modal('show');
};

post.getDetail = function (id) {
    post.resetForm();
    $.ajax({
        url: '/api/dashboard/post/' + id,
        method: 'GET',
        dataType: 'json',
        contentType: 'application/json',
        success: function (data) {
            $('#post_title').val(data.post_title);
            $('#content').val(data.content);
            $('#post_category_id').val(data.post_category_id);
            $('#image').attr('src',data.image);
            $('#Id').val(data.id);
            $('#addEditUser').find('.modal-title').text('Update User');
            $('#addEditUser').modal('show');
        }
    });
};

post.delete = function (id) {
    bootbox.confirm({
        message: "本当に削除しますか？ ",
        buttons: {
            confirm: {
                label: 'わかった',
                className: 'btn-success'
            },
            cancel: {
                label: 'いいえ!!!',
                className: 'btn-danger'
            }
        },
        callback: function (result) {
            if (result) {
                $.ajax({
                    url: '/api/dashboard/post/' + id,
                    method: 'DELETE',
                    dataType: 'json',
                    contentType: 'application/json',
                    success: function (data) {
                        post.drawTable();
                    }
                });
            }
        }
    });
};

post.init =function () {
    post.drawTable();
};

$(document).ready(function () {
    post.init();
});
