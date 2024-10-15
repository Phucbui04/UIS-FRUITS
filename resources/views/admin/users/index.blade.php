@extends('admin.layout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>Danh sách tài khoàn</h4>
                   
                </div>
                <div class="page-btn">
                    <a href="{{route('admin.users.create')}}" class="btn btn-added"><img src="{{ asset('assets/img/icons/plus.svg') }}"
                            alt="img" class="me-2">Thêm tài khoản</a>
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
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img
                                            src="{{ asset('assets/img/icons/pdf.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img
                                            src="{{ asset('assets/img/icons/excel.svg') }}" alt="img"></a>
                                </li>
                                <li>
                                    <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img
                                            src="{{ asset('assets/img/icons/printer.svg') }}" alt="img"></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="card" id="filter_inputs">
                        <div class="card-body pb-0">
                            <div class="row">
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter User Name">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Phone">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <input type="text" placeholder="Enter Email">
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Disable</option>
                                            <option>Enable</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                    <div class="form-group">
                                        <a class="btn btn-filters ms-auto"><img
                                                src="{{ asset('assets/img/icons/search-whites.svg') }}" alt="img"></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <table class="table  datanew">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    
                                    <th>Tên </th>
                                    <th>email </th>
                                  
                                    <th>số điện thoại</th>
                                  
                                    <th>trạng thái</th>
                                    <th>hành động</th>
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
                                  
                                    <td>{{$item->name}}</td>
                                    <td>{{$item->email}} </td>
                                    <td>{{$item->phone}} </td>
                                 
                                    
                                    <td>
                                        <div class="status-toggle d-flex justify-content-between align-items-center">
                                            <input type="checkbox" id="user1" class="check">
                                            <label for="user1" class="checktoggle">checkbox</label>
                                        </div>
                                    </td>
                                    <td>
                                        <a class="me-3" href="{{ route('admin.users.edit', $item->id) }}">
                                            <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                        </a>
                                        <form action="{{ route('admin.users.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE') <!-- Thêm method DELETE -->
                                            <button type="submit" class="btn btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                                <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                            </button>
                                        </form>
                                        
                                    </td>
                                </tr>
                                @endforeach;
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
