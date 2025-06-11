<div>
<div 
    x-data="workspaceComponent()" 
    @drag-file.window="addFile($event.detail.file)"
    class="relative w-full h-[600px] border bg-gray-50 overflow-hidden"
>
    <template x-for="file in files" :key="file.id">
        <div
            class="absolute cursor-move"
            :style="`top: ${file.y}px; left: ${file.x}px; width: 100px; height: 140px;`"
            @mousedown.prevent="startDrag($event, file.id)"
        >
            <img :src="file.preview" class="object-cover w-full h-full rounded shadow border" />
        </div>
    </template>
</div>

<script>
document.addEventListener('livewire:load', () => {
    window.workspaceComponent = function () {
        return {
            files: @entangle('filesInWorkspace'),
            draggingId: null,
            offsetX: 0,
            offsetY: 0,

            startDrag(event, id) {
                const el = event.target.closest('.cursor-move');
                if (!el) return;
                this.draggingId = id;
                this.offsetX = event.clientX - el.getBoundingClientRect().left;
                this.offsetY = event.clientY - el.getBoundingClientRect().top;

                window.addEventListener('mousemove', this.drag.bind(this));
                window.addEventListener('mouseup', this.endDrag.bind(this));
            },

            drag(event) {
                if (!this.draggingId) return;
                const file = this.files.find(f => f.id === this.draggingId);
                if (file) {
                    file.x = event.clientX - this.offsetX;
                    file.y = event.clientY - this.offsetY;
                }
            },

            endDrag() {
                window.removeEventListener('mousemove', this.drag.bind(this));
                window.removeEventListener('mouseup', this.endDrag.bind(this));

                const file = this.files.find(f => f.id === this.draggingId);
                if (file) {
                    @this.call('updateFilePosition', file.id, file.x, file.y);
                }

                this.draggingId = null;
            },

            addFile(file) {
                if (!this.files.some(f => f.id === file.id)) {
                    this.files.push({ ...file, x: 50, y: 50 });
                    @this.call('addFileToWorkspace', file.id);
                }
            }
        };
    };
});
</script>
</div>