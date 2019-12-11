import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class TotalPrice extends Component {
    render() {
        return (
            <div>
                <div className="d-flex justify-content-end py-4">
                    <div className="display-4">Sub total: <span className="text-success font-weight-bolder">${this.props.subTotalValue}</span></div>
                </div>
                <div className="d-flex justify-content-end">
                    <Link to="/payments">
                            <button 
                            className="btn btn-success mb-4 font-weight-bolder"
                            disabled={this.props.subTotalValue === 0}>
                            PROCEED TO CHECKOUT</button>
                    </Link>
                </div>
            </div>
         );
    }
}
 
export default TotalPrice;