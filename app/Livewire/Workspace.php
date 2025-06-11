<?php



// Draggable card in UserImports
function DraggableCard({ card }) {
  const [{ isDragging }, drag] = useDrag(() => ({
    type: 'CARD',
    item: { card },
    collect: (monitor) => ({
      isDragging: monitor.isDragging(),
    }),
  }));

  return (
    <div
      ref={drag}
      style={{
        opacity: isDragging ? 0.5 : 1,
        border: '1px solid #ccc',
        padding: '8px',
        margin: '4px',
        cursor: 'move',
      }}
    >
      {card.name}
    </div>
  );
}

// Drop zone: workspace area
function DropZone({ onDrop, workspaceCards }) {
  const [, drop] = useDrop(() => ({
    accept: 'CARD',
    drop: (item) => onDrop(item.card),
  }));

  return (
    <div
      ref={drop}
      style={{
        minHeight: '200px',
        border: '2px dashed gray',
        padding: '16px',
        backgroundColor: '#fafafa',
      }}
    >
      {workspaceCards.length === 0 && <p>Drop files here</p>}
      {workspaceCards.map((card) => (
        <div key={card.id} style={{ border: '1px solid #ccc', margin: 4, padding: 8 }}>
          {card.name}
        </div>
      ))}
    </div>
  );
}

function WorkspaceApp() {
  const rootElement = document.getElementById('react-workspace-root');
  const importedCards = JSON.parse(rootElement.dataset.importedCards || '[]');

  const [workspaceCards, setWorkspaceCards] = useState([]);

  const handleDrop = (card) => {
    if (!workspaceCards.find((c) => c.id === card.id)) {
      setWorkspaceCards([...workspaceCards, card]);
      // TODO: persist this change with backend API/Livewire call if needed
    }
  };

  return (
    <DndProvider backend={HTML5Backend}>
      <div style={{ display: 'flex', gap: 24 }}>
        <div style={{ width: 250 }}>
          <h3>Your Imported Files</h3>
          {importedCards.map((card) => (
            <DraggableCard key={card.id} card={card} />
          ))}
        </div>
        <div style={{ flexGrow: 1 }}>
          <h3>Workspace</h3>
          <DropZone workspaceCards={workspaceCards} onDrop={handleDrop} />
        </div>
      </div>
    </DndProvider>
  );
}

const container = document.getElementById('react-workspace-root');
const root = createRoot(container);
root.render(<WorkspaceApp />);