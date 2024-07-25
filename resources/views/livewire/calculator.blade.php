<div class="flex flex-col items-center">
    <div class="flex p-16 mx-auto justify-center items-center gap-4">
        <input type="number" wire:model.live="firstNumber" placeholder="Number 1">
        <select class="w-24" wire:model="operator">
            <option value="+">+</option>
            <option value="-">-</option>
            <option value="*">*</option>
            <option value="/">/</option>
            <option value="%">%</option>
        </select>
        <input type="number" wire:model.live="secondNumber" placeholder="Number 2">
        <button wire:click="calculate"
                class="py-2 px-4 bg-indigo-500 hover:bg-indigo-600 disabled:cursor-not-allowed disabled:bg-gray-400 rounded text-white"
            {{ $disabled ? ' disabled' : ''}}>=
        </button>
    </div>
    @if($result)
        <p class="text-3xl">Result: {{ $result }}</p>
    @endif
</div>
