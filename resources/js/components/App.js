import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {BrowserRouter as Router, Switch, Route} from "react-router-dom";

import APHeader from './APHeader';
import Sidebar from './Sidebar';
import APFooter from './APFooter';
import ViewAdmins from './viewAdmins';
import ViewProducts from './viewProducts';
import AddAdmin from './addAdmin';
import AddProduct from './addproduct';

class App extends Component {

    constructor() {
        super();
        this.state = {
            admins: "/dashboard/admin",
            products: "/dashboard/product"
        }
        //console.log(this.state.admins);
        
        this.add_admin = this.add_admin.bind(this);
    }

    add_admin(data) {
        let tempAdd = this.state.admins;
        tempAdd.push(data);
    }

    add_product(data) {
        let tempAdd = this.state.products;
        tempAdd.push(data);
    }

    getAdmins() {
        return (
            fetch("/dashboard/admin")
            .then(req => req.json())
            .then(res => {
                //console.log(res);
                const admins = res.map(admin => {
                    return admin;
                })
                this.setState({
                    admins: admins
                });
                if(res) {
                    
                }
            })
        );
    }

    getProducts() {
        return (
            fetch("/dashboard/product")
            .then(req => req.json())
            .then(res => {
                //console.log(res);
                const products = res.map(product => {
                    return product;
                })
                this.setState({
                    products: products
                });
            })
        );
    }

    async componentDidMount() {
        await this.getAdmins();
        await this.getProducts();
    }

    render() {
        return (
            <Router>
                <APHeader />
                <Sidebar />
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-md-8">
                            <Switch>
                                <Route exact path="/dashboard/admin/">
                                    <ViewAdmins admins={this.state.admins} />
                                </Route>
                                <Route exact path="/dashboard/product/">
                                    <ViewProducts admins={this.state.products} />
                                </Route>
                                <Route exact path="/dashboard/admin/new">
                                    <AddAdmin add_admin={this.add_admin} />
                                </Route>
                                <Route exact path="/dashboard/product/new">
                                    <AddProduct add_product={this.add_product} />
                                </Route>
                            </Switch>
                        </div>
                    </div>
                </div>
                <APFooter />
            </Router>
        );
    }
}

export default App;

