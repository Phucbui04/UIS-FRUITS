@extends('admin.layout')

@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Danh sách tài khoản</h4>
                </div>
                <div class="page-btn">
                    <a href="{{ route('admin.users.create') }}" class="btn btn-added">
                        <img src="{{ asset('assets/img/icons/plus.svg') }}" alt="img" class="me-2">Thêm tài khoản
                    </a>
                </div>
            </div>

            <div class="card">
                <div class="card-body">
                    <div class="table-top">
                        <div class="search-set">
                            <div class="search-path">
                                <a class="btn btn-filter" id="filter_search">
                                    <img src="{{ asset('assets/img/icons/filter.svg') }}" alt="img">
                                    <span><img src="{{ asset('assets/img/icons/closes.svg') }}" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset">
                                    <img src="{{ asset('assets/img/icons/search-white.svg') }}" alt="img">
                                </a>
                            </div>
                        </div>
                        <div class="wordset">
                            <ul>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf">
                                        <img src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img">
                                    </a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel">
                                        <img src="{{ asset('assets/img/icons/excel.svg') }}" alt="img">
                                    </a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print">
                                        <img src="{{ asset('assets/img/icons/printer.svg') }}" alt="img">
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nhập tên người dùng">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-4 col-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Nhập số điện thoại">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" placeholder="Nhập email">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-3 col-12">
                                    <div class="form-group">
                                        <select class="form-control">
                                            <option value="">Tình trạng</option>
                                            <option value="0">Hoạt động</option>
                                            <option value="1">Bị khóa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto">
                                            <img src="{{ asset('assets/img/icons/search-whites.svg') }}" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Số điện thoại</th>
                                    <th>Tình trạng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($user as $item)
                                    <tr>
                                        <td>
                                            <label class="checkboxs">
                                                <input type="checkbox">
                                                <span class="checkmarks"></span>
                                            </label>
                                        </td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone }}</td>
                                        <td class="status">{{ $item->status == 0 ? 'Hoạt động' : 'Bị khóa' }}</td>
                                        <td>
                                            <button class="btn btn-icon toggle-status" data-id="{{ $item->id }}" data-status="{{ $item->status }}" style="color: {{ $item->status == 0 ? 'red' : 'green' }};">
                                                <i class="fa-solid {{ $item->status == 0 ? 'fa-lock' : 'fa-unlock' }}"></i>
                                            </button>
                                            <div class="action-icons">
                                                <a class="action-icon" href="{{ route('admin.users.edit', $item->id) }}">
                                                    <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                                </a>
                                                <form class="action-link me-3" id="delete-form-{{ $item->id }}" action="{{ route('admin.users.destroy', $item->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" class="btn" onclick="confirmDelete({{ $item->id }})" style="display: flex; align-items: center;">
                                                        <img src="{{ asset('assets/img/icons/delete.svg') }}">
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha384-k6RqeWeci5ZR/Lv4MR0sA0FfDOMt23bF3n8zq5/Rc5NQ0Hnd9Hzft2YMePwP5w9" crossorigin="anonymous">

    <script>
        $(document).ready(function() {
            $('.toggle-status').click(function() {
                var userId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus == 0 ? 1 : 0; // Đổi trạng thái

                $.ajax({
                    url: '{{ route('users.toggleStatus') }}',
                    type: 'POST',
                    data: {
                        id: userId,
                        status: newStatus,
                        _token: '{{ csrf_token() }}' // CSRF token
                    },
                    success: function(response) {
                        if (response.success) {
                            // Cập nhật giao diện
                            $(`button[data-id='${userId}']`).data('status', newStatus);
                            $(`button[data-id='${userId}']`).find('i').attr('class', `fa-solid ${newStatus == 0 ? 'fa-lock' : 'fa-unlock'}`);
                            
                            // Cập nhật màu chữ của nút
                            $(`button[data-id='${userId}']`).css('color', newStatus == 0 ? 'red' : 'green'); // Cập nhật màu chữ
                            $(`button[data-id='${userId}']`).find('i').attr('class', `fa-solid ${newStatus == 0 ? 'fa-lock' : 'fa-unlock'}`);
                            $(`tr:has(button[data-id='${userId}']) .status`).text(newStatus == 0 ? 'Hoạt động' : 'Bị khóa');
                            
                            // Cập nhật lớp cho nút
                            $(`button[data-id='${userId}']`).removeClass(newStatus == 0 ? 'btn-success' : 'btn-danger').addClass(newStatus == 0 ? 'btn-danger' : 'btn-success');
                        } else {
                            alert('Có lỗi xảy ra, vui lòng thử lại.');
                        }
                    }
                });
            });
        });

        function confirmDelete(id) {
            if (confirm("Bạn có chắc chắn muốn xóa tài khoản này không?")) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
