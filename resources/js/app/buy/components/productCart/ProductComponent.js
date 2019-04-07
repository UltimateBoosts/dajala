import React from 'react'
import './Product.scss'
import productImage from '../product.png'
function Product(props) {
    return (
        <div className='Product'>
            <span className={`badge ${props.product.quantity == 0 ? 'badge-Secondary' : 'badge-success'}`}>{props.product.quantity == 0 ? `Outstock` : `Avaliable`}  </span>
            <img src={productImage.substring(1)} />
            <h4 className='Product-name'>{props.product.name}</h4>
            <div className="custom-col-container">
                <p className='Product-price'>Price: <b>${props.product.price}</b></p>
                <button onClick={() => { props.handleAddProduct(props.product, props.bind) }} className='btn btn-primary' disabled={props.product.quantity == 0 ? true : false} >Add</button>
            </div>
        </div>
    )
}
export default Product