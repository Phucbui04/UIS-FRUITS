@extends('admin.layout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash1.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>$<span class="counters" data-count="307144.00">$307,144.00</span></h5>
                            <h6>Total Purchase Due</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash1">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash2.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>$<span class="counters" data-count="4385.00">$4,385.00</span></h5>
                            <h6>Total Sales Due</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash2">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash3.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>$<span class="counters" data-count="385656.50">385,656.50</span></h5>
                            <h6>Total Sale Amount</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12">
                    <div class="dash-widget dash3">
                        <div class="dash-widgetimg">
                            <span><img src="assets/img/icons/dash4.svg" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>$<span class="counters" data-count="40000.00">400.00</span></h5>
                            <h6>Total Sale Amount</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count">
                        <div class="dash-counts">
                            <h4>100</h4>
                            <h5>Customers</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das1">
                        <div class="dash-counts">
                            <h4>100</h4>
                            <h5>Suppliers</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="user-check"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das2">
                        <div class="dash-counts">
                            <h4>100</h4>
                            <h5>Purchase Invoice</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file-text"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6 col-12 d-flex">
                    <div class="dash-count das3">
                        <div class="dash-counts">
                            <h4>105</h4>
                            <h5>Sales Invoice</h5>
                        </div>
                        <div class="dash-imgs">
                            <i data-feather="file"></i>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Purchase & Sales</h5>
                            <div class="graph-sets">
                                <ul>
                                    <li>
                                        <span>Sales</span>
                                    </li>
                                    <li>
                                        <span>Purchase</span>
                                    </li>
                                </ul>
                                <div class="dropdown">
                                    <button class="btn btn-white btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        2022 <img src="assets/img/icons/dropdown.svg" alt="img" class="ms-2">
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2022</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2021</a>
                                        </li>
                                        <li>
                                            <a href="javascript:void(0);" class="dropdown-item">2020</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div>
            <div class="card-body d-flex flex-column">
                <div id="line_chart" style="width: 100%; height: 300px; margin-bottom: 20px;"></div>
                <div id="bar_chart" style="width: 100%; height: 300px;"></div>
            </div>
           
            <div class="card mb-0">
                <div class="card-body">
                    <h4 class="card-title">Expired Products</h4>
                    <div class="table-responsive dataview">
                        <table class="table datatable ">
                            <thead>
                                <tr>
                                    <th>SNo</th>
                                    <th>Product Code</th>
                                    <th>Product Name</th>
                                    <th>Brand Name</th>
                                    <th>Category Name</th>
                                    <th>Expiry Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td><a href="javascript:void(0);">IT0001</a></td>
                                    <td class="productimgname">
                                        <a class="product-img" href="productlist.html">
                                            <img src="assets/img/product/product2.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">Orange</a>
                                    </td>
                                    <td>N/D</td>
                                    <td>Fruits</td>
                                    <td>12-12-2022</td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td><a href="javascript:void(0);">IT0002</a></td>
                                    <td class="productimgname">
                                        <a class="product-img" href="productlist.html">
                                            <img src="assets/img/product/product3.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">Pineapple</a>
                                    </td>
                                    <td>N/D</td>
                                    <td>Fruits</td>
                                    <td>25-11-2022</td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td><a href="javascript:void(0);">IT0003</a></td>
                                    <td class="productimgname">
                                        <a class="product-img" href="">
                                            <img src="assets/img/product/product4.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">Stawberry</a>
                                    </td>
                                    <td>N/D</td>
                                    <td>Fruits</td>
                                    <td>19-11-2022</td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td><a href="javascript:void(0);">IT0004</a></td>
                                    <td class="productimgname">
                                        <a class="product-img" href="productlist.html">
                                            <img src="assets/img/product/product5.jpg" alt="product">
                                        </a>
                                        <a href="productlist.html">Avocat</a>
                                    </td>
                                    <td>N/D</td>
                                    <td>Fruits</td>
                                    <td>20-11-2022</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script src="/public/assets/js/chart-area-demo.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
    google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawLineChart);

function drawLineChart() {
    var data = google.visualization.arrayToDataTable([
        ['Ngày', 'Giá trị'],
        ['01', 120],
        ['02', 150],
        ['03', 170],
        ['04', 130],
        ['05', 200],
        ['06', 180],
        ['07', 190],
        ['08', 220],
        ['09', 210],
        ['10', 250],
        ['11', 300],
        ['12', 280],
        ['13', 240],
        ['14', 300],
        ['15', 320],
        ['16', 350],
        ['17', 370],
        ['18', 400],
        ['19', 380],
        ['20', 360],
        ['21', 340],
        ['22', 320],
        ['23', 310],
        ['24', 300],
        ['25', 290],
        ['26', 270],
        ['27', 260],
        ['28', 250],
        ['29', 240],
        ['30', 230]
    ]);

    var options = {
        title: 'Biểu đồ đường theo ngày trong tháng',
        curveType: 'function',
        legend: { position: 'bottom' }
    };

    var chart = new google.visualization.LineChart(document.getElementById('line_chart'));
    chart.draw(data, options);
}
google.charts.load('current', {packages: ['corechart']});
    google.charts.setOnLoadCallback(drawBarChart);

    function drawBarChart() {
        var data = google.visualization.arrayToDataTable([
            ['Tháng', 'Giá trị'],
            ['Tháng 1', 300],
            ['Tháng 2', 400],
            ['Tháng 3', 350],
            ['Tháng 4', 450],
            ['Tháng 5', 500],
            ['Tháng 6', 600],
            ['Tháng 7', 550],
            ['Tháng 8', 700],
            ['Tháng 9', 650],
            ['Tháng 10', 800],
            ['Tháng 11', 750],
            ['Tháng 12', 900]
        ]);

        var options = {
            title: 'Biểu đồ cột theo tháng trong năm',
            hAxis: {title: 'Tháng'},
            vAxis: {title: 'Giá trị'},
            legend: 'none'
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('bar_chart'));
        chart.draw(data, options);
    }
</script>
<script>

</script>