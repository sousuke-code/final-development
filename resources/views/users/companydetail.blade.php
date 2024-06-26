@extends('layout.app')

@section('content')
<section class="text-gray-600 body-font">
    <div class="flex justify-start mt-4 ml-4">
        <a href="http://127.0.0.1:8001/users" class="text-white bg-blue-700 border-0 py-2 px-5 focus:outline-none hover:bg-blue-800 rounded text-xs padding-left;2px">戻る</a>
    </div>
    <div class="container px-5 py-24 mx-auto flex flex-wrap">
        <div class="lg:w-1/3 w-full mb-10 lg:mb-0 rounded-lg overflow-hidden">
            <img alt="feature" class="object-cover object-center h-full w-full" src="{{$company->company_image}}">
        </div>
        <div class="flex flex-col flex-wrap lg:py-6 -mb-10 lg:w-1/2 lg:pl-12 lg:text-left text-center">
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜会社名＞</p>
                    <h2 class="leading-relaxed text-base text-xl title-font font-medium mb-3">{{ $company['name'] }}</h2>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜住所＞</p>
                    <h2 class="leading-relaxed text-base">{{ $company->address }}</h2>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜E-mail＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->email }}</h1>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜給与＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->salary }}</h1>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜勤務時間＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->working }}</h1>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜休日＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->holiday }}</h1>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜福利厚生＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->welfare }}</h1>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜従業員数＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->employees }}</h1>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜従業員年齢層＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->age }}</h1>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜アクセス＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->access }}</h1>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜設立年月＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->established }}</h1>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜資本金＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->capital }}</h1>
                </div>
            </div>
            <div class="flex flex-col mb-10 lg:items-center items-center">
                <div class="flex-grow p-4 rounded-lg border">
                    <p class="text-gray-900 text-sm">＜詳細コメント＞</p>
                    <h1 class="leading-relaxed text-base">{{ $company->comments }}</h1>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection