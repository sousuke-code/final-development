@extends('layout.app')

@section('content')
<section class="bg-white white:bg-gray-900">
    <div class="flex justify-start mt-4 ml-4">
        <a href="http://127.0.0.1:8001/users" class="text-white bg-blue-700 border-0 py-2 px-5 focus:outline-none hover:bg-blue-800 rounded text-xs padding-left;2px">戻る</a>
    </div>
    <div class="py-8 px-4 mx-auto max-w-screen-xl sm:py-16 lg:px-6">

        <div class="max-w-screen-md mb-8 lg:mb-16">
            <h2 class="mb-4 text-2xl tracking-tight font-extrabold text-gray-900 dark:text-linear-gradient(blue)">企業情報</h2>
        </div>
        <div class="text-center text-5xl sm:py-19 lg:px-6">
            <h1>{{ $company['name'] }}<div class="text-xl text-black sm:py-2 lg:px-6">{{ $company->email }}</div></h1>
        </div>
        <img alt="feature" class="object-cover object-center h-full w-full" src="{{$company->company_image}}">
        <div style="border: #848383  solid 2px; border-left: #303030 solid 7px;  padding-top: 80px; padding-left: 20px;padding-right: 20px;padding-bottom: 20px;font-size: 100%; border-radius: 20px; ">
        <div class="space-y-8 md:grid md:grid-cols-2 lg:grid-cols-3 md:gap-12 md:space-y-0">
       
            <div>
                <div style="  solid 2px; border-left: #e6e6e6 solid 7px;  padding: 20px; font-size: 100%; border-radius: 20px; ">
               
                <h3 class="mb-2 text-xl text-gray-500 dark:text-gray-500">住所</h3>
                <p class="text-2xl text-black">{{ $company->address }}</p>
            </div>
            </div>
            <div>

                <div style="  solid 2px; border-left: #e6e6e6 solid 7px;  padding: 20px; font-size: 100%; border-radius: 20px; ">
               
                <h3 class="b-2 text-xl text-gray-500 dark:text-gray-500">給与</h3>
                <p class="text-3xl text-black">{{ $company->salary }}</p>
            </div>
            </div>
            <div>

                <div style="  solid 2px; border-left: #e6e6e6 solid 7px;  padding: 20px; font-size: 100%; border-radius: 20px; ">
                
                <h3 class="b-2 text-xl text-gray-900 dark:text-gray-500">勤務時間</h3>
                <p class="text-3xl text-black">{{ $company->working }}</p>
                </div>
            </div>
            <div>

                <div style=" solid 2px; border-left: #e6e6e6 solid 7px;  padding: 20px; font-size: 100%; border-radius: 20px; ">
               
                <h3 class="mb-2 text-xl text-gray-500 dark:text-gray-500">福利厚生</h3>
                <p class="text-2xl text-black">{{ $company->welfare }}</p>
                </div>

            </div>
            <div>

                <div style=" solid 2px; border-left: #e6e6e6 solid 7px;  padding: 20px; font-size: 100%; border-radius: 20px; ">
              
                <h3 class="mb-2 text-xl text-gray-500 dark:text-gray-500">従業員数</h3>
                <p class="text-2xl text-black">{{ $company->employees }}</p>

                </div>
            </div>
            <div>

                <div style=" solid 2px; border-left: #e6e6e6 solid 7px;  padding: 20px; font-size: 100%; border-radius: 20px; ">
               
                <h3 class="mb-2 text-xl text-gray-500 dark:text-gray-500">従業員年齢層</h3>
                <p class="text-2xl text-black">{{ $company->age }}</p>
                </div>
            </div>
            <div>

                <div style=" solid 2px; border-left: #e6e6e6 solid 7px;  padding: 20px; font-size: 100%; border-radius: 20px; ">
              
                <h3 class="mb-2 text-xl text-gray-500 dark:text-gray-500">アクセス</h3>
                <p class="text-2xl text-black">{{ $company->access }}</p>
                </div>
            </div>
            <div>

                <div style=" solid 2px; border-left: #e6e6e6 solid 7px;  padding: 20px; font-size: 100%; border-radius: 20px; ">
                
                <h3 class="mb-2 text-xl text-gray-500 dark:text-gray-500">設立年月</h3>
                <p class="text-3xl text-black">{{ $company->established }}</p>
                </div>
            </div>
            <div>

                <div style="  solid 2px; border-left: #e6e6e6 solid 7px;  padding: 20px; font-size: 100%; border-radius: 20px; ">
               
                <h3 class="mb-2 text-xl text-gray-500 dark:text-gray-500">資本金</h3>
                <p class="text-2xl text-black">{{ $company->capital }}</p>
                </div>
            </div>
            <div>

               
                <div class="flex justify-center items-center mb-4 w-10 h-10 rounded-full bg-primary-100 lg:h-12 lg:w-12 dark:bg-primary-900">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5M12 17.25h8.25" />
                      </svg>
                </div>
                <h3 class="mb-2 text-xl text-gray-500 dark:text-gray-500">詳細コメント</h3>
                <p class="text-sm text-black">{{ $company->body }}</p>
            </div>
        
        </div>
        </div>
    </div>
  </section>
@endsection

{{-- <section class="text-gray-600 body-font">
    <div class="flex justify-start mt-4 ml-4">
        <a href="http://127.0.0.1:8001/users" class="text-white bg-blue-700 border-0 py-2 px-5 focus:outline-none hover:bg-blue-800 rounded text-xs padding-left;2px">戻る</a>
    </div>
                    <img alt="feature" class="object-cover object-center h-full w-full" src="{{$company->company_image}}">
                    <p class="text-gray-900 text-sm">＜会社名＞</p>
                    <h2 class="leading-relaxed text-base text-xl title-font font-medium mb-3">{{ $company['name'] }}</h2>
                    <p class="text-gray-900 text-sm">＜住所＞</p>
                    <h2 class="leading-relaxed text-base">{{ $company->address }}</h2>
                    <p class="text-gray-900 text-sm">＜E-mail＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->email }}</h1>
                    <p class="text-gray-900 text-sm">＜給与＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->salary }}</h1>
                    <p class="text-gray-900 text-sm">＜勤務時間＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->working }}</h1>
                    <p class="text-gray-900 text-sm">＜福利厚生＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->welfare }}</h1>
                    <p class="text-gray-900 text-sm">＜従業員数＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->employees }}</h1>
                    <p class="text-gray-900 text-sm">＜従業員年齢層＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->age }}</h1>
                    <p class="text-gray-900 text-sm">＜アクセス＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->access }}</h1>
                    <p class="text-gray-900 text-sm">＜設立年月＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->established }}</h1>
                    <p class="text-gray-900 text-sm">＜資本金＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->capital }}</h1>
                    <p class="text-gray-900 text-sm">＜詳細コメント＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->comments }}</h1> --}}