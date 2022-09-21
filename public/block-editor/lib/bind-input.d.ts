declare class BindInput {
    element: HTMLInputElement | HTMLTextAreaElement;
    constructor(element: HTMLInputElement | HTMLTextAreaElement);
    getValue: () => string | null;
    setValue: (value: string) => void;
    getElement(): HTMLInputElement | HTMLTextAreaElement;
}
export default BindInput;
