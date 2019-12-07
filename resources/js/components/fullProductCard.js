import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

import RelatedProduct from './relatedProduct'

class FullProductCard extends Component {
    render() { 
        return (
            <div>
            <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                <div className="row justify-content-center">
                    <div className="col-md-8">
                        <div className="card border-0 rounded-0">
                            <div className="row no-gutters">
                                <div className="col-md-6">
                                    <img src="images/product-red.png" className="card-img rounded-0" alt="..." />
                                </div>
                                <div className="col-md-6">
                                    <div className="card-body">
                                        <h5 className="card-title">Product name</h5>
                                        <p className="card-text h3 font-weight-bold mb-4">Amazon Brand - Peak Velocity Men's VXE Cloud Run Short Sleeve Quick-Dry Athletic-Fit T-Shirt</p>
                                        <p className="card-text mb-2 h4">price: <span className="font-weight-bolder text-success">$16.25</span></p>
                                        <p className="card-text mb-2 h4">size: <span>large</span></p>
                                        <p className="card-text mb-2 h4">color: <span>red</span></p>
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
                </div>
            </div>
            <RelatedProduct />
            </div>
         );
    }
}
 
export default FullProductCard;