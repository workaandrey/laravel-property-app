import axios from 'axios';

export class PropertyService {
    static async searchProperties(filters) {
        try {
            const params = Object.fromEntries(
                Object.entries(filters).filter(([_, value]) => value !== null && value !== '')
            );

            const { data } = await axios.get('/api/properties/search', { params });
            return data;
        } catch (error) {
            console.error('PropertyService Error:', error);
            throw error;
        }
    }
}
