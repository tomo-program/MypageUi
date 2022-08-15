import axios, { AxiosInstance } from "axios";

// export default function ({ axios, redirect }) {
//     const responce = "";
//     const error = "";

// axios.onError(error => {
//     const code = parseInt(error.response && error.response.status)
//     if (code === 404) {
//         redirect('/404')
//     }
// })

export async function axiosGet(url: string) {
    try {
        const response = await axios.get(url);
        return response.data;
    }
    catch (error) {
        console.log(error,"eeee")
        return error;
    }
    
}

export async function axiosPost(url: string, object?: Object) {
    try {
        const response = await axios.post(url, object)
        // console.log(response.data);
        return response.data;
    } catch (error) {
        console.log(error)
        return error;
    }
}