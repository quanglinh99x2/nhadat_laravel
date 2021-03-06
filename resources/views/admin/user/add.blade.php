
@extends('admin.layouts.admin')
@section('title')
    <title>Trang quản trị</title>
@endsection
@section('css')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="{{asset("admins/product/edit/edit.css")}}">
    <style>
        .select2-container--default .select2-selection--multiple .select2-selection__choice{
            background-color: #312020 !important;
        }
    </style>
@endsection

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        @include('admin.partials.content_header',['name'=>'User','key'=>'add'])
        <div class="content">
            <div class="container-fluid">

                <div class="row ml-5">
                    <div class="col-md-6">
                        @if (count($errors) >0)
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $err)
                                    {{ $err }} <br>
                                @endforeach
                            </div>
                        @endif
                        @if (session('notification'))
                            <div class="alert alert-success">
                                {{ session('notification') }}
                            </div>
                        @endif
                        <form action = "{{route('users.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputName">Nhập tên</label>
                                <input type="text" name = "name"  value="{{old('name')}}" class="form-control @error('name') is-invalid @enderror" id="exampleInputName"  placeholder="Nhập tên">
                            </div>
                            <div class="form-group">
                                <label for="">Nhập email</label>
                                <input type="email" name = "email"  value="{{old('email')}}" class="form-control @error('email') is-invalid @enderror" id="email_id" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label for="password_id">Nhập mật khẩu</label>
                                <input type="password" name = "password"  value="{{old('password')}}" class="form-control @error('password') is-invalid @enderror" id="password_id"  placeholder="Nhập mật khẩu">
                            </div>
                            <div class="form-group">
                                <label for="">Chọn vai trò</label>
                                <select name="role_id[]" class="form-control tags_select_choose @error('role_id') is-invalid @enderror" multiple="multiple">
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->id }}">{{ $role->display_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </form>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
@endsection
@section('js')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-beta.1/dist/js/select2.min.js"></script>

    <script>
        $(document).ready(function(){
            $(".tags_select_choose").select2({
                'placeholder':"Chọn vai trò",
                tags: true,
            });
        });

    </script>

@endsection
