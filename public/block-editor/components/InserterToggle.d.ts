interface InserterToggleProps {
    onToggle: () => void;
    isOpen: boolean;
    toggleProps: any;
}
declare const InserterToggle: ({ onToggle, isOpen, toggleProps }: InserterToggleProps) => JSX.Element;
export default InserterToggle;
