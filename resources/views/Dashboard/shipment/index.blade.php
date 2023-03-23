@extends('layouts.app')
@section('content')
    <!-- TABLE -->
    <!-- TABLE -->

    @if (session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <span class="block sm:inline">{{ session('success') }}</span>
            <span class="absolute top-0 bottom-0 left-0 px-4 py-3">
                <button class="close-button">
                    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 20 20">
                        <title>Close</title>
                        <path
                            d="M14.348 5.652a.5.5 0 0 0-.707 0L10 9.293 6.357 5.652a.5.5 0 0 0-.707.707L9.293 10l-3.643 3.643a.5.5 0 0 0 .708.707L10 10.707l3.643 3.643a.5.5 0 0 0 .707-.707L10.707 10l3.641-3.648z" />
                    </svg>
                </button>
            </span>
        </div>

        <script>
            const closeButton = document.querySelector('.close-button');
            const alertBox = document.querySelector('.bg-green-100');

            closeButton.addEventListener('click', () => {
                alertBox.style.display = 'none';
            });
        </script>
    @endif

        <!-- ADD SHIPMENT BUTTON -->
        <div class="my-2.5">
            <a href="{{ route('shipments.create') }}">
                <button type="submit" 
                    class="inline-flex w-full items-center justify-center rounded bg-green-600 py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">
                    {{ __('إضافة شحنة') }}
                </button>
            </a>
    
        </div>


    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">

        <table id="shipments" class="min-w-max w-full table-auto">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">الشحنة</th>
                    <th class="py-3 px-6 text-left">نوعها</th>
                    <th class="py-3 px-6 text-center">العميل </th>
                    <th class="py-3 px-6 text-center">الحالة</th>
                    <th class="py-3 px-6 text-center">مكان القدوم</th>
                    <th class="py-3 px-6 text-center">مكان التسليم</th>
                    <th class="py-3 px-6 text-center">تاريخ التسليم</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm">

                @foreach ($shipments as $user)
                    <tr class="border-b border-gray-200 hover:bg-gray-100">
                        <td class="py-3 px-6 text-left whitespace-nowrap">
                            {{ $user->name }}
                        </td>
                        <td class="py-3 px-6 text-left">
                            {{ $user->id }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $user->email }}
                        </td>
                        <td class="py-3 px-6 text-center">
                            {{ $user->jobTitle->title }}
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




                                <a href="{{ route('shipments.edit', $user->id) }}">
                                    <div
                                        class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110 cursor-pointer cursor-pointer">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                        </svg>
                                    </div>
                                </a>



                                <form action="{{ route('shipments.destroy', $user->id) }}" method="POST">
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
        // let table = new DataTable('#shipments');
        var table = new DataTable('#shipments', {
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/ar.json',
            },
        });
    </script>
    <!-- END OF TABLE -->
@endsection
