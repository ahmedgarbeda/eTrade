import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class TotalPrice extends Component {
    render() {
        return ( 
            <div className="d-flex justify-content-end py-4">
                <div className="display-4">Sub total: {this.props.subTotalValue}</div>
            </div>
         );
    }
}
 
export default TotalPrice;