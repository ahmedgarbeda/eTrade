import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link, withRouter} from "react-router-dom";

class Payments extends Component {

    constructor() {
        super();
        this.state = {
            paymentMethod: false,
            cash: false
        }
        this.toggle = this.toggle.bind(this);
        this.cash = this.cash.bind(this);
    }

    toggle() {
        this.setState({ 
           paymentMethod: !this.state.paymentMethod
        });
    }

    cash(e) {
        e.preventDefault();
        this.setState({ cash: !this.state.cash });
    }

    render() {

        const CreditCardForm = () => {
            return (
                <React.Fragment>
                    <div className="display-3 text-center text-primary"><i class="fab fa-cc-visa"></i></div>
                    <h2 className="text-center pb-4">Comfirm Purchase</h2>
                    <form method="post">
                        <div className="form-group">
                            <label className="text-primary" htmlFor="cardnum">CARD NUMBER</label>
                            <input required id="cardnum" className="form-control" type="number" name="cardnum" placeholder="Card Number" />
                        </div>
                        <div className="form-group">
                            <label className="text-primary" htmlFor="name">CARDHOLDER NAME</label>
                            <input required id="name" className="form-control" type="text" name="name" placeholder="name" />
                        </div>
                        <div className="form-group">
                            <label className="text-primary" htmlFor="date">EXPIRE DATE</label>
                            <input required id="date" className="form-control" type="text" name="date" placeholder="MM / YY" />
                        </div>
                        <div className="form-group">
                            <label className="text-primary" htmlFor="cvv">CVV</label>
                            <input required id="cvv" className="form-control" type="number" name="cvv" placeholder="CVV" />
                        </div>
                        <div className="form-group">
                        <button 
                        className="btn btn-primary btn-block" 
                        type="submit">Pay Now</button>
                        </div>
                    </form>
                    </React.Fragment>
            );         
        }
        const PayPalForm = () => {
            return (
                <React.Fragment>
                    <div className="display-3 text-center text-primary"><i class="fab fa-paypal"></i></div>
                    <h2 className="text-center pb-4">login to Paypal</h2>
                    <form method="post">
                        <div className="form-group">
                            <label className="text-primary" htmlFor="email">E-mail</label>
                            <input required id="email" className="form-control" type="email" name="email" placeholder="email" />
                        </div>
                        <div className="form-group">
                            <label className="text-primary" htmlFor="password">Password</label>
                            <input required id="password" className="form-control" type="password" name="password" placeholder="Password" />
                        </div>
                        <div className="form-group">
                            <Link to="/onTheWay">
                                <button 
                                className="btn btn-primary btn-block" 
                                type="submit">Log in</button>
                            </Link>
                        </div>
                    </form>
                </React.Fragment>
            );
        }

        return (
            <div className="container-fluid my-5 bg-white text-dark py-5 px-5 shadow card-margin">
                <div className="row">
                    <div className="col-md-7">
                        <h1 className="text-center display-4 pt-4">Payment Information</h1>
                        <div className="py-3 px-1 my-5 text-center display-1">
                            <span id="box" className=
                            {"bg-white border border-dark rounded-lg py-2 px-5 mx-3 pointer " + 
                            (this.state.paymentMethod ? "": "active")}
                            onClick={this.toggle} ><i class="fas fa-credit-card"></i></span>
                            <span className=
                            {"bg-white border border-dark rounded-lg py-2 px-5 mx-3 pointer " + 
                            (this.state.paymentMethod ? "active": "")}
                            onClick={this.toggle} ><i class="fab fa-cc-paypal"></i></span>
                        </div>
                        <div>
                            {(this.state.paymentMethod ? <PayPalForm /> : <CreditCardForm />)}
                        </div>
                    </div>
                    <div className="col-md-5 d-flex align-items-center justify-content-center">
                        <div className="text-center py-4 ">
                            <span 
                            className="py-5 display-4">
                            OR</span>
                            <button 
                            className={"my-4 btn btn-block btn-" + 
                            (this.state.cash? "primary": "outline-primary")
                            }
                            style={{fontSize: '3rem'}}
                            onClick={this.cash}
                            >
                            Cash on delivery
                            </button>
                            <Link to="/onTheWay">
                                <button className="btn btn-success btn-block"
                                disabled={!this.state.cash}>
                                CONTINUE</button>
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
         );
    }
}
 
export default withRouter(Payments);