import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {BrowserRouter as Router, Switch, Route} from "react-router-dom";

import '../style/style.css';

import Navbar from './nav.js';
import Header from './header.js';
import Login from './login';
import Signup from './signup';
import ProductCard from './productCard.js';
import FullProductCard from './fullProductCard.js';
import Footer from './footer.js';

class App extends Component {
    render() {
        return (
            <Router>
                <Navbar />
                    <div className="container">
                        <Switch>
                            <Route exact path="/">
                                <Header />
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
                        </Switch>
                    </div>
                <Footer />
            </Router>
        );
    }
}

export default App;

