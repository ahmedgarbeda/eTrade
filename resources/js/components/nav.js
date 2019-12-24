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
                        {/*<li className="nav-item">
                            <form className="form-inline position-relative">
                                <input className="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                                <button className="btn btn-primary my-2 my-sm-0 inline-search-btn"><i className="fa fa-search"></i></button>
                            </form>
                        </li>*/}
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
                            <a className="nav-link" href="#contact-us">CONTACTS<span className="sr-only"></span></a>
                        </li>
                        <li className="nav-item ml-5">
                            {(this.props.isLogging?
                            <div className="btn-group text-warning animated jackInTheBox h3 m-0">
                                <i className="fas fa-user px-3"></i>
                                <span className="text-capitalize">{this.props.username}</span>
                                <span className="pointer dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span className="sr-only">Toggle Dropdown</span>
                                </span>

                                <div className="dropdown-menu pointer">
                                    <span className="dropdown-item h4 m-0" onClick={this.props.logOut}>log out</span>
                                </div>
                            </div> :
                            <div className="">
                                <Link to="/login">
                                    <button type="button" className="btn btn-primary mr-4">Log In</button>
                                </Link>
                                <Link to="/sign-up">
                                    <button type="button" className="btn btn-outline-primary">Register</button>
                                </Link>
                            </div>
                            )}
                        </li>
                        <Link to="/cart">
                            <li className="nav-item ml-5">
                                <a className="nav-link" href="#"><i className="fa fa-shopping-cart fa-2x">
                                <span class={"badge badge-pill cart-count "+ (this.props.count>0?"badge-primary":"badge-danger")}>
                                {this.props.count}</span></i>
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