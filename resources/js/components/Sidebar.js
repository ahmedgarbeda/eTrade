import React, { Component } from 'react';

import {Link} from "react-router-dom";

import AllAdmins from './Admins';


class Sidebar extends Component {

    render() {
        return (
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
                        <a href="/profile" className="d-block">ahemd</a>
                    </div>
                </div>

                <nav className="mt-2">
                    <ul className="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                        <li className="nav-item">
                            <div className="nav-link">
                                <Link to="/dashboard/admin/">
                                    <i className="nav-icon fas fa-user-friends cyan"></i>
                                    <p className="px-2">Admins</p>
                                </Link>
                            </div>
                        </li>
                        <li className="nav-item">
                            <div className="nav-link">
                                <Link to="/dashboard/product/">
                                    <i className="nav-icon fab fa-product-hunt green"></i>
                                    <p className="px-2">Products</p>
                                </Link>
                            </div>
                        </li>
                    </ul>
                </nav>
                </div>
            </aside>
        );
    }
}
 
export default Sidebar;