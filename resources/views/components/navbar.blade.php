<nav class="bg-gray-500" x-data="{ open: true }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 flex justify-end items-center gap-4">
        <!-- Dropdown -->
        <div class="relative">
            <!-- Trigger -->
            <button id="dropdownButton" class="flex items-center gap-2 px-3 py-2 text-sm font-medium text-gray-500 dark:text-white bg-[#3e3d45] rounded-md border border-transparent hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                <span>{{ Auth::user()->name }}</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 fill-current" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </button>

            <!-- Dropdown content -->
            <div id="dropdownContent" class="absolute right-0 mt-2 w-48 bg-white dark:bg-gray-800 rounded-md shadow-lg z-10 hidden">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-100 dark:hover:bg-gray-700">
                        {{ __('Log Out') }}
                    </button>
                </form>
            </div>
        </div>

        <!-- Notification Button -->
        <div class="relative">
            <button class="flex items-center justify-center w-10 h-10 bg-[#3e3d45] text-white rounded-full hover:bg-gray-700 transition duration-150">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 fill-current" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M10 2a6 6 0 00-6 6v5.586a1 1 0 01-.293.707L2.707 15a1 1 0 001.414 1.414l1.293-1.293a1 1 0 01.293-.707V8a4 4 0 118 0v6.707a1 1 0 01.293.707L17.293 15a1 1 0 001.414-1.414l-1.293-1.293a1 1 0 01-.293-.707V8a6 6 0 00-6-6z"
                        clip-rule="evenodd" />
                </svg>
                <!-- Badge (Optional) -->
                <span class="absolute top-0 right-0 block w-2.5 h-2.5 bg-red-600 rounded-full"></span>
            </button>
        </div>
    </div>
</nav>
