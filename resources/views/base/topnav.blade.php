<nav
    class="relative flex flex-wrap items-center justify-between px-0 py-2 mx-6 transition-all shadow-none duration-250 ease-soft-in rounded-2xl lg:flex-nowrap lg:justify-start"
    navbar-main navbar-scroll="true">
    <div class="flex items-center mt-2 grow sm:mt-0 sm:mr-6 md:mr-0 lg:flex lg:basis-auto">
        <div class="flex items-center md:ml-auto md:pr-4">
            <ul class="flex flex-row justify-end pl-0 mb-0 list-none md-max:w-full">
                <li class="flex items-center pl-4 xl:hidden mx-4">
                    <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-sm text-slate-500"
                       sidenav-trigger>
                        <div class="w-4.5 overflow-hidden">
                            <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                            <i class="ease-soft mb-0.75 relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                            <i class="ease-soft relative block h-0.5 rounded-sm bg-slate-500 transition-all"></i>
                        </div>
                    </a>
                </li>

                <li class="flex items-center pr-2">
                    <p class="hidden transform-dropdown-show"></p>
                    <a href="javascript:;" class="block p-0 transition-all ease-nav-brand text-slate-500"
                       dropdown-trigger aria-expanded="false">
                        <i class="cursor-pointer fa fa-cog"></i>
                    </a>
                    <ul
                        dropdown-menu
                        class="text-sm transform-dropdown before:font-awesome before:leading-default before:duration-350
                        before:ease-soft lg:shadow-soft-3xl duration-250 min-w-44 before:sm:right-7.5
                        before:text-5.5 pointer-events-none absolute right-0 top-0 z-50 origin-top
                        list-none rounded-lg border-0 border-solid border-transparent bg-white bg-clip-padding
                        px-2 py-4 text-left text-slate-500 opacity-0 transition-all before:absolute before:right-2
                        before:left-auto before:top-0 before:z-50 before:inline-block before:font-normal before:text-white
                        before:antialiased before:transition-all before:content-['\f0d8'] sm:-mr-6 lg:absolute lg:right-0
                        lg:left-auto lg:mt-2 lg:block lg:cursor-pointer">
                        <li class="relative">
                            <form action="">
                                <button class="ease-soft py-1.2 clear-both block w-full whitespace-nowrap rounded-lg px-4 transition-colors duration-300 hover:bg-gray-200 hover:text-slate-700"
                                        href="javascript:;">
                                    <div class="flex py-1">
                                        <div
                                            class="inline-flex items-center justify-center my-auto mr-4 text-white transition-all
                                        duration-200 ease-nav-brand text-sm bg-gradient-to-tl from-slate-600 to-slate-300 h-9 w-9 rounded-xl">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </div>
                                        <div class="flex flex-col justify-center">
                                            <h6 class="mb-1 font-normal leading-normal text-sm">Odjava</h6>
                                        </div>
                                    </div>
                                </button>
                            </form>

                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
