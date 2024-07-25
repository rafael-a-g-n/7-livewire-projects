@php
    use App\Helpers\TextHelper;
@endphp

<div class="container mx-auto py-16 px-8">
    <style>
        .highlight {
            background-color: lightgray;
        }
        .sortable-header {
            display: inline-flex;
            align-items: center;
        }
        .sortable-header span {
            margin-left: 5px;
        }
        th {
            min-width: 100px;
        }
        .title-column {
            width: 20ch; /* Fixed width for 20 characters */
            white-space: nowrap; /* Prevent text wrapping */
        }
    </style>
    <div class="mb-4">
        <input type="text" wire:model.lazy="search" placeholder="Search in title and description">
    </div>
    <table class="table-auto w-full">
        <thead>
        <tr>
            <th class="py-2 px-3 bg-gray-100 border-b-2 text-left cursor-pointer" wire:click="toggleSort('id')">
                <div class="sortable-header">
                    ID
                    @if ($sortField === 'id')
                        <span>
                            @if ($sortDirection === 'asc')
                                &uarr;
                            @else
                                &darr;
                            @endif
                        </span>
                    @endif
                </div>
            </th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 text-left">Image</th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 text-left cursor-pointer title-column" wire:click="toggleSort('title')">
                <div class="sortable-header">
                    Title
                    @if ($sortField === 'title')
                        <span>
                            @if ($sortDirection === 'asc')
                                &uarr;
                            @else
                                &darr;
                            @endif
                        </span>
                    @endif
                </div>
            </th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 text-left cursor-pointer" wire:click="toggleSort('description')">
                <div class="sortable-header">
                    Description
                    @if ($sortField === 'description')
                        <span>
                            @if ($sortDirection === 'asc')
                                &uarr;
                            @else
                                &darr;
                            @endif
                        </span>
                    @endif
                </div>
            </th>
            <th class="py-2 px-3 bg-gray-100 border-b-2 text-left cursor-pointer" wire:click="toggleSort('price')">
                <div class="sortable-header">
                    Price
                    @if ($sortField === 'price')
                        <span>
                            @if ($sortDirection === 'asc')
                                &uarr;
                            @else
                                &darr;
                            @endif
                        </span>
                    @endif
                </div>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($products as $product)
            <tr>
                <td class="py-2 px-3 border-b">{{$product->id}}</td>
                <td class="py-2 px-3 border-b"><img class="w-16" src="{{$product->image}}"></td>
                <td class="py-2 px-3 border-b">{!! TextHelper::highlight($product->title, $search) !!}</td>
                <td class="py-2 px-3 border-b">{!! TextHelper::highlight($product->description, $search) !!}</td>
                <td class="py-2 px-3 border-b">{{$product->price}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{$products->links()}}
</div>
