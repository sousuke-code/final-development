
@extends('layout.header')

@section('content')

<div class="container mx-auto px-5">
  <!-- フォームとグラフを横並びに配置 -->
  <div class="flex justify-between mb-8">
    <div class="bg-green w-1/2 mr-4">
      <div class="w-full max-w-xs mx-auto">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
              名前
            </label>
            <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" placeholder="Username">
              {{ $user->name }}
            </div>
          </div>
          <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
              メールアドレス
            </label>
            <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" placeholder="Email">
              {{ $user->email }}
            </div>
          </div>
          <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="bio">
              自己紹介
            </label>
            <div class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="bio" type="text" placeholder="Bio">
              {{ $user->bio }}
            </div>
          </div>
          <div class="flex items-center justify-between">
            <a href="{{ route('users.edit', $user->id) }}">
              <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                編集する
              </button>
            </a>

            <a href="{{ route('users.github')}}">
              <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                github情報
              </button>
            </a>
          </div>
        </form>
      </div>
    </div>
    <div class="bg-blue w-1/2">
      <canvas id="studyTimeChart" style="width: 100%; height: 100%;"></canvas>
    </div>
  </div>

  <!-- ポートフォリオを表示 -->
  <div class="mb-8">
    <a href="{{ route('portofolio.edit') }}">
      <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
        ポートフォリオを作成する
      </button>
    </a>
  </div>

  <!-- ポートフォリオのカード -->
  <div class="flex flex-wrap -mx-4">
    @foreach ($portfolios as $portofolio)
    <div class="lg:w-1/3 md:w-1/2 p-4">
      <a class="block relative h-48 rounded overflow-hidden" href="{{ $portofolio->url }}">
        <img src="{{ asset('storage/' . $portofolio->photo) }}" alt="{{ $portofolio->title }}" class="object-cover object-center w-full h-full block">
      </a>
      <div class="mt-4">
        <h2 class="text-gray-900 text-l font-semibold tracking-widest title-font mb-1">{{ $portofolio['title'] }}</h2>
        <h2 class="text-gray-600 title-font text-l font-medium">{{ $portofolio['description'] }}</h2>
      </div>
    </div>
    @endforeach
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
                  type: 'pie', // 円グラフを指定
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


