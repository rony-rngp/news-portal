@extends('layouts.backend.app')

@section('title', 'Ads')

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
                            <h4 class="card-title">Ads List</h4>
                          </div><hr style="margin: 0">
                          <div class="card-body card-dashboard">
                            <div class="table-responsive">
                              <table class="table zero-configuration">
                                <thead>
                                  <tr>
                                    <th>#SL</th>
                                    <th>Link</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                  </tr>
                                </thead>
                                <tbody>
                                    @foreach ($ads as $key => $ad)
                                    <tr>
                                        <td>{{ $key+1 }}</td>
                                        <td>{{ $ad->link }}</td>
                                        <td><img style="height:auto; width:100%" src="{{ url($ad->image) }}"></td>
                                        <td>
                                            <input type="checkbox" data-toggle="toggle" data-width="80" data-height="30" data-on="On"  data-off="Off" id="status" data-id="{{ $ad->id }}"  {{ $ad->status == 1 ? 'checked' : '' }} >
                                        <td>
                                            <a href="{{ route('edit.ads',$ad->id) }}" title="Edit"><i class="bx bx-edit"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                  <tr>
                                    <th>#SL</th>
                                    <th>Link</th>
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
                url: "{{ route('ads.status') }}",
                type: "GET",
                data: {id : id, status : status},
                success: function (result) {
                    console.log(result);
                }
            })
        });
    </script>
@endpush
