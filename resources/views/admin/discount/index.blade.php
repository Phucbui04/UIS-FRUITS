@extends('admin.layout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="page-header">
                <div class="page-title">
                    <h4>DANH MỤC SẢN PHẨM </h4>
                    <h6>View/Search product Category</h6>
                </div>
                <div class="page-btn">
                    <a href="{{route('admin.discount.create')}}" class="btn btn-added">
                        <img src="{{ asset('assets/img/icons/plus.svg') }}" class="me-1" alt="img">THÊM MÃ GIẢM GIÁ
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
                                    <span><img src="assets/img/icons/closes.svg" alt="img"></span>
                                </a>
                            </div>
                            <div class="search-input">
                                <a class="btn btn-searchset"><img src="{{ asset('assets/img/icons/search-white.svg') }}"
                                        alt="img"></a>
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
                                        <select class="select">
                                            <option>Choose Category</option>
                                            <option>Computers</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Sub Category</option>
                                            <option>Fruits</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-sm-6 col-12">
                                    <div class="form-group">
                                        <select class="select">
                                            <option>Choose Sub Brand</option>
                                            <option>Iphone</option>
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
                        <table class="table datanew">
                            <thead>
                                <tr>
                                    <th>
                                        <label class="checkboxs">
                                            <input type="checkbox" id="select-all">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </th>
                                    <th>id</th>
                                    <th>mã giảm giá</th>
                                    <th>Phần trăm giảm giá</th>
                                  {{--   <th>mô tả</th> --}}
                                    <th>ngày bắt đầu</th>
                                    <th>ngày kết thúc</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($discounts as $item)
                                <tr>
                                    <td>
                                        <label class="checkboxs">
                                            <input type="checkbox">
                                            <span class="checkmarks"></span>
                                        </label>
                                    </td>
                               
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->code}}</td>
                                  {{--   <td>{{$item->discount_percent}}</td> --}}
                                    <td>{{$item->description}}</td>
                                    <td>{{$item->valid_form}}</td>
                                    <td>{{$item->valid_end}}</td>
                                    <td>
                                        <a class="me-3" href="{{ route('admin.discount.edit', $item->id) }}">
                                            <img src="{{ asset('assets/img/icons/edit.svg') }}" alt="img">
                                        </a>
                                        <form action="{{ route('admin.discount.destroy', $item->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE') <!-- Thêm method DELETE -->
                                            <button type="submit" class="btn  btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa không?')">
                                                <img src="{{ asset('assets/img/icons/delete.svg') }}" alt="img">
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach;
                                <!-- Repeat the above <tr> for other items -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
