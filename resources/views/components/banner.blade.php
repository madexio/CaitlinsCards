<div class="h-screen" xmlns:x-on="http://www.w3.org/1999/xhtml">
    <div class="h-full w-40 flex-col bg-green-800 text-white text-xl" x-data="{show: false}">
        <div class="flex space-x-2 hover:bg-green-900 hover:cursor-pointer select-none px-2" x-on:click="show = !show">
            <div>
                Order
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"
                 x-show="!show">
                <path fill-rule="evenodd"
                      d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                      clip-rule="evenodd"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6"
                 x-show="show">
                <path fill-rule="evenodd"
                      d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
        <div class="px-4 hover:bg-green-900 hover:cursor-pointer select-none" x-show="show">
            Entry
        </div>
        <div class="px-4 hover:bg-green-900 hover:cursor-pointer select-none" x-show="show">
            Recipients
        </div>
        <div class="px-4 hover:bg-green-900 hover:cursor-pointer select-none" x-show="show">
            Summary
        </div>
        <div class="hover:bg-green-900 hover:cursor-pointer select-none px-2">
            Order History
        </div>
        <div class="hover:bg-green-900 hover:cursor-pointer select-none px-2">
            Addresses
        </div>
    </div>
</div>