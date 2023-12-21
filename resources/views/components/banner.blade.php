<div class="h-screen w-full" xmlns:x-on="http://www.w3.org/1999/xhtml">
    <div class="h-full w-full space-y-2 flex-col bg-green-800 text-white text-xl"
         x-data="{
                    showCustomer: {{in_array(Route::currentRouteName(), ['customer.details', 'customer.register']) ?: 'false', 'true'}},
                    showOrder: {{in_array(Route::currentRouteName(), ['order.entry', 'order.recipients', 'order.summary']) ?: 'false', 'true'}}

                 }">
        <div class="flex space-x-2 hover:bg-green-900 hover:cursor-pointer select-none px-2">
            <a href="{{route('welcome')}}">
                <div>
                    Welcome
                </div>
            </a>
        </div>
        <div class="flex space-x-2 hover:bg-green-900 hover:cursor-pointer select-none px-2" x-on:click="showCustomer = !showCustomer">
            <div>
                Customer
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" x-cloak class="w-6 h-6"
                 x-show="!showCustomer">
                <path fill-rule="evenodd"
                      d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                      clip-rule="evenodd"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" x-cloak class="w-6 h-6"
                 x-show="showCustomer">
                <path fill-rule="evenodd"
                      d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
        <a x-cloak href="{{route('customer.details')}}">
            <div class="px-4 hover:bg-green-900 hover:cursor-pointer select-none @if(Route::currentRouteName() === "customer.details") bg-green-900 @endif"
                 x-show="showCustomer">
                Details
            </div>
        </a>
        <a x-cloak href="{{route('order.recipients')}}">
            <div class="px-4 hover:bg-green-900 hover:cursor-pointer select-none @if(Route::currentRouteName() === "customer.register") bg-green-900 @endif"
                 x-show="showCustomer">
                Register
            </div>
        </a>
        <div class="flex space-x-2 hover:bg-green-900 hover:cursor-pointer select-none px-2" x-on:click="showOrder = !showOrder">
            <div>
                Order
            </div>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" x-cloak class="w-6 h-6"
                 x-show="!showOrder">
                <path fill-rule="evenodd"
                      d="M12.53 16.28a.75.75 0 01-1.06 0l-7.5-7.5a.75.75 0 011.06-1.06L12 14.69l6.97-6.97a.75.75 0 111.06 1.06l-7.5 7.5z"
                      clip-rule="evenodd"/>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" x-cloak class="w-6 h-6"
                 x-show="showOrder">
                <path fill-rule="evenodd"
                      d="M11.47 7.72a.75.75 0 011.06 0l7.5 7.5a.75.75 0 11-1.06 1.06L12 9.31l-6.97 6.97a.75.75 0 01-1.06-1.06l7.5-7.5z"
                      clip-rule="evenodd"/>
            </svg>
        </div>
        <a x-cloak href="{{route('order.entry')}}">
            <div class="px-4 hover:bg-green-900 hover:cursor-pointer select-none @if(Route::currentRouteName() === "order.entry") bg-green-900 @endif"
                 x-show="showOrder">
                Entry
            </div>
        </a>
        <a x-cloak href="{{route('order.recipients')}}">
            <div class="px-4 hover:bg-green-900 hover:cursor-pointer select-none @if(Route::currentRouteName() === "order.recipients") bg-green-900 @endif"
                 x-show="showOrder">
                Recipients
            </div>
        </a>
        <a x-cloak href="{{route('order.summary')}}">
            <div class="px-4 hover:bg-green-900 hover:cursor-pointer select-none @if(Route::currentRouteName() === "order.summary") bg-green-900 @endif"
                 x-show="showOrder">
                Summary
            </div>
        </a>
        <div class="hover:bg-green-900 hover:cursor-pointer select-none px-2">
            Order History
        </div>
        <div class="hover:bg-green-900 hover:cursor-pointer select-none px-2">
            Addresses
        </div>
    </div>
</div>