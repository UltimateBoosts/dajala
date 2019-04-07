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
      total: 0,
      invoice: '',
      errors: [],
      invoiceOpen: false,
      errorInvoice: '',
      sucessInvoice: ''
    }
    this.handleFieldChange = this.handleFieldChange.bind(this)
    this.handleInvoice = this.handleInvoice.bind(this)
    this.hasErrorFor = this.hasErrorFor.bind(this)
    this.renderErrorFor = this.renderErrorFor.bind(this)
    this.cancelPurchase = this.cancelPurchase.bind(this)

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
  hasErrorFor(field) {
    return !!this.state.errors[field]
  }

  renderErrorFor(field) {
    if (this.hasErrorFor(field)) {
      return (
        <span className='invalid-feedback'>
          <strong>{this.state.errors[field][0]}</strong>
        </span>
      )
    }
  }

  handleFieldChange(event) {
    this.setState({
      [event.target.name]: event.target.value
    })
  }

  async handleInvoice(event) {
    event.preventDefault()
    const invoice = this.state.invoice
    await axios.delete(`${API.CANCELINVOICE}/${invoice}`)
      .then(response => {
        // redirect to the homepage
        //history.push('/')
        this.setState({
          sucessInvoice: response.data.response
        })
      })
      .catch(error => {
        this.setState({
          errorInvoice: error.response.data.description
        })
      })
  }
  cancelPurchase() {
    this.setState({
      invoiceOpen: !this.state.invoiceOpen,
      errorInvoice: '',
      sucessInvoice: ''
    })
  }
  render() {
    const { products, productsBuy, total, invoiceOpen, errorInvoice, sucessInvoice } = this.state
    return (
      <div className='container py-4'>
        <button className='btn btn-danger btn-sm mb-3' onClick={this.cancelPurchase} >Cancel Purchase</button>
        {invoiceOpen &&
          <div className="invoice-form">
            <form onSubmit={this.handleInvoice}>
              <div className="form-group">
                <label htmlFor='name'>Invoice code</label>
                <input
                  id='invoice'
                  type='text'
                  className={`form-control ${this.hasErrorFor('invoice') ? 'is-invalid' : ''}`}
                  name='invoice'
                  value={this.state.invoice}
                  onChange={this.handleFieldChange}
                  required
                />

              </div>
              <div className="container-space-between">
                <button className='btn btn-primary' >Send</button>
                <button className='btn btn-danger' onClick={this.cancelPurchase}>Cancel</button>
              </div>
              {errorInvoice != '' &&
                <div className="alert alert-danger" role="alert">
                  {errorInvoice}
                </div>
              }
              {sucessInvoice != '' &&
                <div className="alert alert-success" role="success">
                  {sucessInvoice}
                </div>
              }
            </form>
          </div>
        }
        <div className="row no-gutters space-between">
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