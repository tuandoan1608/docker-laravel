@extends('layout.layout')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">tin tức
                    <small>Add</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <div class="col-lg-7" style="padding-bottom:120px">
                <form action="/tintuc" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Tiêu đề</label>
                        <input class="form-control" name="title" placeholder="Please Enter Username" />
                    </div>
                    <div class="form-group">
                        <label>Nội dung</label>
                        <textarea id="my-editor" name="content" class="form-control"></textarea>
                        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
                        <script>
                            let token = document.head.querySelector('[name=csrf-token]').content;
                            var options = {
                                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=' + token,
                                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token=' + token,
                            };
                        </script>
                    
                        
                        <script>
                            CKEDITOR.replace('my-editor', options);
                        </script>
                    
                    </div>          
                    <div class="form-group">
                        <label>Trạng thái</label>
                        <label class="radio-inline">
                            <input name="status" value="1" checked="" type="radio">Visible
                        </label>
                        <label class="radio-inline">
                            <input name="status" value="0" type="radio">Invisible
                        </label>
                    </div>
                    <button type="submit" class="btn btn-default">Add</button>
                    <button type="reset" class="btn btn-default">Reset</button>
                <form>
            </div>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
