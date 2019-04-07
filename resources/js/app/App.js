import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './header/HeaderComponent'
import ProductList from './product/ProductListComponent'
import NewProduct from './product/NewProductComponent'
import EditProduct from './product/EditProductComponent'
import BuyProduct from './buy/BuyComponent'
import Checkout from './checkout/CheckoutComponent'

const base = process.env.NODE_ENV == 'development' ? '/superfudsapp/public' : '/'
class App extends Component {
    render() {
        return (
            <BrowserRouter basename={base}>
                <div>
                    <Header />
                    <Switch>
                        <Route exact path='/' component={ProductList} />
                        <Route path='/create' component={NewProduct} />
                        <Route path='/product/edit/:id' component={EditProduct} />
                        <Route path='/buy' component={BuyProduct} />
                        <Route path='/checkout' component={Checkout} />

                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}
ReactDOM.render(<App />, document.getElementById('app'))