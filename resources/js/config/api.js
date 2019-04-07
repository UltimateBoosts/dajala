console.log(process.env.NODE_ENV)
const base_url = process.env.NODE_ENV == 'development' ? 'http://localhost/superfudsapp/public/api' : 'https://superfudsapp.herokuapp.com/api'
const API = {
    PRODUCTS: `${base_url}/inventory/products`
}
export default API