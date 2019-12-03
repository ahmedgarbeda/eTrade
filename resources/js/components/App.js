import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {BrowserRouter as Router, Switch, Route} from "react-router-dom";

import '../style/style.css';

import Navbar from './nav.js';
import ProductCard from './productCard.js';
import FullProductCard from './fullProductCard.js';
import Footer from './footer.js';

class App extends Component {
    render() {
        return (
            <div>
                <Navbar />
                <div className="container">
                    <Router>
                        <Switch>
                            <Route exact path="/">
                                <ProductCard />
                            </Route>
                            <Route exact path="/product">
                                <FullProductCard />
                            </Route>
                        </Switch>
                    </Router>
                </div>
                <Footer />
            </div>
        );
    }
}

export default App;

