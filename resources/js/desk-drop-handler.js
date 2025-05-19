export default function deskDropHandler() {
    return {
        cards: [],
        importedFiles: [],
        groupFiles: [],

        startDrag(event) {
            const id = event.target.dataset.id;
            const zone = event.target.dataset.zone;
            event.dataTransfer.setData("text/plain", JSON.stringify({ id, zone }));
        },

        handleDrop(event) {
            const { id, zone } = JSON.parse(event.dataTransfer.getData("text/plain"));

            // Simulated fetch from the correct zone
            let fileSrc;
            if (zone === 'imports') {
                fileSrc = this.importedFiles.find(f => f.id === id)?.src;
            } else if (zone === 'groups') {
                fileSrc = this.groupFiles.find(f => f.id === id)?.src;
            } else if (zone === 'workspace') {
                fileSrc = this.cards.find(f => f.id === id)?.src;
                this.cards = this.cards.filter(f => f.id !== id); // remove to move
            }

            if (!fileSrc) return;

            // Place in workspace
            this.cards.push({
                id,
                src: fileSrc,
                x: event.offsetX,
                y: event.offsetY,
                expanded: false
            });
        },

        receiveBackToImports(event) {
            const { id, zone } = JSON.parse(event.dataTransfer.getData("text/plain"));
            if (zone === 'workspace') {
                const card = this.cards.find(f => f.id === id);
                if (card) {
                    this.importedFiles.push({ id, src: card.src });
                    this.cards = this.cards.filter(f => f.id !== id);
                }
            }
        },

        receiveBackToGroups(event) {
            const { id, zone } = JSON.parse(event.dataTransfer.getData("text/plain"));
            if (zone === 'workspace') {
                const card = this.cards.find(f => f.id === id);
                if (card) {
                    this.groupFiles.push({ id, src: card.src });
                    this.cards = this.cards.filter(f => f.id !== id);
                }
            }
        },

        deleteCard(event) {
            const { id, zone } = JSON.parse(event.dataTransfer.getData("text/plain"));
            if (zone === 'workspace') {
                this.cards = this.cards.filter(card => card.id !== id);
            }
        }
    }
}