import React, { Component } from 'react';
import ReactDOM from 'react-dom';

class Shopping extends Component {

     constructor() {
        super();
        this.state = {
            payments: [],
            shipping: [],
            governrates: [],
            payment_method_id: '',
            shipping_method_id: '',
            governrate_id: '',
            address: '',
            order_items: [],
            totalPrice: 0
        }
        this.changeHandler = this.changeHandler.bind(this);
        this.sendData = this.sendData.bind(this);
     }

     changeHandler(event) {
        const fieldValue = event.target.name;
        this.setState({
            [fieldValue]: event.target.value
        })
     }


    getPayment() {
        return (
            fetch("api/payment_methods")
            .then(req => req.json())
            .then(res => {
                const payments = res.map(payment=> {
                    return payment
                });
                this.setState({
                    payments: payments
                });
                console.log(this.state.payments);
            })
        );
    }

    getshipping() {
        return (
            fetch("api/shipping_methods/2")
            .then(req => req.json())
            .then(res => {
                const shipping = res.map(ship=> {
                    return ship
                });
                this.setState({
                    shipping: shipping
                });
                console.log(this.state.shipping);
            })
        );
    }

    getGovernrates() {
        return (
            fetch("/api/governrates")
            .then(req => req.json())
            .then(res => {
                const governrates = res.map(governrate => {
                    return governrate;
                })
                this.setState({
                    governrates: governrates
                })
            })
        );
    }

    sendData(event) {
        event.preventDefault();

        let tmpData = {
            payment_method_id: this.state.payment_method_id,
            shipping_method_id: this.state.shipping_method_id,
            governrate_id: this.state.governrate_id,
            address: this.state.address,
            order_items: this.props.order_items,
            totalPrice: this.props.totalPrice
        }
        this.props.sendShopping(tmpData);
    }

    async componentDidMount() { 
        await this.getPayment();
        await this.getshipping();
        await this.getGovernrates();
    }


    render() { 
        return ( 
            <div className="container-fluid my-5 bg-white text-dark py-4 px-5 shadow card-margin">
                <div className="row justify-content-center py-5">
                    <div className="col-md-8 text-center py-3">
                        <form onSubmit={this.sendData}>
                            <label className="text-primary" htmlFor="payment">Payment Method</label>
                            <select 
                            required id="payment" 
                            className="form-control"
                            name="payment_method_id"
                            onChange={this.changeHandler}
                            value={this.state.payment_method_id}>
                                <option value="default">select payment</option>
                                {
                                    this.state.payments.map(payment=> (
                                        <option key={payment.id} value={payment.id}>{payment.name}</option>
                                    ))
                                }
                            </select>
                            <label className="text-primary" htmlFor="shipping">shipping Method</label>
                            <select 
                            required id="shipping" 
                            className="form-control"
                            name="shipping_method_id"
                            onChange={this.changeHandler}
                            value={this.state.shipping_method_id}>
                                <option value="default">select shipping</option>
                                {
                                    this.state.shipping.map(shipping=> (
                                        <option key={shipping.id} value={shipping.id}>{shipping.name}</option>
                                    ))
                                }
                            </select>
                            <label className="text-primary" htmlFor="governrate">Government</label>
                            <select 
                            required id="governrate" 
                            className="form-control"
                            name="governrate_id"
                            onChange={this.changeHandler}
                            value={this.state.governrate_id}>
                                <option value="default">select government</option>
                                {
                                    this.state.governrates.map(governrate=> (
                                        <option key={governrate.id} value={governrate.id}>{governrate.name}</option>
                                    ))
                                }
                            </select>
                            <label className="text-primary" htmlFor="address">Address</label>
                            <input required 
                            id="address" 
                            className="form-control" 
                            type="text" 
                            name="address"
                            placeholder="address" 
                            onChange={this.changeHandler}
                            />
                            <div className="py-2 display-4">Total Price: <span className="text-success font-weight-bolder">${this.props.totalPrice}</span></div>   
                            <div className="form-group">
                                <button className="btn btn-primary btn-block" type="submit">Process</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
         );
    }
}
 
export default Shopping;