import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {BrowserRouter as Router, Switch, Route} from "react-router-dom";

import '../style/style.css';

import Navbar from './nav.js';
import Header from './header.js';
import Login from './login';
import Signup from './signup';
import CartTable from './cartTable';
import CartList from './cartList';
import TotalPrice from './totalPrice';
import Payments from './payments';
import ProductCard from './productCard.js';
import FullProductCard from './fullProductCard.js';
import Aboutus from './aboutus.js';
import Footer from './footer.js';


const fetchedProducts = [
    {
        id: 1,
        name: "product1",
        price: 100,
        img: "images/product-red.png"
    },
    {
        id: 2,
        name: "product2",
        price: 50,
        img: "images/product-cyan.png"
    },
    {
        id: 3,
        name: "product3",
        price: 150,
        img: "images/product-joy.png"
    }
]


class App extends Component {

    constructor() {
        super();
        this.state = {
            productList: [],
            subTotal: 0
        }
        this.caluculateSubTotal = this.caluculateSubTotal.bind(this)
    }

    caluculateSubTotal(price) {
        this.setState({ subTotal: this.state.subTotal + price });
    }

    render() {

        const products = fetchedProducts.map(product => {
            return (
                <CartList 
                id={product.id}
                name={product.name}
                price={product.price}
                img={product.img}
                handleTotal={this.caluculateSubTotal}
                />
            );
        })

        return (
            <Router>
                <Navbar />
                <Header />
                    <div className="container">
                        <Switch>
                            <Route exact path="/">
                                <ProductCard />
                            </Route>
                            <Route path="/sign-up">
                                <Signup />
                            </Route>
                            <Route path="/login">
                                <Login />
                            </Route>
                            <Route path="/product">
                                <FullProductCard />
                            </Route>
                            <Route path="/cart">
                                <CartTable 
                                show={products} 
                                gotTotal={<TotalPrice subTotalValue={this.state.subTotal}/>} />
                            </Route>
                            <Route path="/payments">
                                <Payments />
                            </Route>
                            <Route path="/about-us">
                                <Aboutus />
                            </Route>
                        </Switch>
                    </div>
                <Footer />
            </Router>
        );
    }
}

export default App;

