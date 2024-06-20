@extends('layout.app')

@section('content')
<<<<<<< Updated upstream
<section class="text-gray-600 body-font relative" style="min-height: vh ;">
    
    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center justify-center">
        <div class="w-1/2 p-4">
            <div id="piechart" style="width: 100%; height: 400px;"></div>
        </div>
        <div class="w-1/2 p-2">
            <div id="columnchart_values" style="width: 100%; height: 400px;"></div>
        </div>
        <div class=" space-x-3 mb-2 py-0.5 absolute bottom-20 left-20 right-0 ">
            @if (session('message'))
                <div class="display: inline bg-green-500 text-white p-2 mb-2  ">
                    {{ session('message') }}
                </div>
            @endif
=======
    <h1><?php $user = Auth::user(); ?> </h1>
    <h1 style="margin-left: 20px;">{{ $user->name }}のマイページ</h1>
    <section class="text-gray-600 body-font relative" style="min-height: 90vh ;">
        <div class="p-4 sm:w-1/4 w-1/2">
            <div class="flex flex-col items-center">
                <div class="hover:text-blue-500 -ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6" class="hover:text-blue-500 -ml-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 0 0 5.454-1.31A8.967 8.967 0 0 1 18 9.75V9A6 6 0 0 0 6 9v.75a8.967 8.967 0 0 1-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 0 1-5.714 0m5.714 0a3 3 0 1 1-5.714 0M3.124 7.5A8.969 8.969 0 0 1 5.292 3m13.416 0a8.969 8.969 0 0 1 2.168 4.5" />
                    </svg>
                </div>
            </div>
            <div>

            </div>
            <div class="flex"> 
            <div id="target" ></div>
            <div id="chart"></div> 
        <script src="https://www.gstatic.com/charts/loader.js"></script>
        <script>
            (function() {
                'use strict';

                // パッケージのロード
                google.charts.load('current', {packages: ['corechart']});
                // コールバックの登録
                google.charts.setOnLoadCallback(drawChart);

            // コールバック関数の実装
                function drawChart() {
                    // データの準備
                    var data = new google.visualization.DataTable();
                    data.addColumn('string', 'Love');
                    data.addColumn('number', 'Votes');
                    data.addRow(['Lravel', 30]);
                    data.addRow(['Javascript', 20]);
                    data.addRow(['C', 10]);
                    

                    // オプションの準備
                    var options = {
                        title: '勉強内容',
                        width: 400,
                        height: 200,
                        is3D: true
                    };

                    var data2 = google.visualization.arrayToDataTable([
            ['曜日', '時間', { role: 'style' }],
            ['月曜日', 2., "madblue"],
            ['火曜日', 5, 'madblue'],            // RGB value
            ['水曜日', 2, 'madblue'],            // English color name
            ['木曜日', 4, 'madblue'],
            ['金曜日', 6, 'madblue' ], // CSS-style declaration
            ['土曜日', , 'madblue'],
            ['日曜日', 6, 'madblue' ], // CSS-style declaration
        ]);
                    var options2 = {
                title: 'あなたの学習時間',
                width: 1000,
                height: 600,
                bar: { groupWidth: '60%' },
                legend: { position: 'center' }
    //             vAxis: {
    //     ticks: [0, 4, 8, 12, 16 , 20]
    // }
            };


                // 描画用インスタンスの生成および描画メソッドの呼び出し
                    var chart = new google.visualization.PieChart(document.getElementById('target'));
                    chart.draw(data, options);

                    var chart2 = new google.visualization.BarChart(document.getElementById('chart'));
                    chart2.draw(data2, options2);
                }
            })();
        </script>
        </div>
    </div>
    
        <div class="flex flex-wrap -m-4 text-center absolute bottom-10 w-full">
            <div class="p-4 sm:w-1/4 w-1/2">
                <div class="flex flex-col items-center ">
                    <div id="icon-button">
                        <script src="date.js"><script>
                        <svg id="icon-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-10 mb-2 hover:text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                        </svg>
