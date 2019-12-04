import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";


class ProductCard extends Component {
    render() { 
        return (               
                <div className="container-fluid my-5 bg-white text-dark py-4 card-margin">
                    <div className="row">
                        <div className="col-4">
                            <div className="card border-0 rounded-0">
                                <Link to="/product">
                                    <img src="images/product-red.png" className="card-img-top rounded-0" alt="fokay" />
                                </Link>
                                <div className="card-body">
                                    <div className="row">
                                        <div className="col-6">
                                            <h5 className="card-title">Product name</h5>
                                            <h6 className="text-success font-weight-bolder">$16.25</h6>
                                        </div>
                                        <div className="col-6">
                                            
                                        </div>
                                    </div>
                                    <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div className="row">
                                        <div className="col-6 pt-2">
                                            <small className="text-warning h6">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <div className="col-6">
                                            <a href="#" className="btn btn-primary">
                                                <i className="fa fa-shopping-cart"></i><span className="px-2">Add to Card</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div className="col-4">
                            <div className="card border-0 rounded-0">
                                <Link to="/product">
                                    <img src="images/product-joy.png" className="card-img-top rounded-0" alt="fokay" />
                                </Link>
                                <div className="card-body">
                                    <div className="row">
                                        <div className="col-6">
                                            <h5 className="card-title">Product name</h5>
                                            <h6 className="text-success font-weight-bolder">$16.25</h6>
                                        </div>
                                        <div className="col-6">
                                            
                                        </div>
                                    </div>
                                    <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div className="row">
                                        <div className="col-6 pt-2">
                                            <small className="text-warning h6">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <div className="col-6">
                                            <a href="#" className="btn btn-primary">
                                                <i className="fa fa-shopping-cart"></i><span className="px-2">Add to Card</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                                                <div className="col-4">
                            <div className="card border-0 rounded-0">
                                <Link to="/product">
                                    <img src="images/product-cyan.png" className="card-img-top rounded-0" alt="fokay" />
                                </Link>
                                <div className="card-body">
                                    <div className="row">
                                        <div className="col-6">
                                            <h5 className="card-title">Product name</h5>
                                            <h6 className="text-success font-weight-bolder">$16.25</h6>
                                        </div>
                                        <div className="col-6">
                                            
                                        </div>
                                    </div>
                                    <p className="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                    <div className="row">
                                        <div className="col-6 pt-2">
                                            <small className="text-warning h6">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
                                        </div>
                                        <div className="col-6">
                                            <a href="#" className="btn btn-primary">
                                                <i className="fa fa-shopping-cart"></i><span className="px-2">Add to Card</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
         );
    }
}
 
export default ProductCard;