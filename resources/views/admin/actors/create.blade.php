@extends('admin.layouts.index')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Thêm Diễn Viên Mới</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông Tin Diễn Viên</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.actors.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Tên</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="birthdate">Ngày sinh</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate">
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="">Chọn giới tính</option>
                        <option value="Nam">Nam</option>
                        <option value="Nữ">Nữ</option>
                        <option value="Khác">Khác</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-plus"></i> Thêm mới
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
