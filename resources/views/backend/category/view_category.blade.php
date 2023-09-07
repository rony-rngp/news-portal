@extends('layouts.backend.app')

@section('title', 'Categories')

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
                            <h4 class="card-title">Category List</h4>
                            <a href="{{ route('add.category') }}" class="btn btn-primary">Add Category</a>
                          </div><hr style="margin: 0">
                          <div class="card-body card-dashboard">
                            <div class="table-responsive">
                              <table class="table zero-configuration">
                                <thead>
                                  <tr>
                                    <th>#SL</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $key => $category)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{  $category->slug }}</td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-width="80" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $category->id }}"  {{ $category->status == 1 ? 'checked' : '' }} >
                                        <td>
                                            <a href="{{ route('edit.category',$category->id) }}" title="Edit"><i class="bx bx-edit"></i></a>&nbsp;&nbsp;

                                            <a href="javascript:void(0)" id="delete" type="button" onclick="deleteData({{ $category->id }})">
                                                <i class="bx bx-trash"></i>
                                            </a>
                                            <form id="delete-form-{{ $category->id }}" action="{{ route('destroy.category', $category->id) }}" method="post" style="display: none">
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
                                    <th>Name</th>
                                    <th>Slug</th>
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
                url: "{{ route('category.status') }}",
                type: "GET",
                data: {id : id, status : status},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush
