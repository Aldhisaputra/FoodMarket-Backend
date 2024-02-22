<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-3xl text-gray-800 leading-tight">
            Transaction Details: {{ optional($item->food)->name }} by {{ optional($item->user)->name  }}
        </h2>
    </x-slot>

    <div class="py-8">
    <div class="max-w-2xl mx-auto bg-white shadow-md rounded-md overflow-hidden">
        <div class="flex justify-between items-center p-6 bg-blue-500">
            <div class="text-xl font-bold text-white">Transaction ID: {{ $item->id }}</div>
        </div>
            <div class="flex flex-col md:flex-row">
                <div class="md:w-1/2 p-6">
                    @if ($item->food)
                        <img src="{{ $item->food->picturePath }}" alt="{{ $item->food->name }}"
                            class="w-full h-auto rounded shadow-md">
                    @else
                        <div class="text-red-500">No picture available</div>
                    @endif
                </div>

                <div class="md:w-1/2 p-6">
                    <div class="mb-4">
                        <div class="text-xl font-semibold">{{ $item->food->name ?? 'Product not available' }}</div>
                        <div class="text-gray-600">{{ $item->status }}</div>
                    </div>

                    <div class="mb-4">
                        <div class="text-sm text-gray-500">Quantity</div>
                        <div class="text-xl font-bold">{{ number_format($item->quantity) }}</div>
                    </div>

                    <div class="mb-4">
                        <div class="text-sm text-gray-500">Total</div>
                        <div class="text-xl font-bold">{{ number_format($item->total) }}</div>
                    </div>

                    <div class="mb-4">
                        <div class="text-sm text-gray-500">Payment URL</div>
                        <a href="{{ $item->payment_url }}" class="text-indigo-500 hover:underline">{{ $item->payment_url }}</a>
                    </div>
                </div>
            </div>

            <div class="border-t border-black mt-6 p-6">
                <div class="text-xl font-bold mb-4">User Information</div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <div class="text-sm text-gray-500">User Name</div>
                        <div class="text-xl font-bold">{{ $item->user->name }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Email</div>
                        <div class="text-xl font-bold">{{ $item->user->email }}</div>
                    </div>
                    <!-- Add more user information fields as needed -->
                </div>
            </div>

            <div class="border-t border-black mt-6 p-6">
                <div class="text-xl font-bold mb-4">Address Information</div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <div class="text-sm text-gray-500">Address</div>
                        <div class="text-xl font-bold">{{ $item->user->address }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">City</div>
                        <div class="text-xl font-bold">{{ $item->user->city }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Number</div>
                        <div class="text-xl font-bold">{{ $item->user->houseNumber }}</div>
                    </div>
                    <div>
                        <div class="text-sm text-gray-500">Phone</div>
                        <div class="text-xl font-bold">{{ $item->user->phoneNumber }}</div>
                    </div>
                    <!-- Add more address information fields as needed -->
                </div>
            </div>

            <div class="border-t border-black mt-6 p-6">
                <div class="text-xl font-bold mb-4">Change Status</div>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'ON_DELIVERY']) }}"
                        class="btn-status bg-blue-500 hover:bg-blue-700 text-white font-bold px-4 py-2 rounded text-center">
                        On Delivery
                    </a>
                    <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'DELIVERED']) }}"
                        class="btn-status bg-green-500 hover:bg-green-700 text-white font-bold px-4 py-2 rounded text-center">
                        Delivered
                    </a>
                    <a href="{{ route('transactions.changeStatus', ['id' => $item->id, 'status' => 'CANCELLED']) }}"
                        class="btn-status bg-red-500 hover:bg-red-700 text-white font-bold px-4 py-2 rounded text-center">
                        Cancelled
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<style>
    .btn-status {
        transition: background-color 0.3s ease;
    }

    .btn-status:hover {
        background-color: #4a5568;
    }
</style>
