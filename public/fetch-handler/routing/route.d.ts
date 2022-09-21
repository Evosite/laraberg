import { APIFetchOptions } from "../../block-editor/interfaces/fetch-handler";
declare class Route {
    method: string;
    regex: RegExp;
    handler: (params: object) => any;
    constructor(method: string, regex: RegExp, handler: (params: object) => any);
    static get(regex: RegExp, handler: (params: object) => any): Route;
    static put(regex: RegExp, handler: (params: object) => any): Route;
    static post(regex: RegExp, handler: (params: object) => any): Route;
    static delete(regex: RegExp, handler: (params: object) => any): Route;
    handle(options: APIFetchOptions): Promise<any>;
}
export default Route;
