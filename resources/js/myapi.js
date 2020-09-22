import axios from 'axios'
export default axios.create({
    baseURL: 'http://developers.thegraphe.com/member-directory/api/v1',
    timeout: 5000,
})