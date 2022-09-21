import Block from "../interfaces/block";
export declare const SET_BLOCKS = "SET_BLOCKS";
export declare const DUPLICATE_BLOCKS = "DUPLICATE_BLOCKS";
export declare const REMOVE_BLOCK = "REMOVE_BLOCK";
export declare const REMOVE_BLOCKS = "REMOVE_BLOCKS";
export declare const UNDO = "UNDO";
export declare const REDO = "REDO";
declare const actions: {
    setBlocks: (blocks: Block[]) => {
        type: string;
        blocks: Block[];
    };
    duplicateBlocks: (blockIds: string[]) => {
        type: string;
        blockIds: string[];
    };
    removeBlock: (blockId: string) => {
        type: string;
        blockIds: string[];
    };
    removeBlocks: (blockIds: string[]) => {
        type: string;
        blockIds: string[];
    };
    undo: () => {
        type: string;
    };
    redo: () => {
        type: string;
    };
};
export default actions;
