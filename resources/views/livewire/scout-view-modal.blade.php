<div>
    {{-- Because she competes with no one, no one can compete with her. --}}
    

<div>
    <button wire:click="openModal()" type="button" >
    
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" stroke-width="1.5" class="bi bi-bell"  viewBox="0 0 24 24" class="w-10 h-9 mb-2 hover:text-blue-500">
            <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zM8 1.918l-.797.161A4.002 4.002 0 0 0 4 6c0 .628-.134 2.197-.459 3.742-.16.767-.376 1.566-.663 2.258h10.244c-.287-.692-.502-1.49-.663-2.258C12.134 8.197 12 6.628 12 6a4.002 4.002 0 0 0-3.203-3.92L8 1.917zM14.22 12c.223.447.481.801.78 1H1c.299-.199.557-.553.78-1C2.68 10.2 3 6.88 3 6c0-2.42 1.72-4.44 4.005-4.901a1 1 0 1 1 1.99 0A5.002 5.002 0 0 1 13 6c0 .88.32 4.2 1.22 6z"/>
        </svg>
</button>
    @if($showModal)
        <div class="fixed z-10 inset-0 overflow-y-auto">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>               
 
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            offer
                        </h3>
                        <div class="mt-2">
                            <p class="text-sm text-gray-500">
                                @foreach ($scouts as $scout)
                                <tr>
                                    <td class="border px-4 py-2">{{ $scout->company->name }}からオファーがありました。</td>
                                    <td class="border px-4 py-2">{{ $scout->created_at }}</td>
                                    <td class="border px-4 py-2">
                                        <button class="bg-green-500 text-white px-4 py-2 rounded">承認</button>
                                        {{-- <button class="bg-red-500 text-white px-4 py-2 rounded">削除</button> --}}
                                        <form id="delete-form-{{ $scout->id }}" action="{{ route('scouts.destroy', $scout->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded">削除</button>
                                        </form>
                                    </td>
                                </tr>
                                <br>
                                @endforeach
                            </p>
                        </div>
                    </div>
                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button wire:click="closeModal()" type="button" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700">
                            閉じる
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
</div>
