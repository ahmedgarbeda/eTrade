import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class CartTable extends Component {
    render() { 
        return ( 
            <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                <div className="row justify-content-center">
                    <div className="col-md-12">
                        <table className="table table-striped mt-5 border-bottom">
                            <thead>
                                <tr>
                                    <th scope="col" className="h3">Product</th>
                                    <th scope="col" className="h3">Price</th>
                                    <th scope="col" className="px-4 h3">Quantitiy</th>
                                    <th scope="col" className="text-right h3">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                {this.props.show}
                            </tbody>
                        </table>
                        {this.props.gotTotal}
                        <Link to="/payments">
                        <div className="d-flex justify-content-end">
                            <button className="btn btn-success mb-4 font-weight-bolder">PROCEED TO CHECKOUT</button>
                        </div>
                        </Link>
                    </div>
                </div>
            </div>
         );
    }
}
 
export default CartTable;