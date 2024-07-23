<div class="flex flex-col items-center">
        <div class="flex p-16 mx-auto justify-center items-center gap-4">
            <input type="number" wire:model="firstNumber" placeholder="Number 1">
            <select class="w-24" wire:model="operator">
                <option value="+">+</option>
                <option value="-">-</option>
                <option value="*">*</option>
                <option value="/">/</option>
                <option value="%">%</option>
            </select>
            <input type="number" wire:model="secondNumber" placeholder="Number 2">
            <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded disabled:cursor-not-allowed disabled:bg-opacity-90 {{ $disabled ? 'disabled' : '' }}" wire:click="calculate">=</button>
        </div>
        <p class="text-3xl">Result: {{ $result }}</p>
    </div>
