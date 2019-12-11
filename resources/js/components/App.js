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
        name: 'product 1',
        price: 100,
        img: "images/product-joy.png"
    },
    {
        id: 2,
        name: 'product 2',
        price: 55,
        img: "images/product-blue.png"
    },
    {
        id: 3,
        name: 'product 3',
        price: 150,
        img: "images/product-red.png"
    }

]


class App extends Component {

    constructor() {
        super();
        this.state = {
            productList: [],
            cartList: [],
            cartCount: 0,
            addToCartAnimate: {animateState: false, btnId: 0},
            targetProduct: null,
            isProductListEmpty: false,
            subTotal: 0
        }
        this.caluculateSubTotal = this.caluculateSubTotal.bind(this);
        this.targetProduct = this.targetProduct.bind(this);
        this.addToCart = this.addToCart.bind(this);
        this.deleteFromCart = this.deleteFromCart.bind(this);
    }

    caluculateSubTotal(price) {
        this.setState({ subTotal: this.state.subTotal + price });
    }

    addToCart(product) {
        let tmpProduct = this.state.cartList;
        let tmpCount = this.state.cartCount;
        let tmpBtnId = this.state.addToCartAnimate.btnId;

        if(tmpProduct.includes(product)) {
            return 
        } else {
            tmpProduct.push(product);
            this.setState({
                cartList: tmpProduct,
                cartCount: tmpCount + 1,
                addToCartAnimate: {animateState: true, btnId: product.id}
            })
        }
    }

    deleteFromCart(product) {
        let tmpCount = this.state.cartCount;

        this.setState(current=>({
            cartList: current.cartList.filter(c => {
                return c.id !== product.id
            }),
            cartCount: tmpCount - 1,
            subTotal: 0,
            addToCartAnimate: {animateState: false, btnId: product.id}
        }))
    }

    targetProduct(product) {
        this.setState({
            targetProduct: product
        });
    }

    render() {

        const products = this.state.cartList.map(product => {
            return (
                <CartList 
                id={product.id}
                name={product.name}
                price={product.price}
                img={product.img}
                handleTotal={this.caluculateSubTotal}
                deleteFromCart={this.deleteFromCart}
                />
            );
        });

        const EmptyList = () =><div className="text-center text-primary display-4 py-4 w-100">Your Cart is Empty</div>;

        return (
            <Router>
                <Navbar count={this.state.cartCount} />
                <Header />
                    <div className="container">
                        <Switch>
                            <Route exact path="/">
                                <ProductCard 
                                products={fetchedProducts}
                                addToCart={this.addToCart}
                                added={this.state.addToCartAnimate.animateState}
                                btnId={this.state.addToCartAnimate.btnId}
                                targetProduct={this.targetProduct}
                                />
                            </Route>
                            <Route path="/product">
                                <FullProductCard 
                                target={this.state.targetProduct}
                                addToCart={this.addToCart}
                                added={this.state.addToCartAnimate.animateState}
                                btnId={this.state.addToCartAnimate.btnId}
                                />
                            </Route>
                            <Route path="/sign-up">
                                <Signup />
                            </Route>
                            <Route path="/login">
                                <Login />
                            </Route>
                            <Route path="/cart">
                                <CartTable 
                                show={
                                        (this.state.cartList.length===0)? <EmptyList /> : products
                                     }
                                empty={this.state.isProductListEmpty}
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

