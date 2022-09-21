/**
 * Register all supported core blocks that are not registered yet and are not disabled in the settings
 *
 * @param disabledCoreBlocks
 */
declare function registerBlocks(disabledCoreBlocks?: string[]): void;
/**
 * Get all supported core blocks except for the ones disabled through settings
 *
 * @param disabledCoreBlocks
 */
export declare const getCoreBlocks: (disabledCoreBlocks?: string[]) => any[];
export { registerBlocks };
