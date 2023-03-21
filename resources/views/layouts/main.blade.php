<!DOCTYPE>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="rtl">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;800&display=swap" rel="stylesheet">
    {{-- font dor Logo --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Aref+Ruqaa+Ink:wght@700&display=swap" rel="stylesheet">
    {{-- wow animation --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        integrity="sha512-c42qTSw/wPZ3/5LBzD+Bw5f7bSF2oxou6wEb+I/lqeaKV5FDIfMvvRp772y4jcJLKuGUOpbJMdg/BTl50fJYAw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"
        integrity="sha512-Eak/29OTpb36LLo2r47IpVzPBLXnAMPAVypbSZiZ4Qkf8p/7S/XRG5xp7OKWPPYfJT6metI+IORkR5G8F900+g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.21/css/intlTelInput.css"
        integrity="sha512-gxWow8Mo6q6pLa1XH/CcH8JyiSDEtiwJV78E+D+QP0EVasFs8wKXq16G8CLD4CJ2SnonHr4Lm/yY2fSI2+cbmw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.21/js/intlTelInput.min.js"
        integrity="sha512-x1RjK1QHIg0CA4lP7CFG98UXDy04pYBPuepiMd4bkJ7sqEfAPHNmVbkBxVDG3zpnolqMX2cd1mX13HlvwZfA8w=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js"
        integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <style>
        .iti__country-list {

            white-space: normal;
            /* position: absolute; */
            top: 102%;
            left: 8%;
            width: 430%;
        }

        .iti__flag {
            background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.21/img/flags.png");
        }

        @media (-webkit-min-device-pixel-ratio: 2),
        (min-resolution: 192dpi) {
            .iti__flag {
                background-image: url("https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/17.0.21/img/flags@2x.png");
            }
        }

        #arabic-text-container {
            width: 100%;
            height: auto;
            text-align: center;
            overflow: hidden;
        }

        #arabic-text-loading {
            font-size: 1.5rem;
            opacity: 1;
        }

        #arabic-text {
            font-size: 3rem;
            opacity: 0;
            animation-name: fade-in-text;
            animation-duration: 3s;
            animation-fill-mode: forwards;
            animation-delay: 1s;
        }

        @keyframes fade-in-text {
            from {
                opacity: 0;
                transform: translateY(50%);
            }

            to {
                opacity: 1;
                transform: translateY(0%);
            }
        }
    </style>
</head>

<body class="antialiased">

    <!-- ====== Navbar Section Start -->
    <div class="ud-header absolute top-0 left-0 z-40 flex w-full items-center bg-transparent">
        <div class="container bbl">
            <div class="relative -mx-4 flex items-center justify-between">
                <div class="w-60 max-w-full px-4">
                    <a href="index.html" class="navbar-logo block w-full py-5">
                        <h1 class="text-black font-bold ">تمويل المستقبل </h1>
                        <span>للتغدية العامة</span>
                        {{-- <img class="h-32" src="{{ asset('storage/logo.png') }}" alt="logo" class="header-logo w-full" /> --}}
                    </a>
                </div>
                <div class="flex w-full items-center justify-between px-4">
                    <div>
                        <button id="navbarToggler"
                            class="absolute left-4 top-1/2 block -translate-y-1/2 rounded-lg px-3 py-[6px] ring-primary focus:ring-2 lg:hidden">
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                            <span class="relative my-[6px] block h-[2px] w-[30px] bg-white"></span>
                        </button>
                        <nav id="navbarCollapse"
                            class="absolute left-4 top-full hidden w-full max-w-[250px] rounded-lg bg-white py-5 shadow-lg lg:static lg:block lg:w-full lg:max-w-full lg:bg-transparent lg:py-0 lg:px-4 lg:shadow-none xl:px-6">
                            <ul class="blcok  lg:flex">
                                <li class="group relative">
                                    <a href=""
                                        class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70">
                                        الرئيسية
                                    </a>
                                </li>
                                <li class="group relative">
                                    <a href="#about"
                                        class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                                        من نحن
                                    </a>
                                </li>
                                <li class="group relative">
                                    <a href="#pricing"
                                        class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                                        الخدمات
                                    </a>
                                </li>
                                <li class="group relative">
                                    <a href="{{ route('deals.index') }}"
                                        class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                                        الفرص الاستثمارية

                                    </a>
                                </li>
                                <li class="group relative">
                                    <a href="#contact"
                                        class="ud-menu-scroll mx-8 flex py-2 text-base text-dark group-hover:text-primary lg:mr-0 lg:ml-7 lg:inline-flex lg:py-6 lg:px-0 lg:text-white lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                                        الوكالات التجارية

                                    </a>
                                </li>
                                <li class="submenu-item group relative">
                                    <a href="javascript:void(0)"
                                        class="relative mx-8 flex py-2 text-base text-dark after:absolute after:left-1 after:top-1/2 after:mt-[-2px] after:h-2 after:w-2 after:-translate-y-1/2 after:rotate-45 after:border-b-2 after:border-r-2 after:border-current group-hover:text-primary lg:mr-0 lg:ml-8 lg:inline-flex lg:py-6 lg:pl-0 lg:pr-4 lg:text-white lg:after:right-0 lg:group-hover:text-white lg:group-hover:opacity-70 xl:ml-12">
                                        المزيد
                                    </a>
                                    <div
                                        class="submenu relative top-full left-0 hidden w-[250px] rounded-sm bg-white p-4 transition-[top] duration-300 group-hover:opacity-100 lg:invisible lg:absolute lg:top-[110%] lg:block lg:opacity-0 lg:shadow-lg lg:group-hover:visible lg:group-hover:top-full">
                                        <a href="about.html"
                                            class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
                                            إتصل بنا
                                        </a>
                                        <a href="pricing.html"
                                            class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
                                            تسجيل الدخول

                                        </a>
                                        <a href="contact.html"
                                            class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
                                            الاتصال بنا
                                        </a>
                                        <a href="blog-grids.html"
                                            class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
                                            الأسئلة الشائعة

                                        </a>
                                        <a href="blog-details.html"
                                            class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
                                            سياسة الخصوصية
                                        </a>
                                        <a href="signup.html"
                                            class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
                                            الشروط والأحكام
                                        </a>
                                        <a href="signin.html"
                                            class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
                                            الاشتراك في النشرة الإخبارية
                                        </a>
                                        <a href="404.html"
                                            class="block rounded py-[10px] px-4 text-sm text-body-color hover:text-primary">
                                            تابعنا على وسائل التواصل الاجتماعي
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="hidden justify-end pr-16 sm:flex lg:pr-0">
                        <a href="{{ route('login') }}"
                            class="loginBtn py-3 px-7 text-base font-medium text-white hover:opacity-70">
                            تسجيل الدخول
                        </a>
                        <a href="{{ route('register') }}"
                            class="signUpBtn rounded-lg bg-white bg-opacity-20 py-3 px-6 text-base font-medium text-white duration-300 ease-in-out hover:bg-opacity-100 hover:text-dark">
                            إنشاء حساب
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @yield('content')


    <!-- ====== Footer Section Start -->
    <footer class="wow fadeInUp relative z-10 bg-black pt-20 lg:pt-[120px]" data-wow-delay=".15s">
        <div class="container">
            <div class="-mx-4 flex flex-wrap">
                <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-4/12 xl:w-3/12">
                    <div class="mb-10 w-full">
                        <a href="javascript:void(0)" class="mb-6 inline-block  ">
                            <img src="{{ asset('storage/logo.png') }}" alt="logo" class="max-w-full" />
                        </a>
                        <p class="mb-7 text-base text-[#f3f4fe]">
                            We create digital experiences for brands and companies by using
                            technology.
                        </p>
                        <div class="-mx-3 flex items-center">
                            <a href="javascript:void(0)" class="px-3 text-[#dddddd] hover:text-white">
                                <svg width="10" height="18" viewBox="0 0 10 18" class="fill-current">
                                    <path
                                        d="M9.00007 6.82105H7.50006H6.96434V6.27097V4.56571V4.01562H7.50006H8.62507C8.91971 4.01562 9.16078 3.79559 9.16078 3.46554V0.550085C9.16078 0.247538 8.9465 0 8.62507 0H6.66969C4.55361 0 3.08038 1.54024 3.08038 3.82309V6.21596V6.76605H2.54466H0.72322C0.348217 6.76605 0 7.06859 0 7.50866V9.48897C0 9.87402 0.294645 10.2316 0.72322 10.2316H2.49109H3.02681V10.7817V16.31C3.02681 16.6951 3.32145 17.0526 3.75003 17.0526H6.26791C6.42862 17.0526 6.56255 16.9701 6.66969 16.8601C6.77684 16.7501 6.8572 16.5576 6.8572 16.3925V10.8092V10.2591H7.4197H8.62507C8.97328 10.2591 9.24114 10.0391 9.29471 9.709V9.6815V9.65399L9.66972 7.7562C9.6965 7.56367 9.66972 7.34363 9.509 7.1236C9.45543 6.98608 9.21436 6.84856 9.00007 6.82105Z" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)" class="px-3 text-[#dddddd] hover:text-white">
                                <svg width="19" height="15" viewBox="0 0 19 15" class="fill-current">
                                    <path
                                        d="M16.2622 3.17878L17.33 1.93293C17.6391 1.59551 17.7234 1.33595 17.7515 1.20618C16.9085 1.67337 16.1217 1.82911 15.6159 1.82911H15.4192L15.3068 1.72528C14.6324 1.18022 13.7894 0.894714 12.8902 0.894714C10.9233 0.894714 9.37779 2.40012 9.37779 4.13913C9.37779 4.24295 9.37779 4.39868 9.40589 4.5025L9.49019 5.02161L8.90009 4.99565C5.30334 4.89183 2.35288 2.03675 1.87518 1.5436C1.08839 2.84136 1.53799 4.08722 2.01568 4.86587L2.97107 6.31937L1.45369 5.54071C1.48179 6.63084 1.93138 7.48736 2.80247 8.11029L3.56116 8.62939L2.80247 8.9149C3.28017 10.2386 4.34795 10.7837 5.13474 10.9913L6.17443 11.2509L5.19094 11.8738C3.61736 12.912 1.65039 12.8342 0.779297 12.7563C2.54957 13.8983 4.65705 14.1579 6.11823 14.1579C7.21412 14.1579 8.02901 14.0541 8.2257 13.9762C16.0936 12.2631 16.4589 5.77431 16.4589 4.47655V4.29486L16.6275 4.19104C17.5829 3.36047 17.9763 2.91923 18.2011 2.65967C18.1168 2.68563 18.0044 2.73754 17.892 2.7635L16.2622 3.17878Z" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)" class="px-3 text-[#dddddd] hover:text-white">
                                <svg width="18" height="18" viewBox="0 0 18 18" class="fill-current">
                                    <path
                                        d="M8.91688 12.4995C10.6918 12.4995 12.1306 11.0911 12.1306 9.35385C12.1306 7.61655 10.6918 6.20819 8.91688 6.20819C7.14197 6.20819 5.70312 7.61655 5.70312 9.35385C5.70312 11.0911 7.14197 12.4995 8.91688 12.4995Z" />
                                    <path
                                        d="M12.4078 0.947388H5.37075C2.57257 0.947388 0.300781 3.17104 0.300781 5.90993V12.7436C0.300781 15.5367 2.57257 17.7604 5.37075 17.7604H12.3524C15.2059 17.7604 17.4777 15.5367 17.4777 12.7978V5.90993C17.4777 3.17104 15.2059 0.947388 12.4078 0.947388ZM8.91696 13.4758C6.56206 13.4758 4.70584 11.6047 4.70584 9.35389C4.70584 7.10312 6.58976 5.23199 8.91696 5.23199C11.2165 5.23199 13.1004 7.10312 13.1004 9.35389C13.1004 11.6047 11.2442 13.4758 8.91696 13.4758ZM14.735 5.61164C14.4579 5.90993 14.0423 6.07264 13.5714 6.07264C13.1558 6.07264 12.7402 5.90993 12.4078 5.61164C12.103 5.31334 11.9368 4.9337 11.9368 4.47269C11.9368 4.01169 12.103 3.65916 12.4078 3.33375C12.7125 3.00834 13.1004 2.84563 13.5714 2.84563C13.9869 2.84563 14.4302 3.00834 14.735 3.30663C15.012 3.65916 15.2059 4.06593 15.2059 4.49981C15.1782 4.9337 15.012 5.31334 14.735 5.61164Z" />
                                    <path
                                        d="M13.5985 3.82184C13.2383 3.82184 12.9336 4.12013 12.9336 4.47266C12.9336 4.82519 13.2383 5.12349 13.5985 5.12349C13.9587 5.12349 14.2634 4.82519 14.2634 4.47266C14.2634 4.12013 13.9864 3.82184 13.5985 3.82184Z" />
                                </svg>
                            </a>
                            <a href="javascript:void(0)" class="px-3 text-[#dddddd] hover:text-white">
                                <svg width="18" height="18" viewBox="0 0 18 18" class="fill-current">
                                    <path
                                        d="M16.7821 0.947388H1.84847C1.14272 0.947388 0.578125 1.49747 0.578125 2.18508V16.7623C0.578125 17.4224 1.14272 18 1.84847 18H16.7257C17.4314 18 17.996 17.4499 17.996 16.7623V2.15757C18.0525 1.49747 17.4879 0.947388 16.7821 0.947388ZM5.7442 15.4421H3.17528V7.32837H5.7442V15.4421ZM4.44563 6.2007C3.59873 6.2007 2.94944 5.5406 2.94944 4.74297C2.94944 3.94535 3.62696 3.28525 4.44563 3.28525C5.26429 3.28525 5.94181 3.94535 5.94181 4.74297C5.94181 5.5406 5.32075 6.2007 4.44563 6.2007ZM15.4835 15.4421H12.9146V11.509C12.9146 10.5739 12.8864 9.33618 11.5596 9.33618C10.2045 9.33618 10.0069 10.3813 10.0069 11.4265V15.4421H7.438V7.32837H9.95046V8.45605H9.9787C10.3457 7.79594 11.1644 7.13584 12.4347 7.13584C15.0601 7.13584 15.54 8.7861 15.54 11.0414V15.4421H15.4835Z" />
                                </svg>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-2/12 xl:w-2/12">
                    <div class="mb-10 w-full">
                        <h4 class="mb-9 text-lg font-semibold text-white">معلومات الشركة
                        </h4>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    من نحن

                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    تاريخ الشركة

                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    شركاؤنا
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    الأخبار والأحداث
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-3/12 xl:w-2/12">
                    <div class="mb-10 w-full">
                        <h4 class="mb-9 text-lg font-semibold text-white">خدماتنا</h4>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    خدمات الشحن والتوصيل
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    خدمات التخزين

                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    خدمات التغليف والتسويق
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    خدمات المساعدة اللوجستية
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full px-4 sm:w-1/2 md:w-1/2 lg:w-3/12 xl:w-2/12">
                    <div class="mb-10 w-full">
                        <h4 class="mb-9 text-lg font-semibold text-white">
                            قائمة الأخبار والمقالات
                        </h4>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    أحدث الأخبار المتعلقة بالشركة
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    نصائح وأفكار حول الأعمال التجارية
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    مقالات حول الصناعة الغذائية
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"
                                    class="mb-2 inline-block text-base leading-loose text-[#f3f4fe] hover:text-primary">
                                    تقارير حول العمليات اللوجستية والاستيراد
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="w-full px-4 md:w-2/3 lg:w-6/12 xl:w-3/12">
                    <div class="mb-10 w-full">
                        <h4 class="mb-9 text-lg font-semibold text-white">قائمة التواصل</h4>

                    </div>
                </div>
            </div>
        </div>

        <div class="mt-12 border-t border-opacity-40 py-8 lg:mt-[60px]">
            <div class="container">
                <div class="-mx-4 flex flex-wrap">
                    <div class="w-full px-4 md:w-2/3 lg:w-1/2">
                        <div class="my-1">
                            <div class="-mx-3 flex items-center justify-center md:justify-start">
                                <a href="javascript:void(0)" class="px-3 text-base text-[#f3f4fe] hover:text-primary">
                                    Privacy policy
                                </a>
                                <a href="javascript:void(0)" class="px-3 text-base text-[#f3f4fe] hover:text-primary">
                                    Legal notice
                                </a>
                                <a href="javascript:void(0)" class="px-3 text-base text-[#f3f4fe] hover:text-primary">
                                    Terms of service
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 md:w-1/3 lg:w-1/2">
                        <div class="my-1 flex justify-center md:justify-end">
                            <p class="text-base text-[#f3f4fe]">
                                جميع الحقوق محفوظة شركة تموين المستقبل
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div>
            <span class="absolute left-0 top-0 z-[-1]">
                <img src="{{ asset('storage/footer/shape-1.svg') }}" alt="" />
            </span>

            <span class="absolute bottom-0 right-0 z-[-1]">
                <img src="{{ asset('storage/footer/shape-3.svg') }}" alt="" />
            </span>


        </div>
    </footer>
    <!-- ====== Footer Section End -->

    <!-- ====== Back To Top Start -->
    <a href="javascript:void(0)"
        class="back-to-top fixed bottom-8 right-8 left-auto z-[999] hidden h-10 w-10 items-center justify-center rounded-md bg-primary text-white shadow-md transition duration-300 ease-in-out hover:bg-dark">
        <span class="mt-[6px] h-3 w-3 rotate-45 border-t border-l border-white"> </span>
    </a>
    <!-- ====== Back To Top End -->

</body>


</html>
