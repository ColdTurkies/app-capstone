<div
    class="bg-green-50 border p-2 rounded"
    @dragover.prevent
    @drop="receiveBackToGroups($event)"
>
    <h2 class="text-lg font-bold mb-2">Group Files</h2>

    <template x-for="file in groupFiles" :key="file.id">
        <div
            class="inline-block w-16 h-16 m-1 border bg-white shadow"
            draggable="true"
            :data-id="file.id"
            data-zone="groups"
            @dragstart="startDrag($event)"
        >
            <img :src="file.src" class="w-full h-full object-cover" />
        </div>
    </template>
</div>