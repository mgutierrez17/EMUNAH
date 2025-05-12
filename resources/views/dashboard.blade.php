<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
           {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-4 gap-4">
                <div>01</div>
                <div>02</div>
                <div>03</div>
                <div>04</div>
                <div>05</div>
                <div>06</div>
                <div>07</div>
                <div>08</div>
                <div>09</div>
                <div class="col-span-3 grid grid-cols-subgrid gap-4">
                    <div class="col-start-2">06</div>
                  </div>
              </div>
        </div>
    </div>
</x-app-layout>
