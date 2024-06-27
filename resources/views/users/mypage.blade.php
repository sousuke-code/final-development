@extends('layout.user-header')

@section('content')
<div class="block">
    <div class="container px-4 py-4 mx-auto">
        <h3 class="block text-xl text-gray-700 font-semibold mb-3"></h3>
        <div class="grid grid-cols-1 md:grid-cols-3  gap-2  ">
            <!-- Left side, two boxes -->
            <div class="md:col-span-2 grid grid-rows-2 gap-4">
                <!--chart1-->
                <div class="rounded-md p-6 bg-white shadow">
                    <canvas id="dailyStudyChart" style="width: 100%; height: 100%;"></canvas>
                </div>
                <!--chart2-->

                <div class="rounded-md p-6 bg-white shadow">
                    <div class="w-full items-center justify-center flex">
                        <form method="POST" action="{{ route('study_logs.toggle') }}" class="inline-block" id="toggle_form">
                            @csrf
                            @if (!isset($activeLog))
                            <select id="language" name="language"
                                class="w-4/5 h-10 border-2 border-black-900 focus:outline-none focus:border-black-500 text-black-500 rounded px-2 md:px-3 py-0 md:py-1 tracking-wider" {{ isset($activeLog) ? 'disabled' : '' }}>
                                @foreach ($languages as $language)
                                <option value="{{ $language->id }}" {{ isset($activeLog) && $activeLog->programming_language_id == $language->id ? 'selected' : '' }}>
                                    {{ $language->name }}
                                </option>
                                @endforeach
                            </select>
                            @endif
                            <button type="submit" class="text-white {{ isset($activeLog) ? 'bg-red-700 hover:bg-red-800' : 'bg-blue-700 hover:bg-blue-800' }} focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 mt-2" id="toggle_button">
                                {{ isset($activeLog) ? 'Stop' : 'Start' }}
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Right side, one box -->
            <div class="md:col-span-1 rounded-md p-6 bg-white shadow ">
                <!-- Additional content here -->
                <canvas id="studyTimeChart" style="width: 100%; height: 100%;"></canvas>
            </div>
        </div>
    </div>
</div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Ajax request to fetch study times
        fetch('{{ route('study_logs.study_times') }}')
            .then(response => response.json())
            .then(data => {
                const ctx = document.getElementById('studyTimeChart').getContext('2d');

                const labels = Object.keys(data);
                const values = Object.values(data);

                new Chart(ctx, {
                    type: 'pie', // 円グラフを指定です
                    data: {
                        labels: labels,
                        datasets: [{
                            label: '学習時間 (分)',
                            data: values,
                            backgroundColor: [
                                'rgba(255, 99, 132, 0.6)', // 色の指定、必要に応じて追加できます
                                'rgba(54, 162, 235, 0.6)',
                                'rgba(255, 206, 86, 0.6)',
                                'rgba(75, 192, 192, 0.6)',
                                'rgba(153, 102, 255, 0.6)',
                                'rgba(255, 159, 64, 0.6)'
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            legend: {
                                position: 'top',
                            },
                            title: {
                                display: true,
                                text: '言語ごとの学習時間割合'
                            }
                        }
                    }
                });
            });
    });


    document.addEventListener('DOMContentLoaded', function () {
        // 今日から一週間前までの日付を生成
        const endDate = new Date();  // 現在の日時
        const startDate = new Date();
        startDate.setDate(endDate.getDate() - 6);  // 現在の日時から6日前

        // 日付を文字列に変換してAPIに渡す形式にする
        const startDateString = startDate.toISOString().split('T')[0];
        const endDateString = endDate.toISOString().split('T')[0];

        console.log('Fetching study data from', startDateString, 'to', endDateString); 

        // Ajaxリクエストを使用してサーバーから学習状況を取得する
        fetch('{{ route('study_logs.daily_study') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'  // CSRFトークンの追加
            },
            body: JSON.stringify({
                start_date: startDateString,
                end_date: endDateString
            })
        })
        .then(response => response.json())
        .then(data => {
            console.log('Received data:', data);
            const ctx = document.getElementById('dailyStudyChart').getContext('2d');

            const dates = Object.keys(data);
            const studyTimes = Object.values(data);

            new Chart(ctx, {
                type: 'bar',  // 折れ線グラフを指定
                data: {
                    labels: dates,
                    datasets: [{
                        label: '日別学習時間 (分)',
                        data: studyTimes,
                        backgroundColor: 'rgba(75, 192, 192, 0.6)', // 棒の色
                        borderColor: 'rgba(75, 192, 192, 1)', // 枠線の色
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            display: false  // 凡例は非表示
                        },
                        title: {
                            display: true,
                            text: '一週間の日別学習時間'
                        }
                    }
                }
            });
        })
        .catch(error => {
        console.error('Error fetching study data:', error); // デバッグ用
       });
    });

    
</script>



@endsection