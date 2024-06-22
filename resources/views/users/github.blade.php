@extends('layout.app')

@section('content')


<div class="py-12">
  <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 text-gray-900">

              <x-github.profile
                  :github-user="$github_user"
              />

            
              <h1 class="font-semibold text:3xl">レポジトリの一覧</h1>
              <div class="flex flex-wrap lg:w-4/5 sm:mx-auto sm:mb-2 -mx-2">
                @foreach ($repositories as $repo)
                <div class="p-2 sm:w-1/2 w-full">
                  <a href="{{ $repo['html_url'] }}">
                    <div class="bg-gray-100 rounded flex p-4 h-full items-center">
                      <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" class="text-indigo-500 w-6 h-6 flex-shrink-0 mr-4" viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14"></path>
                        <path d="M22 4L12 14.01l-3-3"></path>
                      </svg>
                      <span class="title-font font-medium">{{ $repo['name'] }}</span>
                    </div>
                  </a>
                </div>
                @endforeach
                
             </div>

              <div class="container mx-auto p-4">
                <h1 class="font-semibold text-2xl">使用言語割合</h1>
                <div class="w-full md:w-3/4 lg:w-1/2 mx-auto">
                  <canvas id="languageChart" class="w-full h-64 md:h-96 lg:h-128">
                    
                  </canvas>
              </div>
            </div>





          </div>
      </div>
  </div>
</div>


<script>
  document.addEventListener('DOMContentLoaded', function () {
      const ctx = document.getElementById('languageChart').getContext('2d');
  
      const data = {
          labels: @json(array_keys($languagePercentages)),
          datasets: [{
              label: 'Language Usage Percentage',
              data: @json(array_values($languagePercentages)),
              backgroundColor: [
                  'rgba(255, 99, 132, 0.2)',
                  'rgba(54, 162, 235, 0.2)',
                  'rgba(255, 206, 86, 0.2)',
                  'rgba(75, 192, 192, 0.2)',
                  'rgba(153, 102, 255, 0.2)',
                  'rgba(255, 159, 64, 0.2)',
               
              ],
              borderColor: [
                  'rgba(255, 99, 132, 1)',
                  'rgba(54, 162, 235, 1)',
                  'rgba(255, 206, 86, 1)',
                  'rgba(75, 192, 192, 1)',
                  'rgba(153, 102, 255, 1)',
                  'rgba(255, 159, 64, 1)',
             
              ],
              borderWidth: 1
          }]
      };
  
      const config = {
          type: 'pie',
          data: data,
          options: {
              responsive: true,
              maintainAspectRation: false,
              plugins: {
                  legend: {
                      position: 'top',
                  },
                  tooltip: {
                      callbacks: {
                          label: function(context) {
                              const label = context.label || '';
                              const value = context.raw || 0;
                              return `${label}: ${value.toFixed(2)}%`;
                          }
                      }
                  }
              }
          },
      };
  
      const languageChart = new Chart(ctx, config);
  });
  </script>

@endsection