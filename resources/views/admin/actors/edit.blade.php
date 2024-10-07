@extends('admin.layouts.index')

@section('content')
<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Chỉnh Sửa Thông Tin Diễn Viên</h1>
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thông Tin Diễn Viên</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.actors.update', $actor->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Tên</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $actor->name) }}" required>
                </div>
                <div class="form-group">
                    <label for="birthdate">Ngày sinh</label>
                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ old('birthdate', $actor->birthdate) }}">
                </div>
                <div class="form-group">
                    <label for="gender">Giới tính</label>
                    <select class="form-control" id="gender" name="gender">
                        <option value="">Chọn giới tính</option>
                        <option value="Nam" {{ old('gender', $actor->gender) == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ old('gender', $actor->gender) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                        <option value="Khác" {{ old('gender', $actor->gender) == 'Khác' ? 'selected' : '' }}>Khác</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Cập nhật
                </button>
                <a href="{{ route('admin.actors.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Quay lại
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
