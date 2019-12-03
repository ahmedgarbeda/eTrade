import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Navbar extends Component {
    render() { 
        return (  
            <nav className="navbar navbar-expand-lg navbar-light bg-dark text-light">
                <a className="navbar-brand" href="#">eTrade</a>
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
                        <li className="nav-item ml-5">
                            <a className="nav-link" href="#">HOME <span className="sr-only"></span></a>
                        </li>
                        <li className="nav-item ml-5">
                            <a className="nav-link" href="#">ABOUT <span className="sr-only"></span></a>
                        </li>
                        <li className="nav-item ml-5">
                            <a className="nav-link" href="#">CONTACTS <span className="sr-only"></span></a>
                        </li>
                        <li className="nav-item ml-5">
                            <button type="button" className="btn btn-primary">SIGN UP</button>
                        </li>
                        <li className="nav-item ml-5">
                            <a className="nav-link" href="#"><i className="fa fa-shopping-cart fa-2x"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        );
    }
}
 
export default Navbar;