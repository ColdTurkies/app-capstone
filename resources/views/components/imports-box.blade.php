<div
    class="bg-blue-50 border p-2 rounded mb-4"
    @dragover.prevent
    @drop="receiveBackToImports($event)"
>
    <h2 class="text-lg font-bold mb-2">User Imports</h2>

    <template x-for="file in importedFiles" :key="file.id">
        <div
            class="inline-block w-16 h-16 m-1 border bg-white shadow"
            draggable="true"
            :data-id="file.id"
            data-zone="imports"
            @dragstart="startDrag($event)"
        >
            <img :src="file.src" class="w-full h-full object-cover" />
        </div>
    </template>
</div>