>>>>>>> Stashed changes

            @if (session('error'))
                <div class="bg-red-500 text-white p-2 mb-2">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
    
    <div class=" bottom-0 left-0 right-0 bg-white py-0 ">
        <div class="flex justify-center items-center space-x-6 mb-4 py-1">
            <form method="POST" action="{{ route('study_logs.start') }}" class="inline-block">
                @csrf
                <button type="submit" class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-9 mb-2 hover:text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.91 11.672a.375.375 0 0 1 0 .656l-5.603 3.113a.375.375 0 0 1-.557-.328V8.887c0-.286.307-.466.557-.327l5.603 3.112Z" />
                    </svg>
                    <h1>START</h1>
                </button>
            </form>
            <form method="POST" action="{{ route('study_logs.stop') }}" class="inline-block ml-2">
                @csrf
                <button type="submit" class="flex flex-col items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-9 mb-2 hover:text-blue-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.25 9v6m-4.5 0V9M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h1>STOP</h1>
                </button>
            </form>
            <!-- Icon buttons for study logs edit, group chat, and profile -->
            <div class="p-4 sm:w-1/4 w-1/2 flex flex-col items-center">
                <div id="icon-button" class="flex justify-center items-center">
                    <a href="{{ route('study_logs.index', ['user'=> 1]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-8 mb-2 hover:text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1-2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                        </svg>
                    </a>
                </div>
                <h2 class="title-font font-medium text-base text-gray-900">学習記録の編集</h2>
            </div>

            <div class="p-4 sm:w-1/4 w-1/2 flex flex-col items-center">
                <div id="icon-button" class="flex justify-center items-center">
                    <a href="{{ route('groups.index') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-8 mb-2 hover:text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155" />
                        </svg>
                    </a>
                </div>
                <h2 class="title-font font-medium text-base text-gray-900">グループチャット</h2>
            </div>

            <div class="p-4 sm:w-1/4 w-1/2 flex flex-col items-center">
                <div id="icon-button" class="flex justify-center items-center">
                    <a href="{{ route('users.edit', ['user'=> 1]) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-8 mb-2 hover:text-blue-500">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                        </svg>
                    </a>
                </div>
                <h2 class="title-font font-medium text-base text-gray-900">プロフィール</h2>
            </div>
        </div>
    </div>

    <html>
<head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawCharts);

        function drawCharts() {
            drawPieChart(); // 円グラフを描画する関数
            drawColumnChart(); // 縦棒グラフを描画する関数
        }

        function drawPieChart() {
            // 円グラフのデータとオプション設定
            var data = google.visualization.arrayToDataTable([
                ['', '学習言語'],
                ['laravel',     11],
                ['C言語',      2],
                ['HTML',  2],
                ['Word Press', 2],
                ['その他',    7]
            ]);

            var options = {
                title: '学習言語',
                width: '100%',
                height: 300,
            };

            var chart = new google.visualization.PieChart(document.getElementById('piechart'));
            chart.draw(data, options);
        }

        function drawColumnChart() {
            // 縦棒グラフのデータとオプション設定
            var data = google.visualization.arrayToDataTable([
                ['曜日', '学習時間(h)', { role: 'style' }],
                ['月曜', 2, 'madblue'],
                ['火曜', 5, 'madblue'],
                ['水曜', 4, 'madblue'],
                ['木曜', 2, 'madblue'],
                ['金曜', 4, 'madblue'],
                ['土曜', 6, 'madblue'],
                ['日曜', 3, 'madblue'],
                
            ]);

            var options = {
                title: '学習時間',
                width: '100%',
                height: 500,
                legend: { position: 'none' },
            };

            var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));
            chart.draw(data, options);
        }
    </script>
</head>
<body>
    <div id="piechart" style="width: 0px; height: 0px;"></div>
    <div id="columnchart_values" style="width: 0px; height: 0px;"></div>
</body>
</html>
</section>
@endsection  