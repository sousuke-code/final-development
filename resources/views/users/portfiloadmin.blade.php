@extends('layout.app')

@section('content')
<div class="flex items-center justify-center">
    <!-- Author: FormBold Team -->
    <div class="mx-auto w-full max-w-[550px] bg-white">
        <form class="py-4 px-9" action="{{ route('portfolios.update', ['id' => $portfolio->id]) }}" method="POST" enctype="multipart/form-data">
  
          @csrf
          @method('put')
            <div class="mb-5">
                <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                    タイトル
                </label>
                <input type="title" name="title" id="title" placeholder="example@domain.com"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
  
            <div class="mb-5">
                <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                    URL
                </label>
                <input type="url" name="url" id="url" placeholder="example@domain.com"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
            </div>
  
            <div class="mb-5">
                <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">
                    作品内容の記述
                </label>
                <textarea type="description" name="description" id="description" placeholder="example@domain.com"
                    class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md"></textarea>
            </div>
  
            <div class="mb-6 pt-4">
                <label class="mb-5 block text-xl font-semibold text-[#07074D]">
                    画像を挿入してください
                </label>
  
                <div class="mb-8">
                    <input type="file" name="file" id="file" class="sr-only" />
                    <label for="file"
                        class="relative flex min-h-[200px] items-center justify-center rounded-md border border-dashed border-[#e0e0e0] p-12 text-center">
                        <div>
                            <span class="mb-2 block text-xl font-semibold text-[#07074D]">
                                Drop files here
                            </span>
                            <span class="mb-2 block text-base font-medium text-[#6B7280]">
                                Or
                            </span>
                            <span
                                class="inline-flex rounded border border-[#e0e0e0] py-2 px-7 text-base font-medium text-[#07074D]">
                                Browse
                            </span>
                        </div>
                    </label>
                </div>
  
            </div>
  
            <div>
                <button
                    class="hover:shadow-form w-full rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                    編集する
                </button>
            </div>
        </form>
    </div>
  </div>
  
  

@endsection