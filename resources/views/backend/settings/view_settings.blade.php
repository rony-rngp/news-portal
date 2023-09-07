@extends('layouts.backend.app')

@section('title', 'Settings')

@push('css')

@endpush

@section('content')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body"><!-- Dashboard Analytics Start -->
                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Settings</h4>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <form class="form" id="quickForms" action="{{ route('update.settings',$settings->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="author">Author Name</label>
                                                        <input type="text" name="author" class="form-control" id="author" value="{{ $settings->author }}" placeholder="Enter Author Name">
                                                        <span style="color:red">{{ $errors->has('author') ? $errors->first('author') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="system_name">System Name</label>
                                                        <input type="text" name="system_name" class="form-control" id="system_name" value="{{ $settings->system_name }}" placeholder="Enter System Name">
                                                        <span style="color:red">{{ $errors->has('system_name') ? $errors->first('system_name') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" name="address" class="form-control" id="address" value="{{ $settings->address }}" placeholder="Enter Address">
                                                        <span style="color:red">{{ $errors->has('address') ? $errors->first('address') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="phone">Phone</label>
                                                        <input type="text" name="phone" class="form-control" id="phone" value="{{ $settings->phone }}" placeholder="Enter Phone">
                                                        <span style="color:red">{{ $errors->has('phone') ? $errors->first('phone') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="email">E-Mail</label>
                                                        <input type="email" name="email" class="form-control" id="email" value="{{ $settings->email }}" placeholder="Enter Email">
                                                        <span style="color:red">{{ $errors->has('email') ? $errors->first('email') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="website">Website</label>
                                                        <input type="text" name="website" class="form-control" id="website" value="{{ $settings->website }}" placeholder="Enter Website">
                                                        <span style="color:red">{{ $errors->has('website') ? $errors->first('website') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="facebook">Facebook</label>
                                                        <input type="text" name="facebook" class="form-control" id="facebook" value="{{ $settings->facebook }}" placeholder="Enter Your Facebook Url">
                                                        <span style="color:red">{{ $errors->has('facebook') ? $errors->first('facebook') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="twitter">Twitter</label>
                                                        <input type="text" name="twitter" class="form-control" id="twitter" value="{{ $settings->twitter }}" placeholder="Enter Your Twitter Url">
                                                        <span style="color:red">{{ $errors->has('twitter') ? $errors->first('twitter') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="linked_in">Linked In</label>
                                                        <input type="text" name="linked_in" class="form-control" id="linked_in" value="{{ $settings->linked_in }}" placeholder="Enter Your LinkedIn Url">
                                                        <span style="color:red">{{ $errors->has('linked_in') ? $errors->first('linked_in') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="google_plus">Google Plus</label>
                                                        <input type="text" name="google_plus" class="form-control" id="google_plus" value="{{ $settings->google_plus }}" placeholder="Enter Your Google Plus Url">
                                                        <span style="color:red">{{ $errors->has('google_plus') ? $errors->first('google_plus') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8 col-12">
                                                    <div class="form-group">
                                                        <label for="youtube">Youtube</label>
                                                        <input type="text" name="youtube" class="form-control" id="youtube" value="{{ $settings->youtube }}" placeholder="Enter Your Youtube Url">
                                                        <span style="color:red">{{ $errors->has('youtube') ? $errors->first('youtube') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <label for="image">Logo</label>
                                                        <input type="file" name="logo" id="image" class="form-control" accept="image/*">
                                                        <span><i>( Recommended Image Size Width:620, Height:200 )</i> </span>
                                                        <span style="color:red">{{ $errors->has('logo') ? $errors->first('logo') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-8">
                                                    <div class="form-group">
                                                        <img style="height:auto; width:100%" id="showImage" src="{{ $settings->logo ? url($settings->logo) : asset('public/backend/upload/posts/logo/logo.png') }}" height="200" width="620">
                                                    </div>
                                                </div>


                                                <div class="col-12 justify-content-end">
                                                    <button type="submit" class="btn btn-primary mr-1">Update</button>
                                                    <button type="reset" class="btn btn-light-secondary">Reset</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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

    <script type="text/javascript">
        $(document).ready(function () {
            $('#image').change(function (e) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#showImage').attr('src', e.target.result)
                };
                reader.readAsDataURL(e.target.files[0]);
            })
        })
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            $("#quickForms").validate({
                rules: {
                    author: {
                        required: true,
                        minlength: 3,
                    },
                    system_name: {
                        required: true,
                        minlength: 3,
                    },
                    address: {
                        required: true,
                        minlength: 4,
                    },
                    phone: {
                        required: true,
                        number : true
                    },
                    email: {
                        required: true,
                    },
                    website: {
                        required: true,
                        url:true,
                    },
                    facebook: {
                        required: true,
                        url:true,
                    },
                    twitter: {
                        required: true,
                        url:true,
                    },
                    linked_in: {
                        required: true,
                        url:true,
                    },
                    google_plus: {
                        required: true,
                        url:true,
                    },
                    youtube: {
                        required: true,
                        url:true,
                    },
                },
                messages: {

                },
                errorElement: 'span',
                errorPlacement: function (error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function (element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });

    </script>
@endpush
