@extends('layouts.app')
@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

<h1 class="font-medium">Report (Top Customers by product)</h1>


            <div class="overflow-x-auto relative shadow-md sm:rounded-lg">

                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400" id="datatable">

                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                Order Id
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Product name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Customer Name
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Quantity
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Price
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Total
                            </th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalamt = 0;
                        ?>
             @foreach ($products as $data)
             <?php
             $totalamt = $totalamt+($data->purchase_quantity *$data->product_price);
             ?>
             <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 px-6 font-medium">
                    {{ $data->order_no }}
                  </th>
                <th scope="row" class="py-4 px-6 font-medium">
                  {{ $data->product_name }}
                </th>
                <td class="py-4 px-6">
                    {{ $data->name }}
                </td>
                <td class="py-4 px-6">
                    {{ $data->purchase_quantity }}
                </td>
                <td class="py-4 px-6">
                    {{ $data->product_price }}
                </td>
                <td class="py-4 px-6 text-right">
{{ $data->purchase_quantity * $data->product_price}}
                </td>
            </tr>


             @endforeach
             <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-500 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white" colspan="2">
                    &nbsp;
                </th>
                <td class="py-4 px-6">
                    <b>Gross Total:</b>
                </td>
                <td class="py-4 px-6">
                   {{ $quantity }}
                </td>
                <td class="py-4 px-6">
                    {{ $price }}
                </td>
                <td class="py-4 px-6 text-right">
{{ $totalamt }}
                </td>
            </tr>
            </tbody>
        </table>
    </div>
            {{-- @endif --}}

        </div>
    </div>
</div>
@endsection













