import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {BrowserRouter as Router, Switch, Route} from "react-router-dom";

import '../style/style.css';

import Navbar from './nav.js';
import Header from './header.js';
import Login from './login';
import Signup from './signup';
import Cart from './cart';
import Payments from './payments';
import ProductCard from './productCard.js';
import FullProductCard from './fullProductCard.js';
import Aboutus from './aboutus.js';
import Footer from './footer.js';

class App extends Component {
    render() {
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
                                <Cart />
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

