@extends('layout.app')

@section('content')

<section class="text-gray-600 body-font relative" style="min-height: 100% ;">
    {{-- 消さないでください↓ --}}
    @livewire('scout-view-modal')
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
                        <div>
                            <a href="{{ route('groups.index', ['user'=> 1]) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 22 22" stroke-width="1.0" stroke="currentColor" class="w-10 h-8 mb-2 hover:text-blue-500">>
                                    <path d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"/>
                                </svg>
                            </a>
                        </div> 
                    </div>
                <h2 class="title-font font-medium text-base text-gray-900">グループチャット</h2>
            </div>   
            <div class="p-4 sm:w-1/4 w-1/2 flex flex-col items-center">
                <div id="icon-button" class="flex justify-center items-center">
                    <div>
                        <a href="{{ route('users.edit', ['user'=> 1]) }}">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-10 h-8 mb-2 hover:text-blue-500">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg>
                        </a>
                    </div> 
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
                };//uu

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

