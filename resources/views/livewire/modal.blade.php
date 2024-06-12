<div>
    {{-- Because she competes with no one, no one can compete with her. --}}

    <button wire:click="openModal()" type="button" class="bg-orange-300 text-xl text-white underline hover:no-underline inline-block rounded-full mt-12 px-8 py-2">
        See messages
    </button>
    @if($showModal)
    <div class="fixed z-10 inset-0 overflow-y-auto">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>               

            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    
                    <div class="mt-2">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>メッセージ通知</title>
                            </head>
                            <body class="font-sans">
                                <div class="bg-gray-100 py-4 text-center">
                                    <div class="text-3xl font-bold">通知</div>
                                    
                                </div>
                                
                                <div class="relative">
                                    <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full px-2 py-1">2</span>
                                </div>
                                <div class="bg-white py-4 px-6 border-b border-gray-200 flex items-center">
                                    <img src="user_icon.jpg" alt="送信者アイコン" class="w-12 h-12 rounded-full mr-4">
                                    <div>
                                        <div class="text-lg font-semibold">山田太郎さんからメッセージが届きました</div>
                                        <div class="text-gray-500">12:30</div>
                                    </div>
                                    <img src="message_icon.png" alt="メッセージアイコン" class="w-10 h-10 ml-auto cursor-pointer">
                                </div>

                                <div class="relative">
                                    <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full px-2 py-1">3</span>
                                </div>
                                <div class="bg-white py-4 px-6 border-b border-gray-200 flex items-center">
                                    <img src="user_icon.jpg" alt="送信者アイコン" class="w-12 h-12 rounded-full mr-4">
                                    <div>
                                        <div class="text-lg font-semibold">山田太郎3さんからメッセージが届きました</div>
                                        <div class="text-gray-500">12:30</div>
                                    </div>
                                    <img src="message_icon.png" alt="メッセージアイコン" class="w-10 h-10 ml-auto cursor-pointer">
                                </div>

                                <div class="relative">
                                    <span class="absolute top-0 right-0 bg-red-500 text-white rounded-full px-2 py-1">1</span>
                                </div>
                                <div class="bg-white py-4 px-6 border-b border-gray-200 flex items-center">
                                    <img src="user_icon.jpg" alt="送信者アイコン" class="w-12 h-12 rounded-full mr-4">
                                    <div>
                                        <div class="text-lg font-semibold">山田太郎2さんからメッセージが届きました</div>
                                        <div class="text-gray-500">12:30</div>
                                    </div>
                                    <img src="message_icon.png" alt="メッセージアイコン" class="w-10 h-10 ml-auto cursor-pointer">
                                </div>
                                
                            </body>

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
