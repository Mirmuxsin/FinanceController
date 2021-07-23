@extends('layouts.sidebar')

@section('content')

    <h2 class="mb-4">Dashboard finance</h2>

    <div class="col-md-12">
        <div id="piechart1" style="width: 900px; height: 500px;"></div>

        <div class="list-group list-group-horizontal col-md-12 mb-3">
            <div class="list-group-item" id="piechart2" style="width: 450px; height: 300px;"></div>

            <div class="list-group-item" id="piechart3" style="width: 450px; height: 300px;"></div>
        </div>

        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
			dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
			ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
			fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			deserunt mollit anim id est laborum.</p>
		<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
			dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
			ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
			fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia
			deserunt mollit anim id est laborum.</p>

    </div>

@endsection

@section('head_scripts')
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                ['All Incomes', {{ $all_incomes }} ],
                ['All Expenses', {{ $all_expenses }} ]
            ]);

            var options = {
                title: 'Incomes and Expenses'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart1'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Amount', 'Paid per category'],
                @foreach($categories_incomes as $category)
                    ['{{ $category['name'] }}', {{ $records->where('category', $category['name'])->sum('amount') }}],
                @endforeach
            ]);

            var options = {
                title: 'Incomes'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart2'));

            chart.draw(data, options);
        }
    </script>

    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {

            var data = google.visualization.arrayToDataTable([
                ['Task', 'Hours per Day'],
                @foreach($categories_expenses as $category)
                    ['{{ $category['name'] }}', {{ $records->where('category', $category['name'])->sum('amount') }}],
                @endforeach
            ]);

            var options = {
                title: 'Expenses'
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart3'));

            chart.draw(data, options);
        }
    </script>
@endsection
