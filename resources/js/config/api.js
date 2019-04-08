process.env.NODE_ENV
const base_url = process.env.NODE_ENV == 'development' ? 'http://localhost/superfudsapp/public/api' : 'https://superfudsapp.herokuapp.com/api'
const API = {
    PRODUCTS: `${base_url}/inventory/products`,
    BUY: `${base_url}/cart/buy`,
    CANCELINVOICE: `${base_url}/cart/cancel`,
    REPORTS: `${base_url}/reports/sells`,

}
export default API