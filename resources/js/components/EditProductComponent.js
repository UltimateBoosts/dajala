import axios from 'axios'
import React, { Component } from 'react'
import API from '../config/api'
class NewProject extends Component {
  constructor(props) {
    super(props)
    this.state = {
      name: '',
      product: '',
      price: '',
      quantity: '',
      lot: '',
      expired_at: '',
      errors: []
    }
    this.handleFieldChange = this.handleFieldChange.bind(this)
    this.handleUpdateProduct = this.handleUpdateProduct.bind(this)
    this.hasErrorFor = this.hasErrorFor.bind(this)
    this.renderErrorFor = this.renderErrorFor.bind(this)

  }
  async componentDidMount() {
    const productId = this.props.match.params.id
    await axios.get(`${API.PRODUCTS}/${productId}`).then(response => {
      response.data.response
      this.setState({
        product: response.data.response
      })
    }).catch(error => {
      this.setState({
        errors: error.response.data.error
      })
    })
    this.setState({
      name: this.state.product.name,
      price: this.state.product.price,
      quantity: this.state.product.quantity,
      lot: this.state.product.lot,
      expired_at: this.state.product.expired_at
    })

  }
  handleFieldChange(event) {
    this.setState({
      [event.target.name]: event.target.value
    })
  }
  async handleUpdateProduct(event) {
    event.preventDefault()

    const { history } = this.props

    const product = {
      price: this.state.price,
      quantity: this.state.quantity,
      lot: this.state.lot,
      expired_at: this.state.expired_at,
    }
    const id = this.state.product.id
    await axios.put(`${API.PRODUCTS}/${id}`, product)
      .then(response => {
        // redirect to the homepage
        history.push('/')
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
  render() {
    return (
      <div className='container py-4'>
        <div className='row justify-content-center'>
          <div className='col-md-6'>
            <form onSubmit={this.handleUpdateProduct}>

              <div className='card'>
                <div className='card-header'>Create new product</div>
                <div className='card-body'>
                  <div className='form-group'>
                    <label htmlFor='name'>Product name</label>
                    <input
                      id='name'
                      type='text'
                      className={`form-control`}
                      name='name'
                      value={this.state.name}
                      disabled
                    />
                  </div>
                  <div className="form-group">
                    <label htmlFor='name'>Product price</label>
                    <div className="input-group mb-3">
                      <div className="input-group-prepend">
                        <span className="input-group-text">$</span>
                      </div>
                      <input
                        id='price'
                        type='number'
                        className={`form-control ${this.hasErrorFor('price') ? 'is-invalid' : ''}`}
                        name='price'
                        value={this.state.price}
                        onChange={this.handleFieldChange}
                      />
                      {this.renderErrorFor('price')}
                    </div>
                  </div>
                  <div className="form-group">
                    <label htmlFor='name'>Product quantity</label>
                    <input
                      id='quantity'
                      type='number'
                      className={`form-control ${this.hasErrorFor('quantity') ? 'is-invalid' : ''}`}
                      name='quantity'
                      value={this.state.quantity}
                      onChange={this.handleFieldChange}
                    />
                    {this.renderErrorFor('quantity')}
                  </div>
                  <div className="form-group">
                    <label htmlFor='name'>Product lot</label>
                    <input
                      id='lot'
                      type='text'
                      className={`form-control ${this.hasErrorFor('lot') ? 'is-invalid' : ''}`}
                      name='lot'
                      value={this.state.lot}
                      onChange={this.handleFieldChange}
                    />
                    {this.renderErrorFor('lot')}
                  </div>
                  <div className="form-group">
                    <label htmlFor='name'>Product expired at</label>
                    <input
                      id='expired_at'
                      type='date'
                      className={`form-control ${this.hasErrorFor('expired_at') ? 'is-invalid' : ''}`}
                      name='expired_at'
                      value={this.state.expired_at}
                      onChange={this.handleFieldChange}
                    />
                    {this.renderErrorFor('expired_at')}
                  </div>
                  <button className='btn btn-primary'>Save</button>
                </div>
              </div>
            </form>

          </div>

        </div>
      </div>
    )
  }
}

export default NewProject