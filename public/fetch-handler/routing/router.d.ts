import { APIFetchOptions } from "../../block-editor/interfaces/fetch-handler";
import Route from "./route";
declare class Router {
    routes: Route[];
    constructor(routes: Route[]);
    match(options: APIFetchOptions): Route | undefined;
}
export default Router;
