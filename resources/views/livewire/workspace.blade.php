{{-- resources/views/livewire/workspace.blade.php --}}
<div
    id="workspace"
    class="relative w-full h-[500px] bg-gray-100 border border-dashed border-gray-300 rounded-lg p-4 overflow-hidden"
    x-data="deskDropHandler()"
    @dragover.prevent
    @drop="handleDrop($event)"
>
    <!-- Rendered file cards -->
    <template x-for="card in cards" :key="card.id">
        <div
            class="absolute w-24 h-24 bg-white border shadow-md cursor-pointer transition-all"
            :style="`top: ${card.y}px; left: ${card.x}px;`"
            @click="card.expanded = !card.expanded"
            draggable="true"
            @dragstart="startDrag($event)"
            :data-id="card.id"
        >
            <img :src="card.src" class="w-full h-full object-cover" />

            <!-- Expanded view -->
            <template x-if="card.expanded">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white z-20 border p-2">
                    <img :src="card.src" class="w-full h-full object-contain" />
                </div>
            </template>
        </div>
    </template>

    <!-- Delete Zone -->
    <div
        class="absolute bottom-4 right-4 w-14 h-14 bg-red-600 text-white flex items-center justify-center rounded-full shadow-md"
        @dragover.prevent
        @drop="deleteCard($event)"
    >
        ❌
    </div>
</div>

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('deskDropHandler', () => ({
            cards: [],
            startDrag(event) {
                event.dataTransfer.setData("text/plain", event.target.dataset.id);
            },
            handleDrop(event) {
                const id = event.dataTransfer.getData("text/plain");
                const src = document.querySelector(`[data-id="${id}"] img`).src;

                this.cards.push({
                    id,
                    src,
                    x: event.offsetX,
                    y: event.offsetY,
                    expanded: false,
                });
            },
            deleteCard(event) {
                const id = event.dataTransfer.getData("text/plain");
                this.cards = this.cards.filter(card => card.id !== id);
            }
        }));
    });
</script>