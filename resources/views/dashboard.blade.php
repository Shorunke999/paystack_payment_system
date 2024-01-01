<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}
                </div>
                <div class="container">
                    <div class="acctnumber">
                        {{$wallet_info->AccountNumber}}--{{$wallet_info->AccountNumber}}
                    </div>
                    <div class="balancediv">
                        <span class="balance">
                            <i>Your balance is: {{$wallet_info->balance}}</i>
                        </span>
                    </div>
                    <div class="transactions">
                        <div class="send">
                            <a href='{{route('sendfunds')}}'>
                                send money
                            </a>
                        </div>
                        <div class="Deposit&withdraw">
                            <button href=''>
                                Deposit money
                            </button>
                            <button href=''>
                                withdraw money
                            </button>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>
</x-app-layout>
