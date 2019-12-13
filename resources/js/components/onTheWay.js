import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class OrderDone extends Component {
    render() { 
        return ( 
            <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                <div className="row justify-content-center py-5">
                    <div className="col-md-8 text-center py-3">
                        <i className="fas fa-check-circle display-1 text-success"></i>
                        <p className="display-4 pt-1 text-success">Done</p>
                        <p className="display-4 text-dark">Your order on the way</p>
                        <Link to="/">
                            <div className="my-5 alert alert-primary h3">complete shopping</div>
                        </Link>
                    </div>
                </div>
            </div>
         );
    }
}
 
export default OrderDone;