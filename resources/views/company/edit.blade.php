@extends('layout.app')

@section('content')
    <div class="min-h-screen bg-gray-100 py-6 flex flex-col justify-center sm:py-12">
        <div class="relative py-3 sm:max-w-xl sm:mx-auto w-full">
            <div class="relative px-4 py-10 bg-white mx-8 md:mx-0 shadow rounded-3xl sm:p-10">
                <div class="max-w-md mx-auto">
                    <div class="flex items-center space-x-5">
                        <div class="block pl-2 font-semibold text-xl self-start text-gray-700">
                            <h1 class="leading-relaxed">企業情報編集</h1>
                        </div>
                    </div>
                    
                    <div class="divide-y divide-gray-200">
                        <div class="py-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7">
                            <form action="{{ route('companies.update', ['id' => $company->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')



                                    {{-- 企業画像の表示 --}}
                                    <div class="mt-4">
                                        @if ($company->image)
                                            <img src="{{ asset('storage/' . $company->image) }}" alt="企業画像" class="rounded-md object-cover" style="width: 200px; height: 200px;">
                                        @else
                                            <img src="/images/avatar-default.svg" alt="デフォルト画像" class="rounded-md object-cover" style="width: 200px; height: 200px;">
                                        @endif
                                    </div>
                                                                    <div class="flex flex-col">

                                    <input type="file" id="image" name="image" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400">

                                </div>
                                
                                {{-- 企業名 --}}
                                <div class="flex flex-col">
                                    <label for="name" class="leading-loose">企業名</label>
                                    <input type="text" id="name" name="name" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('name', $company->name) }}">
                                </div>
                                
                                {{-- 住所 --}}
                                <div class="flex flex-col">
                                    <label for="address" class="leading-loose">住所</label>
                                    <input type="text" id="address" name="address" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('address', $company->address) }}">
                                </div>
                                
                                {{-- E-mail --}}
                                <div class="flex flex-col">
                                    <label for="email" class="leading-loose">E-mail</label>
                                    <input type="text" id="email" name="email" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('email', $company->email) }}">
                                </div>
                                
                                {{-- 給与 --}}
                                <div class="flex flex-col">
                                    <label for="salary" class="leading-loose">給与</label>
                                    <input type="text" id="salary" name="salary" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('salary', $company->salary) }}">
                                </div>
                                
                                {{-- 勤務時間 --}}
                                <div class="flex flex-col">
                                    <label for="working" class="leading-loose">勤務時間</label>
                                    <input type="text" id="working" name="working" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('working', $company->working) }}">
                                </div>
                                
                                {{-- 休日 --}}
                                <div class="flex flex-col">
                                    <label for="holiday" class="leading-loose">休日</label>
                                    <input type="text" id="holiday" name="holiday" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('holiday', $company->holiday) }}">
                                </div>
                                
                                {{-- 福利厚生 --}}
                                <div class="flex flex-col">
                                    <label for="welfare" class="leading-loose">福利厚生</label>
                                    <input type="text" id="welfare" name="welfare" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('welfare', $company->welfare) }}">
                                </div>
                                
                                {{-- 従業員数 --}}
                                <div class="flex flex-col">
                                    <label for="employees" class="leading-loose">従業員数</label>
                                    <input type="text" id="employees" name="employees" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('employees', $company->employees) }}">
                                </div>
                                
                                {{-- 従業員年齢層 --}}
                                <div class="flex flex-col">
                                    <label for="age" class="leading-loose">従業員年齢層</label>
                                    <input type="text" id="age" name="age" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('age', $company->age) }}">
                                </div>
                                
                                {{-- アクセス --}}
                                <div class="flex flex-col">
                                    <label for="access" class="leading-loose">アクセス</label>
                                    <input type="text" id="access" name="access" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('access', $company->access) }}">
                                </div>

                                {{-- 設立年月 --}}
                                <div class="flex flex-col">
                                    <label for="established" class="leading-loose">設立年月</label>
                                    <input type="text" id="established" name="established" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('year', $company->year) }}">
                                </div>

                                {{-- 資本金 --}}
                                <div class="flex flex-col">
                                    <label for="capital" class="leading-loose">資本金</label>
                                    <input type="text" id="capital" name="capital" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('capital', $company->capital) }}">
                                </div>

                                {{-- 詳細コメント --}}
                                <div class="flex flex-col">
                                    <label for="body" class="leading-loose">詳細コメント</label>
                                    <input type="text" id="body" name="body" class="px-4 py-2 border focus:ring-gray-500 focus:border-gray-900 w-full sm:text-sm border-gray-300 rounded-md focus:outline-none text-gray-400" value="{{ old('body', $company->body) }}">
                                </div>
                                
                                {{-- 戻る --}}
                                <div class="pt-4 flex items-center space-x-4">
                                    <button class="bg-red-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none" type="button" onClick="history.back()">戻る</button>
                                </div>

                                {{-- 更新ボタン --}}
                                <div class="pt-4 flex items-center space-x-4">
                                    <button type="submit" class="bg-sky-500 flex justify-center items-center w-full text-white px-4 py-3 rounded-md focus:outline-none">更新する</button>
                                </div>
                                
                                @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

