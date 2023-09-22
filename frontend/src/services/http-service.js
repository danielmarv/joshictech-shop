// services/http-service.js

import axios from 'axios';

// Create an Axios instance with custom configuration (e.g., base URL).
const api = axios.create({
  baseURL: process.env.REACT_APP_API_URL, // Replace with your API URL
  timeout: 5000, // Adjust timeout as needed
});

// GET request
const get = (url, config = {}) => api.get(url, config);

// POST request
const post = (url, data = {}, config = {}) => api.post(url, data, config);

// PUT request
const put = (url, data = {}, config = {}) => api.put(url, data, config);

// DELETE request
const remove = (url, config = {}) => api.delete(url, config);

export default {
  get,
  post,
  put,
  delete: remove, 
};
