import axios from 'axios'
import React, { Component } from 'react'
import { Link } from 'react-router-dom'
import API from '../../config/api'
import Product from './components/productCart/ProductComponent'
import ProductList from './components/productList/ProductListComponent'

import './Buy.scss'
import { Scrollbars } from 'react-custom-scrollbars';
class Buy extends Component {
  constructor() {
    super()
    this.state = {
      products: [],
      productsBuy: [],
      headers: [],
      total: 0
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
  handleSubsProduct(product, prop) {
    const productFind = prop.state.productsBuy.filter((elem, index) => {
      if (elem.id == product.id) {
        elem.quantity -= 1
        elem.total = parseFloat(elem.price * elem.quantity)
        if (elem.quantity == 0) {
          prop.state.productsBuy.splice(index, 1);
        }
        return elem
      }
    })
    if (productFind.length > 0) {
      prop.setState({
        productsBuy: prop.state.productsBuy
      })
    }
    prop.updateTotal()
  }
  handleAddProduct(product, prop) {
    const productFind = prop.state.productsBuy.filter(elem => {
      if (elem.id == product.id) {
        elem.quantity += 1
        elem.total = parseFloat(elem.price * elem.quantity)
        return elem
      }
    })
    if (productFind.length > 0) {
      prop.setState({
        productsBuy: prop.state.productsBuy
      })
    } else {
      const newProd = {}
      newProd.id = product.id
      newProd.name = product.name
      newProd.quantity = 1
      newProd.price = parseFloat(product.price)
      newProd.total = parseFloat(product.price * newProd.quantity)
      prop.state.productsBuy.push(newProd)
      prop.setState({
        productsBuy: prop.state.productsBuy
      })
    }
    prop.updateTotal()
  }
  updateTotal() {
    let total = 0
    this.state.productsBuy.map(elem => total += elem.total)
    this.setState({
      total: total
    })
  }
  render() {
    const { products, productsBuy, total } = this.state
    return (
      <div className='container py-4'>
        <div className="row no-gutters">
          <div className="custom-col-products col-12 col-sm-6 col-md-8">
            <h1>Products</h1>
            <Scrollbars style={{ height: 600 }}>
              <div className="custom-col-container">
                {products &&
                  products.map(product => (
                    <Product bind={this} handleAddProduct={this.handleAddProduct} product={product} key={product.id}></Product>
                  ))
                }
                {!products &&
                  <h3>There is not products</h3>
                }
              </div>
            </Scrollbars>
          </div>
          <div className="custom-col-cart col-12 col-md-3">
            <h2>Cart</h2>
            <Scrollbars style={{ height: 600 }}>
              <div className="custom-col-container">
                {productsBuy.length > 0 &&
                  productsBuy.map(product => (
                    <ProductList bind={this} handleAddProduct={this.handleAddProduct} handleSubsProduct={this.handleSubsProduct} product={product} key={product.id}></ProductList>
                  ))
                }
                {productsBuy.length > 0 &&
                  <div className="Buy-checkout">
                    <p className="Buy-total">Total: ${total}</p>
                    <Link to={{
                      pathname: '/checkout',
                      state: {
                        productsBuy: productsBuy,
                        total: total
                      }
                    }} className='btn btn-secondary'>Checkout ></Link>
                  </div>
                }
                {productsBuy.length <= 0 &&
                  <p>There is not products</p>
                }
              </div>
            </Scrollbars>

          </div>
        </div>
      </div>

    )
  }
}

export default Buy