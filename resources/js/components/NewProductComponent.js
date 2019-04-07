import axios from 'axios'
import React, { Component } from 'react'

class NewProject extends Component {
  constructor(props) {
    super(props)
    this.state = {
      name: '',
      price: '',
      quantity: '',
      lot: '',
      expired_at: '',
      supplier_name: '',
      supplier_email: '',
      nextform: false,
      errors: []
    }
    this.handleFieldChange = this.handleFieldChange.bind(this)
    this.handleCreateNewProduct = this.handleCreateNewProduct.bind(this)
    this.hasErrorFor = this.hasErrorFor.bind(this)
    this.renderErrorFor = this.renderErrorFor.bind(this)
    this.handleNewForm = this.handleNewForm.bind(this)
    this.handleBack = this.handleBack.bind(this)

  }

  handleFieldChange(event) {
    this.setState({
      [event.target.name]: event.target.value
    })
  }

  async handleCreateNewProduct(event) {
    event.preventDefault()

    const { history } = this.props

    const product = {
      name: this.state.name,
      price: this.state.price,
      quantity: this.state.quantity,
      lot: this.state.lot,
      expired_at: this.state.expired_at,
      supplier_name: this.state.supplier_name,
      supplier_email: this.state.supplier_email

    }

    await axios.post('api/inventory/products', product)
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
  async handleNewForm(event) {
    event.preventDefault()
    await this.handleCreateNewProduct(event)
    if (Object.keys(this.state.errors).length <= 2 && this.state.errors.supplier_email || this.state.errors.supplier_name )
      this.setState({
        nextform: true,
        errors: ''
      })
  }
  handleBack(event) {
    event.preventDefault()
    this.setState({
      nextform: false
    })
  }
  render() {
    const { nextform } = this.state
    return (
      <div className='container py-4'>
        <div className='row justify-content-center'>
          <div className='col-md-6'>
            <form onSubmit={this.handleCreateNewProduct}>
              {!nextform &&
                <div className='card'>
                  <div className='card-header'>Create new product</div>
                  <div className='card-body'>
                    <div className='form-group'>
                      <label htmlFor='name'>Product name</label>
                      <input
                        id='name'
                        type='text'
                        className={`form-control ${this.hasErrorFor('name') ? 'is-invalid' : ''}`}
                        name='name'
                        value={this.state.name}
                        onChange={this.handleFieldChange}
                      />
                      {this.renderErrorFor('name')}

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
                    <button className='btn btn-primary' onClick={this.handleNewForm}>Next</button>
                  </div>
                </div>
              }
              {nextform &&
                <div className="card">
                  <div className='card-header'>Who is delivering?</div>
                  <div className='card-body'>
                    <div className="form-group">
                      <label htmlFor='name'>Supplier name</label>
                      <input
                        id='supplier_name'
                        type='text'
                        className={`form-control ${this.hasErrorFor('supplier_name') ? 'is-invalid' : ''}`}
                        name='supplier_name'
                        value={this.state.supplier_name}
                        onChange={this.handleFieldChange}
                      />
                      {this.renderErrorFor('supplier_name')}
                    </div>
                    <div className="form-group">
                      <label htmlFor='name'>Supplier email</label>
                      <input
                        id='supplier_email'
                        type='email'
                        className={`form-control ${this.hasErrorFor('supplier_email') ? 'is-invalid' : ''}`}
                        name='supplier_email'
                        value={this.state.supplier_email}
                        onChange={this.handleFieldChange}
                      />
                      {this.renderErrorFor('supplier_email')}
                    </div>
                    <div className="container-space-between">
                      <button className='btn btn-primary' >Save</button>
                      <button className='btn btn-danger' onClick={this.handleBack}>Back</button>
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

export default NewProject