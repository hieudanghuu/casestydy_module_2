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
                        <input type="text" class="form-control"  name="post_title" id="post_title">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">content</label>
                        <textarea name="content1" class="form-control" id="content" cols="30" rows="4"></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control"  id="image" name="image">
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">post_category_id</label>
                        <input type="number" class="form-control"  id="post_category_id" name="post_category_id">
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



{{--<div class="modal fade" id="addEditUser" tabindex="-1" role="dialog"--}}
{{--     aria-labelledby="exampleModalLabel" aria-hidden="true">--}}
{{--    <div class="modal-dialog modal-lg" role="document">--}}
{{--        <div class="modal-content">--}}
{{--            <div class="modal-header">--}}
{{--                <h5 class="modal-title" id="exampleModalLabel">Modal--}}
{{--                    title</h5>--}}
{{--                <button type="button" class="close" data-dismiss="modal"--}}
{{--                        aria-label="Close">--}}
{{--                    <span aria-hidden="true">&times;</span>--}}
{{--                </button>--}}
{{--            </div>--}}
{{--            <div class="modal-body">--}}
{{--                ...--}}
{{--            </div>--}}
{{--            <div class="modal-footer">--}}
{{--                <button type="button" class="btn btn-secondary"--}}
{{--                        data-dismiss="modal">Close--}}
{{--                </button>--}}
{{--                <button type="button" class="btn btn-primary">Save changes--}}
{{--                </button>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
