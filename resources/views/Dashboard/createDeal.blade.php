@extends('layouts.app')
@section('content')
    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
        <!-- ====== Form Elements Section Start -->
        <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
            <form action="{{ route('deal.store') }}" method="POST" enctype="multipart/form-data" >
                @csrf


                <div class="w-full px-4 lg:w-5/12">
                    <div class="mb-12">
                        <label for="category_id" class="mb-3 block text-base font-medium text-black">
                            إختر صنفاً لهذه الصفقة :
                        </label>
                        <div class="relative">
                            <select name="category_id" id="category_id"
                                class="w-full  appearance-none rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]">

                                @foreach ($categories as $category)
                                    <option class="px-24" value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach

                            </select>
                            <span
                                class="absolute left-4 top-1/2 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2 border-body-color">
                            </span>
                        </div>
                    </div>
                </div>
                <div class="mb-12">
                    <label for="name" class="mb-3 block text-base font-medium text-black">
                        إسم للصفقة :
                    </label>
                    <input name="name" id="name" type="text" placeholder="اسم للصفقة"
                        class="w-full rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]" />
                    @error('name')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-12">
                    <label for="description" class="mb-3 block text-base font-medium text-black">
                        وصف للصفقة :
                    </label>
                    <textarea name="description" id="description" rows="5" placeholder="وصف للصفقة"
                        class="w-full rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]"></textarea>
                    @error('description')
                        <span class="text-red-600 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                {{-- image --}}
                <div class="w-full px-4 lg:w-5/12">
                    <div class="mb-12">
                        <label for="image" class="mb-3 block text-base font-medium text-black">
                            أرفع صورة
                        </label>
                        <input type="file" name="image" id="image"
                            class="w-full cursor-pointer rounded-lg border-[1.5px] border-form-stroke font-medium text-body-color placeholder-body-color outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-form-stroke file:bg-[#F5F7FD] file:py-3 file:px-5 file:text-body-color file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]" />
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- vidio --}}
                <div class="w-full px-4 lg:w-5/12">
                    <div class="mb-12">
                        <label for="video" class="mb-3 block text-base font-medium text-black">
                            أرفع فيديو
                        </label>
                        <input type="file" id="video" name="video"
                            class="w-full cursor-pointer rounded-lg border-[1.5px] border-form-stroke font-medium text-body-color placeholder-body-color outline-none transition file:mr-5 file:border-collapse file:cursor-pointer file:border-0 file:border-r file:border-solid file:border-form-stroke file:bg-[#F5F7FD] file:py-3 file:px-5 file:text-body-color file:hover:bg-primary file:hover:bg-opacity-10 focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]" />
                        @error('video')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
                {{-- رابط الفيديو من اليوتيوب --}}
                <div class="mb-12">
                    <label for="youtube_link" class="mb-3 block text-base font-medium text-black">
                        رابط فيديو من اليوتيوب (مستحسن) :
                    </label>
                    <input name="youtube_link" id="youtube_link" type="url" placeholder="فيديو من اليوتيوب للصفقة"
                        class="w-full rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]" />
                    @error('youtube_link')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                {{-- السعر --}}
                <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                    <div class="mb-12">
                        <label for="price" class="mb-3 block text-base font-medium text-black">
                            قيمة الصفقة
                        </label>
                        <input  name="price" type="number" placeholder="قيمة الصفقة"
                            class="w-full rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]" />
                        @if ($errors->has('price'))
                            <p class="text-red-500 text-sm mt-2">{{ $errors->first('price') }}</p>
                        @endif
                    </div>
                </div>
                {{-- تاريخ  --}}



                <div class="relative max-w-sm">
                    <label for="start_date" class="mb-3 block text-base font-medium text-black">
                        تاريخ بدء الصفقة
                    </label>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                    </div>

                    <input name="start_date" type="date" id="start_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if ($errors->has('start_date'))
                        <p class="text-red-500 text-sm mt-2">{{ $errors->first('start_date') }}</p>
                    @endif
                </div>

                <div class="relative max-w-sm">
                    <label for="end_date" class="mb-3 block text-base font-medium text-black">
                        تاريخ نهاية الصفقة
                    </label>
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">

                    </div>

                    <input name="end_date" type="date" id="end_date"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    @if ($errors->has('end_date'))
                        <p class="text-red-500 text-sm mt-2">{{ $errors->first('end_date') }}</p>
                    @endif
                </div>
                <div class="mb-12">
                    <label for="requirement" class="mb-3 block text-base font-medium text-black">
                        متطلبات وشروط التقدم للصفقة (تذكر أن تضع نقطة بعد كل شرط ولا داعي لترقيم القائمة وآخر شرط لاتضع فيه نقطة):
                    </label>
                    <textarea name="requirement" id="requirement" rows="5" placeholder="شروط ومتطلبات الصفقة"
                        class="w-full rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color placeholder-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]"></textarea>
                    @if ($errors->has('requirement'))
                        <p class="text-red-500">{{ $errors->first('description') }}</p>
                    @endif
                </div>
                @if ($errors->any())
                    <div class="mt-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative"
                        role="alert">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit"
                    class="inline-flex w-full items-center justify-center rounded bg-green-600 py-4 px-6 text-base font-medium text-white transition duration-300 ease-in-out hover:bg-dark">
                    {{ __('أضف الصفقة') }}
                </button>

    </div>
    </form>




    </section>
    <!-- ====== Form Elements Section End -->

    </div>




    <!-- END OF TABLE -->
@endsection
