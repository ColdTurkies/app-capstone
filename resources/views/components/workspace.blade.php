<div
    id="workspace"
    class="relative w-full h-[500px] bg-gray-100 border border-dashed border-gray-300 rounded-lg p-4 overflow-hidden"
    @dragover.prevent
    @drop="handleDrop($event)"
>
    <template x-for="card in cards" :key="card.id">
        <div
            class="absolute w-24 h-24 bg-white border shadow-md cursor-pointer transition-all"
            :style="`top: ${card.y}px; left: ${card.x}px;`"
            @click="card.expanded = !card.expanded"
            draggable="true"
            :data-id="card.id"
            data-zone="workspace"
            @dragstart="startDrag($event)"
        >
            <img :src="card.src" class="w-full h-full object-cover" />

            <template x-if="card.expanded">
                <div class="absolute top-0 left-0 w-64 h-64 bg-white z-20 border p-2">
                    <img :src="card.src" class="w-full h-full object-contain" />
                </div>
            </template>
        </div>
    </template>

    <!-- Delete zone -->
    <div
        class="absolute bottom-4 right-4 w-14 h-14 bg-red-600 text-white flex items-center justify-center rounded-full shadow-md"
        @dragover.prevent
        @drop="deleteCard($event)"
    >
        ❌
    </div>
</div>
