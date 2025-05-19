export default function deskDropHandler() {
    return {
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
        },
        hoverFile(event) {
            event.target.classList.add('z-10', 'scale-105', 'transition');
        },
        unhoverFile(event) {
            event.target.classList.remove('z-10', 'scale-105');
        }
    }
}