declare class FetchError extends Error {
    data: object;
    constructor(object: {
        code: string;
        message: string;
        data: object;
    });
}
export default FetchError;
