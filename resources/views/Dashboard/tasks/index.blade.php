@extends('layouts.app')
@section('content')
    <!-- ADD CATEGORY BUTTON -->
    <div class="my-2.5">
        <a href="{{ route('tasks.create') }}">
            <button type="submit" wire:click="deleteUser" wire:loading.attr="disabled"
                class="inline-flex w-full items-center justify-center rounded bg-green-600 py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">
                {{ __('إضافة مهمةجديدة') }}
            </button>
        </a>

    </div>
    <!-- TABLE -->
    <!-- TABLE -->
    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">

        <table id="categories" class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">إسم المهمة</th>
                    <th class="py-3 px-6 text-left">حالة المهمة</th>
                    <th class="py-3 px-6 text-center">وصف</th>
                    <th class="py-3 px-6 text-center">العضو  الذي أتمها</th>
                    <th class="py-3 px-6 text-center">إجراء</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">

                @foreach ($tasks as $task)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            {{ $task->name }}
                        </td>
                        <td class="py-3   {{ $task->completed ? 'bg-green-600' : 'bg-red-600 ' }} px-6 text-left">
                            {{ $task->completed ? 'منتهية' : 'في الإنتظار' }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $task->description }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            @if ($task->user && $task->user->name)
                            {{ $task->user->name }}
                            @endif
                        </td>
                        <td class="py-3 px-6 text-center">
                            <div class="flex item-center justify-center">
                                <a href="">
                                    <div
                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                    </div>
                                </a>
                                <form method="POST" action="{{ route('tasks.update', $task->id) }}">
                                    @csrf
                                    @method('PUT')
                                <button type="submit"
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                    </svg>
                                </button>
                                <input type="hidden" name="completed" value=" {{ $task->completed ? 0 :  1 }}">
                                </form>
                             

                                 

                                <form   action="{{ route('tasks.destroy',  $task->id ) }}" method="POST">
                                    @csrf
                                  
                                    @method('DELETE')
                                    <button type="submit"  
                                    class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                    </svg>
                               
                                </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>




    <script>
        // let table = new DataTable('#categories');
        var table = new DataTable('#categories', {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json',
            },
        });
    </script>
    <!-- END OF TABLE -->
@endsection
