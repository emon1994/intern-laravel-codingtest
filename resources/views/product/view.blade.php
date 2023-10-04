<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl leading-tight">
            {{ __('Products') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="w-full">
                    <form method="GET" action="{{route('products.search')}}" class="w-1/2" style="width: 30%; margin: auto;">
                        <div class="flex items-center justify-between space-x-3">
                            <label for="search" class="text-gray-700">Search:</label>
                            <input type="text" name="search" id="search" data-route="" value="{{ request('search') }}" class="border rounded py-2 px-3 focus:outline-none focus:ring focus:border-blue-300">
                            <x-primary-button>
                                {{ __('Filter') }}
                            </x-primary-button>
                        </div>
                    </form>
                    <div id="product-wrapper">
                        @include('product.producttable')    
                    </div>     
                </div>
            </div>
        </div>
        <script type="module">
            $(document).ready(function () {
                $('#search').on('keyup', function() {
                    var searchTerm = $(this).val();
                    $.ajax({
                        url: "{{ route('products.auto') }}",
                        type: 'GET',
                        data: {
                            search: searchTerm
                        },
                        success: function(response) {
                            var productTable = $('#productTable');
                            productTable.empty();
                            
                            if (response.length > 0) {
                                $.each(response, function(index, data) {
                                    productTable.append('<tr><td class="border px-4 py-2">' + data.name 
                                    + '</td><td class="border px-4 py-2">' + data.description 
                                    + '</td><td class="border px-4 py-2">' + '৳'+data.price 
                                    + '</td></tr>');
                                });
                            } else {
                                productTable.append('<tr><td colspan="3">No results found</td></tr>');
                            }
                        }
                    });
                });
            });
        </script>
    </div>
</x-app-layout>
