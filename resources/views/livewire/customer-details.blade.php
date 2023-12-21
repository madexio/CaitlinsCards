<div class="w-full h-full p-20 bg-gray-300">
    <div class="flex justify-center bg-white border border-gray-300 rounded-lg shadow p-6 h-full w-full">
        <div class="flex-col relative w-[80%]">
            <div class="flex justify-around">
                <label for="customer_search" class="text-xl text-gray-800 text-center">
                    Customer Search
                </label>
            </div>
            <input id="customer_search" class="border border-gray-500 rounded p-1 w-full" type="text"
                   wire:model.live="customer_search_string">
            <div class="w-full absolute" x-on:click.outside="$dispatch('customer-reset')">
                @foreach($customers as $customer)
                    <div wire:click="set_customer({{$customer['id']}})"
                         x-on:click="$dispatch('customer-reset')"
                         class="bg-gray-100 hover:bg-gray-300 p-1 text-center hover:cursor-pointer @if($loop->first) rounded-t @elseif($loop->last) rounded-b @endif">
                        {{$customer['name']}}
                    </div>
                @endforeach
            </div>
            <div class="text-xl mt-4 divide-y-2">
                <div class="flex justify-between py-2">
                    <div>
                        Customer id: {{$current_customer ? $current_customer->id : "No customer selected"}}
                    </div>
                </div>
                <div class="flex justify-between py-2">
                    <div>
                        Customer name: {{$current_customer?->name}}
                    </div>
                    <label>
                        <input class="border border-gray-500 rounded ml-4" type="text"
                               wire:model.live="customer_name">
                    </label>
                </div>
                <div class="flex justify-between py-2">
                    <div>
                        Home phone: {{$current_customer?->homePhone}}
                    </div>
                    <label>
                        <input class="border border-gray-500 rounded ml-4" type="text"
                               wire:model.live="customer_home_phone">
                    </label>
                </div>
                <div class="flex justify-between py-2">
                    <div>
                        Mobile phone: {{$current_customer?->mobilePhone}}
                    </div>
                    <label>
                        <input class="border border-gray-500 rounded ml-4" type="text"
                               wire:model.live="customer_mobile_phone">
                    </label>
                </div>
                <div class="flex justify-end p-2">
                    <button wire:click="update_customer" class="bg-gray-200 border border-gray-500 rounded-md p-1 hover:bg-gray-300 focus:bg-gray-400">
                        Update
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

</script>