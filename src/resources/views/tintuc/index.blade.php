@extends('layout.layout')
@section('css')

@endsection
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Tin tức
                    <small>danh sách</small>
                </h1>
            </div>
            <!-- /.col-lg-12 -->
            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                <thead>
                    <tr align="center">
                        <th>ID</th>
                        <th>Tiêu đề</th>
                        <th>Nội dung</th>
                        <th>Trạng thái</th>
                        <th>Người tạo</th>
                       
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data as $item)
                    <tr class="odd gradeX" align="center">
                        <td>{{$item->id +1}}</td>
                        <td>{{$item->title}}</td>
                        <td>{!!trim(substr($item->content, 0, 200))!!}...</td>
                        <td>{{$item->status}}</td>
                        <td>{{$item->created_by}}</td>
                      
                        <td class="center"><button class=" btn btn-danger" type="button" data-url="/tintuc/{{$item->id}}" id="delete"> Delete</button></td>
                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="/tintuc/{{$item->id}}/edit">Edit</a></td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
@endsection
@section('js')
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(function() {
            $('#delete').on('click', function(e) {
                e.preventDefault();
                let urlreq = $(this).data('url');
                let that = $(this);
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let token = document.head.querySelector('[name=csrf-token]').content;
                        $.ajax({
                            type: 'delete',
                            url: urlreq,
                            data:{
                                _token:token
                            },
                            success: function(datas) {
                                if (datas.code == 200) {
                                    that.parent().parent().remove();
                                    Swal.fire(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                    )
                                }
                            }
                        })
                    }
                })
            })
        })
    
 
</script>
@endsection