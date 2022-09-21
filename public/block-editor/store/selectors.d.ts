import Block from "../interfaces/block";
import BlockEditorState from "../interfaces/block-editor-state";
declare const selectors: {
    getBlocks: (state: BlockEditorState) => Block[];
    canUndo: (state: BlockEditorState) => boolean;
    canRedo: (state: BlockEditorState) => boolean;
};
export default selectors;
