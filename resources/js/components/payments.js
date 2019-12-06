import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class Payments extends Component {

    constructor() {
        super();
        this.state = {
            active_payment: false
        }
        this.toggle = this.toggle.bind(this);
    }

    toggle() {
        this.setState({ 
           active_payment: !this.state.active_payment
        });
    } 

    render() {
        return ( 
            <div className="row justify-content-center">
                <div className="col-md-6">
                    <div className="py-3 px-1 my-5 text-center display-1">
                        <span id="box" className=
                        {"bg-white border border-dark rounded-lg py-2 px-5 mx-3 pointer " + 
                        (this.state.active_payment ? "": "active")}
                        onClick={this.toggle} ><i class="fas fa-credit-card"></i></span>
                        <span className=
                        {"bg-white border border-dark rounded-lg py-2 px-5 mx-3 pointer " + 
                        (this.state.active_payment ? "active": "")}
                        onClick={this.toggle} ><i class="fab fa-cc-paypal"></i></span>
                    </div>
                    <div>
                        <form method="post">
                            <div className="form-group">
                                <label className="text-primary" htmlFor="cardnum">CARD NUMBER</label>
                                <input id="cardnum" className="form-control" type="number" name="cardnum" placeholder="Card Number" />
                            </div>
                            <div className="form-group">
                                <label className="text-primary" htmlFor="name">CARDHOLDER NAME</label>
                                <input id="name" className="form-control" type="text" name="name" placeholder="name" />
                            </div>
                            <div className="form-group">
                                <label className="text-primary" htmlFor="date">EXPIRE DATE</label>
                                <input id="date" className="form-control" type="text" name="date" placeholder="MM / YY" />
                            </div>
                            <div className="form-group">
                                <label className="text-primary" htmlFor="cvv">CVV</label>
                                <input id="cvv" className="form-control" type="number" name="cvv" placeholder="CVV" />
                            </div>
                            <div className="form-group">
                                <button className="btn btn-primary btn-block" type="submit">Pay Now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         );
    }
}
 
export default Payments;