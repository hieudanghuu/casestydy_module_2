<div id="addEditUser" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <form id="frmAddEdit" enctype="multipart/form-data">
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Create New User</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <input hidden id="Id" name="Id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">post_title</label>
                        <input type="text" class="form-control"  name="post_title" id="post_title" required>
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">content</label>
                        <textarea name="content1" class="form-control" id="content" cols="30" rows="4" required></textarea>
                    </div>
                    <div class="form-group">
                        <img src="" alt="" id="photo" style="height: 100px">
                        <input type="file" class="form-control"   id="image" name="image" required onchange="readURL(this);">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">post_category_id</label>

                        <input type="number" class="form-control"  id="post_category_id" name="post_category_id" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info" data-dismiss="modal">Close</button>
                    <a href="javascript:;" class="btn btn-danger" onclick="post.save()">Save</a>
                </div>
            </div>
        </form>
    </div>
</div>

