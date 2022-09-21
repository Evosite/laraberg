import '../store';
import EditorSettings from '../interfaces/editor-settings';
export interface EditorProps {
    settings: EditorSettings;
    onChange: (value: string) => void;
    input?: HTMLInputElement | HTMLTextAreaElement;
    value?: string;
}
declare const Editor: ({ settings, onChange, input, value }: EditorProps) => JSX.Element;
declare const removeEditor: (element: HTMLInputElement | HTMLTextAreaElement) => void;
declare const initializeEditor: (element: HTMLInputElement | HTMLTextAreaElement, settings?: EditorSettings) => void;
export { initializeEditor, removeEditor, Editor };
