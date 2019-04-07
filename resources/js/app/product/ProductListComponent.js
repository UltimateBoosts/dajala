import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import API from '../../config/api'

class ProductList extends Component {
  constructor() {
    super()
    this.state = {
      products: [],
      headers: []
    }
  }

  componentDidMount() {
    axios.get(`${API.PRODUCTS}`).then(response => {
      if (response.data.response.length > 0) {
        this.setState({
          products: response.data.response
        })
        let headers = Object.keys(this.state.products[0]).slice(0, -4)
        headers.push(Object.keys(this.state.products[0])[Object.keys(this.state.products[0]).length - 1])
        headers.push("Options")
        this.setState({
          headers: headers
        })
      }
    })
  }
  render() {
    const { products, headers } = this.state
    return (
      <div className='container py-4'>

        <div className='row justify-content-center'>
          <div className='col-md-12'>
            <Link className='btn btn-primary btn-sm mb-3' to='/create'>
              Deliver new product
                </Link>
            {products.length > 0 &&

              <table className="table">
                <thead className="thead-dark">
                  <tr>
                    {
                      headers.map(header => (
                        <th scope="col" key={header}>{header}</th>
                      ))
                    }
                  </tr>
                </thead>
                <tbody>
                  {
                    products.map(product => (
                      <tr key={product.id}>
                        <td>{product.id}</td>
                        <td>{product.name}</td>
                        <td>{product.price}</td>
                        <td>{product.quantity}</td>
                        <td>{product.lot}</td>
                        <td>{product.expired_at}</td>
                        <td>{product.supplier.name}</td>
                        <td>
                          <Link className='btn btn-primary btn-sm mb-3' to={`/product/edit/${product.id}`}>
                            Edit
                      </Link>
                        </td>
                      </tr>
                    ))
                  }
                </tbody>

              </table>
            }
            {products.length <= 0 &&
              <div>
                <h3>There is no products to show please create one to show it</h3>
              </div>
            }
          </div>
        </div>

      </div>

    )
  }
}

export default ProductList