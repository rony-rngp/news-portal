@extends('layouts.backend.app')

@section('title', 'Edit Post')

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
                                    <h4 class="card-title">Edit Post</h4>
                                    <a href="{{ route('view.post') }}" class="btn mr-1 mb-1 btn-outline-primary"> Post List</a>
                                </div><hr style="margin: 0">
                                <div class="card-body card-dashboard">
                                    <form class="form" id="quickForms" action="{{ route('update.post', $post->id) }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-body">
                                            <div class="row">
                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="title">Title</label>
                                                        <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}" placeholder="Enter Post">
                                                        <span style="color:red">{{ $errors->has('title') ? $errors->first('title') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group">
                                                        <label for="category_id">Category</label>
                                                        <select name="category_id" id="category_id" class="select2 form-control">
                                                            <option value="">Select Category</option>
                                                            @foreach ($categories as $category)
                                                            <option {{$post->category_id == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                                            @endforeach

                                                        </select>
                                                        <span style="color:red">{{ $errors->has('category_id') ? $errors->first('category_id') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="body">Description</label>
                                                        <textarea id="body" rows="5" name="description" class="form-control">{{ $post->description }}</textarea>
                                                        <span style="color:red">{{ $errors->has('description') ? $errors->first('description') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-7">
                                                    <div class="form-group">
                                                        <label for="image">Image</label>
                                                        <input type="file" name="image" id="image" class="form-control">
                                                        <span style="color:red">{{ $errors->has('image') ? $errors->first('image') : '' }}</span>
                                                    </div>
                                                </div>

                                                <div class="col-md-5">
                                                    <div class="form-group col-md-5">
                                                        <img id="showImage" src="{{ $post->image ? asset('public/backend/upload/posts/list_image/'.$post->image) : asset('public/backend/upload/no_image.png') }}" height="64" width="114">
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
    <script type="text/javascript" src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>

    <script>
            CKEDITOR.replace('body');
    </script>

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
                    title: {
                        required: true,
                        minlength: 5,
                    },
                    category_id: {
                        required: true,
                    },
                    body: {
                        required: true,
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
