import React, { Component } from 'react';
import ReactDOM from 'react-dom';

import {Link} from "react-router-dom";

class CartList extends Component {

    constructor() {
        super();
        this.state= {
            quantity: 0,
        }
        this.changeHandeler = this.changeHandeler.bind(this);
        this.plusOne = this.plusOne.bind(this);
        this.minusOne = this.minusOne.bind(this);
    }

    changeHandeler(event) {        
        this.setState({
            quantity: event.target.value
        })
    }

    plusOne() {
        const tempquantity = this.state.quantity;
        this.setState({
            quantity: tempquantity + 1
        });
        this.props.handleTotal(this.props.price);
    }
    minusOne() {
        const tempquantity = this.state.quantity;
        this.setState({
            quantity: tempquantity - 1
        });
        this.props.handleTotal(-this.props.price);
    }


    render() {

        const { id, name, price, img } = this.props;

        return (
            <tr key={id}>
                <th scope="row">
                    <img src={img} width="80"/>
                    <span className="px-3 h4">{name}</span>
                </th>
                <td className="fix-table-cart h4">${price}</td>
                <td className="fix-table-cart h4">
                    <button 
                    className="btn btn-outline-danger py-0 pointer"
                    onClick={this.minusOne}
                    disabled={this.state.quantity < 1}
                    >-1</button>
                    <input 
                    id="quantity-input" 
                    className="mx-3 text-center" 
                    type="text" 
                    name="qty"
                    value={this.state.quantity}
                    onChange={this.changeHandeler}
                    />
                    <button 
                    className="btn btn-outline-primary py-0"
                    onClick={this.plusOne}
                    >+1</button>
                </td>
                <td className="fix-table-cart h3 text-success text-right font-weight-bolder">$<span>{ price * this.state.quantity }</span></td>
            </tr>                 
         );
    }
}
 
export default CartList;