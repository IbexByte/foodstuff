@extends('layouts.app')
@section('content')
    <div class="bg-white shadow rounded-sm my-2.5 overflow-x-auto">
        <!-- ====== Form Elements Section Start -->
        <section class="pt-20 pb-10 lg:pt-[120px] lg:pb-20">
            <form action="{{ route('users.update', $user->id) }}" method="POST">
                @method('PATCH')
                @csrf


                <div class="w-full px-4 lg:w-5/12">
                    <div class="mb-12">
                        <label for="category_id" class="mb-3 block text-base font-medium text-black">
                            هل تم إنجاز المهمة ؟
                        </label>
                        <div class="relative">
                            <select name="job_title_id" id="job_title_id"
                                class="w-full  appearance-none rounded-lg border-[1.5px] border-form-stroke py-3 px-5 font-medium text-body-color outline-none transition focus:border-primary active:border-primary disabled:cursor-default disabled:bg-[#F5F7FD]">

                                @foreach ($jobs as $job)
                                    <option class="px-24" value="{{ $job->id }}">{{ $job->title }}</option>
                                @endforeach

                            </select>
                            <span
                                class="absolute left-4 top-1/2 mt-[-2px] h-[10px] w-[10px] -translate-y-1/2 rotate-45 border-r-2 border-b-2 border-body-color">
                            </span>

                        </div>
                    </div>
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
                    {{ __('عدِّل') }}
                </button>

    </div>
    </form>




    </section>
    <!-- ====== Form Elements Section End -->

    </div>




    <!-- END OF TABLE -->
@endsection
