import axios from 'axios'
import React, { Component } from 'react'
import API from '../../config/api'
import './Checkout.scss'

class CheckoutComponent extends Component {
  constructor(props) {
    super(props)
    let total, productsBuy
    if (props.location.state && props.location.state.total) {
      total = props.location.state.total
      productsBuy = props.location.state.productsBuy
    } else {
      this.props.history.push('/')
    }
    this.state = {
      total: total ? total : 0,
      productsBuy: productsBuy ? productsBuy : [],
      client_name: '',
      client_email: '',
      errors: [],
      invoice: '',
      totalPurchase: 0
    }
    this.handleFieldChange = this.handleFieldChange.bind(this)
    this.handleCheckout = this.handleCheckout.bind(this)
    this.hasErrorFor = this.hasErrorFor.bind(this)
    this.renderErrorFor = this.renderErrorFor.bind(this)
    this.handleBack = this.handleBack.bind(this)

  }

  handleFieldChange(event) {
    this.setState({
      [event.target.name]: event.target.value
    })
  }

  async handleCheckout(event) {
    event.preventDefault()

    const { history } = this.props

    const purchase = {
      products: this.state.productsBuy,
      total: this.state.total,
      client_name: this.state.client_name,
      client_email: this.state.client_email
    }
    await axios.post(`${API.BUY}`, purchase)
      .then(response => {
        // redirect to the homepage
        //history.push('/')
        console.log(response.data.response)
        this.setState({
          invoice: response.data.response.invoice,
          totalPurchase: response.data.response.total,
          total: []
        })
      })
      .catch(error => {
        this.setState({
          errors: error.response.data.error
        })
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
  handleBack(event) {
    if (this.props.location.state) {
      this.props.history.replace({
        pathname: this.props.location.pathname,
        state: {}
      })
    }
    this.props.history.push('/buy')
  }

  render() {
    const { total, invoice, productsBuy, totalPurchase } = this.state
    return (
      <div className='container py-4'>
        <div className='row justify-content-center'>
          <div className='col-md-6'>
            {invoice != '' &&
              <div className="card">
                <div className='card-header'>Purchase Detail</div>
                <div className='card-body'>
                  <div className="checkout-detail">
                    <table className="table">
                      <thead>
                        <tr>
                          <th>Product Name</th>
                          <th>Product Quantity</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        {
                          productsBuy.map(elem => (
                            <tr>
                              <td>{elem.name}</td>
                              <td>{elem.quantity}</td>
                              <td>${elem.total}</td>
                            </tr>
                          ))
                        }
                      </tbody>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td><b>Total</b></td>
                          <td>${totalPurchase}</td>
                        </tr>
                      </tfoot>
                    </table>
                  </div>
                  <div className="invoice">
                    <p>In case you want to <b>cancel</b> the purchase use this invoice code </p>
                    {
                      <p className="invoice-detail">{invoice}</p>
                    }
                  </div>
                  <button className='btn btn-primary' onClick={this.handleBack}>Go back</button>
                </div>
              </div>
            }

            <form onSubmit={this.handleCheckout}>

              {total != 0 &&
                <div className="card">
                  <div className='card-header'>Who is Buying?</div>
                  <div className='card-body'>
                    <div className="form-group">
                      <label htmlFor='name'>Client name</label>
                      <input
                        id='client_name'
                        type='text'
                        className={`form-control ${this.hasErrorFor('client_name') ? 'is-invalid' : ''}`}
                        name='client_name'
                        value={this.state.client_name}
                        onChange={this.handleFieldChange}
                      />
                      {this.renderErrorFor('client_name')}
                    </div>
                    <div className="form-group">
                      <label htmlFor='name'>Client email</label>
                      <input
                        id='client_email'
                        type='email'
                        className={`form-control ${this.hasErrorFor('client_email') ? 'is-invalid' : ''}`}
                        name='client_email'
                        value={this.state.client_email}
                        onChange={this.handleFieldChange}
                      />
                      {this.renderErrorFor('client_email')}
                    </div>
                    <div className="container-space-between">
                      <button className='btn btn-primary' >Finish</button>
                      <button className='btn btn-danger' onClick={this.handleBack}>Cancel</button>
                    </div>
                  </div>
                </div>
              }

            </form>

          </div>

        </div>
      </div>
    )
  }
}

export default CheckoutComponent