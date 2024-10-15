@extends('admin.layout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Product Add Category</h4>
                    <h6>Create new product Category</h6>
                </div>
            </div>
            <form action="{{ route('admin.discount.store') }}" method="post">
                @csrf <!-- Thêm CSRF token để bảo mật -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!-- Category Name -->
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>mã giảm giá</label>
                                    <input type="text" name="code" required class="form-control"> <!-- Thêm class và required -->
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>phần trăm giảm giá</label>
                                    <input type="text" name="discount_percent" required class="form-control"> <!-- Thêm class và required -->
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>mô tả</label>
                                    <input type="text" name="description" required class="form-control"> <!-- Thêm class và required -->
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Ngày bắt đầu</label>
                                    <input type="date" name="valid_form" required class="form-control">

                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Ngày kết thúc</label>
                                    <input type="date" name="valid_end" required class="form-control">
                                </div>
                            </div>
                            <!-- Submit and Cancel Buttons -->
                            <div class="col-lg-12">
                                <button type="submit" class="btn btn-submit me-2">Submit</button> <!-- Sử dụng button thay vì a -->
                                <a href="{{ route('admin.discount.create') }}" class="btn btn-cancel">Cancel</a> <!-- Cập nhật link đến route -->
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        </div>
    </div>
@endsection
