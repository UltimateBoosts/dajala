import React, { Component } from 'react'
import ReactDOM from 'react-dom'
import { BrowserRouter, Route, Switch } from 'react-router-dom'
import Header from './HeaderComponent'
import ProductList from './ProductListComponent'
import NewProduct from './NewProductComponent'
import EditProduct from './EditProductComponent'

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

                    </Switch>
                </div>
            </BrowserRouter>
        )
    }
}
ReactDOM.render(<App />, document.getElementById('app'))