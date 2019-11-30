import React, { Component } from 'react';

import {BrowserRouter as Router, Switch, Route, Link} from "react-router-dom";

import AllAdmins from './Admins';

import ViewAdmins from './viewAdmins';
import AddAdmin from './addAdmin';
import AddProduct from './addproduct';

class Sidebar extends Component {
    constructor() {
        super();
        this.state = {
            admins: [],
        }
    }

    componentDidMount() {
        fetch("/dashboard/admin")
        .then(req => req.json())
        .then(res => {
            console.log(res);
            const admins = res.map(admin => {
                return admin;
            })
            this.setState({
                admins: admins
            });
        })
    }

    render() {
        return (
            <Router>
                <aside className="main-sidebar sidebar-dark-primary elevation-4">
                    <a href="#" className="brand-link">
                        <img src="/images/logo.png" alt="AdminLTE Logo" className="brand-image img-circle elevation-3"/>
                        <span className="brand-text font-weight-light">eTrade</span>
                    </a>
                    <div className="sidebar">
                    <div className="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div className="image">
                            <a href="/profile"><img src="/images/profile.png" className="img-circle elevation-2" alt="User Image" /></a>
                        </div>
                        <div className="info">
                            <a href="/profile" className="d-block">ahmed</a>
                        </div>
                    </div>

                    <nav className="mt-2">
                        <ul className="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li className="nav-item">
                            <a href="/phones" className="nav-link">
                                <i className="nav-icon fas fa-list blue"></i>
                                <p>
                                    Phone List
                                </p>
                            </a>
                        </li>
                        <li className="nav-item">
                            <div className="nav-link">
                                <Link to="/dashboard/admin/">
                                    <i className="nav-icon fas fa-user-friends cyan"></i>
                                    <p>Admins</p>
                                </Link>
                            </div>
                        </li>
                        </ul>
                    </nav>
                    </div>
                </aside>
                <div className="container">
                    <div className="row justify-content-center">
                        <div className="col-md-8">
                            <Switch>
                                <Route exact path="/dashboard/admin/">
                                    <ViewAdmins admins={this.state.admins} />
                                </Route>
                                <Route exact path="/dashboard/admin/new">
                                    <AddAdmin />
                                </Route>
                                <Route exact path="/addproduct">
                                    <AddProduct />
                                </Route>
                            </Switch>
                        </div>
                    </div>
                </div>
            </Router>
        );
    }
}
 
export default Sidebar;