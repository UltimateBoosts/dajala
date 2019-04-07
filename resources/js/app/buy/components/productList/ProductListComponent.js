import React from 'react'
import './ProductList.scss'
import productImage from '../product.png'
function ProductList(props) {
    return (
        <div className='ProductList'>
            <img src={productImage.substring(1)} />
            <div className='ProductList-container'>
                <h4 className='ProductList-name'>{props.product.name}</h4>
                <p className='ProductList-price'>Price: <b>${props.product.price}</b></p>
                <div className='ProductList-controls'>
                    <button onClick={() => { props.handleSubsProduct(props.product, props.bind) }} className='btn btn-danger' disabled={props.product.quantity == 0 ? true : false} >-</button>
                    <p className='ProductList-price'><b>{props.product.quantity}</b></p>
                    <button onClick={() => { props.handleAddProduct(props.product, props.bind) }} disabled={props.product.quantity == 0 ? true : false} className='btn btn-primary'>+</button>
                </div>
            </div>
        </div>
    )
}
export default ProductList