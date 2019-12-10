import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";


class Navbar extends Component {
    render() { 
        return (  
            <nav className="fixed-top shadow-lg navbar navbar-expand-lg navbar-light bg-dark text-light pt-0 pb-0">
                <a className="navbar-brand m-0" href="#">
                    <img className="img-fluid" src="images/Earth.svg" width="48" alt="logo" />
                    <span className="px-2 h5">eTrade</span>
                </a>
                <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span className="navbar-toggler-icon"></span>
                </button>
                <div className="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
                    <ul className="navbar-nav align-items-center">
                        <li className="nav-item">
                            <form className="form-inline">
                                <input className="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                                <button className="btn btn-outline-success my-2 my-sm-0" type="submit"><i className="fa fa-search"></i></button>
                            </form>
                        </li>
                        <Link to="/">
                            <li className="nav-item ml-5 font-weight-bold">
                                <a className="nav-link" href="#">HOME<span className="sr-only"></span></a>
                            </li>
                        </Link>
                        <Link to="/about-us">
                            <li className="nav-item ml-5 font-weight-bold">
                                <a className="nav-link" href="#">ABOUT<span className="sr-only"></span></a>
                            </li>
                        </Link>
                        <li className="nav-item ml-5 font-weight-bold">
                            <a className="nav-link" href="#">CONTACTS<span className="sr-only"></span></a>
                        </li>
                        <li className="nav-item ml-5">
                            <Link to="/sign-up">
                                <button type="button" className="btn btn-primary">SIGN UP</button>
                            </Link>
                        </li>
                        <Link to="/cart">
                            <li className="nav-item ml-5">
                                <a className="nav-link" href="#"><i className="fa fa-shopping-cart fa-2x">
                                <span class="badge badge-pill badge-primary">{this.props.count}</span></i>
                                <span className="px-1 font-weight-bold">Cart</span></a>
                            </li>
                        </Link>
                    </ul>
                </div>
            </nav>
        );
    }
}
 
export default Navbar;