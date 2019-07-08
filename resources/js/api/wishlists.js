import axios from 'axios';

export default {
    all() {
        return axios.get('/api/wishlists');
    },
    create(data) {
        return axios.post(`/api/wishlists`, data);
    },
    find(id) {
        return axios.get(`/api/wishlists/${id}`);
    },
    update(id, data) {
        return axios.put(`/api/wishlists/${id}`, data);
    },
    delete(id) {
        return axios.delete(`/api/wishlists/${id}`);
    },
};