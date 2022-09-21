import MediaUpload from "./media-upload";
import { FetchHandler } from './fetch-handler';
export interface Color {
    name: string;
    slug: string;
    color: string;
}
export interface Gradient {
    name: string;
    slug: string;
    gradient: string;
}
export interface FontSize {
    name: string;
    slug: string;
    size: number;
}
export default interface EditorSettings {
    height?: string;
    mediaUpload?: (upload: MediaUpload) => void;
    fetchHandler?: FetchHandler;
    disabledCoreBlocks?: string[];
    alignWide?: boolean;
    supportsLayout?: boolean;
    maxWidth?: number;
    imageEditing?: boolean;
    colors?: Color[];
    gradients?: Gradient[];
    fontSizes?: FontSize[];
}
