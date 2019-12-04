import React, { Component } from 'react';
import ReactDOM from 'react-dom';


const products = [
    {
        id: 1,
        name: "product1",
        price: 100
    },
    {
        id: 2,
        name: "product2",
        price: 50
    },
    {
        id: 3,
        name: "product3",
        price: 75
    }
]

class Cart extends Component {

    constructor() {
        super();
        this.state= {
            quantity: 0
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

    plusOne(product) {
        const tempquantity = this.state.quantity;
        this.setState({
            quantity: tempquantity + 1
        })
    }
    minusOne(product) {
        const tempquantity = this.state.quantity;
        this.setState({
            quantity: tempquantity - 1
        })
    }


    render() {
        return ( 
            <div className="row justify-content-center">
                <div className="col-md-8">
                    <table className="table table-striped my-5">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Quantitiy</th>
                                <th scope="col" className="text-right">Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            {/*<tr>
                                <th scope="row">
                                    <img src="images/product-red.png" width="80"/>
                                    <span className="px-3">Product Name</span>
                                </th>
                                <td className="fix-table-cart">$132</td>
                                <td className="fix-table-cart">
                                    <span 
                                    className="text-danger h2 pointer"
                                    onClick={this.minusOne}
                                    >-</span>
                                    <input 
                                    id="quantity-input" 
                                    className="mx-3 text-center" 
                                    type="text" 
                                    name="quantity"
                                    value={this.state.quantity}
                                    onChange={this.changeHandeler}
                                    />
                                    <span 
                                    className="text-primary h2 pointer"
                                    onClick={this.plusOne}
                                    >+</span>
                                </td>
                                <td className="fix-table-cart h4 text-success text-right font-weight-bolder">$<span>{132 * this.state.quantity}</span></td>
                            </tr>*/}
                            {products.map(product => (
                                    <tr key={product.id}>
                                    <th scope="row">
                                        <img src="images/product-red.png" width="80"/>
                                        <span className="px-3">{product.name}</span>
                                    </th>
                                    <td className="fix-table-cart">{product.price}</td>
                                    <td className="fix-table-cart">
                                        <span 
                                        className="text-danger h2 pointer"
                                        onClick={() => this.minusOne(product)}
                                        >-</span>
                                        <input 
                                        id="quantity-input" 
                                        className="mx-3 text-center" 
                                        type="text" 
                                        name={product.name}
                                        value={product.id}
                                        onChange={this.changeHandeler}
                                        />
                                        <span 
                                        className="text-primary h2 pointer"
                                        onClick={() => this.plusOne(product)}
                                        >+</span>
                                    </td>
                                    <td className="fix-table-cart h4 text-success text-right font-weight-bolder">$<span>{product.price * product.id}</span></td>
                                </tr>
                            ))}
                        </tbody>
                    </table>
                </div>
            </div>
         );
    }
}
 
export default Cart;