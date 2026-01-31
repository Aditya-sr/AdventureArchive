<div class="bg-gray-200">
    If you look to others for fulfillment, you will never truly be fulfilled.
    <button primary wire:click= "openModal"> modal open</button>

    @if ($openModal)
        <div class="fixed inset-0 flex justify-center items-center bg-gray-900 bg-opacity-70 z-50 overflow-y-auto">
            <div class="w-2/4 h-3/4 relative">
                <x-card> <h1>kya hal hai londe.
                paojfpoaosfjpas
                aojfoafoas
                akjsbsfaljsfbjoasjfaofs
                </h1></x-card>

            </div>
        </div>
    @endif
</div>
