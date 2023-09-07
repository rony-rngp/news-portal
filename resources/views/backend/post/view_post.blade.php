@extends('layouts.backend.app')

@section('title', 'Posts')

@push('css')

@endpush

@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <section id="basic-datatable">
                    <div class="row">
                      <div class="col-12">
                        <div class="card">
                          <div class="card-header">
                            <h4 class="card-title">Post List</h4>
                            <a href="{{ route('add.post') }}" class="btn btn-primary">Add Post</a>
                          </div><hr style="margin: 0">
                          <div class="card-body card-dashboard">
                            <div class="table-responsive">
                              <table class="table zero-configuration">
                                <thead>
                                  <tr>
                                    <th>#SL</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($posts as $key => $post)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ Str::limit($post->title, '30') }}</td>
                                        <td>{{ $post->category->name }}</td>
                                        <td><img src="{{ asset('public/backend/upload/posts/list_image/'.$post->image) }}" alt=""></td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-width="80" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $post->id }}"  {{ $post->status == 1 ? 'checked' : '' }} >
                                        <td>
                                            <a href="{{ route('edit.post',$post->id) }}" title="Edit"><i class="bx bx-edit"></i></a>&nbsp;&nbsp;

                                            <a href="javascript:void(0)" id="delete" type="button" onclick="deleteData({{ $post->id }})">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $post->id }}" action="{{ route('destroy.post', $post->id) }}" method="post" style="display: none">
                                                @csrf
                                                @method('post')
                                            </form>
                                            <!--End Delete Data-->
                                        </td>
                                      </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>#SL</th>
                                    <th>Title</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </tfoot>
                              </table>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </section>
            </div>
        </div>
    </div>

@endsection

@push('js')
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <script>
        $(document).on('change', '#status', function () {
            var id = $(this).attr('data-id');
            if(this.checked){
                var status = 1;
            }else{
                var status = 0;
            }

            $.ajax({
                url: "{{ route('post.status') }}",
                type: "GET",
                data: {id : id, status : status},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush
