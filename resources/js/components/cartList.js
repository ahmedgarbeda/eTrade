import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class CartList extends Component {

    constructor() {
        super();
        this.state= {
            quantity: 0,
            orderItem: []
        }
        this.plusOne = this.plusOne.bind(this);
        this.minusOne = this.minusOne.bind(this);
    }

    plusOne() {
        const tempquantity = this.state.quantity;
        this.setState({
            quantity: tempquantity + 1
        });
        this.props.handleTotal(this.props.price);

        this.props.updateQuantity(this.state.quantity)
    }
    minusOne() {
        const tempquantity = this.state.quantity;
        this.setState({
            quantity: tempquantity - 1
        });
        this.props.handleTotal(-this.props.price);

        this.props.updateQuantity(this.state.quantity)
    }

    render() {

        const { id, name, price, img } = this.props;

        // let tmpOrder = {};
        // tmpOrder['id'] = id;
        // tmpOrder['quantity'] = this.state.quantity,
        // tmpOrder['price'] = price;

        // let tmpItem = this.state.orderItem;
        // if(tmpItem.includes(tmpOrder)) {
        //     return
        // }else {
        //     tmpItem.push(tmpOrder);
        // }
        // console.log(this.state.orderItem);

        return (
            <tr key={id}>
                <th scope="row">
                    <img src={img} width="80"/>
                    <span className="px-3 h4">{name}</span>
                </th>
                <td className="fix-table-cart h4 text-success font-weight-bolder">${price}</td>
                <td className="fix-table-cart h4">
                    <button 
                    className="btn btn-outline-danger py-0 pointer"
                    onClick={this.minusOne}
                    disabled={this.state.quantity < 1}
                    >-1</button>
                    <span className="mx-3 badge badge-light px-3 py-2">{this.state.quantity}</span>
                    <button 
                    className="btn btn-outline-primary py-0"
                    onClick={this.plusOne}
                    >+1</button>
                </td>
                <td className="fix-table-cart h3 text-right font-weight-bolder">
                    <span className="text-success">${ price * this.state.quantity }</span>
                </td>
                <td className="fix-table-cart text-center">
                    <span 
                    className="text-danger pointer"
                    onClick={(e)=> {
                        e.preventDefault();
                        this.props.deleteFromCart(this.props);
                    }}><i className="fas fa-trash-alt fa-2x"></i></span>
                </td>
            </tr>                 
         );
    }
}
 
export default CartList;